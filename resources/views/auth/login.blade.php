<style>
    .imgbg {
        background-image: url('https://images.unsplash.com/photo-1504160820508-da86e9dc8a28?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


        form {
        background-color: rgba(255, 255, 255, 0.8);
        /* Adjust the last value (0.8) for transparency */
        border-radius: 10px;
        padding: 20px;
        max-width: 400px;
        width: 80%; /* Adjust the width as needed */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('welcome')

@section('title','login')
@section('content')
<div class="imgbg">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <table>
        <!-- Email Address -->
        <div>
            <tr>
                <th><x-input-label for="email" :value="__('Email')" class='form-label' /></th>
                <td>
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </td>
            </tr>


        </div>

        <!-- Password -->
        <div class="mt-4">
            <tr>
                <th><x-input-label for="password" :value="__('Password')" class='form-label'/></th>
                <th>
                    <x-text-input id="password" class="block mt-1 w-full form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </th>
            </tr>



        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <tr>
                <th colspan="2">
                    <label for="remember_me" class="inline-flex items-center form-label form-switch" >
                <input id="remember_me" type="checkbox" class="rounded  border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
                </th>

            </tr>


        </div>

        <div class="flex items-center justify-end mt-4">
            <tr>
                <th>
                    @if (Route::has('password.request'))
                <a class="underline text-secondary text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                </th>
                <th>
                    <x-primary-button class="ms-3 btn-danger border rounded">
                {{ __('Log in') }}
            </x-primary-button>
                </th>
            </tr>



        </div>
    </table>
    </form>
</div>
@endsection
