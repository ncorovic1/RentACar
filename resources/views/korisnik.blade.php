@extends('layouts.app')

@section('title')
<title> {{ Auth::user()->name }} </title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">        
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')   
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12" style="height:150px"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="{{ route('renting') }}">
                    <img alt="PicRenting" src="images/iznajmljivanje.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Rent a New Car
                    </h3>
                </a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="{{ route('pregled') }}">
                    <img alt="Image Preview" src="images/pregled.png" class=" img-responsive img-rounded" />
                    <h3 class="text-center">
                        My Cars
                    </h3>
                </a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
