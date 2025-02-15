<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    function index(){
        $User = User::orderBy('name','asc')->get();
        return view('admin', [
            'User' => $User
        ]);
    }

    function admin(){
        $User = User::orderBy('name','asc')->get();
        return view('profile.admin', [
            'User' => $User
        ]);
    }

    function user(){
        return view ('profile.admin');
    }

    function create (){
        return view('profile.create');
    }

    public function store (Request $request){
        $request->validate([
            'NIP' => [
                'required',
                Rule::unique('users')->where(function ($query) {
                    return $query->where('NIP', request('NIP'));
                }),
            ],
        ]);
       User::create($request->except(['_token','submit']));
       return redirect('/profile/admin');
    }

    public function view($id){
        $view = User::find($id);
        return view('profile.view',compact(['view']));
    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('profile.delete', ['user' => $user]);
    }

    public function destroy($id){
        $view = User::find($id);
        $view->delete();
        return redirect('/profile/admin');
    }
    
    public function ubah($id){
        $view = User::find($id);
        return view('profile.ubah',compact(['view']));
    }

    public function update($id, Request $request){
        $view = User::find($id);
        $request->validate([
            'NIP' => [
                'required',
                Rule::unique('users')->where(function ($query) {
                    return $query->where('NIP', request('NIP'));
                }),
            ],
        ]);
        $view->update($request->except(['_token','submit']));
        return redirect('/profile/admin');
    }

    public function enkripsi($password){
        $view = User::find($password);
        $encrypted = Crypt::encryptString($view);
        $encrypted = Crypt::decryptString($encrypted);
    }
}
