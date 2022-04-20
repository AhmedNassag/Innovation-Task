@extends('layouts.master')


@section('title')
    {{__('trans.Add New User')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('trans.Add New User')}}</h4>
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

                    <form action="/user-store" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>{{__('trans.Name')}}</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{__('trans.Enter Name')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Email')}}</label>
                                    <input type="email" name="email" class="form-control" placeholder="{{__('trans.Enter Email')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Password')}}</label>
                                    <input type="password" name="password" class="form-control" placeholder="{{__('trans.Enter Password')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Address')}}</label>
                                    <input type="text" name="address" class="form-control" placeholder="{{__('trans.Enter Address')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('trans.Second Address')}}</label>
                                    <input type="text" name="secondAddress" class="form-control" placeholder="{{__('trans.Enter Second Address')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-md" style="background-color: #FA7347;">{{__('trans.Save')}}</button>
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
