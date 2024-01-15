<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function index()
    {
        // Get All users
        // get All users From Database
        $users = User::all();
        return response()->json($users);
    }
    public function findById($id){
        $user=User::find($id);

        return response()->json($user);
    }
    public function createUser(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
         ]);

        $user= new User();
        $user->name=$request->input('name');
        $user->password=$request->input('password');
        $user->email=$request->input('email');
        $user->save();
        return response()->json($user);
    }

    public function updateUser(Request $request,$id){
        $user=User::find($id);

        $user->name=$request->input('name');
        $user->password=$request->input('password');
        $user->email=$request->input('email');
        $user->save();

        return response()->json($user);
    }

    public function deleteUser($id){
        $user=User::find($id);

        $user->delete();

        return response()->json("User deleted successfully!!");
    }

}