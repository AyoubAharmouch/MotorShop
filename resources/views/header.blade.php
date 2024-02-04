<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<style>
    nav{
        display: flex;
        height: 8%;
        justify-content: space-around;
        align-content: center;
        background-color: rgb(59, 59, 59);

    }
    li,a, .mn{
        padding-top: 7px;
        text-decoration: none;
        color: rgb(190, 189, 189);
        margin-bottom: 0px;
        padding-bottom: 0px;
    }
    /* a:last-child , a:nth-child(2){
        color: rgb(43, 43, 43);
    } */
    a:hover ,.mn:hover{
        color: rgb(255, 255, 255);
        text-decoration: solid;

    }
    a:active , .mn:active{
        color:rgb(26, 23, 55);
    }
    @media (max-width: 768px) {
    nav {
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        height: auto; /* Adjust the height as needed */
    }

    a {
        width: 48%; /* Set the width for each item to 48% to allow space between them */
        margin-bottom: 10px; /* Add some margin between items */
    }
}

</style>
<nav>




    {{-- <a href="/principale">Bikester</a> --}}
    <a class="navbar-brand logo text-start text-capitalize fs-3" href="/principale" id="" >
        Bikester
    </a>
    <a href="{{ route('index') }}">All Products</a>
    <a href="/category/MotorCycle">motorCycle</a>
    <a href="/category/Motorsproduct">Motor's product</a>

@if(Auth::user())

    @if(Auth::user()->role==='ADMIN')
    <a href="/create">Add New Product</a>
    <a href="{{ route('logout') }}"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
    @endif

    @if(Auth::user()->role==='USER')
    <a href="/espaceclient">Espace Client</a>
    <a href="{{ route('logout') }}"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="{{ route('shopping') }}" class="btn btn-outline-dark h-75 me-0">
    <i class="fa-solid fa-cart-shopping">Favorite ❤️</i><span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
</a>

    <a href="{{ route('shopping') }}" class="btn btn-outline-dark h-75">
        <i class="fa-solid fa-cart-shopping">cart🛒</i><span class="badge bg-info">{{ count((array) session('cart')) }}</span>
    </a>
    @endif

    @if(Auth::user()->role==='')

    <a href="/login">log in</a>
    <a href="/register">sign in</a>

    <a href="{{ route('shopping') }}" class="btn btn-outline-dark h-75 me-0">
        <i class="fa-solid fa-cart-shopping">Favorite ❤️</i><span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
    </a>

    <a href="{{ route('panier.index') }}" class="btn btn-outline-dark h-75 ms-0">
        <i class="fa-solid fa-cart-shopping">cart 🛒</i><span class="badge bg-info">{{ count(session('panier', [])) }}</span>
    </a>

    @endif

@else
<a href="/login">log in</a>
    <a href="/register">sign in</a>
    <a href="{{ route('shopping') }}" class="btn btn-outline-dark h-75 me-0" >
        <i class="fa-solid fa-cart-shopping">Favorite ❤️</i><span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
    </a>
    <a href="{{ route('panier.index') }}" class="btn btn-outline-dark h-75 ms-0">
        <i class="fa-solid fa-cart-shopping">cart 🛒</i><span class="badge bg-info">{{ count(session('panier', [])) }}</span>

    </a>
    @endif


</nav>
