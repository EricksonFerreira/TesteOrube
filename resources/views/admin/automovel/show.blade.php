@extends('layouts.app')
<style>
    .row1{
        border-bottom: 4px dotted #0D6138;
        padding: 10px;
    }
    input{
        font-style: italic;
    }

</style>
@section('content')
</head>
<body>
<div class="container">
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li  class="breadcrumb-item">
                <a href="{{route('automovel.index')}}">Automóvel</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    {{$nome}}
                </span>
            </li>
        </ol>
    </nav>
    <div class="row1" style="text-align: center;">
    @php($explode = explode("/",$automovel->imagem))
        @if($automovel->imagem == 'orube5.jpg')
            <img src="{{asset('marcas/sw4.jpg')}}" style="border-radius: 50%;" width="100px" height="100px">
        @elseif($automovel->imagem == NULL)
        @else
            <img src="{{asset('storage/'.$explode[1].'/'.$explode[2])}}" style="border-radius: 50%;" width="100px" height="100px">
        @endif
        <h5 style="color:#0D6138">Modelo: <b style="color:black">{{$automovel->modelo}}</b></h5>
    </div>
    <div class="row mt-2">
        <div class="col" >
            <div class="card">
                @php($a =9)
                <div class="form-row col-12 mt-4 mb-4">
                    <!-- Placa -->
                    <div class="form-group col-md-3 ml-5">
                        <label for="placa">Placa:</label>
                        <input type="text" placa="placa"class="form-control" id="placa" disabled value="{{ ($automovel->placa)?: 'Não informado' }}">
                    </div>
                    <!-- Ano Fabricacao -->
                    <div class="form-group col-md-2">
                        <label for="ano_fabricacao">Ano de fabricação:</label>
                        <input type="text" name="ano_fabricacao"class="form-control" id="ano_fabricacao" disabled value="{{ ($automovel->ano_fabricacao)?: 'Não informado' }}">
                    </div>
                    <!-- Ano Modelo -->
                    <div class="form-group col-md-2">
                        <label for="ano_modelo">Ano do modelo:</label>
                        <input type="text" name="ano_modelo"class="form-control" id="ano_modelo" disabled value="{{ ($automovel->ano_modelo)?: 'Não informado' }}">
                    </div>
                    <!-- Cor -->
                    <div class="form-group col-md-2">
                        <label for="cor">Cor:</label>
                        <input type="text" name="cor"class="form-control" id="cor" disabled value="{{ ($automovel->cor)?: 'Não informado' }}">
                    </div>
                    <!-- Portas -->
                    <div class="form-group col-md-2">
                        <label for="portas">Portas:</label>
                        <input type="text" name="portas"class="form-control" id="portas" disabled value="{{ ($automovel->portas)?: 'Não informado' }}">
                    </div>
                    <!-- Valor -->
                    <div class="form-group col-md-2 ml-5">
                        <label for="valor">Valor:</label>
                        <input type="text" name="valor"class="form-control" id="valor" disabled value="{{ ($automovel->valor)?: 'Não informado' }}">
                    </div>
                    <!-- Marca -->
                    <div class="form-group col-md-3">
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca"class="form-control" id="marca" disabled value="{{ ($tipo->nome)?: 'Não informado' }}">
                    </div>
                    <!-- Tipo -->
                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo:</label>
                        <input type="text" name="tipo"class="form-control" id="tipo" disabled value="{{ ($tipo->nome)?: 'Não informado' }}">
                    </div>
                    <!-- Descricao -->
                    <div class="form-group col-md-11 ml-5">
                        <label for="descricao">Descricao:</label>
                        <textarea id="descricao" class="form-control" name="descricao" disabled id="descricao" rows="3" autocomplete="descricao" autofocus>{{ ($automovel->descricao)?: 'Não informado' }}"
                        </textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

@endsection
