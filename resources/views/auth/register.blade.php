<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-sm font-medium text-black">Nombre</label>
            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Materno -->
        <div class="mt-4">
            <label for="ape_materno" class="block text-sm font-medium text-black">Apellido Materno</label>
            <input id="ape_materno" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="ape_materno" value="{{ old('ape_materno') }}" required autocomplete="ape_materno">
            @error('ape_materno')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Paterno -->
        <div class="mt-4">
            <label for="ape_paterno" class="block text-sm font-medium text-black">Apellido Paterno</label>
            <input id="ape_paterno" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="text" name="ape_paterno" value="{{ old('ape_paterno') }}" required autocomplete="ape_paterno">
            @error('ape_paterno')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Delegación -->
        <div class="mt-4">
            <label for="del" class="block text-sm font-medium text-black">Delegación</label>
            <select name="del" id="del" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white">
                <option value="">-- Selecciona una delegación --</option>
                @foreach($oficinas as $o)
                    <option value="{{ $o->oficina_id }}">{{ $o->oficina }}</option>
                @endforeach
            </select>
            @error('del')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Área -->
        <div class="mt-4">
            <label for="area" class="block text-sm font-medium text-black">Área</label>
            <select name="area" id="areas" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white">
                <option value="">-- Selecciona una área --</option>
            </select>
            @error('area')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-black">Correo</label>
            <input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-black">Contraseña</label>
            <input id="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-black">Confirma tu contraseña</label>
            <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-white" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                ¿Ya tienes cuenta?
            </a>

            <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-black font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none">
                Registrar
            </button>
        </div>
    </form>

    <script>
        document.getElementById('del').addEventListener('change', function() {
            let delId = this.value;

            fetch(`/areas/delegacion/${delId}`)
                .then(response => response.json())
                .then(data => {
                    let areaSelect = document.getElementById('areas');
                    areaSelect.innerHTML = '<option value="">Seleccione un área</option>';
                    
                    data.forEach(area => {
                        let option = document.createElement('option');
                        option.value = area.area_id;
                        option.textContent = area.nombre_area;  
                        areaSelect.appendChild(option);
                    });
                });
        });
    </script>
</x-guest-layout>
