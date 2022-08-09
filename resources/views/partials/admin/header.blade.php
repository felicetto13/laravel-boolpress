<header>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="{{ route("admin.posts.index") }}">Dashboard</a></li>
            <li><a href="{{ route("admin.posts.create") }}">Crea Post</a></li>
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