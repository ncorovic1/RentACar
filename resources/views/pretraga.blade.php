@extends('layouts.app')

@section('title')
    <title> Rent a New Car </title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">        
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.css' rel='stylesheet'/>
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js'></script>
    <script src="js/iznajmljivanje.js"></script>
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
            <div class="col-md-12" style="height:400px;background-color:blue;padding:0 0 0 0">
                <div id='map' class="img-responsive" style="height:400px;width:100%;margin:0 0 0 0"></div>
                <script src="js/kodZaPrikazMape.js"></script>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form class="form-horizontal" role="form">
                    <div class="form-group" id="formFilter">
                        <div class="row rowFilter" id="filter1">
                            <label for="inputType" class="col-md-1 control-label">Type</label>
                            <div class="col-md-3">
                                <select class="form-control" id="inputType" placeholder="Type" onchange="omoguci(0)">
                                    <option value="None">Select...</option>
                                    <option value="Color">Color</option>
                                    <option value="FormFactor">Form Factor</option>
                                </select>
                            </div>
                            <label for="inputValue" class="col-md-1 control-label">Value</label>
                            <div class="col-md-3">
                                <select class="form-control 0" id="inputValue" placeholder="Value" disabled>
                                    <option value="None">Select...</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Metallic Silver">Metallic Silver</option>
                                    <option value="Navy Blue">Navy Blue</option>
                                    <option value="Red">Red</option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-1 control-label">Priority</label>
                            <div class="col-md-3">
                                <select class="form-control 0" id="inputPriority" placeholder="Priority" disabled>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>         
                        <div class="row rowFilter" id="filter2" style="display:none">
                            <label for="inputType" class="col-md-1 control-label">Type</label>
                            <div class="col-md-3">
                                <select class="form-control" id="inputType" placeholder="Type" onchange="omoguci(1)">
                                    <option value="none"> </option>
                                    <option value="colour">Color</option>
                                    <option value="consume">Form Factor</option>
                                </select>
                            </div>
                            <label for="inputValue" class="col-md-1 control-label">Value</label>
                            <div class="col-md-3">
                                <select class="form-control 1" id="inputValue" placeholder="Value" disabled>
                                    <option value="None">Select...</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Metallic Silver">Metallic Silver</option>
                                    <option value="Navy Blue">Navy Blue</option>
                                    <option value="Red">Red</option>
                                </select>
                            </div>
                            <label for="inputPriority" class="col-md-1 control-label">Priority</label>
                            <div class="col-md-3">
                                <select class="form-control 1" id="inputPriority" placeholder="Priority" disabled>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-default" onclick="addField()">Add Filter</button>
                                <br><br><a href="{{ url('/searchResults') }}">
                                    <button type="button" class="btn btn-primary">Search</button>
                                </a>
                            </div>
                            <div class="col-md-4"> </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2 text-center">
                                
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if (isset($vehicles))
                        <?php $col = 1 ?>
                        @foreach ($vehicles as $vehicle)
                            @if ($col % 3 == 1)
                                <div class="row">
                            @endif
                            <div class="col-md-4">
                                <img src="{{ $vehicle->image1 }}" style="height:150px"><br>
                                <h4>
                                    <a href="javascript:;" title="<b>{{ $vehicle->manufacturer.' '.$vehicle->model }}</b>" data-html="true" data-toggle="popover" data-trigger="hover" data-placement="right" 
                                    data-content="<b>Form Factor:</b> {{ $vehicle->form_factor }}<br><b>Year of Production:</b> {{ $vehicle->production_year }}
                                    <br><b>Color:</b> {{ $vehicle->color }}"><b>{{ $vehicle->manufacturer . ' ' . $vehicle->model }}</b></a>
                                </h4>
                                <img src="http://icons.iconarchive.com/icons/icons8/ios7/128/Transport-Passenger-icon.png" style="height:16px">
                                {{ $vehicle->passengers }}
                                &nbsp;&nbsp;<img src="http://image.flaticon.com/icons/png/128/149/149399.png" style="height:16px">
                                {{ $vehicle->bags }}
                                &nbsp;&nbsp;<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/167220-200.png" style="height:17px">
                                {{ $vehicle->doors }}
                                @if ($vehicle->air_conditioning == 1)
                                    &nbsp;&nbsp;<img src="https://image.freepik.com/free-icon/car-air-conditioning_318-100220.jpg" style="height:16px">
                                @endif
                                <br><br><a href="{{ url('/searchResults') }}">
                                    <button type="button" class="btn btn-success">Rent</button>
                                </a> 
                            </div>
                            @if ($col % 3 == 0)
                                </div>
                            @endif
                            <?php $col += 1 ?>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-2"></div>
        </div>
    </div>
@endsection