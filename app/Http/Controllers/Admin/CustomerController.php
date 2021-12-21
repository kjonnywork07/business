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
use app\Models\User;
use App\Models\Category;
use App\Models\Type;
use App\Models\UserType;
use App\Models\UserCategory;
use App\Models\Tag;
use App\Models\UserTag;
use Illuminate\Support\Facades\File; 
class CustomerController extends Controller
{
   
    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $users = User::whereHas("roles", function($q){ $q->where("name", __('crud.customers.role')); })->get();
        // $users = User::with('roles')->get();
        return view('admin.customers.index');
    }
    public function allCustomerAjax(Request $request)
    {
         
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column']??'';
        $order= $request->order[0]['dir']??"";
        $orderColumnName = $request->columns[$orderColumn]['name']??'';

        $totalRecords = User::select('count(*) as allcount')
        ->whereHas("roles", function($q){$q->Where("name", __('crud.customers.role'));});
        if(!empty($search)){
            $totalRecords->where(function($q) use($search){

                $q->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
            });
        }
        if(!empty($orderColumnName) && $orderColumnName!='roles')
            $totalRecords->orderBy($orderColumnName,$order);
        else
            $totalRecords->orderBy('id','desc');
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = User::with('roles')
        // ->role(__('crud.customers.role'));
        ->whereHas("roles", function($q){$q->Where("name",'=', __('crud.customers.role'));});
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

    public function create(Request $r)
    {
        
        if ($r->isMethod('post'))
        {

            // dd($r->all());
            Validator::make($r->all(), [
            'name'  => 'required|string|max:255|regex:/^[-a-zA-Z0-9]+$/u|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:255',  
            ])->validate();
            $roleCount = Role::where('name',__('crud.customers.role'))->get()->count();
            if($roleCount<1){
                Role::create(['name' => __('crud.customers.role')]);
            }
            $file = '';
            if(!empty($r->image))
            {
                $file = request()->file('image');
               $file =  $file->store('business_images', ['disk' => 'public']);
            }
            $file1 = '';
            if(!empty($r->banner_image))
            {
                $file1 = request()->file('banner_image');
               $file1 =  $file1->store('business_banner_images', ['disk' => 'public']);
            }
            $user = User::create([
                'name'          =>      $r->name,
                'email'         =>      $r->email,
                'phone'         =>      $r->phone,
                'image'         =>      $file,
                'banner_image'  =>      $file1,
                'about'         =>      $r->about??'',
                'bio'           =>      $r->bio??'',
                'meta_title'    =>      $r->meta_title??'',
                'meta_desc'     =>      $r->meta_desc??'',
                'password'      =>      Hash::make(Str::random(8)),
            ]);
            $user->assignRole(__('crud.customers.role'));
            if(!empty($r->tags)){
                $tagarray = explode(',',$r->tags);
                foreach($tagarray as $singleTag){
                    $findtag = Tag::where('name',$singleTag)->first();
                    $tag = $findtag;
                    if(!isset($findtag->id))
                        $tag = Tag::create(['name'=>$singleTag]);
                    // echo $tag->id.'/'.$product->id.'<br>';
                    $prodcutTag = UserTag::create([
                        'user_id'=>$user->id,
                        'tag_id'=>$tag->id
                    ]);
                }
                // die;
            }
            foreach($r->categories as $category){
                UserCategory::create(['user_id'=>$user->id,'category_id'=>$category]);
            }
            foreach($r->types as $type){
                UserType::create(['user_id'=>$user->id,'type_id'=>$type]);
            }
            return redirect()->route('customers')->with('success',__('crud.customers.messages.create'));
        }
        $categories = Category::where('status',1)->get();
        $types = Type::where('status',1)->get();
        return view('admin.customers.create',compact('categories','types'));
    }
    public function edit($id)
    {
        $user = User::with('categories')->with('types')->find($id)->load('tags');
        $categories = Category::where('status',1)->get();
        $types = Type::where('status',1)->get();
        $crntCats = $user->categories->pluck('id')->toArray();
        $crntTypes = $user->types->pluck('id')->toArray();
        $tagsdataArr = $user->tags->pluck('name')->toArray();
        $tags = implode(",",$tagsdataArr);
        return view('admin.customers.update',compact('user','categories','types','crntCats','crntTypes','tags'));
    }
    public function update(Request $r)
    {
        // dd($r->all());
        Validator::make($r->all(), [
            'id'          =>      'required|integer',
            'name'        =>      'required|string|max:255|regex:/^[-a-zA-Z0-9]+$/u|unique:users,name,'.$r->id,
            'email'       =>      'required|email|unique:users,email,'.$r->id,
            'phone'       =>      'required|string|max:255',  
        ],
        [
            'name.regex'    => 'you can not use special character despite the hyphen(-)'

        ])->validate();
            
            $user = User::find($r->id);
                $user->update([
                'name'       =>  $r->name,
                'email'      =>  $r->email,
                'phone'      =>  $r->phone,
                'about'      =>  $r->about??'',
                'bio'        =>  $r->bio??'',
                'meta_title' =>  $r->meta_title??'',
                'meta_desc'  =>  $r->meta_desc??'',
            ]);
            $file = '';
            if(!empty($r->image))
            {
                $file = request()->file('image');
               $file =  $file->store('business_images', ['disk' => 'public']);
               try 
               {
                   File::delete(public_path($user->image));
               } 
               catch (\Exception $e) 
               {
                 
               }
               $user->update(['image'=>$file]);
            }
            $file1 = '';
            if(!empty($r->banner_image))
            {
                $file1 = request()->file('banner_image');
                $file1 =  $file1->store('business_banner_images', ['disk' => 'public']);
                try 
                {
                    File::delete(public_path($user->banner_image));
                } 
                catch (\Exception $e) 
                {
                  
                }
                $user->update(['banner_image'=>$file1]);
            }
            UserTag::where('user_id',$user->id)->delete();
            if(!empty($r->tags)){
                $tagarray = explode(',',$r->tags);
                foreach($tagarray as $singleTag){
                    $findtag = Tag::where('name',$singleTag)->first();
                    $tag = $findtag;
                    if(!isset($findtag->id))
                        $tag = Tag::create(['name'=>$singleTag]);
                    $prodcutTag = UserTag::create([
                        'user_id'=>$user->id,
                        'tag_id'=>$tag->id
                    ]);
                }
                // die;
            }
            UserCategory::where('user_id',$user->id)->delete();
            if($r->categories!==null){
                foreach($r->categories as $category){
                    UserCategory::create(['user_id'=>$user->id,'category_id'=>$category]);
                }
            }
            UserType::where('user_id',$user->id)->delete();
            if($r->types!==null){
                foreach($r->types as $type){
                    UserType::create(['user_id'=>$user->id,'type_id'=>$type]);
                }
            }
            return redirect()->route('customers')->with('success',__('crud.customers.messages.update'));
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', __('crud.customers.messages.delete'));
    }
    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status'=> ($user->status==1)?0:1
        ]);
        return redirect()->back()->with('success',__('crud.customers.messages.status'));
    }
}
