<x-layout>   
<div class="container col-7">
        <div class="row">

            <h3 class="text-primary my-3">Update Zone</h3>
            <div class="card p-5 my-3 shadow-sm">
            <form method="POST"  action="/zone/{{$zone->id}}/update">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" value="{{old('name',$zone->name)}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">     
            </div>

            <div class="mb-3">
                <label for="exampleInputName_mm" class="form-label">Name_mm</label>
                <input type="text" name="name_mm" value="{{old('name_mm',$zone->name_mm)}}" class="form-control" id="exampleInputName_mm" aria-describedby="nameHelp">
            </div>

            <div class="mb-3">
                <label 
                    for="city_id" 
                    class="form-label">Choose City
                </label>

                <select name="city_id" class="form-control" id="city">
                    @foreach($cities as $city)
                    <option 
                        {{$city->id==old('city_id',$zone->city->id) ? 'selected' : ''}}
                        value="{{$city->id}}">
                        {{$city->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <ul class="text-danger mt-3">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            <button type="submit" class="btn btn-primary my-3">Update</button>              
            </form>
            </div>
        </div>
</div>
</x-layout>