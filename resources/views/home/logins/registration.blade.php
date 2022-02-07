@extends('layouts.loggedin')
@section('content')
    <form action="{{route('register.submit')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="name" value="{{old('name')}}" placeholder="Name"><br>
        @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
        <input type="text" name="username" value="{{old('username')}}" placeholder="Username"><br>
        @error('username')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
        <input type="text" name="email" value="{{old('email')}}" placeholder="Email"><br>
        @error('email')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
        <input type="password" name="password" placeholder="Password"><br>
        @error('password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
        <input type="password" name="conf_password" placeholder="Confirm Password"><br>
        @error('conf_password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
        <input type="submit" value="Registration">

    </form>
@endsection