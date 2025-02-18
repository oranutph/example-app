<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }



    public function users()
    {
        $users = User::latest()->paginate(10);
        // dd($user->toArray());

        return view('users', compact('users'));
    }

    public function users_create()
    {
        return view('users_create');
    }

    public function users_insert(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        if ($user) {
            return redirect()->route('users')->with('success', 'User created successfully');
        } else {
            return back()->with('error', 'User not created');
        }
    }

    public function users_edit(Request $request)
    {
        // dd($request->id);
        $user = User::find($request->id);
        // dd($user->toArray());
        return view('users_edit', compact('user'));
    }

    public function users_update(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->role = $request->role;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($user) {
            return redirect()->route('users')->with('success', 'User updated successfully');
        } else {
            return back()->with('error', 'User not updated');
        }
    }

    public function users_delete(Request $request)
    {
        // dd($request->id);

        $user = User::find($request->id);
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }

}
