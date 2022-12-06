@extends('frontend.layouts.app') 
@section('content')


<div style="margin-bottom:5%">

    <form class="form" method="POST" action="{{ route('user.registered') }}">
        @csrf
    <section>
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <h3 class="mb-5">Sign in</h3>
      
                  <div class="form-outline mb-4">
                    <input type="text" name="name" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>
      
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      
                  <hr class="my-4">
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>

</div>


@endsection