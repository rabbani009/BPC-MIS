<?php

namespace App\Http\Controllers\BackendControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $commons['page_title'] = 'Profile View';
        $commons['content_title'] = 'Profile view';
        $commons['main_menu'] = 'profile';
        $commons['current_menu'] = 'profile';

        $profile = auth()->user();

        return view('backend.pages.profile.show',compact('profile','commons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commons['page_title'] = 'Profile';
        $commons['content_title'] = 'Edit Profile';
        $commons['main_menu'] = 'profile';
        $commons['current_menu'] = 'profile';

        $editData = User::findOrFail($id);

        return view('backend.pages.profile.edit', compact('editData','commons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;

		if ($request->file('profile_image')) {
			$file = $request->file('profile_image');
			@unlink(public_path('uploads/profile_images/'.$data->profile_image));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('uploads/profile_images'),$filename);
			$data['profile_image'] = $filename;
		}
		$data->save();

		return redirect()
            ->route('profile.show', $data->id)
            ->with('success', 'Profile updated successfully.');

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
