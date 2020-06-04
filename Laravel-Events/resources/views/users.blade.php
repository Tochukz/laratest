@extends('layout')

@section('content')
<div class="row">
 <div class="col-sm-4">
      <form method="post" action="/user/create"> 
        <h2>Create User</h2>
        <div class="form-group">
          <input name="name" class="form-control" placeholder="name" required />
        </div>
        <div class="form-group">
          <input  name="email" type="email" class="form-control" placeholder="email" required  />
        </div>
         <div class="form-group">
          <input name="password" type="password" class="form-control" placeholder="password" required />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary form-control" value="submit" />
        </div>
        <input name="_token" value="{{ csrf_token() }}" type="hidden" />
      </form>
    </div>
    <div class="col-sm-6 offset-sm-2">
        <h2>Users</h2>
        @if(isset($users))
           <table class="table table-borders table-striped"> 
             <thead>
               <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Del</td>
               </tr>
             </thead>
             <tbody>
               @foreach($users as $user)
                 <tr>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->email }}</td>
                    <td>
                     <form method="post" action="/user/delete">
                       <input type="hidden" name="_method" value="delete" />
                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                       <input type="hidden" name="userId" value="{{ $user->id }}" />
                       <input type="submit" value="Del"/>
                     </form>
                   </td>
                 </tr>
               @endforeach             
             </tbody>
           </table>
        @endif
    </div>
</div>
@endsection