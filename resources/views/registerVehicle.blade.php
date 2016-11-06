@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Vehicle</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registerVehicle') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('manufacturer') ? ' has-error' : '' }}">
                            <label for="manufacturer" class="col-md-4 control-label">Manufacturer</label>

                            <div class="col-md-6">
                                <input id="manufacturer" type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}" required autofocus>

                                @if ($errors->has('manufacturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                            <label for="model" class="col-md-4 control-label">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('production_year') ? ' has-error' : '' }}">
                            <label for="production_year" class="col-md-4 control-label">Production Year</label>

                            <div class="col-md-6">
                                <input id="production_year" type="text" class="form-control" name="production_year" value="{{ old('production_year') }}" required autofocus>

                                @if ($errors->has('production_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('production_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Color</label>
                            
                            <div class="col-md-6">
                                <select id="color" class="form-control" name="color" value="White" required >
                                    <option value="White">  White  </option>
                                    <option value="Black">  Black  </option>
                                    <option value="Blue">   Blue   </option>
                                    <option value="Red">    Red    </option>
                                    <option value="Yellow"> Yellow </option>
                                    <option value="Green">  Green  </option>
                                    <option value="Gray">   Gray   </option>
                                    <option value="Brown">  Brown  </option>
                                    <option value="Purple"> Purple </option>
                                    <option value="Rose">   Rose   </option>
                                    <option value="Orange"> Orange </option>                                    
                                </select>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('form_factor') ? ' has-error' : '' }}">
                            <label for="form_factor" class="col-md-4 control-label">Form Factor</label>
                            
                            <div class="col-md-6">
                                <select id="form_factor" class="form-control" name="form_factor" value="Economy" required >
                                    <option value="Economy">   Economy   </option>
                                    <option value="Compact">   Compact   </option>
                                    <option value="Standard">  Standard  </option>
                                    <option value="Full Size"> Full Size </option>
                                    <option value="SUV">       SUV       </option>
                                    <option value="Luxury">    Luxury    </option>
                                    <option value="Mini Van">  Mini Van  </option>
                                </select>

                                @if ($errors->has('form_factor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('form_factor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('automatic') ? ' has-error' : '' }}">
                            <label for="automatic" class="col-md-4 control-label">Automatic</label>

                            <div class="col-md-6">
                                <input id="automatic" type="checkbox" class="form-control" name="automatic" style="box-shadow: none;">

                                @if ($errors->has('automatic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('automatic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('air_conditioning') ? ' has-error' : '' }}">
                            <label for="air_conditioning" class="col-md-4 control-label">Air Conditioning</label>

                            <div class="col-md-6">
                                <input id="air_conditioning" type="checkbox" class="form-control" name="air_conditioning" style="box-shadow: none;">

                                @if ($errors->has('air_conditioning'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('air_conditioning') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('passengers') ? ' has-error' : '' }}">
                            <label for="passengers" class="col-md-4 control-label">Passengers</label>
                            
                            <div class="col-md-6">
                                <select id="passengers" class="form-control" name="passengers" value="2" required >
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                    <option value="6"> 6 </option>
                                    <option value="7"> 7 </option>
                                    <option value="8"> 8 </option>
                                </select>

                                @if ($errors->has('passengers'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passengers') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('bags') ? ' has-error' : '' }}">
                            <label for="bags" class="col-md-4 control-label">Bags</label>
                            
                            <div class="col-md-6">
                                <select id="bags" class="form-control" name="bags" value="2" required >
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                </select>

                                @if ($errors->has('bags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('doors') ? ' has-error' : '' }}">
                            <label for="doors" class="col-md-4 control-label">Doors</label>
                            
                            <div class="col-md-6">
                                <select id="doors" class="form-control" name="doors" value="2" required >
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                </select>

                                @if ($errors->has('doors'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doors') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('current_parking_lot') ? ' has-error' : '' }}">
                            <label for="current_parking_lot" class="col-md-4 control-label">Parking Lot</label>

                            <div class="col-md-6">
                                <input id="current_parking_lot" type="text" class="form-control" name="current_parking_lot" value="{{ old('current_parking_lot') }}" required autofocus>

                                @if ($errors->has('current_parking_lot'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_parking_lot') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
                            <label for="image1" class="col-md-4 control-label">Image[1]</label>

                            <div class="col-md-6">
                                <input id="image1" type="text" class="form-control" name="image1" value="{{ old('image1') }}" required autofocus>

                                @if ($errors->has('image1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
                            <label for="image2" class="col-md-4 control-label">Image[2]</label>

                            <div class="col-md-6">
                                <input id="image2" type="text" class="form-control" name="image2" value="{{ old('image2') }}" required autofocus>

                                @if ($errors->has('image2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
                            <label for="image3" class="col-md-4 control-label">Image[3]</label>

                            <div class="col-md-6">
                                <input id="image3" type="text" class="form-control" name="image3" value="{{ old('image3') }}" required autofocus>

                                @if ($errors->has('image3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register Vehicle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
