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
    <script src="js/suspendUser.js"></script>
@endsection

@section('content') 
    <div class="container-fluid">
		<div class="row">
            <div class="col-md-12">
                <h3 class="text-center">
                    Suspend User / Report Incident
                </h3>
            </div>
        </div>
         <div class="row">
             <div class="col-md-12" style="height:80px">
                                 
             </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Number of Incidents</th>
                                    <th>Reputation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $lista = array("0" => "danger", "1" => "warning", "2" => "active", "3" => "success"); ?>
                                @foreach ($users as $user)
                                    @if ($users[$loop->index]->reputation == 20.0)
                                        <tr class="{{ $lista[3] }}">
                                    @elseif ($users[$loop->index]->reputation >= 17.0)
                                        <tr class="{{ $lista[2] }}">
                                    @elseif ($users[$loop->index]->reputation >= 10.0)
                                        <tr class="{{ $lista[1] }}">
                                    @else
                                        <tr class="{{ $lista[0] }}">
                                    @endif
                                    @if ($users[$loop->index]->operator == 1)
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $users[$loop->index]->name }}</td>
                                        <td>{{ $users[$loop->index]->operator }}</td>
                                        <td>{{ $users[$loop->index]->status }}</td>
                                        <td>3</td>
                                        <td>{{ $users[$loop->index]->reputation }}</td>
                                    @else
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a href="javascript:void(0)" onclick="loadSuspendForm('{{ $users[$loop->index]->id }}', '{{ $users[$loop->index]->name }}', '{{ $users[$loop->index]->username }}')">{{ $users[$loop->index]->name }}</a></td>
                                        <td>{{ $users[$loop->index]->operator }}</td>
                                        <td>{{ $users[$loop->index]->status }}</td>
                                        <td>3</td>
                                        <td>{{ $users[$loop->index]->reputation }}</td>
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <div class="col-md-5">
                        <h2 id="nameSurnameUsername"></h2>
                        


                        <!-- FORM -->
                        <form id="suspendForm" class="form-horizontal" role="form" method="POST" action="{{ url('/reportIncident') }}" style="display:none">
                        {{ csrf_field() }}

                        <!--<input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">-->

                        <input type="hidden" id="userID" name="userID" value="">
                        
                        <div class="form-group">
                            <div class="col-md-5">
                                <select id="vehiclesRented" name="vehiclesRented" class="form-control" value="Default">
                                    <option value="" disabled selected>Select vehicle...</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-5">
                                <select id="typeOfIncident" class="form-control" name="typeOfIncident" value="Default">
                                    <option value="" disabled selected>Select incident type...</option>
                                    <option value="Crash - Guilty">Crash - Guilty</option>
                                    <option value="Crash - Not Guilty">Crash - Not Guilty</option>
                                    <option value="Car Damage">Car Damage</option>
                                    <option value="Car Failure">Car Failure</option>
                                    <option value="Low Fuel">Low Fuel</option>
                                    <option value="Return Overdue">Return Overdue</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="dateOfIncident" class="col-md-3 control-label">Date of incident:</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" step="3600" id="dateOfIncident" name="dateOfIncident">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div id="description" name="description" class="col-md-6">
                                <textarea id="description" name="description" rows="4" cols="50" class="form-control" placeholder="Description..."></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-5">
                                <input id="damage" name="damage" type="text" class="form-control" placeholder="Damage ($)">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Report Incident
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
@endsection