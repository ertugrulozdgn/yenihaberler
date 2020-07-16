<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class DefaultController extends Controller
{

    //Yetkiligiriş yaptığında açılan view
    public function index()
    {
        $posts = Post::where('status',1)->orderby('id','desc')->simplepaginate(20);
        return view('backend.Default.index',compact('posts'));
    }




    //Yetkili profil düzenleme ekranı
    public function edit() {
        $user = User::where('id', Auth::user()->id);
        return view('backend.Default.profile',compact($user));
    }



    //yetkili profili güncelleme işlemi
    public function update(Request $request)
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

                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password  = Hash::make($request->input('password'));
                $user->image = $user_image;
                $user->save();

            } else {

                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->image = $user_image;
                $user->save();

            }


        } else {

            if (!empty($request->password)) {

                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password  = Hash::make($request->input('password'));
                $user->save();

            } else {

                $user =Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

            }

        }



        if ($user) {
            return back()->with('success', 'Düzenleme İşlemi Başarılı');
        }
        return back()->with('error', 'Düzenleme İşlemi Başarısız');
    }




    //Yetkili giriş ekranı
    public function login() {
        return view('backend.Default.login');
    }




    //Yetkili giriş işlemi
    public function authenticate(Request $request) {

        $request->flash();

        $credentials = $request->only('email', 'password');
        $remember_token = $request->has('remember_token') ? true : false;    //dd() ile kontrol ettiğimizde remembere_token sonucu "on" dönüyor. Bu yüzden bir if koşulu yaptım.
                                                                                  // çünkü beni hatırla için attempt de ikinci parametreyi true veya false göndermemiz gerek.
        if (Auth::attempt($credentials,$remember_token)) {

            return redirect()->intended(route('admin.index'));

        } else {

            return back()->with('error','Hatalı Kullanıcı!');
        }
    }




    //Yetkili Çıkış İşlemi
    public function logout()
    {
        Auth::logout();
//        return redirect(route('admin.login'))->with('success','Çıkış Yapıldı.');
        return redirect(route('news.home'))->with('success','Çıkış Yapıldı.');
    }
}
