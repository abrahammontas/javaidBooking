@extends('layouts.app')

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Edit Hotel '{{$hotel->name}}'</h2>
          {!! Form::model($hotel, array('route' => array('hotel.update', $hotel->id),'method' => 'put',
          'data-toggle' => 'validator', 'role' => 'form')) !!}
		<div class="row form-group">
			<div class="col-lg-6 col-md-6">
				{!! Form::label('Name') !!}
				{!! Form::text('name', null,
                    array('class'=>'form-control',
                          'placeholder'=>'Viva Wyndham Resort Samana', 'required',
                      'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
			</div>
			<div class="ol-lg-6 col-md-6">
				{!! Form::label('Address') !!}
				{!! Form::text('address', null,
                    array('class'=>'form-control', 'require',
                      'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
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
				{!! Form::number('zip_code', null,
                    array('class'=>'form-control', 'required',
                      'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
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
                    array('class'=>'form-control', 'required',
                      'data-error' =>'That email address is invalid.')) !!}
				<div class="help-block with-errors"></div>
			</div>
			<div class="ol-lg-6 col-md-6">
				{!! Form::label('Phone') !!}
				{!! Form::tel('phone', null,
                    array('class'=>'form-control', 'required',
                      'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
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
                    array('class'=>'form-control', 'required',
                      'data-error' =>'That email address is invalid.')) !!}
				<div class="help-block with-errors"></div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 main">
			<h2 class="sub-header">Images</h2>
			<a href="{{url('image/create/'.$hotel->id)}}" class='btn btn-primary'> Add an image </a>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Name</th>
						<th>Description</th>
					</tr>
					</thead>
					<tbody>
					@foreach($images as $i)
						<tr>
							<td>{{ $i->id }}</td>
							<td>
								<img src="{{ $i->src }}" height="50px">
							</td>
							<td>{{ $i->name }}</td>
							<td>{{ $i->description }}</td>
							<td>
							<td>
								<div class="btn-group" role="group" aria-label="...">
									<a href="{{url('image/'.$i->id.'/edit')}}" class='btn btn-primary'> Edit </a>
									<input type="button" data-id="{{$i->id}}" class="delete-image btn btn-danger" value="Delete">
								</div>
							</td>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

        		<button class="btn btn-primary btn-block" type="submit">Edit</button>
		  {!! Form::close() !!}
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
					url: "statesOfCity/" + date
				})
				.done(function (data) {
					$.each(data, function(k, v) {
						$('#state_id').append($('<option>').text(v).attr('value', v));
					});
				});
	});
<
	$(".delete-image").click(function(e){
		var id = $(this).attr('data-id');

		$.ajax({
					type: "DELETE",
					url: "/image/" + id,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				})
				.done(function (data) {
					console.log(data);
				});
	});
</script>

@endsection