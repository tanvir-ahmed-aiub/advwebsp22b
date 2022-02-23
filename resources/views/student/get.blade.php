@extends('layouts.loggedin')
@section('content')
    <h1>Get</h1>
    <h4>Name : {{$s->name}}</h4>
    <h4>Id : {{$s->id}}</h4>
    <h4>Dept : {{$s->department->name}}</h4>
    <ol>
        @foreach($s->courseStudent as $cs)
            <li>{{$cs->course->name}} offerd by {{$cs->course->department->name}}</li>
        @endforeach
    </ol>
@endsection