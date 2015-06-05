<h1>Nama Aplikasi</h1>
@if (Auth::check())
<a href="{{ route('user.show', Auth::id()) }}">{{ Auth::user()->name }}</a>
<br><br>
@endif