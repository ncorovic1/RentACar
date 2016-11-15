@extends('layouts.app')

@section('title')
    <title> My Rents </title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">        
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js'></script>       
@endsection

@section('content')       
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="height: 150px;">
                
            </div>
            <div class="col-md-6">
                <div id='map' class="img-responsive">
                
                </div>
                <script src="js/kodZaPrikazMape.js"> </script>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="carousel slide" id="carousel-974324">
                            <ol class="carousel-indicators">
                                <li class="active" data-slide-to="0" data-target="#carousel-974324">
                                </li>
                                <li data-slide-to="1" data-target="#carousel-974324">
                                </li>
                                <li data-slide-to="2" data-target="#carousel-974324">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img alt="Carousel Bootstrap First" src="http://images.car.bauercdn.com/upload/31671/images/05skodaoctaviatdireview.jpg" />
                                </div>
                                <div class="item">
                                    <img alt="Carousel Bootstrap Second" src="http://images.car.bauercdn.com/upload/31671/images/09skodaoctaviatdireview.jpg" />
                                </div>
                                <div class="item">
                                    <img alt="Carousel Bootstrap Third" src="http://images.car.bauercdn.com/upload/31671/images/15skodaoctaviatdireview.jpg" />
                                </div>
                            </div> <a class="left carousel-control" href="#carousel-974324" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-974324" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3 class="text-center">
                            Skoda Octavia (2016)
                        </h3> 
                        <span class="label label-success">Time taken:  11:30 (27.11.2016.)</span> 
                        <span class="label label-warning">Time return: 12.30 (29.11.2016.)</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="carousel slide" id="carousel-6593">
                            <ol class="carousel-indicators">
                                <li class="active" data-slide-to="0" data-target="#carousel-6593">
                                </li>
                                <li data-slide-to="1" data-target="#carousel-6593">
                                </li>
                                <li data-slide-to="2" data-target="#carousel-6593">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img alt="Carousel Bootstrap First" src="http://images.car.bauercdn.com/upload/30534/images/02vwgolfestatecarreview.jpg" />
                                </div>
                                <div class="item">
                                    <img alt="Carousel Bootstrap Second" src="http://images.car.bauercdn.com/upload/30534/images/05vwgolfestatecarreview.jpg" />
                                </div>
                                <div class="item">
                                    <img alt="Carousel Bootstrap Third" src="http://images.car.bauercdn.com/upload/30534/images/11vwgolfestatecarreview.jpg" />
                                </div>
                            </div> 
                            <a class="left carousel-control" href="#carousel-6593" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
                            <a class="right carousel-control" href="#carousel-6593" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3 class="text-center">
                            VW Golf Estate 1.4 TSI (2013)
                        </h3> 
                        <span class="label label-success">Time taken:  11:30 (27.11.2016.)</span> 
                        <span class="label label-warning">Time return: 12.30 (29.11.2016.)</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
@endsection
