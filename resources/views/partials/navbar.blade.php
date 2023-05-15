<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/">I-Course IPB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="/">Home</a>
          <a class="nav-link" href="/sc">SC</a>
          <a class="nav-link" href="/mbkm">MBKM</a>

          @auth
          <a class="nav-link" href="/profile">Akun Profile</a>
          <form action="/logout" method="POST">
            <a class="nav-link" href="/logout">Logout</a>
          </form>
          @else
          <a class="nav-link" href="/login">Login</a>
          @endauth
        </div>
      </div>
    </div>
</nav>