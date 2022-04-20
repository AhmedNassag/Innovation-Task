<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserAddress;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with('users',$users);
    }



    public function create()
    {
        return view('admin.user.add');
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|max:255|email|unique:users',
            'password'      => 'required|min:8',
            'address'       => 'string|max:255',
            'secondAddress' => 'string|max:255',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create
        ([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> bcrypt($request->password),
        ]);
        $address = UserAddress::create
        ([
            'address'       => $request->address,
            'secondAddress' => $request->secondAddress,
            'user_id'       => $user->id,
        ]);
        if ($user && $address)
        {
            return redirect('/users')->with
            ([
                'message'    => 'Your Data Added Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/users')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }



    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(! $user)
        {
            return redirect()->back();
        }
        return view('admin.user.edit')->with('user',$user);
    }



    public function update(Request $request, $id)
    {
        $user    = User::findOrFail($id);
        if(! $user)
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),
        [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|max:255|email',
            'password'      => 'required|min:8',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->update();
        if ($user)
        {
            return redirect('/users')->with
            ([
                'message'    => 'Your Data Updated Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/users')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }



    public function editAddress(Request $request, $id)
    {
        $address = UserAddress::findOrFail($id);
        if(! $address)
        {
            return redirect()->back();
        }
        return view('admin.user.editAddress')->with('address',$address);
    }



    public function updateAddress(Request $request,$id)
    {
        $address = UserAddress::findOrFail($id);
        if(! $address)
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),
        [
            'address'       => 'required|string|max:255',
            'secondAddress' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $address->address       = $request->address;
        $address->secondAddress = $request->secondAddress;
        $address->user_id       = $address->user_id;
        $address->update();
        if ($address)
        {
            return redirect('/users')->with
            ([
                'message'    => 'Your Data Updated Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/users')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }



    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user)
        {
            return redirect('/users')->with
            ([
                'message'    => 'Your Data Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/users')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }
}
