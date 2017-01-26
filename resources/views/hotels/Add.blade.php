@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Add a new hotel</h2>
          {!! Form::open(array('url' => 'hotel')) !!}
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Name') !!}
					{!! Form::text('name', null,
						array('class'=>'form-control',
							  'placeholder'=>'Viva Wyndham Resort Samana')) !!}
				</div>
				<div class="ol-lg-6 col-md-6">
					{!! Form::label('Address') !!}
					{!! Form::text('address', null,
						array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('City/Town') !!}
					<select name="city_id" id="city_id"> 
						@foreach($cities as $c)
							<option value="{{$c->id}}">{{$c->name}}</option> 
						@endforeach
					</select>
				</div>
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Zip Code / Post Code') !!}
					{!! Form::text('zip_code', null,
                        array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('State') !!}
					<select name="state_id" id="state_id"> 
						@foreach($states as $s)
							<option value="{{$s->id}}">{{$s->name}}</option> 
						@endforeach
					</select>
				</div>
				<div class="ol-lg-6 col-md-6">
					{!! Form::label('Star rating') !!}
					<div class="stars stars-rating">
						<select id="example-bootstrap" name="rating">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Email') !!}
					{!! Form::email('email', null,
                        array('class'=>'form-control')) !!}
				</div>
				<div class="ol-lg-6 col-md-6">
					{!! Form::label('Phone') !!}
					{!! Form::text('phone', null,
                        array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Check-in') !!}
				</div>
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Check-out') !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::text('check_in', null, array('id' => 'check_in'),
						array('class'=>'form-control')) !!}
				</div>
				<div class="col-lg-6 col-md-6">
					{!! Form::text('check_out', null, array('id' => 'check_out'),
						array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Early check-in') !!}
				</div>
				<div class="col-lg-6 col-md-6">
					{!! Form::label('Late check-in') !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 col-md-6">
					{!! Form::text('early_check_in', null, array('id' => 'early_check_in'),
                        array('class'=>'form-control')) !!}
				</div>
				<div class="col-lg-6 col-md-6">
					{!! Form::text('late_check_in', null, array('id' => 'late_check_in'),
                        array('class'=>'form-control')) !!}
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-12 col-md-12">
					{!! Form::label('Hotel description') !!}
					{!! Form::textarea('description', null,
                        array('class'=>'form-control')) !!}
				</div>
			</div>
        		<button class="btn btn-primary btn-block" type="submit">Add</button>
		  {!! Form::close() !!}
			<br>
		</div>			
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
		    @if (count($errors) > 0)
				<div class="alert alert-danger">
						<ul>
			    		@foreach($errors->all() as $error)
				     	   <li>{{ $error }}</li>
			    		@endforeach
			    	</ul>
			    </div>
			@endif
		</div>	

</div>


	<script src="/js/jquery.barrating.js"></script>
	<script src="/js/barrating.js"></script>
	<script src="/js/jquery.timepicker.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(function () {
			$('#check_in').timepicker({ 'timeFormat': 'H:i:s' });
			$('#check_out').timepicker({ 'timeFormat': 'H:i:s' });
			$('#early_check_in').timepicker({ 'timeFormat': 'H:i:s' });
			$('#late_check_in').timepicker({ 'timeFormat': 'H:i:s' });
		});
	});

	$("#city_id").change(function(e){
		var date = $("#city_id").val();
		$('#state_id')
				.find('option')
				.remove()
				.end();

		$.ajax({
					type: "GET",
					url: "/statesOfCity/" + date
				})
				.done(function (data) {
					console.log(data);
					$.each(data, function(k, v) {
						$('#state_id').append($('<option>').text(v.name).attr('value', v.id));
					});
				});
	});
</script>

@endsection