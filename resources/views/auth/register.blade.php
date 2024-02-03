<x-guest-layout title="Registrarse">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Código -->
        <div class="mt-4">
            <x-input-label for="codigo" :value="__('Código')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" autofocus autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>


        <!-- Categoria -->
        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Categoría')" />
            <x-select id="categoria" name="categoria" class="block mt-1 w-full" required>
                <option value="PR-DE" {{ old('categoria') == 'PR-DE' ? 'selected' : '' }}>PR-DE</option>
                <option value="PR-TC" {{ old('categoria') == 'PR-TC' ? 'selected' : '' }}>PR-TC</option>
                <option value="AS-DE" {{ old('categoria') == 'AS-DE' ? 'selected' : '' }}>AS-DE</option>
                <option value="AS-TC" {{ old('categoria') == 'AS-TC' ? 'selected' : '' }}>AS-TC</option>
                <option value="AS-TP" {{ old('categoria') == 'AS-TP' ? 'selected' : '' }}>AS-TP</option>
                <option value="AUX-TC" {{ old('categoria') == 'AUX-TC' ? 'selected' : '' }}>AUX-TC</option>
                <option value="AUX-TP 10H" {{ old('categoria') == 'AUX-TP 10H' ? 'selected' : '' }}>AUX-TP 10H</option>
                <option value="A1" {{ old('categoria') == 'A1' ? 'selected' : '' }}>A1</option>
                <option value="B1" {{ old('categoria') == 'B1' ? 'selected' : '' }}>B1</option>
                <option value="B2" {{ old('categoria') == 'B2' ? 'selected' : '' }}>B2</option>
                <option value="B3" {{ old('categoria') == 'B3' ? 'selected' : '' }}>B3</option>
                <option value="JP-20H" {{ old('categoria') == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                <option value="JP-TC" {{ old('categoria') == 'JP-TC' ? 'selected' : '' }}>JP-TC</option>
                <option value="JP-10H" {{ old('categoria') == 'JP-10H' ? 'selected' : '' }}>JP-10H</option>
                <option value="JP-20H" {{ old('categoria') == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
            </x-select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>
        
        <!-- Grado Académico -->
        <div class="mt-4">
            <x-input-label for="grado_academico" :value="__('Grado Académico')" />
            <x-select id="grado_academico" name="grado_academico" class="block mt-1 w-full" required>
                <option value="Ingeniero" {{ old('grado_academico') == 'Ingeniero' ? 'selected' : '' }}>Ingeniero</option>
                <option value="Magister" {{ old('grado_academico') == 'Magister' ? 'selected' : '' }}>Magister</option>
                <option value="Doctor" {{ old('grado_academico') == 'Doctor' ? 'selected' : '' }}>Doctor</option>
            </x-select>
            <x-input-error :messages="$errors->get('grado_academico')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
