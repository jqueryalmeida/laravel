<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{        
            $keyword = $request->get('search');
            $perPage = 5;

            if (!empty($keyword)) {
                $users = User::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('password', 'LIKE', "%$keyword%")
                    ->orderBy('id', 'desc')
                    ->latest()->paginate($perPage);
            } else {
                $users = User::latest()->orderBy('id', 'asc')->paginate($perPage);
            }
            return view('users.index', ['users' => $users]);
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{        
            return view('users.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{        
            $requestData = $request->all();
            
            User::create($requestData);

            return redirect('users')->with('flash_message', 'User added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{
            $user = User::findOrFail($id);

            return view('users.show', ['user' => $user]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{
            $user = User::findOrFail($id);
            return view('users.edit', ['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{
            $requestData = $request->all();
            
            $user = User::findOrFail($id);
            $user->update($requestData);

            return redirect('users')->with('flash_message', 'User updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $auth = Auth::user()->name;
        if(($auth != 'Super') && ($auth != 'Admin')){
            return view('/home');
        }else{
            User::destroy($id);

            return redirect('users')->with('flash_message', 'User deleted!');
        }
    }
}
