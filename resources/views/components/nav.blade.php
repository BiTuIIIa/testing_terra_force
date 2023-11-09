<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('user.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                </li>
            </ul>
            <a href="{{ route('auth.logout') }}" class="btn btn-secondary mx-1">Logout</a>
        </div>
    </div>
</nav>
