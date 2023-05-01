@extends('layouts.app')

@section('content')
    @include('includes.nav')

    <main>
        @if ($errors->any())
            <div role="alert" class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
