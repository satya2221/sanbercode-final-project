@extends('layouts.master')

@section('search')
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="/user_question">
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
    <h1>All of Your Question</h1>
    <div class="row">
        <div class="col-4">
            <a href="{{route('questions.create')}}" class="btn btn-primary">Ask another Question</a>
        </div>
    </div>

    @include('sweetalert::alert')
    
    @forelse ($questions as $question)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{route('answers.show', $question->id)}}">{{$question->title}}</a>
                        {{-- Ask by {{$question->user->name}} --}}
                        <span class="float-right">
                            <a href="{{route('questions.edit', $question->id)}}"><i class="fas fa-edit ml-2"></i></a>
                            {{-- <a href="{{route('questions.destroy', $question->id)}}" data-confirm-delete="true"><i class="fas fa-trash"></i></a> --}}
                            <a href="" onclick="confirmDelete({{$question->id}})">
                                <i class="fas fa-trash ml-2"></i>
                            </a>
                            <form id="delete-question-{{ $question->id }}" action="{{ route('questions.destroy', $question->id) }}"
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
                        <div class="row">
                            <div class="col-12">
                                <p>#{{implode(' #', $question->category->pluck('name')->toArray())}}</p>
                            </div>
                        </div>
                        <p class="card-text">{!! $question->content !!}</p>
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