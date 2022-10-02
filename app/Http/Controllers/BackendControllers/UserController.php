<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Council;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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
    public function create(Request $request)
    {
        $commons['page_title'] = 'User';
        $commons['content_title'] = 'Add new user';
        $commons['main_menu'] = 'user';
        $commons['current_menu'] = 'user_create';

        $user_types = ['bpc', 'council'];
        $councils = Council::select('name', 'id')->where('status', 1)->get();
        $roles = Role::select('name', 'id')->where('status', 1)->where('slug', '!=', 'system_admin')->get();

        $getAllBackendRoutes = $this->getRoutesByGroup(['prefix' => 'backend']);

        if ($getAllBackendRoutes){
            foreach ($getAllBackendRoutes as $route) {
                $routes[$route->getName()] = $route->getName();
            }
        }

        $accesses = ['create'=>'create', 'read'=>'read', 'update'=>'update', 'delete'=>'delete'];
        $permissions = ['create'=>'create', 'read'=>'read', 'update'=>'update', 'delete'=>'delete'];

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->with(['userBelongsToCouncil'])->paginate(20);

        return view('backend.pages.user.create', compact('commons', 'user_types', 'councils', 'roles', 'users', 'permissions', 'accesses', 'routes'));
    }

    public function getRoutesByGroup(array $group = [])
    {
        //usages
//        getRoutesByGroup(['middleware' => 'api']);
//        getRoutesByGroup(['middleware' => ['api']]);
//        getRoutesByGroup(['as' => 'api']);
//        getRoutesByGroup(['as' => 'api*']);
//        getRoutesByGroup(['as' => ['api*', 'main']]);

        $list = Route::getRoutes()->getRoutes();
        if (empty($group)) {
            return $list;
        }

        $routes = [];
        foreach ($list as $route) {
            $action = $route->getAction();
            foreach ($group as $key => $value) {
                if (empty($action[$key])) {
                    continue;
                }
                $actionValues = Arr::wrap($action[$key]);
                $values = Arr::wrap($value);
                foreach ($values as $single) {
                    foreach ($actionValues as $actionValue) {
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
        DB::beginTransaction();

        try {
            $newUser = new User();
            $newUser->email = $request->validated('email');
            $newUser->password = bcrypt($request->validated('password'));

            $newUser->user_type = $request->validated('user_type');
            $newUser->belongs_to = $request->validated('belongs_to');
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
