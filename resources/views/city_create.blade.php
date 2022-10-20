<x-layout>   
<div class="container col-5">
        <div class="row">

            <h3 class="text-primary my-3">Create New City</h3>
            <div class="card p-5 my-3 shadow-sm">
            <form method="POST" action="/city/store">
            @csrf
            <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputName_mm" class="form-label">Name_mm</label>
                    <input type="text" name="name_mm" value="{{old('name_mm')}}" class="form-control" id="exampleInputName_mm" aria-describedby="nameHelp">
                </div>

                <ul class="text-danger mt-3">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
            </div>
        </div>
</div>
</x-layout>