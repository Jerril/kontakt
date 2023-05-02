@extends('layouts.app')

@section('content')
    @include('includes.nav')

    @if ($errors->any())
        <div role="alert" class="w-1/2 bg-red-400 text-white text-center rounded px-4 py-2 mt-4 mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main>
        <h2>Sign up</h2>
        <form method="POST" action="{{route('signup.post')}}">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="email" placeholder="Email" />
            <input name="password" type="password" placeholder="Password" />
            <input type="submit" value="Create account">
        </form>

        <p>Have an account? <a href="/login">Login</a></p>
    </main>
@endsection
