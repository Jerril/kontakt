@extends('layouts.app')

@section('content')
    @include('includes.nav')

    @if (Session::has('msg'))
        <div role="alert" class="w-1/2 bg-teal-100 text-center font-bold rounded-t px-4 py-2 mt-4 mx-auto">
            <p>{{ Session::get('msg') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div role="alert" class="w-1/2 bg-red-400 text-white text-center font-bold rounded-t px-4 py-2 mt-4 mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main>
        <h2>Login</h2>
        <form method="POST" action="{{route('login.post')}}">
            @csrf
            <input name="email" type="email" placeholder="Email" />
            <input name="password" type="password" placeholder="Password" />
            <input type="submit" value="Login">
        </form>

        <p>New here? <a href="/signup">Sign up</a></p>
    </main>
@endsection


