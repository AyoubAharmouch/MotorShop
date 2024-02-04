
@extends('welcome')
@section('title','profile')
@section('content')
<x-app-layout>



<!-- Example logout link -->
<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


<h1 class="text-center m-5 p-5">welcome to our sitweb </h1>
<h1 class="text-center m-5 p-5">this page is private only user can see his information </h1>

</x-app-layout>
@endsection
