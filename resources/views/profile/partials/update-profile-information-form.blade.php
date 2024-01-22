<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile'.session('rol').'.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="codigo" :value="__('Código')" />
            <x-text-input id="codigo" name="codigo" type="text" class="mt-1 block w-full" :value="old('codigo', $user->codigo)" required autofocus autocomplete="codigo" />
            <x-input-error class="mt-2" :messages="$errors->get('codigo')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $user->telefono)" required autofocus autocomplete="telefono" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Categoría')" />
            <x-select id="categoria" name="categoria" class="block mt-1 w-full" required>
                <?php $defaultCategoria = $user->categoria ?? old('categoria'); ?>
                <option value="PR-DE" {{ $defaultCategoria == 'PR-DE' ? 'selected' : '' }}>PR-DE</option>
                <option value="PR-TC" {{ $defaultCategoria == 'PR-TC' ? 'selected' : '' }}>PR-TC</option>
                <option value="AS-DE" {{ $defaultCategoria == 'AS-DE' ? 'selected' : '' }}>AS-DE</option>
                <option value="AS-TC" {{ $defaultCategoria == 'AS-TC' ? 'selected' : '' }}>AS-TC</option>
                <option value="AS-TP" {{ $defaultCategoria == 'AS-TP' ? 'selected' : '' }}>AS-TP</option>
                <option value="AUX-TC" {{ $defaultCategoria == 'AUX-TC' ? 'selected' : '' }}>AUX-TC</option>
                <option value="AUX-TP 10H" {{ $defaultCategoria == 'AUX-TP 10H' ? 'selected' : '' }}>AUX-TP 10H</option>
                <option value="A1" {{ $defaultCategoria == 'A1' ? 'selected' : '' }}>A1</option>
                <option value="B1" {{ $defaultCategoria == 'B1' ? 'selected' : '' }}>B1</option>
                <option value="B2" {{ $defaultCategoria == 'B2' ? 'selected' : '' }}>B2</option>
                <option value="B3" {{ $defaultCategoria == 'B3' ? 'selected' : '' }}>B3</option>
                <option value="JP-20H" {{ $defaultCategoria == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                <option value="JP-TC" {{ $defaultCategoria == 'JP-TC' ? 'selected' : '' }}>JP-TC</option>
                <option value="JP-10H" {{ $defaultCategoria == 'JP-10H' ? 'selected' : '' }}>JP-10H</option>
                <option value="JP-20H" {{ $defaultCategoria == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
            </x-select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="grado_academico" :value="__('Grado Académico')" />
            <x-select id="grado_academico" name="grado_academico" class="block mt-1 w-full" required>
                <?php $defaultGradoAcademico = $user->grado_academico ?? old('grado_academico'); ?>
                <option value="Ingeniero" {{ $defaultGradoAcademico == 'Ingeniero' ? 'selected' : '' }}>Ingeniero</option>
                <option value="Magister" {{ $defaultGradoAcademico == 'Magister' ? 'selected' : '' }}>Magister</option>
                <option value="Doctor" {{ $defaultGradoAcademico == 'Doctor' ? 'selected' : '' }}>Doctor</option>
            </x-select>
            <x-input-error :messages="$errors->get('grado_academico')" class="mt-2" />
        </div>        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
