<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-\(\)]+$/', 'max:20'],
                'email' => ['required', 'string', 'email', 'lowercase', 'max:255', 'unique:'.User::class],
                'role' => ['required', 'string', 'in:project_estimator,admin,'], // Sesuaikan dengan role lain yang dibutuhkan
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);


        $user = User::create([
            'uuid' => (string) Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        if (Auth::user()->role == 'admin') {
            return redirect()->route('purchase.index');
        } else {
            return redirect()->route('purchase_order.index');
        }
    }
}
