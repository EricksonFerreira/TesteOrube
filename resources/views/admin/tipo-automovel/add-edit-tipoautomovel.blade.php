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
@if(session('success'))
                <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <p>{{session('success')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol>
                <?php Session::pull('fail')?>
              @endif
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($tipoautomovel)
                    Editando Tipo de Automóvel: {{$tipoautomovel->nome}}
                @else
                    Cadastro de novo Tipo de Automóvel
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($tipoautomovel)
               Editando Tipo de Automóvel: {{$tipoautomovel->nome}}
            @else
               Cadastro de novo Tipo de Automóvel
            @endif
            </h1>
        </div>
    </div>

    @isset($tipoautomovel)
        <form method="post" action="{{route('tipoautomovel.update',$tipoautomovel->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('tipoautomovel.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações do Tipo de Automóvel
        </div>

        <div class="card-body">
            <div class="row">
        <!-- Primeira Coluna     -->
                <div class="col-12">
                    <div class="form-row">
                        <!-- nome -->
                        <div class="form-group col-md-6">
                            <label for="nome">{{ __('Nome') }}</label>
                            <input  id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ||  isset($tipoautomovel->nome) ? $tipoautomovel->nome : '' }}"  autocomplete="nome" placeholder="Ex: Camionete" autofocus>
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>


                    <div class="form-row">
                        <!-- Botão -->
                        @isset($tipoautomovel)
                            <button type="submit" class="btn btn-primary col-md-6">Editar Marca</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-6">Adicionar</button>
                        @endisset
                    </div>

                </div>
            </div>
        </div>

        </div>
    </div>
</form>
</div>
<style>
    .excluir:hover{
        filter: grayscale(1);
    }
    </style>

<!-- Imports do Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    // Função que coloca a mascara
    function maskTel(){

        const tel = $("#telefone");
        const val = tel.val().replace(/\D/g, '');
        const len = tel.val().replace(/\D/g, '').length;
        const c = 0;

        if( !isNaN(tel.val()) ){
            addMask(tel, val, len, c)
        }else{
            tel.val().replace(/[^0-9]/g,'');
            addMask(tel, val, len, c)
        }

    }
    function addMask(tel, val, len, c) {
        if(c == 0){
            c++;
            if( len == 1){
                ini = val.replace(/\D/g, '');
                tel.val('('+ini);
                addMask(tel, val, len, c)
            }else if(len == 2){
                ini = val.replace(/\D/g, '');
                tel.val('('+ini);
                addMask(tel, val, len, c)
            }else if(len > 2 && len < 7){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,7) ;
                tel.val('('+ini+')'+med);
                addMask(tel, val, len, c);
            }else if(len > 6  && len < 11){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,6) ;
                fim =  tel.val().replace(/\D/g, '').substring(6,10) ;
                tel.val('('+ini+')'+med+'-'+fim);
                addMask(tel, val, len, c)
            }else if(len == 11){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,7) ;
                fim =  tel.val().replace(/\D/g, '').substring(7,11) ;
                tel.val('('+ini+')'+med+'-'+fim);
                addMask(tel, val, len, c)
            }
        }
    }
    function addImage(){
        //Mostrando as imagens
        $('#imagens').change(function(){

            $(".ts").remove();
            const verifImg = $('.verifImg').length;
            let quantFile = $(this)[0].files.length;
            // console.log($(this)[0].files.length)
            let quantLinhas = verifImg/4;
            let j = (verifImg%4);
            let r=Math.trunc(quantLinhas);
            let todasImgs = [];
            let imgg = [];

            if(quantFile > 6){
                alert('Só iremos selecionar os seis primeiros arquivos!')
                quantFile=6;
            }

            for(let i=0 ; i < quantFile; i++){
                let t = i+verifImg;
                const file = $(this)[0].files[i];
                // imgg.push(file)
                const fileReader = new FileReader();

                // Modificando o html
                if(j ==0){
                    $("#visu"+t).removeClass();
                    $('#cards').append("<div id='r"+r+"' class='row '></div>");
                    $('#r'+r).append("<img id='visu"+t+"' class='rounded float-left ts'></img>");
                    $('#visu'+t).css({"width":"240px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                    j++;
                }else{
                    $("#visu"+t).removeClass();
                    $('#r0').append("<img id='visu"+t+"' class='rounded float-left ts'></img>");
                    $('#visu'+t).css({"width":"240px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                }

                fileReader.onloadend = function(){
                    let visu = '#visu'+t;
                    // let img = '#img'+t;
                    $(visu).attr('src',fileReader.result).css('display','block');
                // $('#imagens').val(todasImgs);
                    todasImgs.push(fileReader.result);
                }
                fileReader.readAsDataURL(file);
            }

            for (let index = 0; index < imgg.length; index++) {
                allImgs.unshift(imgg[index]);

            }
        });
    };

    $(document).ready(function(){

        // Corrigindo um erro que deu no HTML
        // console.log($("#desc").val().length)
        if( $("#desc").val() === '                                ' ){
            $("#desc").val('');
        };

    });
</script>
    @endsection

