@extends('layouts.master')
@section('page_title', 'Create Category')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create new categories</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category Name">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Input Category">
        </form>
    </div>
</div>
@endsection