@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted'))
        <p class="text-center text-uppercase text-danger"><br><br>{{session('deleted')}}</p>
    @elseif(Session::has('created'))
        <p class="text-center text-uppercase text-primary"><br><br>{{session('created')}}</p>
    @elseif(Session::has('updated'))
        <p class="text-center text-uppercase text-info"><br><br>{{session('updated')}}</p>
    @endif

    <h1 class="page-header">
        All Users
    </h1>
    <a href="{{Route('admin.user.create')}}" class="btn btn-info">Add User</a>
    <table class="table table-bordered">
       <thead>
         <tr>
           <th>ID</th>
              <th>Photo</th>
           <th>Name</th>
           <th>Email</th>
           <th>Role</th>
           <th>Active</th>
           <th>Created</th>
           <th>Updated</th>
           <th class="text-center">Edit</th>
           <th class="text-center">Delete</th>
         </tr>
       </thead>

       <tbody>

       @if($users)
           @foreach($users as $user)
         <tr class="">
           <td>{{$user->id}}</td>
             <td>
               <a href="">
                   <img style="height: 50px;" src="{{$user->photo ? $user->photo['file']: 'http://placeholder.it/400*400'}}" alt="No user Photo">
               </a>
             </td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->role['name']}}</td>
             <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
             <td>{{$user->created_at->diffForHumans()}}</td>
             <td>{{$user->updated_at->diffForHumans()}}</td>
             <td class="text-center"><a class="btn btn-primary" href="{{route('admin.user.edit',$user->id)}}">Edit</a></td>
             {{--<td class="text-center"><a class="btn btn-danger" href="{{route('admin.user.delete',$user->id)}}">Delete</a></td>--}}
             <td>


              {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
                    {{csrf_field()}}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}


             </td>
         </tr>
         @endforeach
        @endif

      </tbody>
    </table>



@endsection