<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Area;
use App\Models\Persona;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $areas = Area::all();
        return view('auth.register', compact('areas'));
    }

    public function createAdmin(): View
    {
        $areas = Area::all();
        return view('auth.register-admin', compact('areas'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $rol_id = 2;
        $area = $request->area;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol_id' => $rol_id,
            'password' => Hash::make($request->password),
            'area_id' => $area,
        ]);

        $userId = $user->usuario_id;

        $persona = new Persona;

        $persona->usuario_id = $userId;
        $persona->nombre = $request->name;
        $persona->ape_materno = $request->ape_materno;
        $persona->ape_paterno = $request->ape_paterno;
        $persona->sexo = $request->genero;
        $persona->save();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $rol_id = 1;
        $area = $request->area;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol_id' => $rol_id,
            'password' => Hash::make($request->password),
            'area_id' => $area,
        ]);

        $userId = $user->usuario_id;

        $persona = new Persona;

        $persona->usuario_id = $userId;
        $persona->nombre = $request->name;
        $persona->ape_materno = $request->ape_materno;
        $persona->ape_paterno = $request->ape_paterno;
        $persona->sexo = $request->genero;
        $persona->save();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
