@extends('layouts.app')
    <style>
.custom-file-input ~ .custom-file-label::after {
    content: "Procurar";
}
.custom-file-input ~ .custom-file-label::nbefore {
    content: "Alterar";
}
h11{
  color:red;
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
                @isset($marca)
                    Editando Marca: {{$marca->nome}}
                @else
                    Cadastro de nova Marca
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($marca)
               Editando Marca: {{$marca->nome}}
            @else
               Cadastro de nova Marca
            @endif
            </h1>
        </div>
    </div>

    @isset($marca)
        <form method="post" action="{{route('marca.update',$marca->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('marca.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Marca
        </div>

        <div class="card-body">
            <div class="row">
        <!-- Primeira Coluna     -->
                <div class="col-12">
                    <div class="form-row">
                        <!-- nome -->
                        <div class="form-group col-md-6">
                            <label for="nome">{{ __('Nome') }}</label>
                            <input  id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ||  isset($marca->nome) ? $marca->nome : '' }}" required autocomplete="nome" placeholder="Ex: Toyota" autofocus>
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- Imagens -->
                        <div class="form-group col-md-6 form-img">
                            <label for="img1" class="text-dark col-form-label text-md-center">{{ __('Imagem') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('imagem') is-invalid @enderror" accept="image/*" multiple id="imagem" name="imagem" value="{{ isset($marca->imagem) ? $marca->imagem : '' }}" lang="br" @empty($marca) onClick="addImage()" @endisset>
                                <label class="custom-file-label" for="imagem">Ache o arquivo</label>
                                <!-- <small id="passwordHelpBlock" class="form-text text-muted">
                                    Imagem de até 2MB
                                </small> -->
                                @error('imagem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Botão -->
                        @isset($marca)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Marca</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
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

