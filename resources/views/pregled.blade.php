@extends('layouts.app')

@section('title')
    <title> My Rents </title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">        
    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
    <script src="js/ajaxRenting.js"></script>
    <script src="js/jquery.min.js"></script>
@endsection

@section('content')     
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="height:150px"></div>
            <div class="col-md-6">
                <div id='map' class="img-responsive" style="height:300px;width:100%;margin:0 0 0 0"></div>
                <script src="js/kodZaPrikazMape.js"></script>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @foreach($vehicles as $index => $v)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="carousel slide" id="carousel-{{ $v->id }}">
                                <ol class="carousel-indicators">
                                    <li class="active" data-slide-to="0" data-target="#carousel-{{ $v->id }}">
                                    </li>
                                    <li data-slide-to="1" data-target="#carousel-{{ $v->id }}">
                                    </li>
                                    <li data-slide-to="2" data-target="#carousel-{{ $v->id }}">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="Carousel Bootstrap First" src="{{ $v->image1 }}" />
                                    </div>
                                    <div class="item">
                                        <img alt="Carousel Bootstrap Second" src="{{ $v->image2 }}" />
                                    </div>
                                    <div class="item">
                                        <img alt="Carousel Bootstrap Third" src="{{ $v->image3 }}" />
                                    </div>
                                </div> <a class="left carousel-control" href="#carousel-{{ $v->id }}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-{{ $v->id }}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h3 class="text-center">
                                {{ $v->manufacturer }} <br>
                                {{ $v->model }} ({{ $v->production_year }})
                            </h3> 
                            <!-- Ove podatke izvuci iz reservations! -->
                            <span class="label label-success">
                                Time available:  {{ str_limit($reservations[$index]->rent_date, 16, $end = '') }}   
                            </span> 
                            <span class="label label-warning">
                                Time return: {{ str_limit($reservations[$index]->expire_date,   16, $end = '') }} 
                            </span>
                            <br><br><a href="javascript:void(0)">
                                <button type="button" class="btn btn-default" onclick="loadParkingLots({{ $v->current_parking_lot }})">Map</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
