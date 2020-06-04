@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Events</h2>
        @if(isset($events))
           <table class="table table-borders table-striped"> 
             <thead>
               <tr>
                 <th>Name</th>
                 <th>User ID</td>
                 <th>Subscriber Checked</th>
                 <th>Event</th>
                 <th>Model</th>                 
               </tr>
             </thead>
             <tbody>
               @foreach($events as $event)
                 <tr>
                   <td>{{ $event->event_name }}</td>
                   <td>{{ $event->user_id }}</td>
                   <td>{{ $event->subscriber_checked }}</td>
                   <td>
                      <pre>{{ $event->event }}</pre>
                   </td>
                   <td>
                      <pre>{{ $event->user }}</pre>
                   </td>
                 </tr>
               @endforeach             
             </tbody>
           </table>
        @endif
    </div>
</div>
@endsection