@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $event->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" name="start_date" class="form-control" value="{{ $event->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" name="end_date" class="form-control" value="{{ $event->end_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection