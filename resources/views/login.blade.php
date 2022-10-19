<x-layout>
    <div class="container col-5">
        <div class="row">
            <h1 class="display-5 text-center fw-bold mb-4">Marathon MM</h1>
            <h3 class="text-primary my-3 text-center">Login</h3>
            <div class="card p-5 my-3 shadow-sm bg-primary">
            <form method="POST" action="/login">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" name="username" value="{{old('userName')}}" class="form-control" id="exampleInputUsername" aria-describedby="userNameHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    
                </div>

                <div class="mb-3">
                    <a href="" class="text-white d-flex justify-content-end">Sign Up</a>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
                              
            </form>
            </div>
        </div>
    </div>
    
</x-layout>