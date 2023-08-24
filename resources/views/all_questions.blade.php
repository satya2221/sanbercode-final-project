@extends('layouts.master')

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