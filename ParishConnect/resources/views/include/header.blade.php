<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/images/ParishConnectLogo.png" alt="ParishConnect Logo">
      <span>{{ config('app.name') }}</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><div>Home</div></a>
      </li>
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"><div>Logout</div></a>
          </li>
          <li class="nav-item1">
              <a class="nav-link" href="{{ route('scheduling') }}"><div>Scheduling</div></a>
          </li>
          <li class="nav-item1">
            <a class="nav-link" href="{{ route('livestreaming') }}"><div>Livestreaming</div></a>
          </li>
          <li class="nav-item1">
            <a class="nav-link" href="{{ route('prayers') }}"><div>Prayers</div></a>
          </li>
          <li class="nav-item1">
            <a class="nav-link" href="{{ route('resources') }}"><div>Resources</div></a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><div>Login</div></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('registration') }}"><div>Registration</div></a>
          </li>
        @endauth
      </ul>
      <span class="navbar-text">
        @auth
          {{ auth()->user()->name }}
        @endauth
      </span>
    </div>
  </div>
</nav>
