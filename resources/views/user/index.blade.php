<x-layout>
@if(session('success'))
        <div class="class alert alert-success text-center">{{session('success')}}</div>
@endif
<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Marathon MM</h1>
      <form method="GET" action="" class="my-3">
        <div class="input-group mb-3">
          <input
            name="search"
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search by name or email..."
            value="{{request('search')}}"
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
</section>

<h3 class="mt-3 container">User List</h3>
    <card-wrapper>
    <table class="container table table-success table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        @forelse($users as $user)
        <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
            </tr>  
            </tbody>
            @empty
            <p class="text-center">Not Found...</p>
            @endforelse         
        
        </table>
        {{$users->links()}}
        
    </card-wrapper>

</x-layout>