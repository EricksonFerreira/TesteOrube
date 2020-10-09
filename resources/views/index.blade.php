@extends('layouts.app')

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

@section('content')
<!-- ErickMovel -->
<header class="masthead" style="background-color:#D7EAF2;">
  <div class="container h-100" >
    <div class="row h-100 align-items-center">
      <div class="col-lg-10 align-self-end">
        <h1 class="text-uppercase text-black font-weight-bold" style="font-size: 68.4px;">ErickMovel</h1>
        <hr class="divider my-4" />
    </div>
    <div class="col-lg-8 align-self-baseline">
        <h4 class="text-white-75 font-weight-light mb-5">Visualize os automóveis e suas marcas</h4>
    </div>
  </div>
</header>
<!-- Marca -->
<div class="container pt-5 my-5 z-depth-1">
  <section class="p-md-3 mx-md-5 text-lg-left">
    <h2 class="text-center font-weight-bold mb-4 pb-1">Marca dos Automóveis</h2>
    <p class="text-center lead mb-5 pb-2 text-muted">Só as melhores marcas do mercado!</p>
    <div class="row">
        @foreach($marcas as $marca)
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="row d-flex align-items-center">
                <div class="col-5 avatar w-100 white d-flex justify-content-center align-items-center">
                @php($explode = explode("/",$marca->imagem))
                    @if($explode[0] == 'public')
                        <img src="{{url('storage/'.$explode[1].'/'.$explode[2])}}" style="width:110px; height:110px" class="img-fluid rounded-circle z-depth-1 w-4" />
                    @else
                        <img src="{{url('marcas/'.$marca->imagem)}}" style="width:110px; height:110px" class="img-fluid rounded-circle z-depth-1" />
                    @endif
                </div>
                <div class="col-7">
                    <h6 class="font-weight-bold pt-2">{{$marca->nome}}</h6>
                    <!-- <p class="text-muted">
                    Software Engineer
                    </p> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </section>
</div>
<footer id="sticky-footer" class="py-4 text-white-50" style="background-color:#D7EAF2;">
    <div class="container text-center">
      <strong style="color:black">Copyright &copy; Erickson Ferreira</strong>
    </div>
  </footer>
<script>

        main = document.getElementById('main');
        main.classList.remove("py-4")
</script>
@endsection
