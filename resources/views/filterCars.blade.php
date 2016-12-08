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
            <br><br>Current Parking Lot: {{ $vehicle->current_parking_lot }}
            <br><br>
<!-- MAP  -->            
            <a href="javascript:void(0)">
                <button type="button" class="btn btn-default" onclick="loadParkingLots({{ $vehicle->current_parking_lot }})">Map</button>
            </a>
<!-- RENT -->            
            <a href="javascript:void(0)">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$vehicle->id}}">Rent</button>
                <div class="modal fade" id="myModal{{$vehicle->id}}" role="dialog">
                    <div class="modal-dialog" style="width: 380px;">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Renting Confirmation</h4>
                        </div>
                        <div class="modal-body" style="width: 90%; margin-left: auto; margin-right: auto;">
                            <form style="width: 100%; margin-left: auto; margin-right: auto; text-align: center;">
                                <label for="d{{ $vehicle->id }}" style="width: 40px;">From:</label>
                                <input type="datetime-local" step="3600" id="d{{ $vehicle->id }}" onchange="validateRI({{ $vehicle->id }})" onblur="validateRI({{ $vehicle->id }})">
                                <br><br>
                                <label for="d{{ $vehicle->id + 1000 }}" style="width: 40px;">To:</label>
                                <input type="datetime-local" step="3600" id="d{{ $vehicle->id + 1000}}" onchange="validateRI({{ $vehicle->id }})" onblur="validateRI({{ $vehicle->id }})">
                                <br><br>
                                <button type="button" style="width: 90%" id="butt{{ $vehicle->id }}" onclick="rentInformation({{ $vehicle->price_per_hour }}, {{ $vehicle->id }})" class="btn btn-primary disabled">Rent information</button><br><br>
                                <p id="rentInformation{{ $vehicle->id }}"></p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default disabled" onclick="completeRent({{ Auth::user()->id }}, {{ $vehicle->id }})" id="proc{{ $vehicle->id }}">Proceed</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                </div>
            </a> 
            
        </div>
        @if ($col % 3 == 0)
            </div>
        @endif
        <?php $col += 1 ?>
    @endforeach
@endif
