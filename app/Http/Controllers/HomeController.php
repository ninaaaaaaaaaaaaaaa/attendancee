<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    
    public function find()
    {
        $users = DB::select('select * from users');
        return view('find', ['users' => $users]);
    }
    public function edit($id)
    {

        $auth = Auth::user();

        return view('user.edit',[ 'auth' => $auth ]);
    }
    public function updatefind()
    {
        $users = DB::select('select * from users');
        return view('update', ['users' => $users]);
    }
    public function update(Request $request)
    {
        $this->validate($request, User::$rules);
        $user = User::find($request->id);
        $form=$request->all();
        unset($form['_token_']);
        $user->fill($form)->save();
        return redirect('/update');
    }
}
