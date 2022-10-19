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
            placeholder="Search by name or name_mm..."
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

<h3 class="mt-3 container">Customer List</h3>
    <card-wrapper>
    <table class="container table table-success table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">phone number</th>
                <th scope="col">city name</th>
                <th scope="col">zone name</th>
                <th scope="col">address</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        
        
        @forelse($customers as $customer)
        <tbody>
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone_no}}</td>
                <td>{{$customer->city->name}}</td>
                <td>{{$customer->zone->name}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <a href="/customer/{{$customer->id}}/edit" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="/customer/{{$customer->id}}/delete" method="POST">
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
            <p class="text-center">Not Found....</p>  
            @endforelse 
          
        
        </table>
        {{$customers->links()}}
        
    </card-wrapper>

</x-layout>