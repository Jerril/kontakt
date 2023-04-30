@extends('layouts.app')

@section('content')
    @include('includes.nav')

    <main>
        <h2>Login</h2>
        <form action="">
            <input class="email" type="email" placeholder="Email" />
            <input class="password" type="password" placeholder="Password" />
            <input type="submit" value="Login">
        </form>

        <p>New here? <a href="/signup">Sign up</a></p>
    </main>
@endsection


