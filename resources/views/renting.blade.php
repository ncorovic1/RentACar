@extends('layouts.app')

@section('title')
    <title> Rent a New Car </title>
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
    <script src="js/ajaxRenting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection

@section('content') 
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3" style="height:200px"></div>
            <div class="col-md-6">
                <div id='map' class="img-responsive" style="height:300px"></div>
                <script src="js/kodZaPrikazMape.js"></script>
            </div>
            <div class="col-md-3"></div>
        </div>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form class="form-horizontal" role="form">
                    <div class="form-group" id="formFilter">
                        <!-- FILTER 1 -->
                        <div class="row rowFilter" id="filter1">
                            <div class="col-md-2"> </div>
                            <label for="inputValue" class="col-md-2 control-label">Max Price Per Hour</label>
                            <div class="col-md-2">
                                <select class="form-control 1">
                                    <option value="Any"> Any </option>
                                    <option value="30">   30 </option>
                                    <option value="50">   50 </option>
                                    <option value="80">   80 </option>
                                    <option value="100"> 100 </option>
                                    <option value="150"> 150 </option>
                                    <option value="200"> 200 </option>
                                    <option value="250"> 250 </option>
                                    <option value="300"> 300 </option>
                                    <option value="250"> 350 </option>
                                    <option value="300"> 400 </option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-2 control-label">Priority</label>
                            <div class="col-md-2">
                                <select class="form-control 1">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                        <!-- FILTER 2 -->
                        <div class="row rowFilter" id="filter2">
                            <div class="col-md-2"> </div>
                            <label for="inputValue" class="col-md-2 control-label">Form Factor</label>
                            <div class="col-md-2">
                                <select class="form-control 2">
                                    <option value="Any">       Any       </option>
                                    <option value="Economy">   Economy   </option>
                                    <option value="Compact">   Compact   </option>
                                    <option value="Standard">  Standard  </option>
                                    <option value="Full Size"> Full Size </option>
                                    <option value="SUV">       SUV       </option>
                                    <option value="Luxury">    Luxury    </option>
                                    <option value="Mini Van">  Mini Van  </option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-2 control-label">Priority</label>
                            <div class="col-md-2">
                                <select class="form-control 2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                         <!-- FILTER 3 -->
                        <div class="row rowFilter" id="filter3">
                            <div class="col-md-2"> </div>
                            <label for="inputValue" class="col-md-2 control-label">Transmission</label>
                            <div class="col-md-2">
                                <select class="form-control 3">
                                    <option value="Any">        Any       </option>
                                    <option value="Manual">     Manual    </option>
                                    <option value="Automatic">  Automatic </option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-2 control-label">Priority</label>
                            <div class="col-md-2">
                                <select class="form-control 3">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                        <!-- FILTER 4 -->
                        <div class="row rowFilter" id="filter4">
                            <div class="col-md-2"> </div>
                            <label for="inputValue" class="col-md-2 control-label">Max Fuel Consume</label>
                            <div class="col-md-2">
                                <select class="form-control 4">
                                    <option value="Any"> Any </option>
                                    <option value="5">    5  </option>
                                    <option value="7">    7  </option>
                                    <option value="10">  10  </option>
                                    <option value="12">  12  </option>
                                    <option value="15">  15  </option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-2 control-label">Priority</label>
                            <div class="col-md-2">
                                <select class="form-control 4">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7"> </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary" style="width: 100%;" onclick = 'filterData()'>Search</button>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2 text-center"></div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="ajaxFilterSearch">
                    <!--@include ('filterCars');-->
                </div>
                <div class="col-md-2"></div>
        </div>
    </div>
@endsection