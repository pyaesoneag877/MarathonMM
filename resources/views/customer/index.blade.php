<x-layout>

@if(session('success'))
        <div class="class alert alert-success text-center">{{session('success')}}</div>
@endif

<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Marathon MM</h1>

<!-- dropdown filter section -->

      <div class="dropdown">
          <button class="btn btn-outline-primary dropdown-toggle" 
          type="button" 
          id="dropdownMenuButton1" 
          data-bs-toggle="dropdown" 
          aria-expanded="false"> 
          {{request('city') ? request('city') : 'Filter By City'}}

          </button>         
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          @foreach($cities as $city)  
            <li>
              <a class="dropdown-item" 
                href="/?city={{$city->name}}">
                {{$city->name}}
              </a>
            </li>
            @endforeach
          </ul>
       
          <button class="btn btn-outline-success dropdown-toggle" 
          type="button" 
          id="dropdownMenuButton1" 
          data-bs-toggle="dropdown" 
          aria-expanded="false">
          {{request('zone') ? request('zone') : 'Filter By Zone'}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          @foreach($zones as $zone) 
            <li>
              <a class="dropdown-item" 
                href="/?zone={{$zone->name}}">
                {{$zone->name}}
              </a>
            </li>
            @endforeach    
          </ul>   
      </div>

<!-- search -->

      <form method="GET" action="" class="my-3">
        <div class="input-group mb-3">
          <input
            name="search"
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search by name or phone_no..."
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

<!-- list -->

<h3 class="mt-3 container">Customer List</h3>

    @auth
    <div class="container">
      <a href="/customer/create" class="text-primary d-flex justify-content-start">Create new customer</a>
    </div>
    @endauth
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
                @auth
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
                @else
                <td colspan="2">
                  <p> Please <a href="/login" class="mx-1">login</a> to take actions</p>
                </td> 
                @endauth
            </tr> 
            </tbody>
            @empty
            <p class="text-center">Not Found....</p>  
            @endforelse 
          
        
        </table>
        {{$customers->links()}}
        
    </card-wrapper>

</x-layout>