<style>
    .imgbg{
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
    /* .titre{
        font-size: 150px;

    } */
    .titre {
    font-size: clamp(10rem, calc(2rem + 1.5vw), 8rem);
    color: hsl(0, 0%, 50%);
    font-weight: bold;
}

.titre .letter {
    --_fw-900: 900;
    --_fw-700: 700;
    --_fw-400: 400;

    --_clr-900: hsl(0, 0%, 100%);
    --_clr-700: hsl(0, 0%, 80%);
    --_clr-400: hsl(0, 0%, 60%);

    font-weight: 200;
    transition: font-weight .5s ease;

    &:hover {
        font-weight: var(--_fw-900);
        color: var(--_clr-900);
    }

    &:hover + .letter {
        font-weight: var(--_fw-700);
        color: var(--_clr-700);
    }

    &:hover + .letter + .letter {
        font-weight: var(--_fw-400);
        color: var(--_clr-400);
    }

    &:has(+ .letter:hover) {
        font-weight: var(--_fw-700);
        color: var(--_clr-700);
    }

    &:has(+ .letter + .letter:hover) {
        font-weight: var(--_fw-400);
        color: var(--_cir-400); /* Fix the typo here, should be --_clr-400 */
    }
}
.shop:hover{
    color:rgb(26, 23, 55);
}
.ca{
    display: flex;
    justify-content: space-between;
}
.card{
    margin: 20px;
    height:350px;
    width:30%;
    &:hover {
        transform: scale(1.05);
    }
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const animText = "Bikester";
    const animTextWrapper = document.querySelector('.titre');
    const animTextArray = animText.split('');

    animTextArray.forEach(Letter => {
        const letterElement = document.createElement('span');
        letterElement.textContent = Letter;
        letterElement.classList.add('letter');

        animTextWrapper.appendChild(letterElement);
    });
});


</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('welcome')

@section("title","Bikester-Home")
@section('content')
<div class="imgbg">
    <h1 class='fw-bold titre '></h1>
</div>

<div class=" ca">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">All Product</h1>
            <p class="card-text">this page is all product like MotorCycles and helmet etc..</p>
            <a href="{{ route('index') }}" class="card-link shop">Go Shop</a>
            <img height="150px" width='50px' src="https://images.unsplash.com/photo-1580654843061-8c90a9585fec?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="card-img-top">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Motor Cycles</h1>
            <p class="card-text">this page is  the typ of motor that we sale for keep ursel safe</p>
            <a href="/category/MotorCycle" class="card-link shop">Go Shop</a>
            <img height="150px" width='50px' src="https://images.unsplash.com/photo-1676246848792-2f8eb33975b6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="card-img-top">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Motor's product     </h1>
            <p class="card-text">this page is   all product that you need for ride a mortor.</p>
            <a href="/category/Motorsproduct" class="card-link shop">Go Shop</a>
            <img height="150px" width='50px' src="https://images.unsplash.com/photo-1603347585534-badcc8b973c0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="card-img-top">
        </div>
    </div>



</div>


@endsection
