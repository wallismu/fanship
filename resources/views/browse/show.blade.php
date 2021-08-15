@extends('layouts.master')

@section('content')  
<div class="columns">
    @foreach($matches as $m)
        <div class="column">
            <h1>Match: {{ $m[1]->name }} ({{ number_format($m[0] * 100.0, 0) }}%)</h1>
            <img class="image is-96x96" src="{{ asset('storage/' . $m[3]->filename) }}">
            <ul>
                <li>{{$m[2]->age}}
                <li>{{$m[2]->location}}
                <li>{{$m[2]->bio}}
            </ul>
            <a class="button" href="/users/{{ $m[1]->id }}">Click to view</a>
        </div>
    @endforeach
</div>

@endsection