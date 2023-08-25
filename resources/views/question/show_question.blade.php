@extends('layouts.master')

@section('content')
<h1>{{$question->title}}</h1>
<div class="card border-left-primary shadow mb-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Asked by {{ $question->name }}</h6>
    </div>
    <div class="card-body">
        <p class="card-text">{!! $question->content !!}</p>
    </div>
</div>

<h3>Jawaban</h3>
@forelse ($answers as $answer)
    <div class="card shadow border-left-info">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Answer by {{$answer->user->name}}</h6>
        </div>
        <div class="card-body">
            {!!$answer->content!!}
        </div>
    </div>
    
@empty 
    <p>Belum ada jawaban</p>
@endforelse

@endsection