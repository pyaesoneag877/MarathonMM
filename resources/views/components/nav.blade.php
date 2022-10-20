<nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Marathon Myanmar</a>
        <div class="d-flex">
          <a href="/" class="nav-link">Customer List</a>
          <a href="/city" class="nav-link">City</a>
          <a href="/zone" class="nav-link">Zone</a>
          <a href="/user" class="nav-link">User List</a>

          @auth
          <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>

          <form 
            action="/logout"
            method="POST">
            @csrf
            
            <button
              type="submit"
              href="" class="nav-link btn btn-link">Logout
            </button>
          </form>
          @endauth

          @guest
          <a href="/login" class="nav-link">Login</a>
          @endguest

        </div>
      </div>
</nav>