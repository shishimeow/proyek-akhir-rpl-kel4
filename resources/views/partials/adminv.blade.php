<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/admin">Administrator I-Course IPB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="/admin/sc" name="category">SC</a>
          <a class="nav-link" href="/admin/mbkm" name="category">MBKM</a>
          <a class="nav-link" href="/admin/faculty" name="category">Fakultas</a>
          <a class="nav-link" href="/admin/user" name="category">Akun Profile</a>
          <form action="/logout" method="POST">
            <a class="nav-link" href="/logout">Logout</a>
          </form>          
        </div>
      </div>
    </div>
</nav>