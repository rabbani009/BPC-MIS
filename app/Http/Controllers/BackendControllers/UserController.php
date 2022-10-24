<?php

namespace App\Http\Controllers\BackendControllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Council;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

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

        if(auth()->user()->user_type == 'system'){
            $users = User::where('status', 1)
                ->with(['userBelongsToCouncil'])
                ->latest()
                ->paginate(20);
        }else{
            $users = User::where('status', 1)
                ->where('user_type', '!=', 'system')
                ->with(['userBelongsToCouncil'])
                ->latest()
                ->paginate(20);
        }

        //dd($users);
        return view('backend.pages.user.index', compact('commons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $commons['page_title'] = 'User';
        $commons['content_title'] = 'Add new user';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_create';

        //dd(auth()->user()->user_type);

        if(auth()->user()->user_type == 'council'){
            $user_types = ['council'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->where('slug', '!=', 'bpc_admin')
                ->where('slug', '!=', 'bpc_executive')
                ->get();
            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->where('id', auth()->user()->belongs_to)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->where('slug', '=', 'council_admin')
                ->orWhere('slug', '=', 'council_executive')
                ->get();
        }elseif(auth()->user()->user_type == 'bpc'){
            $user_types = ['council', 'bpc'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->where('slug', '!=', 'bpc_admin')
                ->where('slug', '!=', 'bpc_executive')
                ->get();

            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->where('slug', '=', 'bpc_admin')
                ->orWhere('slug', '=', 'bpc_executive')
                ->orWhere('slug', '=', 'council_executive')
                ->orWhere('slug', '=', 'council_admin')
                ->get();
        }else{
            $user_types = ['bpc', 'council', 'system'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->get();
            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->get();
        }

        $getAllBackendRoutes = $this->getRoutesByGroup(['middleware' => 'authenticated']);
        //dd($getAllBackendRoutes);

        if ($getAllBackendRoutes){
            foreach ($getAllBackendRoutes as $route) {
                $routes[$route->getName()] = $route->getName();
            }
        }

        $permissions = ['create'=>'create', 'read'=>'read', 'update'=>'update', 'delete'=>'delete'];

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->with(['userBelongsToCouncil'])->paginate(20);

        return view('backend.pages.user.create',
            compact(
                'commons',
                'user_types',
                'councils',
                'roles',
                'users',
                'routes',
                'permissions'
            )
        );
    }

    public function getRoutesByGroup(array $group = [])
    {
//        getRoutesByGroup(['middleware' => 'api']);
//        getRoutesByGroup(['middleware' => ['api']]);
//        getRoutesByGroup(['as' => 'api']);
//        getRoutesByGroup(['as' => 'api*']);
//        getRoutesByGroup(['as' => ['api*', 'main']]);

        $list = Route::getRoutes()->getRoutes();
        if (empty($group)) {
            return $list;
        }
        //dd($list);
        $routes = [];
        foreach ($list as $route) {
            //dd($route);
            $action = $route->getAction();
            //dd($action);
            foreach ($group as $key => $value) {
                //dd($value);
                //dd($action[$key]);
                if (empty($action[$key])) {
                    //dd($action[$key]);
                    continue;
                }
                //dd('ok');
                $actionValues = Arr::wrap($action[$key]);
                //dd($actionValues);
                $values = Arr::wrap($value);
                //dd($values);
                foreach ($values as $single) {
                    foreach ($actionValues as $actionValue) {
                        //dd($single);
                        if (Str::is($single, $actionValue)) {
                            $routes[] = $route;
                        } elseif($actionValue == $single) {
                            $routes[] = $route;
                        }
                    }
                }
            }
        }

        return $routes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //dd($request->all());
        DB::beginTransaction();

        try {
            $newUser = new User();
            $newUser->email = $request->validated('email');
            $newUser->password = bcrypt($request->validated('password'));

            $newUser->user_type = $request->validated('user_type');
            $newUser->belongs_to = $request->validated('user_type') == 'bpc' || $request->validated('user_type') == 'system' ? 0 : $request->validated('belongs_to');
            $newUser->role_id = $request->validated('role');

            $newUser->accesses = json_encode($request->validated('accesses'));
            $newUser->permissions = json_encode($request->validated('permissions'));

            $newUser->name = $request->validated('name');
            $newUser->profile_image = $request->validated('profile_image');

            $newUser->status = 1;
            $newUser->created_at = Carbon::now();
            $newUser->created_by = Auth::user()->id;

            $newUser->save();

            DB::commit();
            // all good
            if ($newUser->wasRecentlyCreated){
                return redirect()
                    ->route('user.index')
                    ->with('success', 'User created successfully!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()
                ->back()
                ->with('failed', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'User';
        $commons['content_title'] = 'Show user';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_show';


        $users = User::findOrFail($id);

        // dd($users);




         return view('backend.pages.user.show', 
         
         compact('commons', 
                 'users'
            
            
            
            ));








    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $commons['page_title'] = 'User';
        $commons['content_title'] = 'Edit user';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_edit';
        
        $user = User::findOrFail($id);
        // dd($user);

        if(auth()->user()->user_type == 'council'){
            $user_types = ['council'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->where('slug', '!=', 'bpc_admin')
                ->where('slug', '!=', 'bpc_executive')
                ->get();
            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->where('id', auth()->user()->belongs_to)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->where('slug', '=', 'council_admin')
                ->orWhere('slug', '=', 'council_executive')
                ->get();
        }elseif(auth()->user()->user_type == 'bpc'){
            $user_types = ['council', 'bpc'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->where('slug', '!=', 'bpc_admin')
                ->where('slug', '!=', 'bpc_executive')
                ->get();

            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->where('slug', '=', 'bpc_admin')
                ->orWhere('slug', '=', 'bpc_executive')
                ->orWhere('slug', '=', 'council_executive')
                ->orWhere('slug', '=', 'council_admin')
                ->get();
        }else{
            $user_types = ['bpc', 'council', 'system'];
            $roles = Role::select('name', 'id')
                ->where('status', 1)
                ->where('slug', '!=', 'system_admin')
                ->get();
            $councils = Council::select('name', 'id')
                ->where('status', 1)
                ->get();

            $roles = Role::select('name', 'id')->where('status', 1)
                ->get();
        }

        $getAllBackendRoutes = $this->getRoutesByGroup(['middleware' => 'authenticated']);
        //dd($getAllBackendRoutes);

        if ($getAllBackendRoutes){
            foreach ($getAllBackendRoutes as $route) {
                $routes[$route->getName()] = $route->getName();
            }
        }

        $permissions = ['create'=>'create', 'read'=>'read', 'update'=>'update', 'delete'=>'delete'];

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->with(['userBelongsToCouncil'])->paginate(20);

        return view('backend.pages.user.edit',
            compact(
                'commons',
                'user_types',
                'councils',
                'roles',
                'users',
                'user',
                'routes',
                'permissions'
            )
        );

      












    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        // dd($request->all());
        $user = User::findOrFail($id);
        
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->user_type = $request->input('user_type');
        $user->belongs_to = $request->input('user_type') == 'bpc' || $request->input('user_type') == 'system' ? 0 : $request->input('belongs_to');
        $user->role_id = $request->input('role');

        $user->accesses = json_encode($request->input('accesses'));
        $user->permissions = json_encode($request->input('permissions'));

        $user->name = $request->input('name');
        $user->profile_image = $request->input('profile_image');

        $user->status = 1;
        $user->created_at = Carbon::now();
        $user->created_by = Auth::user()->id;

        $user->save();

        if ($user->getChanges()){
            return redirect()
                ->route('user.index')
                ->with('success', 'User updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'User cannot be updated!');


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
