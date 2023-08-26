@extends('layouts.master')
@section('content')
    <h1>All of Your Answer</h1>
    <div class="row">
        <div class="col-4">
            <a href="/" class="btn btn-primary">Answer another Question</a>
        </div>
    </div>

    @include('sweetalert::alert')
    
    @forelse ($answers as $answer)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{route('answers.show', $answer->question->id)}}">{{$answer->question->title}}</a>
                        {{-- Ask by {{$question->user->name}} --}}
                        <span class="float-right">
                            <a href="{{route('answers.edit', $answer->id)}}"><i class="fas fa-edit ml-2"></i></a>
                            {{-- <a href="{{route('questions.destroy', $question->id)}}" data-confirm-delete="true"><i class="fas fa-trash"></i></a> --}}
                            <a href="" onclick="confirmDelete({{$answer->id}})">
                                <i class="fas fa-trash ml-2"></i>
                            </a>
                            <form id="delete-answer-{{ $answer->id }}" action="{{ route('answers.destroy', $answer->id) }}"
                                method="POST" style="display: none;">
                               @csrf
                               @method('DELETE')
                           </form>
                        </span>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-12">
                                <a href="{{route('questions.show', $question->id)}}">{{$question->title}}</a>
                            </div>
                        </div> --}}
                        <code>Your Answer:</code>
                        <div class="row">
                            <div class="col-12">
                                {!!$answer->content!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="row mt-4">
            <div class="col-12">
                You have not post any answer yet
            </div>
        </div>
    @endforelse
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete($id)
        {
            event.preventDefault();
            new swal({
                title: "Delete Answer",
                text: "Are you sure you want to delete this answer?",
                icon: "info",
                type: "info",
                showCancelButton: true,
                showConfirmButton: true
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $(`#delete-answer-${$id}`).submit();
                }
            });
        }
    </script>
    @include('sweetalert::alert')
@endpush