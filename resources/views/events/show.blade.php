@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
        <p><strong>End Date:</strong> {{ $event->end_date }}</p>
        <a href="{{ route('events.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
