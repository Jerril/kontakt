@extends('layouts.app')

@section('content')
    @include('includes.nav')

    <main>
        @if (Session::has('msg'))
            <div role="alert" class="bg-teal-100 font-bold rounded-t px-4 py-2">
                <p>{{ Session::get('msg') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div role="alert" class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
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


