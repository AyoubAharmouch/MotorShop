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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @extends('welcome')

    @section('title','favorite')

    @section('content')
<div class="imgbg">


    <h1 class='text-center m-5'>your favorite List</h1>
    @if(session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}
                </div>
                @endif

                <table rules="rows" width="90%" class="text-center ">
                @if(count((array) session('cart')) !== 0)
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>picture</th>
                            <th>total<th>
                            <th></th>
                        </tr>
                </thead>
                @endif

        <tbody>
            @if (session('cart'))
    @foreach(session('cart') as $id => $item)
        <tr rowId="{{ $id }}">
            <td>{{ $item['titre'] }}</td>
            <td><img src="{{ asset('imgs/'.$item["image"]) }}" height="100px" width="100px" alt=""></td>
            <td>{{ $item["prix"] }} DAM</td>
            <td data-th="">
                <form action="{{ route('remove_from_cart', ['id' => $id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete✕</button>
                </form>
            </td>
        </tr>
    @endforeach
@endif


        </tbody>
        {{-- <tfoot>
            <td class="text-right">
                <a href="#" class="btn  btn-primary">Continue shopping</a>
                <a href="#" class="btn  btn-success">checkout </a>

        </tfoot> --}}
    </table>
    @if(count((array) session('cart'))=== 0)
    <h1 class="text-center ">your favourite list is empty now </h1>
    @endif
</div>
    @endsection



