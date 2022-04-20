@extends('layouts.master')


@section('title')
    {{__('trans.Edit User')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('trans.Edit User')}}</h4>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="/user-update/{{$user->id}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>{{__('trans.Name')}}</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{__('trans.Enter Name')}}" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Email')}}</label>
                                    <input type="email" name="email" class="form-control" placeholder="{{__('trans.Enter Email')}}" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Password')}}</label>
                                    <input type="password" name="password" class="form-control" placeholder="{{__('trans.Enter Password')}}" value="{{$user->password}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-md" style="background-color: #FA7347;">{{__('trans.Update')}}</button>
                                <a href="/users" class="btn btn-danger">{{__('trans.Cancel')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
