@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-10">
          <h2 class="sub-header">Add a new image for hotel ({{$hotel->name}})</h2>
          {!! Form::open(array('url' => 'image','files'=> true, 'data-toggle' => 'validator', 'role' => 'form')) !!}

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
			<input type="hidden" value="{{$hotel->id}}" name="hotel_id">
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

<script type="text/javascript">

	var next = 0;

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

	</script>

@endsection