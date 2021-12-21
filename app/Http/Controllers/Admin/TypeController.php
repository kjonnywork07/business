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
use App\Models\Type;
use app\Models\User;
class TypeController extends Controller
{
   
    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $brands = Brand::all();
        // $users = User::with('roles')->get();
        return view('admin.types.index');
    }
    public function allTypesAjax(Request $request)
    {
         
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column'];
        $order= $request->order[0]['dir'];
        $orderColumnName = $request->columns[$orderColumn]['name'];

        $totalRecords = Type::select('count(*) as allcount');
        if(!empty($search)){
            $totalRecords->where(function($q) use($search){

                $q->where('name','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $totalRecords->orderBy($orderColumnName,$order);
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = Type::select('*');
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
        
    }
    public function create(Request $r)
    {
        
        if ($r->isMethod('post'))
        {

            // dd($r->all());
            Validator::make($r->all(), [
            'name'   =>      'required|string|max:255|unique:types,name',
            ])->validate();
            
            $user = Type::create([
                'name'      =>      $r->name,
            ]);
            return redirect()->route('types')->with('success',__('crud.types.messages.create'));
        }
        return view('admin.types.create');
    }
    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.types.update',compact('type'));
    }
    public function update(Request $r)
    {
        // dd($r->all());
        Validator::make($r->all(), [
            'id'        =>      'required|integer',
            'name'        =>      'required|string|max:255|unique:types,name,'.$r->id,
            ])->validate();
            $user = Type::where('id',$r->id)->update([
                'name'      =>      $r->name,
            ]);
            return redirect()->route('types')->with('success',__('crud.types.messages.update'));
    }
    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect()->back()->with('success',__('crud.types.messages.delete'));
    }
    public function changeStatus($id)
    {
        $type = Type::findOrFail($id);
        $type->update([
            'status'=> ($type->status==1)?0:1
        ]);
        return redirect()->back()->with('success',__('crud.types.messages.status'));
    }
}
