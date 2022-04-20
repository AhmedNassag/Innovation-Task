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
                    <h4 class="card-title">{{__('trans.Users Table')}}</h4>
                    <a href="{{url('user-create')}}"class="btn btn-md float-right" style="background-color:#FA7347">{{__('trans.Add New User')}}</a>
                </div>
                    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>{{__('trans.Number')}}</th>
                                <th>{{__('trans.Name')}}</th>
                                <th>{{__('trans.Email')}}</th>
                                <th>{{__('trans.Address')}}</th>
                                <th>{{__('trans.Second Address')}}</th>
                                <th>{{__('trans.Edit Address')}}</th>
                                <th>{{__('trans.Edit')}}</th>
                                <th>{{__('trans.Delete')}}</th>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($users as $user)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-center"><?php echo (!$user->userAddress)? '---': $user->userAddress->address;?></td>
                                    <td class="text-center"><?php echo (!$user->userAddress)? '---': $user->userAddress->secondAddress;?></td>
                                    <td>
                                        <a href="{{url('user-editAddress/'.$user->userAddress->id)}}" class="btn btn-info btn-sm">{{__('trans.Edit Address')}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url('user-edit/'.$user->id)}}" class="btn btn-info btn-sm">{{__('trans.Edit')}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url('user-delete/'.$user->id)}}" class="btn btn-danger btn-sm">{{__('trans.Delete')}}</a>
                                    </td>
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