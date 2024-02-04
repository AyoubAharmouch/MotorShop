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

@extends('welcome')
@section('title','sign in')
@section('content')
<div class='imgbg'>


    <form method="POST" class="for" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <table>
            <tr>
                <td><x-input-label for="name" :value="__('Name')" class='form-label'/></td>
                <td>
                    <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </td>
            </tr>


        <!-- Email Address -->
        <div class="mt-4">
            <tr>
                <td>
                    <x-input-label for="email" :value="__('Email')" class='form-label'/>
                </td>
                <td>
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </td>
            </tr>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <tr>
                <td>
                    <x-input-label for="password" :value="__('Password')" class='form-label'/>
                </td>
                <td>
                    <x-text-input id="password" class="block mt-1 w-full form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </td>
            </tr>

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <tr>
                <td>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class='form-label'/>
                </td>
                <td>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </td>
            </tr>


        </div>

        <div class="flex items-center justify-end mt-4">
            <tr>
                <td>
                    <a class="underline text-secondary text-sm text-danger-600 hover:text-danger-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
                </td>
                <td>
                    <x-primary-button class="ms-4 btn-danger rounded">
                {{ __('Register') }}
            </x-primary-button>
                </td>
            </tr>
        </div></table>
    </form>
</div>











@endsection
