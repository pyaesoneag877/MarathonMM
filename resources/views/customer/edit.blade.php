<x-layout>   
<div class="container col-7">
        <div class="row">

            <h3 class="text-primary my-3">Update Customer</h3>
            <div class="card p-5 my-3 shadow-sm">
            <form method="POST" action="/customer/{{$customer->id}}/update">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" value="{{old('name',$customer->name)}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">     
            </div>

            <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Phone Number</label>
                <input type="tel" name="phone_no" value="{{old('phone_no',$customer->phone_no)}}" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp">
            </div>

            <div class="mb-3">
                <label 
                    for="city_id" 
                    class="form-label">Choose City
                </label>

                <select name="city_id" class="form-control" id="city">
                    @foreach($cities as $city)
                    <option 
                        {{$city->id==old('city_id',$customer->city->id) ? 'selected' : ''}}
                        value="{{$city->id}}">
                        {{$city->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label 
                    for="zone_id" 
                    class="form-label">Choose Zone
                </label>

                <select name="zone_id" class="form-control" id="zone">
                    @foreach($zones as $zone)
                    <option 
                        {{$zone->id==old('zone_id',$customer->zone->id) ? 'selected' : ''}}
                        value="{{$zone->id}}">
                        {{$zone->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label 
                    for="address" 
                    class="form-label">Address
                </label>
                <textarea 
                    name="address" 
                    class="form-control editor" 
                    id="address" 
                    cols="0" 
                    rows="0"> {{old('address',$customer->address)}}
                </textarea>
            </div>
            
            <ul class="text-danger mt-3">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            <button type="submit" class="btn btn-primary my-3">Submit</button>              
            </form>
            </div>
        </div>
</div>
</x-layout>