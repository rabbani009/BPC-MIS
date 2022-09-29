<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Council;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'User';
        $commons['content_title'] = 'List of All User';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_index';

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->with(['userBelongsToCouncil'])->paginate(20);

        //dd($users);

        return view('backend.pages.user.index', compact('commons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commons['page_title'] = 'User';
        $commons['content_title'] = 'Add new user';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_create';

        $user_types = ['bpc', 'council', 'association'];
        $councils = Council::select('name', 'id')->where('status', 1)->get();
        $roles = Role::select('name', 'id')->where('status', 1)->where('slug', '!=', 'system_admin')->get();

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->with(['userBelongsToCouncil'])->paginate(20);

        return view('backend.pages.user.create', compact('commons', 'user_types', 'councils', 'roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
