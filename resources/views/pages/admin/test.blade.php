<h1>This is admin dashboard</h1>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>