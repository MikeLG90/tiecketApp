<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Persona;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Faker\Factory as Faker;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function createP(): View
    {
        return view('pages-control.profesor-login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $faker = Faker::create();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ape_materno' => ['required', 'string', 'max:255'],
            'ape_paterno' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', 'max:8'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     

        $username = $faker->unique()->userName;
        $rol_id = 1;

        DB::beginTransaction();

        try {

        $user = User::create([
            'nombre_usuario' => $username,
            'email' => $request->email,
            'rol_id' => $rol_id,
            'password' => Hash::make($request->password),
        ]);

        $userId = $user->usuario_id;

        $persona = new Persona;
        $persona->usuario_id = $userId;
        $persona->nombre = $request->name;
        $persona->ape_materno = $request->ape_materno;
        $persona->ape_paterno = $request->ape_paterno;
        $persona->sexo = $request->genero;
        $persona->save();

        $user->persona_id = $persona->persona_id;
        $user->save();

        $personaId = $persona->persona_id;
        $user->persona_id = $personaId;

        event(new Registered($user));

        Auth::login($user);

        DB::commit();

        return redirect(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => 'Hubo un error al registrar el usuario']);
    }
    }

    public function storeProfesor(Request $request): RedirectResponse
    {
        $faker = Faker::create();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ape_materno' => ['required', 'string', 'max:255'],
            'ape_paterno' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', 'max:8'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     

        $username = $faker->unique()->userName;
        $rol_id = 3;

        DB::beginTransaction();

        try {

        $user = User::create([
            'nombre_usuario' => $username,
            'email' => $request->email,
            'rol_id' => $rol_id,
            'password' => Hash::make($request->password),
        ]);

        $userId = $user->usuario_id;

        $persona = new Persona;
        $persona->usuario_id = $userId;
        $persona->nombre = $request->name;
        $persona->ape_materno = $request->ape_materno;
        $persona->ape_paterno = $request->ape_paterno;
        $persona->sexo = $request->genero;
        $persona->save();

        $user->persona_id = $persona->persona_id;
        $user->save();

        $personaId = $persona->persona_id;
        $user->persona_id = $personaId;

        event(new Registered($user));

        Auth::login($user);

        DB::commit();

        return redirect(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => 'Hubo un error al registrar el usuario']);
    }
    }
}