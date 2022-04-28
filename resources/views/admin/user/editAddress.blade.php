@extends('layouts.app')


@section('title')
    {{__('Edit User Address')}}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('Edit User Address')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
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

                                <form action="/user-updateAddress/{{$address->id}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label>{{__('trans.Address')}}</label>
                                                <input type="text" name="address" class="form-control" placeholder="{{__('trans.Enter Address')}}" value="{{$address->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('trans.Second Address')}}</label>
                                                <input type="text" name="secondAddress" class="form-control" placeholder="{{__('trans.Enter Second Address')}}" value="{{$address->secondAddress}}">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-md" style="background-color: #FA7347;">{{__('trans.Update Address')}}</button>
                                                <a href="/users" class="btn btn-danger">{{__('trans.Cancel')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
