<!doctype html>
 <html class="no-js" lang="">
<head>
    @include('includes.meta')
    <title>Self Actualization | @yield('title')</title>
    @include('includes.style')
</head>

<body>
    @include('includes.sidebar')
    <div id="right-panel" class="right-panel">
        @include('includes.navbar')
        <div class="content">
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </div>
    @include('includes.script')
</body>
</html>
