@extends('layouts.master')

@section('search')
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="/">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" value="{{$search}}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('content')
    <div class="row">
        <div class="col-4">
            <a href="/questions/create" class="btn btn-primary">Ask a Question</a>
        </div>
    </div>
    
    @forelse ($questions as $question)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Ask by {{$question->user->name}}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{route('questions.show', $question->id)}}">{{$question->title}}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {!!$question->content!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="row mt-4">
            <div class="col-12">
                <p>There are no question right now</p>
            </div>
        </div>
     @endforelse
     @include('sweetalert::alert')
@endsection