@extends('layouts.master')

@section('content')
    <p>{{$question->id}}</p>
    <p>{{$question->title}}</p>
    <p>{!!$question->content!!}</p>
@endsection