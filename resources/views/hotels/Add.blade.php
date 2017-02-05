@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Add a new hotel</h2>
          {!! Form::open(array('url' => 'hotel', 'files'=> true, 'data-toggle' => 'validator', 'role' => 'form')) !!}
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
				<h3 class="sub-header">Images</h3>
			<div class="images" id="images">
				<div class="row form-group">
					<div class="col-lg-6 col-md-6">
						{!! Form::label('Image') !!}
						<input type="file" name="images[0][]" multiple class="form-control" accept="image/*"
							   data-error="Please fill out this field." required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						{!! Form::label('Name') !!}
						{!! Form::text('data[0][]', null,
							array('class'=>'form-control', 'required',
								  'data-error' =>'Please fill out this field.')) !!}
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('Description') !!}
					{!! Form::textarea('data[0][]', null,
						array('class'=>'form-control', 'required',
							  'data-error' =>'Please fill out this field.')) !!}
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-4 col-md-4">
					<button id="addImage" class="btn add-more" type="button">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
					<small>Press + to add another image</small>
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

	var next = 0;

	$(document).ready(function() {

		$(function () {
			$('#check_in').timepicker({ 'timeFormat': 'H:i:s' });
			$('#check_out').timepicker({ 'timeFormat': 'H:i:s' });
			$('#early_check_in').timepicker({ 'timeFormat': 'H:i:s' });
			$('#late_check_in').timepicker({ 'timeFormat': 'H:i:s' });
		});
	});

	$(".add-more").click(function(e){
		e.preventDefault();
		next = next + 1;
		var newImage = '' +
			'<div id="image-group-'+next+'">' +
				'<button class="btn btn-danger remove-me" data-target="image-group-'+next+'">-</button>'+
				'<div class="row form-group has-error has-danger">'+
					'<div class="col-lg-6 col-md-6">'+
						'<label for="image[]">Image</label>'+
						'<input type="file" name=images['+next+'][] class="form-control" multiple accept="image/*" data-error="Please fill out this field." required="">'+
							'<div class="help-block with-errors"></div>'+
					'</div>'+
					'<div class="col-lg-6 col-md-6">'+
						'<label for="name">Name</label>'+
						'<input class="form-control" required="required" data-error="Please fill out this field." name=data['+next+'][] type="text">'+
							'<div class="help-block with-errors"></div>'+
					'</div>'+
				'</div>'+
				'<div class="form-group">'+
					'<label for="description">Description</label>'+
					'<textarea class="form-control" required="required" data-error="Please fill out this field." name=data['+next+'][] cols="50" rows="10"></textarea>'+
					'<div class="help-block with-errors"></div>'+
				'</div>' +
			'</div>';

		$('#images').append(newImage);
		$('form').validator('update');

		$('.remove-me').click(function(e){
			e.preventDefault();
			$("#"+$(this).attr('data-target')).remove()
			$('form').validator('update');
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