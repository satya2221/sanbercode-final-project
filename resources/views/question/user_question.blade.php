@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-4">
            <a href="{{route('questions.create')}}" class="btn btn-primary">Ask a Question</a>
        </div>
    </div>

    @include('sweetalert::alert')
    
    @forelse ($questions as $question)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Ask by {{$question->user->name}}
                        <span class="float-right">
                            <a href="{{route('questions.edit', $question->id)}}"><i class="fas fa-edit"></i></a>
                            {{-- <a href="{{route('questions.destroy', $question->id)}}" data-confirm-delete="true"><i class="fas fa-trash"></i></a> --}}
                            <a href="" onclick="confirmDelete({{$question->id}})">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form id="delete-question-{{ $question->id }}" action="{{ route('questions.destroy', $question->id) }}"
                                method="POST" style="display: none;">
                               @csrf
                               @method('DELETE')
                           </form>
                        </span>
                    </div>
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
                You have not post any question yet
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
                title: "Delete Question",
                text: "Are you sure you want to delete this question?",
                icon: "info",
                type: "info",
                showCancelButton: true,
                showConfirmButton: true
            }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $(`#delete-question-${$id}`).submit();
                }
            });
        }
    </script>
@endpush