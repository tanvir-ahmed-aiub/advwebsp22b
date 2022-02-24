<div id="header">
    <a href="/student/list">List</a>
    <a href="{{route('student.create')}}">Create</a>
    <a href="/student/get">Get</a>
    @if(!Session::has('username'))<a href="{{route('login')}}">Login</a>@endif
    @if(Session::has('username'))<a href="{{route('logout')}}">Logout</a>@endif
</div>
