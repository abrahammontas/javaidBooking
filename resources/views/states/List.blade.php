@extends('layouts.app')

@section('content')

  <div class="col-sm-12 col-md-12 main">
          <h2 class="sub-header">States list</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($message)){echo $message;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach($states as $s)
                <tr>
                  <td>{{ $s->id }}</td>
                  <td>{{ $s->name }}</td>
                  <td>{{ $s->City->name }}</td>
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('state.destroy', $s->id))) !!}
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="{{url('state/'.$s->id.'/edit')}}" class='btn btn-primary'> Edit </a>
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection