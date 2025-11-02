<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'newsletter_subscription' => ['boolean'],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'A név megadása kötelező.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'email.email' => 'Érvényes e-mail címet adj meg.',
            'email.unique' => 'Ez az e-mail cím már regisztrálva van.',
            'password.required' => 'A jelszó megadása kötelező.',
            'password.min' => 'A jelszónak legalább 8 karakternek kell lennie.',
            'password.confirmed' => 'A jelszavak nem egyeznek.',
            'terms.accepted' => 'El kell fogadnod az Általános Szerződési Feltételeket.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country ?? 'Hungary',
            'birth_date' => $request->birth_date,
            'newsletter_subscription' => $request->has('newsletter_subscription'),
        ]);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Sikeres regisztráció! Üdvözlünk a platformon!');
    }
}