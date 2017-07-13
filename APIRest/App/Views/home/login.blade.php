
@extends('layout.default')

@section('title', 'Login de Usuário')

@section('content')

<div class="container">
    <div class="section">

        <div class="resultado"></div>
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m6">
                <div class="icon-block">
                    <h2 class="center light-blue-text">
                        <i class="material-icons">input</i>
                    </h2>
                    <h5 class="center">Formulario de login</h5>

                    <p class="light">
                        Por se tratar de uma aplicação teste, não foi implementado o módulo de cadastro de Usuários.
                    </p>
                </div>
            </div>

            <div class="col s12 m6">
                <form action="{{\App\Config\ConfigApp::PREFIX_ROUTE}}/auth" method="POST" id="form">
                    <div class="input-field col m6">
                        <i class="material-icons prefix">perm_identity</i>
                        <select name="user">
                            @foreach ($usuarios as $usuario)
                            <option value="{{$usuario['id']}}">{{$usuario['nome']}}</option>
                            @endforeach
                        </select>
                        <label>Selecione um usuario</label>
                    </div>
                    <div class="input-field col m6">
                        <button class="btn waves-effect waves-light" type="submit" name="action" onclick="wait()">Ok, vamos lá!
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br><br>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
    
    function wait() {
        Materialize.toast('Processando...', 4000);
    }
</script>
@endsection