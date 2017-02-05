@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Add a new hotel</h2>
          {!! Form::open(array('url' => 'state', 'data-toggle' => 'validator', 'role' => 'form')) !!}
          	<div class="form-group">
			    {!! Form::label('Name') !!}
			    {!! Form::text('name', null,
			        array('class'=>'form-control',
			              'placeholder'=>'Madrid', 'required',
			              'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
		</div>
            <div class="form-group">
                {!! Form::label('Country') !!}
				<select name="city_id"> 
					@foreach($cities as $c)
						<option value="{{$c->id}}">{{$c->name}}</option> 
					@endforeach 
				</select>
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

@endsection