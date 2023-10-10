<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:200'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8', 'max:200'],
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        $request->session()->regenerate();
        $request->session()->put('email', $data['email']);
        $id = $user->id;
        $request->session()->put('id', $id);

        return redirect('/home')->with(['registerSuccess' => 'Successfully created an account.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect("/");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            $request->session()->put('email', $data['email']);
            $id = Auth::id();
            $request->session()->put('id', $id);

            return redirect('/home');
        } else {
            return redirect('/')->with(['invalidAttempt' => 'Invalid email/password.'])->withInput();
        }
        return redirect('/');
    }

    public function home()
    {
        $user_id = session('id');
        $contacts = Contact::where(['user_id' => $user_id, 'is_deleted' => false])
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('pages.Home', ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
    }
}
