<style>
    .imgbg{
        background-image:url('https://images.unsplash.com/photo-1704911206175-666dc9d9c4cc?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        margin:0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
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
@section('title','add new product')

@section("content")
<div class="imgbg">
<h1 class='text-center'> add new product</h1>

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
<div>
    {{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @endif --}}
</div>
<form action="/" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class="row m-5 form-group">
        <label for="" class="form-label col-lg-12 col-md-4">Title :</label>
        <input type="text" class="form-control col-lg-12 col-md-8" name="titre" placeholder="title" value="{{ old('titre') }}">
        @error('titre')
            {{ $message }}
        @enderror
    </div>
    <div class="row m-5 d-flex">
        <label for="" class="form-label col-lg-12 col-md-4">price :</label>
        <input type="text" class="form-control col-lg-12 col-md-8" name="prix" placeholder="****** DAM"  value="{{ old('prix') }}">
        @error('prix')
            {{ $message }}
        @enderror
    </div>
    <div class="row m-5 form-group">
        <label for="" class='form-label'>category:</label> <br>
        {{-- <select name="category" id="">
            <option value="MotorCycle">Motor Cycle</option>
            <option value="Motorsproduct">Motors product</option>
        </select> --}}

        <input type="radio" class='form-check-input' name="category" id="motorCycle" value="MotorCycle"> Motor Cycle <br>

        <input type="radio" class='form-check-input' name="category" id="motorsProduct" value="Motorsproduct"> Motors product <br>
        {{-- <input type="text"  class="form-control col-lg-12 col-md-8" name="category" placeholder="category"> --}}
        @error('category')
            {{ $message }}
        @enderror
    </div>

    <div class="row m-5">
        <label for="" class="form-label col-lg-12 col-md-4">image :</label>
        <input type="file" class="form-control-file col-lg-12 col-md-8"  name="image"  value="{{ old('image') }}">
        @error('image')
            {{ $message }}
        @enderror
    </div>
    <input type="reset" value="resert" class='btn mx-5 btn-success btn-outline-light'>
    <button type="submit" class="btn btn-success btn-outline-ligh">
        {{ __('Ajouter le produit') }}
    </button>

</form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
