
@extends('layouts.app')

@section('content')
    <h1>{{ $destination->destination_name }}</h1>
    <p>{{ $destination->description }}</p>
    <h2>Transports</h2>
    <ul>
        @foreach($destination->transports as $transport)
            <li>{{ $transport->transport_name }}</li>
        @endforeach
    </ul>
@endsection
