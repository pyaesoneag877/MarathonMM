<x-layout>   
<div class="container col-5">
        <div class="row">

            <h3 class="text-primary my-3">Register</h3>
            <div class="card p-5 my-3 shadow-sm">
            <form method="POST" action="/user/store">
            @csrf
            <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputName_mm" class="form-label">Username</label>
                    <input type="text" name="username" value="{{old('username')}}" class="form-control" id="exampleInputName_mm" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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