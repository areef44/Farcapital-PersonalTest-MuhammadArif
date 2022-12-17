@extends('templates.template')

@section('login')
    
    <div class="container py-5 my-5">
       
        
        <div class="row d-flex justify-content-center">
            
        <div class="form-outline mb-4 col-lg-4">
            
            @if($errors->any())
        <p class="fw-bold text-color:red">{{  $errors->first() }}</p>
         @endif
        <h3>Form Login</h3>
        <form action="" method="POST">
        @csrf
         <label class="form-label" for="email">Email address : </label>
         <input type="email" name="email" id="email" class="form-control" />
        <label for="password" class="form-label">Password : </label>
        <input type="password" name="password" id="password" class="form-control">
        <button type="submit" class="btn btn-primary my-3">Login</button>
        </form>

        
        </div>

        </div>

    </div>
        

@endsection