<?php

namespace App\Http\Controllers;
use App\Models\User_table;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $users = User_table::all();
        return view('index', compact('users'));
        
    }

    public function insert(Request $data){

        $user = new User_table();
        $user->fullname = $data->input('fullname');
        $user->email = $data->input('email');
        $user->password = $data->input('password');
        //for image
        $user->picture = $data->file('file')->getClientOriginalName();
        $user->save();
        $data->file('file')->move('uploads/', $user->picture);

        return redirect()->back()->with('success', 'User created successfully!');

    }

    public function delete($id){

        $user =  User_table::find($id);
        $user->delete();
        return redirect()->back();

    }

    public function update(Request $data){

        $user =  User_table::find($data->input('id'));
        $user->fullname = $data->input('fullname');
        $user->email = $data->input('email');
        $user->password = $data->input('password');
        $user->save();

        return redirect('/');

    }

    public function edit($id){

        $user =  User_table::find($id);
        return view('update', compact('user'));

    }


}
