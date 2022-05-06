<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller
{
    public function index(){

        $employees=Employee::all();
        
        return view ('employee.index',compact('employees'));

    }
    

    public function store(Request $request)
    {
        //dd($request->all());
        // print_r($request->form_data);
        // die;  
        // echo "<br>" ;
        // print_r($request->post('form_data'['name']));
        // echo "mngyuygiy";
        // echo $request->post('name');
        // echo $file = $request->file('image');
        // die;
        // $req->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
             $employee = new Employee;
            $employee->name = $request->name;
            $employee->phone = $request->phone;
            if($request->image){
               $file = $request->image;
              // echo "$file";
              // die;
               
               $extension = $file->getClientOriginalName();
                $filename = time().'.'.$extension;
                $file->move('public/uploads/employee/', $filename);
                $employee->image = $filename;
 
            }
        //    print_r($employee);
        //     die;
      
            $data=$employee->save();
           
        $output = array(
            'success'   =>  $data);
        echo json_encode($output);
    }

    public function editblog(Request $request, $id)
    {   
        $where = array('id' => $request->id);
        $emp  = Employee::where($where)->first();
        // print_r($blog);
        // die;
        return view('employee.edit', compact('emp'));
      
        //return Response()->json($blog);
    }

    public function update(Request $request ) 
    {
        
        $blog=Employee::where('id',$request->post('id'))->first();
        // print_r($blog);
        // die;
        $blog->name = $request->post('name');
        $blog->phone = $request->post('phone');
        if($request->image){
            $destination = 'public/uploads/employee/'.$blog->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->image;
            $extension = $file->getClientOriginalName();
             $filename = time().'.'.$extension;
             $file->move('public/uploads/employee/', $filename);
             $blog->image = $filename;

         }
        
        $data=$blog->save();
        $output = array(
            'success'   =>  $data);
        echo json_encode($output);
    }

     public function delete(Request $request) {

        $image = Employee::find($request->id);

        unlink("public/uploads/employee/".$image->image);

        Employee::where("id", $image->id)->delete();

        return back()->with("success", "Image deleted successfully.");

    }
}
