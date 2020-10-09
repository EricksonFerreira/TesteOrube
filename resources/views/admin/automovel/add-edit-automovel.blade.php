@extends('layouts.app')
    <style>
        .custom-file-input ~ .custom-file-label::after {
            content: "Procurar";
        }
        .custom-file-input ~ .custom-file-label::nbefore {
            content: "Alterar";
        }
    </style>

@section('content')
    <div class="container">
        <nav class="mb-2">
            <ol class="breadcrumb">
                <li  class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item" >
                    <span class="text-secondary">
                    @isset($automovel)
                        Editando Automóvel: {{$automovel->modelo}}
                    @else
                        Cadastro de novo Automóvel
                    @endif
                    </span>
                </li>
            </ol>
        </nav>

        <div class="row mb-1">
            <div class="col-md-9">
                <h1 class="h2 border-left pl-2">
                @isset($automovel)
                Editando Automovel: {{$automovel->modelo}}
                @else
                Cadastro de nova Automóvel
                @endif
                </h1>
            </div>
        </div>

        @isset($automovel)
            <form method="post" action="{{route('automovel.update',$automovel->id)}}" enctype="multipart/form-data">
                @method('put')
        @else
            <form method="post" action="{{route('automovel.store')}}" enctype="multipart/form-data">
        @endisset
        @csrf
        <div class="card">
            <div class="card-header">
                Informações do Automóvel
            </div>

            <div class="card-body">
                    <div class="col" style="margin:0 auto">
                        <div class="form-row">
                            <!-- Modelo -->
                            <div class="form-group col-md-3">
                                <label for="modelo">{{ __('Modelo') }}</label>
                                <input  id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{ old('modelo') ||  isset($automovel->modelo) ? $automovel->modelo : '' }}" required placeholder="Ex: Gol" autocomplete="modelo" autofocus>
                                @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Placa-->
                            <div class="form-group col-md-2">
                                <label for="placa">{{ __('Placa') }}</label>
                                <input required id="placa" type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="{{ isset($automovel->placa) ? $automovel->placa : '' }}" placeholder="Ex: ABC-1234" autocomplete="placa" autofocus>
                                @error('placa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Ano de Fabricação -->
                            <div class="form-group col-md-2">
                                <label for="ano_fabricacao">{{ __('Ano de fabricação') }}</label>
                                <input  id="ano_fabricacao" type="text" class="form-control @error('ano_fabricacao') is-invalid @enderror" name="ano_fabricacao" value="{{ old('ano_fabricacao') ||  isset($automovel->ano_fabricacao) ? $automovel->ano_fabricacao : '' }}" placeholder="Ex: 2018" required autocomplete="ano_fabricacao" autofocus>
                                @error('ano_fabricacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Ano do Modelo-->
                            <div class="form-group col-md-2">
                                <label for="ano_modelo">{{ __('Ano do Modelo') }}</label>
                                <input required id="ano_modelo" type="text" class="form-control @error('ano_modelo') is-invalid @enderror" name="ano_modelo" value="{{ isset($automovel->ano_modelo) ? $automovel->ano_modelo : '' }}" autocomplete="ano_modelo" placeholder="Ex: 2016" autofocus>
                                @error('ano_modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Valor-->
                            <div class="form-group col-md-2">
                                <label for="valor">{{ __('Valor') }}</label>
                                <input required id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ isset($automovel->valor) ? $automovel->valor : '' }}" autocomplete="valor" placeholder="Ex: R$ 25.000,00" autofocus>
                                @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Cor -->
                            <div class="form-group col-md-2">
                                <label for="cor">{{ __('Cor') }}</label>
                                <input  id="cor" type="text" class="form-control @error('cor') is-invalid @enderror" name="cor" value="{{ old('cor') ||  isset($automovel->cor) ? $automovel->cor : '' }}" required autocomplete="cor" placeholder="Ex: Preto" autofocus>
                                @error('cor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Portas -->
                            <div class="form-group col-md-1">
                                <label for="portas">{{ __('Portas') }}</label>
                                <input  id="portas" type="text" class="form-control @error('portas') is-invalid @enderror" name="portas" value="{{ old('portas') ||  isset($automovel->portas) ? $automovel->portas : '' }}" required autocomplete="portas" placeholder="Ex: 4"autofocus>
                                @error('portas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Imagem -->
                            <div class="form-group col-md-3 form-img">
                                <label for="imagem" class="text-dark col-form-label text-md-center">{{ __('Imagem') }}</label>
                                <small id="smallImage" class="text-muted"> (Opcional)</small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('imagem') is-invalid @enderror" accept="image/*" id="imagem" name="imagem" value="{{ isset($automovel->imagem) ? $automovel->imagem : '' }}" lang="br" @empty($automovel) @endisset>
                                    <label class="custom-file-label" for="imagem">Ache o arquivo</label>
                                    @error('imagem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Marca do automóvel -->
                            <div class="form-group col-md-3">
                                <label for="marca" class="">{{ __('Marca do automóvel') }}</label>
                                <select name="marca" class="custom-select  @error('marca') is-invalid @enderror" id="marca" required>
                                    @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}"
                                            @if(isset($automovel) && $marca->id == $automovel->marca_id)
                                                Selected
                                            @endif
                                        >
                                            {{$marca->nome}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Tipo de automóvel -->
                            <div class="form-group col-md-3">
                                <label for="tipoAuto" class="">{{ __('Tipo do automóvel') }}</label>
                                <select name="tipoAuto" class="custom-select  @error('tipoAuto') is-invalid @enderror" id="tipoAuto" required>
                                    @foreach($tipos as $tipo)

                                        <option value="{{$tipo->id}}"
                                            @if(isset($automovel) && $tipo->id == $automovel->tipoAuto_id)
                                                Selected
                                            @endif
                                        >
                                            {{$tipo->nome}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('tipoAuto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <!-- Descricao -->
                            <div class="form-group col-md-12">
                                <label for="descricao" >{{ __('Descrição') }}</label>
                                <textarea id="descricao" class="form-control  @error('descricao') is-invalid @enderror" name="descricao" id="descricao" rows="3" autocomplete="descricao" autofocus>{{ isset($automovel->descricao) ? $automovel->descricao : '' }}
                                </textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Botão -->
                            @isset($automovel)
                                <button type="submit" class="btn btn-primary col-md-12">Editar Instituição</button>
                            @else
                                <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                            @endisset
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    </div>


    <!-- Imports do Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection

