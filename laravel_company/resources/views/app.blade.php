<!DOCTYPE html>
<html class="" lang="vi">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta property="og:site_name" content="Tin tức" />
    <meta property="og:type" content="Website" />
    <meta property="og:image:width" content="200"/>
    <meta property="og:image:height" content="200"/>
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image:alt" content=""/>
    <meta property="og:type" content="Website" />
    @php $time = time(); @endphp
    <link href="{{ asset("css/app.css?t=$time") }}" rel="stylesheet">
    <link href="{{ asset("css/all.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/common.css") }}" rel="stylesheet">
    @yield('styles')
    @stack('styles_component')
</head>
<body>
<section id="main-page">
    <div class="relative">
        @include('partials.header')

        @yield('main')

        @include('partials.footer')
    </div>
</section>
</body>
<script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/all.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/app.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/common.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('scripts')
@stack('scripts_component')
</html>