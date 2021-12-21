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
use App\Models\Review;
use Image;

class ReviewsController extends Controller
{
   
    /**
     * Display the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       return view('admin.reviews.index');
    }
    public function allReviewsAjax(Request $request)
    {
        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length;
        $search = $request->search['value'];
        $orderColumn= $request->order[0]['column'];
        $order= $request->order[0]['dir'];
        $orderColumnName = $request->columns[$orderColumn]['name'];
        
        $totalRecords = Review::select('count(*) as allcount');
        if(!empty($search)){
            $totalRecords->join('users as from_user','reviews.from','from_user.id')
            ->join('users as to_user','reviews.to','to_user.id')
            ->orWhere('reviews.exp','like',"%$search%")
            ->orWhere('reviews.overall','like',"%$search%")
            ->orWhere('from_user.name','like',"%$search%")
            ->orWhere('to_user.name','like',"%$search%");
        }
      
        $totalRecords =   $totalRecords->count();
        $totalRecordswithFilter = $totalRecords;

        $qry = Review::select('reviews.*','from_user.name as from_user','to_user.name as to_user')
        ->join('users as from_user','reviews.from','from_user.id')
        ->join('users as to_user','reviews.to','to_user.id');
        if(!empty($search)){
            $qry->orWhere('reviews.exp','like',"%$search%")
            ->orWhere('reviews.overall','like',"%$search%")
            ->orWhere('from_user.name','like',"%$search%")
            ->orWhere('to_user.name','like',"%$search%");
        }
        if($orderColumnName == 'form'){
                $qry->orderBy('from_user.name',$order);
        }elseif($orderColumnName == 'to'){
                $qry->orderBy('to_user.name',$order);
        }elseif($orderColumnName == 'index'){
                $qry->orderBy('id',$order);
        }else{
            $qry->orderBy($orderColumnName,$order);
        }
        $reviews = $qry->skip($start)->take($rowperpage)->get();

        return response()->json([
            'data'=>$reviews,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ]);
        return view('admin.reviews.index',compact('users'));
    }
    public function edit($id)
    {
        $review = Review::find($id);
        return view('admin.reviews.update',compact('review'));
    }
    public function update(Request $r)
    {
        Validator::make($r->all(), [
            'id'        =>      'required|integer',
            'desc'        =>      'required|string|max:1000',
            "skills"        => 'required|integer|max:5',
            "behavior"      => 'required|integer|max:5',
            "collaboration_and_teamwork" => 'required|integer|max:5',
            "punctuality"   => 'required|integer|max:5',
            "ability"       => 'required|integer|max:5',
            ])->validate();
            $total = $r->skills+$r->behavior+$r->collaboration_and_teamwork+$r->punctuality+$r->ability;
            $avg   =    number_format(($total/5),2);
            $review =  Review::find($r->id);

            $review->update([
                'exp'       =>$r->desc??'',
                'field1'    =>$r->skills,
                'field2'    =>$r->behavior,
                'field3'    =>$r->collaboration_and_teamwork,
                'field4'    =>$r->punctuality,
                'field5'    =>$r->ability,
                'overall'   =>$avg,
            ]);
            
            $avg = Review::where('to',$review->to)->avg('overall');
            User::where('id',$review->to)->update(['review_avg'=>number_format($avg,2)]);
            return redirect()->route('reviews')->with('success','Review updated Successfully');
    }
    public function delete($id)
    {
        $review = Review::find($id);
        $to = $review->to;
        $review->delete();
        $avg = Review::where('to',$to)->avg('overall');
            User::where('id',$to)->update(['review_avg'=>number_format($avg,2)]);
        return redirect()->back()->with('success','Review Deleted Successfully');
    }
}
