<!DOCTYPE html>
<html lang="pt-br" ng-app="checkIt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>@yield('title'):: Check It! ::</title>

        <!-- CSS  -->
        <link href="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/css/icon.css" rel="stylesheet">
        <link href="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/materialize/dist/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        @include('commons.menu')

        @yield('content')

        <!--  Scripts-->
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/jquery/dist/jquery.min.js"></script>
        
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/angular/angular.js"></script>
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/js/modules.js"></script>
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/js/app.js"></script>
        
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/materialize/dist/js/materialize.js"></script>
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/js/init.js"></script>
            
        @yield('scripts')
    </body>
</html>
