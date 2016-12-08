@extends('layouts.app')

@section('title')
<title> Account </title>
@endsection

@section('style')
    <style>
        body { background-color: white; }
        a { color: black; }
        a:hover { text-decoration: none; font-weight: 900; }
    </style>

@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src="js/jquery.min.js"></script>
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
             <div class="col-md-12" style="height: 80px;">
                                 
             </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Number of Incidents</th>
                                    <th>Reputation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $lista = array("0" => "danger", "1" => "warning", "2" => "active", "3" => "success"); ?>
                                @foreach($users as $user)
                                    <tr class = "{{ $lista[$loop->index % 4] }}">
                                        <td> <a href="{{ url('/nalozi') }}"> {{ $loop->index + 1 }}                 </a></td>
                                        <td> <a href="{{ url('/nalozi') }}"> {{ $users[$loop->index]->name }}       </a></td>
                                        <td> <a href="{{ url('/nalozi') }}"> 3                                      </a></td>
                                        <td> <a href="{{ url('/nalozi') }}"> {{ $users[$loop->index]->reputation }} </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1">
                    
                    </div>
                    <div class="col-md-5">
                        <h2>
                            Naser Keljmendi - naserkeljmendi@live.com
                        </h2>
                        <p>
                            <a class="btn" href="#">View details »</a>
                        </p>
                        <a class="btn btn-primary btn-large" href="#">Suspend User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection