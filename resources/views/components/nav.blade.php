<nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Marathon Myanmar</a>
        <div class="d-flex">
          @auth
          <a href="/" class="nav-link">Customer</a>
          <a href="/zone" class="nav-link">Zone</a>
          <a href="/city" class="nav-link">City</a>
          <a href="/user" class="nav-link">User</a>
          <a href="/user/{{auth()->user()->id}}/edit" class="nav-link">Welcome {{auth()->user()->name}}</a>
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
          <a href="/" class="nav-link">Customer List</a>
          <a href="/zone" class="nav-link">Zone List</a>
          <a href="/city" class="nav-link">City List</a>
          <a href="/user" class="nav-link">User List</a>
          <a href="/login" class="nav-link">Login</a>
          @endguest

        </div>
      </div>
</nav>