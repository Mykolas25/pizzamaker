<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {{--@include('css')--}}
    {{--@include('fonts')--}}
    {{--@include('meta')--}}
    {{--<title>@yield('title')</title>>--}}
</head>
<body style="background-color: hotpink">
{{--@include('header')--}}
{{--<h1>@yield('title')</h1>--}}
@yield('content')

{{--@include('footer')--}}
</body>
{{--@include('js')--}}
{{--@include('scripts')--}}


</html>