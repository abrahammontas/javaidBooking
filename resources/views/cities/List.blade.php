@extends('layouts.app')

@section('content')

  <div class="col-sm-12 col-md-12 main">
          <h2 class="sub-header">Cities list</h2>
      @if (session('message'))
          <div class="{{ session('class') }}">
              {{ session('message') }}
          </div>
      @endif
      <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Optons</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cities as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->name }}</td>
                  <td>
                      <a href="{{url('city/'.$c->id.'/edit')}}" class='btn btn-primary'> Edit </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection