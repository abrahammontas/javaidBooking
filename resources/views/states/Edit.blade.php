@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Edit State ({{$state->name}})</h2>
          {!! Form::model($state, array('route' => array('state.update', $state->id),'method' => 'put')) !!}
			<div class="form-group">
				{!! Form::label('Name') !!}
				{!! Form::text('name', null,
                    array('class'=>'form-control',
                          'placeholder'=>'Madrid')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Country') !!}
				<select name="city_id"> 
					@foreach($cities as $c)
						<option value="{{$c->id}}">{{$c->name}}</option> 
					@endforeach
				</select>
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

@endsection