<x-layout>
<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Marathon MM</h1>

      
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
                href="/zone?city={{$city->name}}">
                {{$city->name}}
              </a>
            </li>
            @endforeach
          </ul>
          

      </div>



      <form method="GET" action="" class="my-3 mt-5">
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

<h3 class="mt-3 container">Zone List</h3>
    <card-wrapper>
    <table class="container table table-success table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">name_mm</th>
                <th scope="col">city</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        @forelse($zones as $zone)
        <tbody>
            <tr>
                <td>{{$zone->name}}</td>
                <td>{{$zone->name_mm}}</td>
                <td>{{$zone->city->name}}</td>
                <td>
                    <a href="/zone/{{$zone->id}}/edit" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="/zone/{{$zone->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sure want to Delete?')" class="btn btn-danger" >
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
        {{$zones->links()}}
        
    </card-wrapper>

</x-layout>