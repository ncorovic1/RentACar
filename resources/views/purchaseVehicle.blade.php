@extends('layouts.app')

@section('meta')
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <meta charset='utf-8'>
@endsection

@section('title')
    <title> Purchase a New Car </title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src="js/ajaxRenting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
            <div class="col-md-2 hidden-xs"></div>
            <div class="col-md-8" id="ajaxFilterSearch">
                @if (isset($vehicles))
                    <?php $col = 1 ?>
                    @foreach ($vehicles as $vehicle)
                        @if ($col % 3 == 1)
                            <div class="row">
                        @endif
                        <div class="col-md-4">
                            <img src="{{ $vehicle->image1 }}" style="height:150px"><br>
                            <h4>
                                <a href="javascript:void(0)" title="<b>{{ $vehicle->manufacturer.' '.$vehicle->model }}</b>" data-html="true" data-toggle="popover" data-trigger="hover" data-placement="right" 
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
                            <br><br>            
                        </div>
                        @if ($col % 3 == 0)
                            </div>
                        @endif
                        <?php $col += 1 ?>
                    @endforeach
                @endif
            </div>
            <div class="col-md-2 hidden-xs"></div>
        </div>
    </div>
@endsection