@extends('layouts.master')

@section('content')
    <h1>Edit Jawaban</h1>
    <div class="card border-left-primary shadow mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $answer->question->title }}</h6>
        </div>
        <div class="card-body">
            <p class="card-text">{!! $answer->question->content !!}</p>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit your answer for the question from {{ $answer->question->user->name }}</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('answers.update', $answer->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="content">Your Answer</label>
                    <textarea name="content" class="form-control" id="input-content" cols="30" rows="10" placeholder="Question Content">{!!$answer->content!!}</textarea>
                    @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary" id="btn-submit" value="Edit Answer">
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tinymce.init({
            selector: 'textarea#input-content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table',
            elementpath: false
        });

        $('#btn-submit').click(function(event){
            var form =  $(this).closest("form");
            event.preventDefault();
            new swal({
                title: "Edit Question",
                text: "Are you sure you want to edit this question?",
                icon: "info",
                type: "info",
                showCancelButton: true,
                showConfirmButton: true
            }).then((willPost) => {
                if (willPost.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endpush