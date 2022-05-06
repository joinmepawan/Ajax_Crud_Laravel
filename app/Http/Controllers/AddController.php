<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AddController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    protected function adduser(Request $req)
    {
         $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'address' => 'required',
            'mobile' => 'required|digits:10',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->mobile = $req->mobile;
        $user->test = $req->mobile;
        $user->save();
        return redirect()->route('user.add')
        ->with('success','Company has been created successfully.');
        // print_r($req->post());
        // die;
        // $req->update($req->all());

        // return redirect()->route('user.add')
        //     ->with('success', 'Project updated successfully');
    }

    public function edit(User $user, $id) 
    
    {
            // dd($id);
            $user=User::where('id',$id)->first();
            // print_r($user);
            // die;
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $req ,$id) 
    {
        //echo $id;
        //dd($request->post());
        $user=User::where('id',$id)->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->mobile = $req->mobile;
        $user->save();
        return redirect()->route('user.add')
        ->with('success','Company has been created successfully.');
    }

    public function delete(Request $req ,$id) 
    {
        //$id = $req->input('id');
        User::find($id)->delete();

        return redirect()->route('user.add')
            ->with('msg', 'Record Deleted Successfully');
    }
    function edituserget(){
        return view('user.edit');
    }
    function addUserGet(){

        return view('user.add');
    }
}
