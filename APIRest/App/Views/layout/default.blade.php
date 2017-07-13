<!DOCTYPE html>
<html lang="pt-br">
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

        @include('commons.footer')

        <!--  Scripts-->
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/vendor/materialize/dist/js/materialize.js"></script>
        <script src="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/js/init.js"></script>

        <script>
            $(document).ready(function () {
                $('#form').submit(function () {

                    var dados = $(this).serialize();

                    $.ajax({
                        type: "POST", // Tipo de metodo
                        url: $(this).attr("action"), //Recebe o valor da action do form
                        data: dados,
                        success: function (data) //Se tiver sucesso...
                        {
                            $(".resultado").html(data);
                        }
                    });
                    return false;
                });
                //Requisita
            });
            
        </script>
            
        @yield('scripts');
    </body>
</html>
