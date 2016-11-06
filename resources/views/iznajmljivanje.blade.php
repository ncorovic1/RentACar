@extends('layouts.app')

@section('title')
<title> Renting </title>
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
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js'></script>
    <script src="js/iznajmljivanje.js"></script>
@endsection

@section('content') 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">
                    RENT - A - CAR
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="height: 150px;">
                
            </div>
            <div class="col-md-6 ">
                <div id='map' class="img-responsive ">
                
                </div>
                <script src="js/kodZaPrikazMape.js"> </script>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" role="form">
                    <div class="form-group" id="formFilter">
                        <div class="row rowFilter" id="filter1">
                            <label for="inputType" class="col-md-1 control-label">Type</label>
                            <div class="col-md-3">
                                <select class="form-control" id="inputType" placeholder="Type" onchange="omoguci(0)">
                                    <option value="none">..select..</option>
                                    <option value="colour">Colour</option>
                                    <option value="consume">Consume Max</option>
                                </select>
                            </div>
                            <label for="inputValue" class="col-md-1 control-label">Value</label>
                            <div class="col-md-3">
                                <select class="form-control 0" id="inputValue" placeholder="Value" disabled>
                                    <option value="volvo">Volvo</option>
                                    <option value="vol">Vol</option>
                                    <option value="volvo">Volvo</option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-1 control-label">Priority</label>
                            <div class="col-md-3">
                                <select class="form-control 0" id="inputPriority" placeholder="Priority" disabled>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row rowFilter" id="filter2" style="display: none;">
                            <label for="inputType" class="col-md-1 control-label">Type</label>
                            <div class="col-md-3">
                                <select class="form-control" id="inputType" placeholder="Type" onchange="omoguci(1)">
                                    <option value="none"> </option>
                                    <option value="colour">Colour</option>
                                    <option value="consume">Consume Max</option>
                                </select>
                            </div>
                            <label for="inputValue" class="col-md-1 control-label">Value</label>
                            <div class="col-md-3">
                                <select class="form-control 1" id="inputValue" placeholder="Value" disabled>
                                    <option value="volvo">Volvo</option>
                                    <option value="vol">Vol</option>
                                    <option value="volvo">Volvo</option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-1 control-label">Priority</label>
                            <div class="col-md-3">
                                <select class="form-control 1" id="inputPriority" placeholder="Priority" disabled>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-info" style="width: 100%;" onclick="addField()">Dodaj novi filter</button> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-2 text-center">
                                <button type="button" class="btn btn-primary">Pretrazi</button> 
                            </div>
                            <div class="col-md-5">
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>
    </div>
@endsection