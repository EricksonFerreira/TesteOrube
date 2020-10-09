@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <!-- Card -->
        <div class="card col-4">
            <div class="view overlay">
                <a href="{{route('automovel.index')}}">
                    <img class="card-img-top" style="background-color:#333333; height:260.72px" src="{{asset('img-1.png')}}"
                    alt="Card image cap">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body" >
                <h4 class="card-title">Automóveis</h4>
                <p class="card-text">Visualizar todos os automóveis cadastrados.</p><br>
                <a href="{{route('automovel.index')}}" class="black-text d-flex justify-content-end">
                    <h5>Ver mais<i class="fas fa-angle-double-right"></i></h5>
                </a>
            </div>
        </div>
    <!-- Card -->
        <div class="card col-4">
            <div class="">
                <a href="{{route('tipoautomovel.index')}}">
                    <img class="card-img-top" src="{{asset('img-2.jpg')}}"
                    alt="Card image cap">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body">
                <h4 class="card-title">Tipos de Automóveis</h4>
                <p class="card-text">Visualizar todos os tipos de automóveis cadastrados</p>
                <a href="{{route('tipoautomovel.index')}}" class="black-text d-flex justify-content-end">
                    <h5>Ver mais<i class="fas fa-angle-double-right"></i></h5>
                </a>
            </div>
        </div>
    <!-- Card -->
        <div class="card col-4 ">
            <div class="view overlay">
                <a href="{{route('marca.index')}}">
                    <img class="card-img-top" style=" height:260.72px" src="{{asset('img-3.jpg')}}"
                    alt="Card image cap">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body">
                <h4 class="card-title">Marcas de Automóveis</h4>
                <p class="card-text">Visualizar todas as marcas de automóveis cadastradas.</p>
                <a href="{{route('marca.index')}}" class="black-text d-flex justify-content-end">
                    <h5>Ver mais<i class="fas fa-angle-double-right"></i></h5>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
