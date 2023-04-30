@extends('layouts.app')

@section('content')
    @include('includes.nav')

    <main>
        <h2>Sign up</h2>
        <form action="">
            <input class="name" type="text" placeholder="Name">
            <input class="email" type="email" placeholder="Email" />
            <input class="password" type="password" placeholder="Password" />
            <input type="submit" value="Create account">
        </form>

        <p>Have an account? <a href="/login">Login</a></p>
    </main>
@endsection
