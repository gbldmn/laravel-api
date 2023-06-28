@vite(['resources/js/app.js'])
@extends('layouts.app')

@section('content')
 <div class="container">
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->content }}</p>
    <p>{{ $project->slug }}</p>
    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">


    <h2>type</h2>
    @if($project->type)
    <div>nome:{{ $project->type->name }} </div>
    <div>slug:{{ $project->type->slug }}</div>
    @endif

    <h2>technologies</h2>
    @if($project->technologies)
    @foreach($project->technologies as $elem)
    <div>technology name: {{ $elem->name }}</div> 
    @endforeach
    @endif
   
    @php
        // non riesco ad ottenere i record
        // dd($project->technologies)
    @endphp


 </div>
@endsection