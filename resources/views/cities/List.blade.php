@extends('layouts.app')

@section('content')

  <div class="col-sm-12 col-md-12 main">
          <h2 class="sub-header">Cities list</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($message)){echo $message;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cities as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection