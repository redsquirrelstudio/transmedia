<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transmedia {{ date('Y') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;600;800&&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('includes/navigation')
    <main class="screen-block scroll-container">
        @yield('content')
        @include('includes/merch-block')
        @include('includes/instagram-block')

        @include('includes/footer')
    </main>

</div>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
</body>
</html>
