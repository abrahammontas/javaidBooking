@extends('layouts.app')

@section('content')

  <div class="col-sm-12 col-md-12 main">
          <h2 class="sub-header">Hotels list</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($message)){echo $message;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City / Town</th>
                    <th>Zip code / Post Code</th>
                    <th>State</th>
                    <th>Star Rating</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hotels as $h)
                <tr>
                    <td>{{ $h->id }}</td>
                    <td>{{ $h->name }}
                    <td>{{ $h->address }}</td>
                    <td>{{ $h->City->name }}</td>
                    <td>{{ $h->zip_code }}</td>
                    <td>{{ $h->State->name }}</td>
                    <td>
                        <div class="stars stars-rating">
                            <select id="example-bootstrap" name="rating{{$h->id}}" class="rating-stars" data-id="{{$h->id}}" data-value="{{$h->rating}}">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div></td>
                    <td>{{ $h->email }}</td>
                    <td>{{ $h->phone }}</td>

                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('hotel.destroy', $h->id))) !!}
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="{{url('hotel/'.$h->id.'/edit')}}" class='btn btn-primary'> Edit </a>
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

  <script src="/js/jquery.barrating.js"></script>
  <script src="/js/barrating.js"></script>
  <script src="/js/jquery.timepicker.min.js"></script>
    <script type="text/javascript">

        $(".rating-stars").each(function( index ) {
            $(this).barrating({
                theme: 'bootstrap-stars',
                showSelectedRating: false,
                readonly: true,
                initialRating: $( this ).attr('data-value')
            });
        });
    </script>
@endsection