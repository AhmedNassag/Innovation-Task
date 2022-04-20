@extends('layouts.master')


@section('title')
    Dashboard
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-dismissible alert-{{ session('alert-type') }} alert-styled-left alert-arrow-left" id="session-alert">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> {{__('trans.Dashboard Table')}} </h4>
                </div>
                    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>{{__('trans.Name')}}</th>
                                <th>{{__('trans.Email')}}</th>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
