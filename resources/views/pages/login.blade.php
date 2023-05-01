@extends('layouts.app')

@section('content')
    @include('includes.nav')

    <main>
        @if (Session::has('msg'))
            <div class="alert alert-success">
                <p>{{ Session::get('msg') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Login</h2>
        <form action="">
            <input class="email" type="email" placeholder="Email" />
            <input class="password" type="password" placeholder="Password" />
            <input type="submit" value="Login">
        </form>

        <p>New here? <a href="/signup">Sign up</a></p>
    </main>
@endsection


