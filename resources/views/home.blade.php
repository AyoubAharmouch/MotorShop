{{-- @extends('layouts.app') --}}
<style>
    .pag{
        display: flex;
        justify-content: center;
        margin-top: 55px;
    }

    .imgbg{
        color: rgb(195, 194, 194);
        background-image:url('https://images.unsplash.com/photo-1692029165252-d65b53bfe1aa?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        margin:0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .ca {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}
.card {
    width: 30%;
    margin: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    background-color: #c7c7c7 !important; /* Add !important to ensure the color is applied */

    &:hover {
        transform: scale(1.05);
    }
}



.card-body {
    padding: 20px;
}

.card-title {
    color: #555;
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 15px;
}

.card-img-buttom {
    width: 100%;
    height: auto;
    border-radius: 4px; /* Add rounded corners to the image */
}

@media (max-width: 768px) {
            .ca {
                flex-direction: column;
                padding: 0;
                margin:0;
            }
            .card{
                height: auto;
                width: auto;
            }
        }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('welcome')
@section('title','home')


@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="imgbg">
<div class="p-5 ">

    <h1 >welcome to our site</h1>
    <h2>we have honor to visite our shop</h2>
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    {{-- <table rules="rows" width="100%">
        <tr>
            <th>nom</th>
            <th>prix</th>
            <th>picture</th>
<th>Actions</th>

        </tr>

    @foreach ($product as $h )
    <tr>
        <td>{{ $h["titre"] }}</td>
        <td>{{ $h["prix"] }} DAM</td>
        <td><img src="{{ asset('imgs/'.$h["image"])}}" height="100px" width="100px" alt=""></td>
        @if(Auth::user())


        @if(Auth::user()->role==='ADMIN')
                    <td>
                        <button class="btn btn-primary btn-outline-light p-1"> <a  href="/{{ $h->id }}/edit">modify</a>&nbsp;&nbsp;</button>
                            <form action={{ route('destroy', $h->id) }} method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-outline-light"  data-toggle="modal" data-target="#exampleModal-{{ $h->id }}">delete</button>
                            </form>
                    </td>

        @endif
        @if(Auth::user()->role==='USER')
                    <td>
                        <button class="btn btn-danger btn-outline-light p-1"> <a  href="{{ route('addcart.to.cart' ,$h->id) }}">add to Favorit List ❤️ </a>

                        {{-- <button class="btn btn-primary btn-outline-light p-1"> <a  href="{{ url('cart/addc', ['id' => $h['id']]) }}">add to cart</a> --}}
                            {{-- &nbsp;&nbsp;</button> --}}
                {{-- <a href="{{ route('add_to_panier'  ,$h->id) }}" class='btn btn-info btn-outline-light  text-center ' role="button">add to cart 🛒</a>


                    </td>
                    @endif
        @else
        <td>
                        <button class="btn btn-danger btn-outline-light p-1"> <a  href="{{ route('addcart.to.cart' ,$h->id) }}"> add to Favorit List ❤️ </a>
                &nbsp;&nbsp;</button>
                <a href="{{ route('add_to_panier' ,$h->id)}}" class='btn btn-info btn-outline-light  text-center ' role="button">add to cart 🛒</a>

        </td>
        @endif

    </tr>

    @endforeach
</table>  --}}

<div class="ca">


    @foreach ($product as $p )
    <div class="card">

        <div class="card-body">
            <img height="30px" width='30%' src="{{ asset('imgs/' .$p->image) }}" alt="{{ $p->titre }}" class="card-img-buttom">
            <h1 class="card-title">{{ $p->titre }}</h1>
            <h3 class="card-text">{{ $p->prix }} DAM</h3>
            @if(Auth::user())
                @if(Auth::user()->role==='ADMIN')
                    <button class="btn btn-danger p-1"> <a  href="/{{ $p->id }}/edit">modify</a>&nbsp;&nbsp;</button>
                    <form action={{ route('destroy', $p->id) }} method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal-{{ $p->id }}">delete</button>
                    </form>
                @endif
                @if(Auth::user()->role==='USER')
                        <button class="btn btn-danger p-1"> <a  href="{{ route('addcart.to.cart' ,$p->id) }}">add to Favorit List ❤️ </a>    &nbsp;&nbsp;</button>
                <a href="{{ route('add_to_panier'  ,$p->id) }}" class='btn btn-danger text-center ' role="button">add to cart 🛒</a>
                @endif
                @else
                <td>
                    <button class="btn btn-danger p-1"> <a  href="{{ route('addcart.to.cart' ,$p->id) }}"> add to Favorit List ❤️ </a>&nbsp;&nbsp;</button>
                    <a href="{{ route('add_to_panier' ,$p->id)}}" class='btn btn-dangertext-center ' role="button">add to cart 🛒</a>
                @endif


        </div>

    </div>
        @endforeach
</div>







<div class="pag">
    <span>
        {{  $product->links() }}
    </span>
</div>
</div>
@if(session('seccess'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

</div>


@endsection
