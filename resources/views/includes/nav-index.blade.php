<nav>
    <a href="/" class="logo">kòntakts</a>

    @if(auth()->user())
        <div>
            <a href="/dashboard" class="login">Go to Dashboard <i class="fas fa-arrow-up"></i></a>
        </div>
    @else
        <div>
            <a href="/login" class="login">Login <i class="fas fa-arrow-up"></i></a>
            <a href="/signup" class="signup">Sign up</a>
        </div>
    @endif
</nav>
