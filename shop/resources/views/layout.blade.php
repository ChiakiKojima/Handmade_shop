<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="/js/app.js" defer></script>
    </head>
    <body>
        
        @include('navbar')
        
        @if(Route::currentRouteName() === 'home')
            <img src="storage/top1.jpg" alt="top image" class="img-fluid">
        @endif
      
        <div class="container py-4">
        @yield('content')
        </div>
    </body>
</html>