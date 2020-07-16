<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backend.Users.index',compact('users'));
    }




    public function create()
    {
        return view('backend.Users.create');
    }




    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
            'password' => 'required|Min:8|Max:20|confirmed',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $user = new User;
        $user->role = $request->input('role');
        $user->status = $request->input('status');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password  = Hash::make($request->input('password'));

        $user_image=uniqid().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $user_image);
        $user->image = $user_image;
        $user->save();

        if ($user->save())
        {
            return redirect()->action('Backend\UsersController@index')->with('success','Kayıt İşlemi Başarılı!');
        }

        return back()->with('error','Kayıt İşlemi Başarısız!');
    }




    public function show($id)
    {
        //
    }




    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.Users.edit',compact('user'));
    }




    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => $request->hasFile('image') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : '',
            'password' => !empty($request->password) ? 'required|min:8|max:20|confirmed' : ''
        ]);

        if ($request->hasFile('image')) {

            $user_image=uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $user_image);


            if (!empty($request->password)) {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password  = Hash::make($request->input('password'));
                $user->image = $user_image;
                $user->save();

            } else {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->image = $user_image;
                $user->save();

            }


        } else {

            if (!empty($request->password)) {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password  = Hash::make($request->input('password'));
                $user->save();

            } else {

                $user = User::find($id);
                $user->role = $request->input('role');
                $user->status = $request->input('status');
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

            }

        }

        if ($user) {
            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
}




    public function destroy($id)
    {
        $user = User::find(intval($id));
        if ($user->delete())
        {
            return 1;
        }

        return 0;

    }
}
