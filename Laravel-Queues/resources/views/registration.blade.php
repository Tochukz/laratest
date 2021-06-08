@extends('master')

@section('title')
  <title>Registration Page</title>
@endsection

@section('content')
  <div class="row">
      <div class="col-sm-4">
        <form method="post" action="/register">
            <div class="form-group">
              <input class="form-control" name="fullname" placeholder="Full Name" />      
            </div>
            <div class="form-group">
              <input class="form-control" name="username" placeholder="Username" />      
            </div>
            <div class="form-group">
              <input class="form-control" name="email" placeholder="Email"/>      
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value={{ csrf_token() }} />
              <input type="submit" value="Register" class="btn btn-primary form-control" />      
            </div>
          </form>
      </div>
  </div>
@endsection