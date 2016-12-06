@extends('layouts.app')

@section('meta')
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <meta charset='utf-8'>
@endsection

@section('title')
    <title> Rent a New Car </title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                container: 'body'
            }); 
        });
    </script>
@endsection

@section('content') 
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">              
                <div id='map' class="img-responsive" style="width:100%"></div>
                <script src="js/kodZaPrikazMape.js"></script>
            </div>
            <div class="col-md-5">
                    <form class="form-horizontal" role="form" style="margin-top:50px">
                        <div class="form-group" id="formFilter" style="margin:0 0 0 0">

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <h3>Filter Search:</h3>
                                </div>
                            </div>

                            <div class="row rowFilter" id="filter2" style="width:100%">
                                <label for="inputValue" class="col-md-4 control-label">Form Factor</label>
                                <div class="col-md-4">
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
                                <div class="col-md-2">
                                </div>
                            </div>

                            <div class="row rowFilter" id="filter3" style="width:100%">
                                <label for="inputValue" class="col-md-4 control-label">Transmission</label>
                                <div class="col-md-4">
                                    <select class="form-control 3">
                                        <option value="Any">        Any       </option>
                                        <option value="Manual">     Manual    </option>
                                        <option value="Automatic">  Automatic </option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            
                            <div class="row rowFilter" id="filter1" style="width:100%">
                                <label for="inputValue" class="col-md-4 control-label">Max $/h</label>
                                <div class="col-md-4">
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
                                    <select class="form-control 1" text="Priority">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row rowFilter" id="filter4" style="width:100%">
                                <label for="inputValue" class="col-md-4 control-label">Max Fuel Consumption</label>
                                <div class="col-md-4">
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
                            </div>
                            
                            <div class="row" style="width:100%">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" style="width:100%" onclick="filterData()">Search</button>
                                </div>
                            </div>
                
                        </div>
                    </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-2 hidden-xs"></div>
            <div class="col-md-8" id="ajaxFilterSearch"></div>
            <div class="col-md-2 hidden-xs"></div>
        </div>

    </div>
@endsection