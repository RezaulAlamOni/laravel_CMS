@extends('layouts.admin')

@section('content')
    <h1 class="page-header">
        Create Users
    </h1>
        {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Post Name']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Post Email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id','Role') !!}
                {!! Form::select('role_id',$roles,2,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status','Status') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {{--{!! Form::label('file','Status') !!}--}}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('Create Post',['class'=>'btn btn-success']) !!}
            <a href="" class="btn btn-primary"> Back</a>

        {!! Form::close() !!}



            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                             <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    @stop