<x-layout>
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
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        @forelse($users as $user)
        <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="/user/{{$user->id}}/edit" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="/user/{{$user->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sure want to Delete?')" class="btn btn-danger">
                            delete
                        </button>
                    </form>
                </td>
            </tr>  
            </tbody>
            @empty
            <p class="text-center">Not Found...</p>
            @endforelse         
        
        </table>
        {{$users->links()}}
        
    </card-wrapper>

</x-layout>