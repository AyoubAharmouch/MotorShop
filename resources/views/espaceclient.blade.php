@extends('welcome')
@section('title','catalogue')
<style>
.imgbg{
        background-image:url('https://images.unsplash.com/photo-1706785534889-9b40e60834fd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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
        color: #fff;
    }
    h3{
        text-align: center;
        margin: 50px;
    }
</style>

@section('content')
<div class="imgbg">
    <h1>best deals </h1>
    <h3>Explore exclusive offers and discover the best deals in our latest catalog. <a href="/Catalogue">Download now for a curated selection of unbeatable savings!
        </a>
    </h3>
</div>

@endsection
