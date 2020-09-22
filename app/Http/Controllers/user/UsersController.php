<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create(Request $request) {
        $request->user()->authorizeRoles(['admin']);
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(CreateUserRequest $request) {

        $validator = $request->all();

        $photo = $request->file('photo');

        $imageName = $this->saveFile($photo);
        $user = new User();
        $user->names = $validator['names'];
        $user->surnames = $validator['surnames'];
        $user->email = $validator['email'];
        $user->username = $validator['username'];
        $user->profile_picture_uri = $imageName;
        $user->setPasswordAttribute($validator['password']);
        $user->save();
        $role = $validator['role'];
        $user->roles()->attach(Role::where('name', $role)->first());
        return redirect('/users')->with('success', 'Usuario registrado correctamente.');
    }

    function saveFile($photo) {

        $fileName = md5_file($photo->getRealPath());
        $guessExtension = $photo->guessExtension();
        $photo->storeAs('profilePictures/', $fileName . '.'. $guessExtension);
        return $fileName . '.' . $guessExtension;
    }

    public function index(Request $request) {

        $request->user()->authorizeRoles(['admin']);

        $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->where('users.id' , '!=' , $request->user()->id)
        ->select('users.id','users.names', 'users.surnames', 'roles.description')
        ->simplePaginate(10);

        return view('users.index', ['users' => $users]);
    }

    public function delete(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function details(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $user = User::findOrFail($id);
        return view('users.details', ['user' => $user]);
    }

    public function edit(Request $request, $id) {
        $request->user()->authorizeRoles(['admin']);
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', ['user' => $user,'roles' => $roles]);
    }

    // Refactor this, and make new things for this XD
    public function update(UpdateUserRequest $request, $id) {

        $user = User::findOrFail($id);
        $validator = $request->all();

        $user->names = $validator['names'];
        $user->surnames = $validator['surnames'];
        $user->email = $validator['email'];
        $user->username = $validator['username'];


        if ($request->hasFile('photo')) {
            Storage::delete($user->profile_picture_uri);
            $photo = $request->file('photo');
            $imageName = $this->saveFile($photo);
            $user->profile_picture_uri = $imageName;
        }

        if ($user->getRole()->name != $validator['role']) {
            $user->roles()->detach(Role::where('name', $user->getRole()->name)->first());
            $user->roles()->attach(Role::where('name', $validator['role'])->first());
        }

        $user->save();

        return redirect('/users')->with('success', 'Usuario actualizado correctamente.');
    }



}
