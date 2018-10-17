<!DOCTYPE html>
<html>
<head>
    <title>Eloquent Relationship</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" id="nav">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand" style="color:#22c75a">Eloquent Relationship</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
                    <span class="sr-only"> Toggle Navigation </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="nav-menu">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('parent-child') }}">Parent to Child</a></li>    
                    <li><a href="{{ route('child-parent') }}">Child to Parent</a></li>  
                    <li><a href="{{ route('one-to-many') }}">One to Many</a></li>      
                    <li><a href="{{ route('many-to-one') }}">Many to One</a></li>     
                    <li><a href="{{ route('users-to-roles') }}">Users to Roles</a></li> 
                    <li><a href="{{ route('roles-to-users') }}">Roles to Users</a></li> 
                    <li><a href="/help">Help</a></li>      
                </ul>
            </div>
        </div>
    </nav>
<section>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
                {{--User to Phone: Parent to child, one to one Relationship --}}
                @if(isset($usersWithPhone))
                    <table class="table table-bordered table-striped">
                        <caption>One to One (Parent to Child)</caption>
                        <thead>                            
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone ID</th>
                                <th>Phone</th>                            
                            </tr>
                        <thead>
                        <tbody>
                            @foreach($usersWithPhone as $user)
                              <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ $user->phone->id}} </td>
                                  <td>{{ $user->phone->phone}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                {{--Phone to User: Child to parent, one to one Relationship --}}
                @if(isset($phoneWithUser))
                <table class="table table-bordered table-striped">
                    <caption>One to One (Child to Parent)</caption>
                    <thead>                            
                        <tr>
                            <th>Phone ID</th>
                            <th>Phone</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>                            
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($phoneWithUser as $phone)
                          <tr>
                              <td>{{ $phone->id }}</td>
                              <td>{{ $phone->phone }}</td>
                              <td>{{ $phone->user->id }}</td>
                              <td>{{ $phone->user->name}} </td>
                              <td>{{ $phone->user->email}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                {{--Post to Comments: One to Many Relationship --}}
                @if(isset($postsAndComments))
                <table class="table table-bordered table-striped">
                    <caption>One To many: Post to Comment</caption>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th style="width:30%">Content</th>
                            <th>Author</th>
                            <th style="width:30%">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($postsAndComments as $post)
                       <tr>
                           <td>{{$post->title}}</td>
                           <td>{{$post->content}}</td>
                           <td>{{$post->author}}</td>
                           <td>
                               @foreach($post->comments as $comment)
                                   <p><strong>{{$comment->email}}</strong> said {{$comment->comment}}</p>
                               @endforeach
                           </td>
                    @endforeach
                    </tbody>
                </table>
                @endif

                {{--Comment to Post: Many to One (One to many reverse) --}}
                @if(isset($manyToOne))
                <table class="table table-bordered table-striped">
                    <caption>Many to One: Comment to Post</caption>
                    <thead>
                        <tr>
                            <th style="width:30%">Comment</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th style="width:30%">Content</th>
                            <th>Author</th>                                
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($manyToOne as $comment)
                        <tr>
                            <td>{{$comment->comment}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->post->title}}</td>
                            <td>{{$comment->post->content}}</td>
                            <td>{{$comment->post->author}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif

                {{--User to Role: many to many --}}
                @if(isset($usersToRoles))
                <table class="table table-bordered table-striped">
                    <caption>User to Role: Many to Many</caption>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usersToRoles as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                {{$role->role}},  
                                @endforeach
                            </td>
                    @endforeach
                    </tbody>
                </table>
                @endif

                {{--Roles to Users: many to many --}}
                @if(isset($rolesToUsers))
                <table class="table table-bordered table-striped">
                    <caption>Roles to Users: Many to Many</caption>
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Users</th>
                            <th>Pivot Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rolesToUsers as $role)
                        <tr>
                            <td>{{$role->role}}</td>
                            <td>
                            @for($x=0; $x<count($role->users); $x++)
                                {{$role->users[$x]->name}},
                            @endfor
                            </td>
                            <td>{{$role->pivot->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
        </div>
    </div>
</div>
</section>
<script>
    window.onload = function(){
        let url = window.location.href;        
        let link= document.querySelector('[href="'+url+'"]');
        link.style.color = 'navy';
        link.style.fontWeight = 'bold';
    };    
</script>
</body>
</html>
