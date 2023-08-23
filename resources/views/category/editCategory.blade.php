@extends('layouts.master')
@section('page_title', 'Edit Category')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create new categories</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Edit category name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
        
            <p>Apapun yang berubah akan tersimpan setelah disubmit dengan tombol dibawah ini</p>
            <input type="submit" class="btn btn-danger" value="Update Data Category">
        </form>
    </div>
</div>
@endsection