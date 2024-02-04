<style>
    table{
        display: flex;
        justify-content: center;
    }
    .imgbg{
        color: rgb(195, 194, 194);
        background-image:url('https://images.unsplash.com/photo-1692029165252-d65b53bfe1aa?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }


    .ca {
        margin:0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
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
    background-color: #c7c7c7 !important;

    &:hover {
        transform: scale(1.05);
    }
}
.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.5rem;
    color: #555;
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
    border-radius: 4px;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


@extends('welcome')
@section('title','product')

@section("content")

<div class="imgbg">
        <h1>product of {{$cat }}</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                    <a href="{{ route('add_to_panier' ,$p->id)}}" class='btn btn-danger text-center ' role="button">add to cart 🛒</a>
                @endif


        </div>

    </div>
        @endforeach
</div>

</div>
@endsection

