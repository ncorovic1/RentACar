@extends('layouts.app')

@section('title')
    <title> {{ Auth::user()->name }} </title>
@endsection

@section('style')
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container-fluid">
        
        <!--<div class="row">
            <div class="col-md-12">
                <h3 class="text-center">
                    RENT-A-CAR
                </h3>
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-12" style="height:100px">

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2">
                <a href="{{ url('/register') }}">
                    <img alt="PicRenting" src="images/dodavanjeNaloga.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Register User
                    </h3>
                </a>
            </div>
            <div class="col-md-1">
                
            </div>
            <div class="col-md-2">
                <a href="{{ url('/accounts') }}">
                    <img alt="PicRenting" src="images/editovanjeNaloga.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Suspend User
                    </h3>
                </a>
            </div>
            <div class="col-md-1">
                
            </div>
            <div class="col-md-2">
                <a href="{{ url('/registerVehicle') }}">
                    <img alt="PicRenting" src="images/carRegistration.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Register Vehicle
                    </h3>
                </a>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="height: 100px;">

            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-2">
                <a href="{{ url('/purchaseVehicle') }}">
                    <img alt="PicRenting" src="images/carsBrowse.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Purchase Vehicle
                    </h3>
                </a>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2">
                <a href="{{ url('/companyVehicles') }}">
                    <img alt="PicRenting" src="images/pregledAutomobilaFirme.png" class="img-responsive img-rounded" />
                    <h3 class="text-center">
                        Browse Company Vehicles
                    </h3>
                </a>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
@endsection
