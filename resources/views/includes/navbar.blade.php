<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a @class([
            "nav-link",
            'active' => request()->routeIs('welcome')]) href="{{ route('welcome') }}">Home </a>
        </li>
        
        {{-- <li class="nav-item">
          <a class="btn btn-primary" href="{{ route('users.logout') }}">logout </a>
        </li> --}}
        

        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a> --}}
        {{-- @class([
            "nav-link dropdown-toggle",
            'active' => !(request()->routeIs('welcome'))])
         --}}
        {{-- <span class="sr-only"></span> --}}
        <li class="nav-item dropdown">
          <a @class([
            "nav-link dropdown-toggle",
            'active' => (request()->routeIs('users.create') ||request()->routeIs('users.index'))]) href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            users
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a @class([
                "dropdown-item",
                'active' => request()->routeIs('users.index')]) href="{{ route('users.index') }}">users</a>
            {{-- <div class="dropdown-divider"></div> --}}
            {{-- <a  @class([
                "dropdown-item",
                'active' => request()->routeIs('users.create')]) href="{{ route('users.create') }}">create</a> --}}
          </div>
        </li>
        
        {{-- ------------------------------------------------------posts-------------------------------------------------------- --}}

        <li class="nav-item dropdown">
          <a @class([
            "nav-link dropdown-toggle",
            'active' => (request()->routeIs('posts.create') || request()->routeIs('posts.index') )]) href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            posts
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a @class([
                "dropdown-item",
                'active' => request()->routeIs('posts.index')]) href="{{ route('posts.index') }}">posts</a>
            <div class="dropdown-divider"></div>
            <a  @class([
                "dropdown-item",
                'active' => request()->routeIs('posts.create')]) href="{{ route('posts.create') }}">create</a>
            
            <a  @class([
              "dropdown-item",
              'active' => request()->routeIs('posts.restore')]) href="{{ route('posts.restore') }}">restore</a>
          </div>
        </li>
      </ul>
      @if(Auth::check())
      <li class="nav-item dropdown">
        <a @class([
          "nav-link dropdown-toggle",
          'active' => (request()->routeIs('users.create') ||request()->routeIs('users.index'))]) href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a @class([
              "dropdown-item",
              'active' => request()->routeIs('users.details')]) href="{{ route('users.details',['id'=>Auth::id()])}}">details</a>
          <div class="dropdown-divider"></div>
          <a  @class(["dropdown-item"]) href="{{ route('logout') }}">logout</a>
        </div>
      </li>   
      @else
          <a class="btn btn-primary" href="{{ route('dashboard') }}">login </a>
          <p> </p>
          <a class="btn" href="{{ route('users.register') }}">register </a> 
      @endif
      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>