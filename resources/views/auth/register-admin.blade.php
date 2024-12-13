<x-guest-layout>
    <form method="POST" action="{{ route('registerAdmin') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-sm font-medium text-black">Nombre</label>
            <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellido Materno -->
        <div class="mt-4">
            <label for="ape_materno" class="block text-sm font-medium text-black">Apellido Materno</label>
            <x-text-input id="ape_materno" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="ape_materno" :value="old('ape_materno')" required autocomplete="ape_materno" />
            <x-input-error :messages="$errors->get('ape_materno')" class="mt-2" />
        </div>

        <!-- Apellido Paterno -->
        <div class="mt-4">
            <label for="ape_paterno" class="block text-sm font-medium text-black">Apellido Paterno</label>
            <x-text-input id="ape_paterno" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="ape_paterno" :value="old('ape_paterno')" required autocomplete="ape_paterno" />
            <x-input-error :messages="$errors->get('ape_paterno')" class="mt-2" />
        </div>

        <!-- Área -->
        <div class="mt-4">
            <label for="rol" class="block text-sm font-medium text-black">Rol o Cargo</label>
            <select name="rol" id="rol" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white">
                <option value="">-- Selecciona una rol --</option>
                @foreach($roles as $r)
                    <option value="{{ $r->rol_id}}">{{ $r->rol }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Área -->
        <div class="mt-4">
            <label for="area" class="block text-sm font-medium text-black">Área</label>
            <select name="area" id="area" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white">
                <option value="">-- Selecciona una área --</option>
                @foreach($areas as $a)
                    <option value="{{ $a->area_id }}">{{ $a->area }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('area')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-black">Correo</label>
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-black">Contraseña</label>
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirma tu contraseña -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-black">Confirma tu contraseña</label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('¿Ya tienes cuenta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
