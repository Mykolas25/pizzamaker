<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {{--@include('css')--}}
    {{--@include('fonts')--}}
    @include('meta')
    @include('css')
    <title>@yield('title')</title>
</head>
<body>
{{--@include('header')--}}
<h1>Welcome to @yield('title')</h1>
@yield('content')

{{--@include('footer')--}}
</body>

{{--@include('js')--}}
{{--@include('scripts')--}}
@yield('script')

</html>