@extends('layouts.app')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Edit city '{{$city->name}}'</h2>
          {!! Form::model($city, array('route' => array('city.update', $city->id),'method' => 'put',
          'data-toggle' => 'validator', 'role' => 'form')) !!}
			<div class="form-group">
				{!! Form::label('Name') !!}
				{!! Form::text('name', null,
                    array('class'=>'form-control',
                          'placeholder'=>'Spain', 'required',
			              'data-error' =>'Please fill out this field.')) !!}
				<div class="help-block with-errors"></div>
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