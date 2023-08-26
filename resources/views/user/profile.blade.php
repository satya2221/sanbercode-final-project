@extends('layouts.master')

@section('content')
    <h1>Profile</h1>
    <div class="row mt-2">
        <div class="col-2">
            Name <span class="float-right">:</span>
        </div>
        <div class="col-10">
            {{$user->name}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            Email <span class="float-right">:</span>
        </div>
        <div class="col-10">
            {{$user->email}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            Age <span class="float-right">:</span>
        </div>
        <div class="col-10">
            {{!$user->age ? '-' : $user->age}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            Bio <span class="float-right">:</span>
        </div>
        <div class="col-10">
            {{!$user->bio ? '-' : $user->bio}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-2">
            Address <span class="float-right">:</span>
        </div>
        <div class="col-10">
            {{!$user->address ? '-' : $user->address}}
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <a href="{{route('users.edit', Auth::id())}}" class="btn btn-primary">Update Profile</a>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection