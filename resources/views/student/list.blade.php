@extends('layouts.loggedin')
@section('content')
<h1>List</h1>
<span class="text-success">{{Session::get('msg')}}</span>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Id</th>
        <th>Email</th>
        <th>Username</th>
        <th>Reg. Date</th>

    </tr>
    @foreach($students as $s)
        <tr>
            <td><a href="{{route('student.details',['id'=>encrypt($s->id)])}}">{{$s->name}}</a></td>
            <td>{{$s->id}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->created_at}}</td>
            <td><a class="btn btn-primary" href="{{route('students.edit',['id'=>encrypt($s->id)])}}">Edit</a></td>
        </tr>
    @endforeach
</table>
@endsection
