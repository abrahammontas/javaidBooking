@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h2 class="sub-header">Edit image ({{$image->name}})</h2>
		<div class="col-lg-4">
          {!! Form::model($image, array('route' => array('image.update', $image->id),'method' => 'put',
          'data-toggle' => 'validator', 'role' => 'form','files'=> true)) !!}
			<div class="form-group">
				{!! Form::label('Name') !!}
				{!! Form::text('name', null,
                    array('class'=>'form-control', 'required',
                          'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				{!! Form::label('Description') !!}
				{!! Form::text('description', null,
                    array('class'=>'form-control', 'required',
                          'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
			</div>
			<input type="hidden" value="{{$image->hotel_id}}" name="hotel_id">
        		<button class="btn btn-primary btn-block" type="submit">Edit</button>
		  {!! Form::close() !!}
		</div>
		<div class="col-lg-4">
			<img src="{{ $image->src }}">
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

@endsection