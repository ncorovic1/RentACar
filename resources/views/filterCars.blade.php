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
            <br><br>Current Parking Lot: {{ $vehicle->current_parking_lot }}
            @if ($vehicle->air_conditioning == 1)
                &nbsp;&nbsp;<img src="https://image.freepik.com/free-icon/car-air-conditioning_318-100220.jpg" style="height:16px">
            @endif
            <br><br>
            <a href="javascript:void(0)">
                <button type="button" class="btn btn-default" onclick="loadParkingLots({{ $vehicle->current_parking_lot }})">Map</button>
            </a>
            <a href="javascript:void(0)">
                <button type="button" class="btn btn-success">Rent</button>
            </a> 
        </div>
        @if ($col % 3 == 0)
            </div>
        @endif
        <?php $col += 1 ?>
    @endforeach
@endif
