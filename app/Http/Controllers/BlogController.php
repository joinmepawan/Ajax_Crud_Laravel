<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blogs;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //================Function for Listing of Users Start==================
    public function index()
    {
        $blog=Blogs::all();
        return view('blog.index',compact('blog'));
    }
    //================Function for Listing of Users End==================
 

    function blogget(){

        return view('blog.addblog');
    }
    protected function addblog(Request $req)
    {
         $validated = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'bgimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $blog = new Blogs;
        $blog->title = $req->title;
        $userid=(Auth::user()->id);
        $blog->user_id=$userid;
        $blog->description = $req->description;
        
        $blog->save();
        return redirect()->route('blog.index')
        ->with('success','Company has been created successfully.');
    }

    public function editblog(Request $request, $id)
    {   
        $where = array('id' => $request->id);
        $blog  = Blogs::where($where)->first();
        // print_r($blog);
        // die;
        return view('blog.edit', compact('blog'));
      
        //return Response()->json($blog);
    }

    public function updateblog(Request $req ) 
    {
        // echo "hello Manish";
        //print_r($req->post('id'));
        // die;
       // echo $id;
        //dd($request->post());
        $blog=Blogs::where('id',$req->post('id'))->first();
        $blog->title = $req->post('title');
        $blog->description = $req->post('description');
        $data=$blog->save();
        // return redirect()->route('blog.index')
        // ->with('success','Blog has been updated successfully.');
        // return Response::json($data);
        $output = array(
            'success'   =>  $data);
        echo json_encode($output);
    }

    public function deleteblog(Request $req ,$id) 
    {
    //     echo '<pre>';
    //    print_r($req);
    //    die;
        // $id = $req->input('id');
        // print_r($id);
        // die;
        Blogs::find($id)->delete($id);

        return redirect()->route('blog.index')
            ->with('msg', 'Record Deleted Successfully');
    }
      
}
