<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ mix('/js/app.js') }}" defer></script>

{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>--}}
    <script src="/assets/js/smooth-scroll.polyfills.min.js"></script>
    <script src="/assets/js/sweetalert2.all.min.js"></script>
    <script src="/assets/js/volt.js"></script>
    @routes

    {{--
        Variáveis entregues para o inertia, apenas uma única vez.
        São setadas no AppServiceProvider.
        Eg de uso: {{ $volt.config.layout.app_title1 }}
    --}}

    <script>
        window.Volt = {
            menu: {!! $menu !!},
            config: {!! $config !!},
            auth: {!! $auth !!},
        };
    </script>
</head>
<body>

@inertia

@if (app()->isLocal())
{{--    <script src="{{ asset('browser-sync/browser-sync-client.js') }}"></script>--}}
@endif
</body>
</html>
