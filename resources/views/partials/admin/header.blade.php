<header>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="{{ route("admin.index") }}">Dashboard</a></li>
            <li><a href="{{ route("admin.posts.index") }}">Posts</a></li>
            <li><a href="{{ route("admin.users.index") }}">Utenti</a></li>
            <li><a href="{{ route('logout') }}"  
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
        </ul>
    </div>
</header>