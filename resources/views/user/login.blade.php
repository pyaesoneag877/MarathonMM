<x-layout>
    <div class="container col-5">
        <div class="row">
            <h1 class="display-5 text-center fw-bold mb-4">Marathon MM</h1>
            <h3 class="text-dark my-3 text-center">Login</h3>
            <div class="card p-5 my-3 shadow-sm bg-white">
            <form method="POST" action="">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" name="username" value="{{old('userName')}}" class="form-control" id="exampleInputUsername" aria-describedby="userNameHelp">
                    @error('username')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="/user/register" class="text-primary d-flex justify-content-end">Sign Up</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                              
            </form>
            </div>
        </div>
    </div>
    
</x-layout>