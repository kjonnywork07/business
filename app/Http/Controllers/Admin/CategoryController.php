<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Category;
use app\Models\User;
class CategoryController extends Controller
{
   
    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        // $users = User::with('roles')->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function allCategoriesAjax(Request $request)
    {
         
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column'];
        $order= $request->order[0]['dir'];
        $orderColumnName = $request->columns[$orderColumn]['name'];

        $totalRecords = Category::select('count(*) as allcount');
        if(!empty($search)){
            $totalRecords->where(function($q) use($search){

                $q->where('name','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $totalRecords->orderBy($orderColumnName,$order);
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = Category::select('*');
        if(!empty($search)){
            $qry->where(function($q) use($search){
                $q->where('name','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $qry->orderBy($orderColumnName,$order);

        $data = $qry->skip($start)->take($rowperpage)->get();


        return response()->json([
            'data'=>$data,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ]);
        return view('admin.userManagement.staff',compact('users'));
        
    }
    public function create(Request $r)
    {
        
        if ($r->isMethod('post'))
        {

            // dd($r->all());
            Validator::make($r->all(), [
            'name'   =>      'required|string|max:255|unique:categories,name',
            ])->validate();
            
            $user = Category::create([
                'name'      =>      $r->name,
            ]);
            return redirect()->route('categories')->with('success',__('crud.categories.messages.create'));
        }
        return view('admin.categories.create');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.update',compact('category'));
    }
    public function update(Request $r)
    {
        // dd($r->all());
        Validator::make($r->all(), [
            'id'        =>      'required|integer',
            'name'        =>      'required|string|max:255|unique:categories,name,'.$r->id,
            ])->validate();
            $category = Category::where('id',$r->id)->update([
                'name'      =>      $r->name,
            ]);
            return redirect()->route('categories')->with('success',__('crud.categories.messages.update'));
    }
    public function delete($id)
    {
        $user = Category::find($id);
        $user->delete();
        return redirect()->back()->with('success',__('crud.categories.messages.delete'));
    }
    public function changeStatus($id)
    {
        $user = Category::findOrFail($id);
        $user->update([
            'status'=> ($user->status==1)?0:1
        ]);
        return redirect()->back()->with('success',__('crud.categories.messages.status'));
    }
}
