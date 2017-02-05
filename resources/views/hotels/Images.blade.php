@extends('layouts.app')

@section('content')

    <div class="col-sm-12 col-md-12 main">
        <h2 class="sub-header">Images list for hotel ({{$hotel->name}})</h2>
        <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($message)){echo $message;}?>
        </div>
        <a href="{{url('image/create/'.$hotel->id)}}" class='btn btn-primary'> Add an image </a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $i)
                    <tr>
                        <td>{{ $i->id }}</td>
                        <td>
                            <img src="{{ $i->src }}" height="50px">
                        </td>
                        <td>{{ $i->name }}</td>
                        <td>{{ $i->description }}</td>
                        <td>
                        <td>
                            {!! Form::open(array('method' => 'DELETE', 'route' => array('image.destroy', $i->id))) !!}
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{url('image/'.$i->id.'/edit')}}" class='btn btn-primary'> Edit </a>
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection