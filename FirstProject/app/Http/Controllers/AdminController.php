<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use function Laravel\Prompts\error;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }
    public function dashboard(Request $request)
    {
        $user=User::all();

        $validator= \Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6||max:12'
        ]);

        foreach ($user as $users)
        {
            if($users->email==$request->email && $users->password==$request->password)
            {
                return view('admin.dashboard');
            }

        }
        return redirect()->route('admin.login')->with('error', 'Tai khoan hoac mat khau khong dung');


//        if($validator->passes()){
//
//            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//                return redirect()->route('admin.dashboard');
//            } else {
//                return redirect()->route('admin.login')->with('error', 'Tai khoan hoac mat khau khong dung');
//            }
//        }
    }
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('admin.show', ['user' => $user]);
        } else {
            return redirect()->route('admin.index')->with('error', 'User not found');
        }
    }

}

