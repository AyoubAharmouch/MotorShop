<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',"404")</title>
</head>
<body>
    @include('header')
    @yield('content')
    @yield('scripts')
    @include('footer')


</body>
</html>
