<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use app\Models\User;
class UserManagementController extends Controller
{
    /**
     * Display the deshboard view.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        $permissions = Permission::all();
        return view('admin.userManagement.permissions',compact('permissions'));
        
    }
    public function permissionsCreate(Request $r)
    {
        if ($r->isMethod('post'))
        {
            // dd('sss');
        Validator::make($r->all(), [
            'permission_name' => 'required|string|max:255|unique:permissions,name',
            ])->validate();
            $permission = Permission::create(['name' => $r->permission_name]);
            return redirect()->route('permissions')->with('success','Permission Created Successfully');
        }
        
        return view('admin.userManagement.permissionsCreate');
    }
    public function permissionsEdit($id)
    {
        $permission = Permission::find($id);
        // dd($permission);
        return view('admin.userManagement.permissionsUpdate',compact('permission'));
        
    }
    public function permissionsUpdate(Request $r)
    {
        Validator::make($r->all(), [
            'id' => 'required|integer',
            'permission_name' => 'required|string|max:255|unique:permissions,name,'.$r->id,
            ])->validate();
        $permission = Permission::where('id',$r->id)->update(['name' => $r->permission_name]);
        return redirect()->route('permissions')->with('success','Permission Updated Successfully');
    }
    public function permissionsDelete($id)
    {
        // dd();
        $permissions = Permission::where('id',$id)->delete();
        return redirect()->back()->with('success','Permission Deleted Successfully');
    }

    /**
     * Display the roles.
     *
     * @return \Illuminate\View\View
     */
    public function roles()
    {
        $roles = Role::with('permissions')->get();
        // dd($roles);
        return view('admin.userManagement.roles',compact('roles'));
        
    }
    public function rolesCreate(Request $r)
    {
        if ($r->isMethod('post'))
        {
            // dd($r->all());
        Validator::make($r->all(), [
            'role_name' => 'required|string|max:255|unique:roles,name',
            ])->validate();
            $roles = Role::create(['name' => $r->role_name]);
            if(isset($r->permissions))
                $roles->syncPermissions($r->permissions);
            return redirect()->route('roles')->with('success','Role Created Successfully');
        }
        $permissions = Permission::all();
        return view('admin.userManagement.rolesCreate',compact('permissions'));
    }
    public function rolesEdit($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions()->pluck('id')->toArray();
        $permissions = Permission::all();
        return view('admin.userManagement.rolesUpdate',compact('role','permissions','rolePermissions'));
        
    }
    public function rolesUpdate(Request $r)
    {
        // dd($r->permissions);
        Validator::make($r->all(), [
            'id' => 'required|integer',
            'role_name' => 'required|string|max:255',
            ])->validate();
        $roles = Role::where('id',$r->id)->update(['name' => $r->role_name]);
        $roles = Role::where('id',$r->id)->first();
        if(isset($r->permissions))
            $roles->syncPermissions($r->permissions);
        return redirect()->route('roles')->with('success','Role Updated Successfully');
    }
    public function rolesDelete($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        return redirect()->back()->with('success','Role Deleted Successfully');
    }


    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        // $users = User::with('roles')->get();
        // $roles = Role::with('permissions')->get();
        // dd($users);
        return view('admin.userManagement.users');
        
    }
    public function allUsersAjax(Request $request)
    {
        
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column'];
        $order= $request->order[0]['dir'];
        $orderColumnName = $request->columns[$orderColumn]['name'];

        $totalRecords = User::select('count(*) as allcount');
        if(!empty($search)){
            $totalRecords->where(function($q) use($search){

                $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $totalRecords->orderBy($orderColumnName,$order);
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = User::with('roles');
        if(!empty($search)){
            $qry->where(function($q) use($search){
                $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $qry->orderBy($orderColumnName,$order);

        $users = $qry->skip($start)->take($rowperpage)->get();


        return response()->json([
            'data'=>$users,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ]);
        return view('admin.userManagement.users',compact('users'));
        
    }
    public function usersCreate(Request $r)
    {
        if ($r->isMethod('post'))
        {
        Validator::make($r->all(), [
            'user_name'              =>      'required|string|max:255',
            'email'             =>      'required|email|unique:users,email',
            'password'          =>      'required|alpha_num|min:6',
            'confirm_password'  =>      'required|same:password',
            ])->validate();
            $user = User::create([
                'name'              =>$r->user_name,
                'email'             =>$r->email,
                'password'          => Hash::make($r->password),
            ]);
            if(isset($r->roles))
                $user->syncRoles($r->roles);
            return redirect()->route('users')->with('success',__('crud.users.messages.create'));
        }
        $roles = Role::all();
        return view('admin.userManagement.usersCreate',compact('roles'));
    }
    public function usersEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRoles = $user->roles()->pluck('id')->toArray();
        return view('admin.userManagement.usersUpdate',compact('user','roles','userRoles'));
    }
    public function usersUpdate(Request $r)
    {
        $validata = [
            'id'                =>      'required|integer',
            'user_name'         =>      'required|string|max:255',
            'email'             =>      'required|email|unique:users,email,'.$r->id,
        ];
        if(!empty($r->password))
            $validata['confirm_password']='required|same:password';
            
        Validator::make($r->all(), $validata)->validate();

        $user = User::find($r->id);

        $user->update([
            'name'              =>$r->user_name,
            'email'             =>$r->email,
            'password'          => Hash::make($r->password),
        ]);
        if(!empty($r->password))
        $user->update(['password'=> Hash::make($r->password)]);
        if(isset($r->roles))
            $user->syncRoles($r->roles);
        return redirect()->route('users')->with('success',__('crud.users.messages.update'));
    }
    public function usersDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success',__('crud.users.messages.delete'));
    }


    
    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function staff()
    {
        // $users = User::whereHas("roles", function($q){ $q->where("name",'!=', __('crud.customers.role'))->where("name",'!=', "SuperAdmin");})->get();
        // $roles = Role::with('permissions')->get();
        // dd($users);
        return view('admin.userManagement.staff');
        
    }
    public function allStaffAjax(Request $request)
    {
         
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column'];
        $order= $request->order[0]['dir'];
        $orderColumnName = $request->columns[$orderColumn]['name'];

        $totalRecords = User::select('count(*) as allcount')
        ->whereHas("roles", function($q){$q->Where("name","!=","SuperAdmin")->where("name","!=",__('crud.customers.role'));});
        if(!empty($search)){
            $totalRecords->where(function($q) use($search){

                $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $totalRecords->orderBy($orderColumnName,$order);
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = User::with('roles')
        ->whereHas("roles", function($q){$q->Where("name","!=","SuperAdmin")->where("name","!=",__('crud.customers.role'));});
        if(!empty($search)){
            $qry->where(function($q) use($search){
                $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $qry->orderBy($orderColumnName,$order);

        $users = $qry->skip($start)->take($rowperpage)->get();


        return response()->json([
            'data'=>$users,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ]);
        return view('admin.userManagement.staff',compact('users'));
        
    }

    public function staffCreate(Request $r)
    {
        if ($r->isMethod('post'))
        {
        Validator::make($r->all(), [
            'user_name'              =>      'required|string|max:255',
            'email'             =>      'required|email|unique:users,email',
            'password'          =>      'required|alpha_num|min:6',
            'confirm_password'  =>      'required|same:password',
            ])->validate();
            $user = User::create([
                'name'              =>$r->user_name,
                'email'             =>$r->email,
                'password'          => Hash::make($r->password),
            ]);
            if(isset($r->roles))
                $user->syncRoles($r->roles);
            return redirect()->route('staff')->with('success',__('crud.staff.messages.create'));
        }
        $roles = Role::where("name",'!=', __('crud.customers.role'))->where("name",'!=', "SuperAdmin")->get();
        return view('admin.userManagement.staffCreate',compact('roles'));
    }
    public function staffEdit($id)
    {
        $user = User::find($id);
        $roles = Role::where("name",'!=', __('crud.customers.role'))->where("name",'!=', "SuperAdmin")->get();
        $userRoles = $user->roles()->pluck('id')->toArray();
        return view('admin.userManagement.staffUpdate',compact('user','roles','userRoles'));
    }
    public function staffUpdate(Request $r)
    {
        $validata = [
            'id'                =>      'required|integer',
            'user_name'         =>      'required|string|max:255',
            'email'             =>      'required|email|unique:users,email,'.$r->id,
        ];
        if(!empty($r->password))
            $validata['confirm_password']='required|same:password';
            
        Validator::make($r->all(), $validata)->validate();

        $user = User::find($r->id);

        $user->update([
            'name'              =>$r->user_name,
            'email'             =>$r->email,
            'password'          => Hash::make($r->password),
        ]);
        if(!empty($r->password))
        $user->update(['password'=> Hash::make($r->password)]);
        if(isset($r->roles))
            $user->syncRoles($r->roles);
        return redirect()->route('staff')->with('success',__('crud.staff.messages.update'));
    }
    public function staffDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success',__('crud.staff.messages.delete'));
    }
    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status'=> ($user->status==1)?0:1
        ]);
        return redirect()->back()->with('success', __('crud.staff.messages.status'));
    }
}
