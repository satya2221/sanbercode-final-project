@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create new questions</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('questions.update', $question->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Question Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Question Title" value="{{$question->title}}">
                    @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Question Category</label>
                    <select name="category[]" id="select-category" class="form-control" multiple="multiple">
                        @foreach ($categories as $category)
                            @if (in_array($category->id, $question->question_category->pluck('category_id')->toArray()))
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Question Content</label>
                    <textarea name="content" class="form-control" id="input-content" cols="30" rows="10" placeholder="Question Content">{!!$question->content!!}</textarea>
                    @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary" id="btn-submit" value="Edit Question">
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