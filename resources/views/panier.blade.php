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
        /* display: flex;
        justify-content: center;
        align-items: center; */
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('welcome')

@section('title','cart')

@section('content')
<div class="imgbg">
<h1 class="text-center"> your cart </h1>


<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <table rules="rows" width="90%" class="text-center ">
        @if (count(session('panier', [])))
            <tr>
                <th>nom</th>
                <th>picture</th>
                <th>price<th>
                <th>Quantity</th>
                <th>total</th>
                <th>Action</th>
            </tr>
        @endif

    @php $glob = 0 @endphp
    @if(session('panier'))
    @foreach(session('panier') as $id => $details)
    @php $total = 0 @endphp
    @php $total += $details['prix'] * $details['quantity']; @endphp
    @php $glob +=$total; @endphp
            <tr>
                <td>{{ $details['titre'] }}</td>
                <td><img src="{{ asset('imgs/'.$details["image"]) }}" height="100px" width="100px" alt=""></td>
                <td>{{ $details["prix"] }} DAM</td>
                <td></td>
                <td>
                    <form action="{{ route('update_panier', ['id' => $id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                </td>
                <td>{{$total }} DAM</td>
                <td data-th="">
                    <form action="{{ route('remove_from_panier', ['id' => $id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete✕</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif

    <tfoot>
        <tr>
            <td colspan="12" class='text-right'>
            Total : {{ $glob }}

            </td>
        </tr>
        <tr>
            <td colspan="12" class="text-right">
                <a href="{{ route('index') }}" class="btn btn-danger">continue shopping</a>
                <button class="btn btn-success" > Checkout</button>
            </td>
        </tr>
    </tfoot>

</table>
</section>
</div>
@endsection

