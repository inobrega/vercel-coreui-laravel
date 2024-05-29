<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>
<div class="row justify-content-center">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <form class="card col-md-7 p-4 mb-0" wire:submit="login">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-body-secondary">Já possui uma conta?</p>
                    @if ($errors->has('form.email') || $errors->has('form.password'))
                        <div class="alert alert-danger" role="alert">
                            @if ($errors->has('form.email'))
                                <p>{{ $errors->first('form.email') }}</p>
                            @endif
                            @if ($errors->has('form.password'))
                                <p>{{ $errors->first('form.password') }}</p>
                            @endif
                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                          <svg class="icon">
                            <use xlink:href="{{ asset('icons/sprites/free.svg#cil-user') }}"></use>
                          </svg>
                        </span>
                        <input class="form-control" id="email" type="email" name="email" placeholder="E-mail" wire:model="form.email" required autofocus autocomplete="username">

                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                          <svg class="icon">
                              <use xlink:href="{{ asset('icons/sprites/free.svg#cil-lock-locked') }}"></use>
                          </svg>
                        </span>
                        <input class="form-control" wire:model="form.password" id="password" name="password" type="password" placeholder="Senha" required autocomplete="current-password">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" value="Login" class="btn btn-primary px-4" type="button" />
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-link px-0" type="button">Esqueceu a senha?</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>Cadastre-se</h2>
                        <p>Faça seu cadastro para acesso completo à plataforma.</p>
                        <button class="btn btn-lg btn-outline-light mt-3" type="button">Cadastrar Agora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form wire:submit="login">--}}
{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember" class="inline-flex items-center">--}}
{{--                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
