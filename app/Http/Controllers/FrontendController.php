<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\Type; 
use App\Models\UserTag; 
use App\Models\UserCategory; 
use App\Models\Tag; 
use App\Models\UserType; 
use Auth;

class FrontendController extends Controller
{
    public function index(){
        $data = User::with('categories')->orderBy('id','desc')->limit(8)->get();
        // dd($data);
        return view('frontend.home',compact('data'));
    }
    public function profile($account){
        // dd($account);
        $data = User::with('categories')
        ->with('tags')
        ->with('types')
        ->where('name',$account)
        ->firstOrFail();
        $reviews = Review::with('user')->where('to',$data->id)->get();
        $categories = Category::where('status',1)->get();
        $types = Type::where('status',1)->get();
        $crntCats = $data->categories->pluck('id')->toArray();
        $crntTypes = $data->types->pluck('id')->toArray();
        $tagsdataArr = $data->tags->pluck('name')->toArray();
        $tags = implode(",",$tagsdataArr);

        return view('frontend.profile',
                    compact('data',
                    'reviews',
                    'categories',
                    'types',
                    'crntCats',
                    'crntTypes',
                    'tags'
                    )
                );
    }
    public function addReview(Request $r,$account){
        // dd($r->input());
        Validator::make($r->all(), [
            "skills"                    => "required",
            "behavior"                  => "required",
            "collaboration_and_teamwork"=> "required",
            "punctuality"               => "required",
            "ability"                   => "required",
            // "commnet" => "ddsf sdf"
            ])->validate();
            $user = User::where('name',$account)->firstOrFail();
            
            $overAll = ($r->skills+$r->behavior+$r->collaboration_and_teamwork+$r->punctuality+$r->ability)/5;
        Review::create([
            'exp'       =>$r->commnet??'',
            'field1'    =>$r->skills,
            'field2'    =>$r->behavior,
            'field3'    =>$r->collaboration_and_teamwork,
            'field4'    =>$r->punctuality,
            'field5'    =>$r->ability,
            'overall'   =>$overAll,
            'from'      =>Auth::user()->id,
            'to'        =>$user->id,
        ]);
        $avg = Review::where('to',$to)->avg('overall');
        User::where('id',$to)->update(['review_avg'=>number_format($avg,2)]);
            
        return redirect()->back()->with('success','Your review have been published');
    }
    public function updateProfile(Request $r,$account){
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
            
        $user = User::where('name',$account)->firstOrFail();
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
            return redirect()->back()->with('success','Profile updated successfully');
    }

}
