@extends('layouts.master')

@section('content')
    <h1>Edit Profile</h1>
    <form action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mt-2">
            <div class="col-12">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" disabled>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" value="{{$user->age}}">
                @error('age')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <label for="bio">Bio</label>
                <textarea name="bio" cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
                @error('bio')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{$user->address}}" maxlength="45">
                @error('address')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <button id="btn-submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    @include('sweetalert::alert')
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#btn-submit').click(function(event){
            var form =  $(this).closest("form");
            event.preventDefault();
            new swal({
                title: "Edit Profile",
                text: "Are you sure you want to edit your profile?",
                icon: "info",
                type: "info",
                showCancelButton: true,
                showConfirmButton: true
            }).then((willEdit) => {
                if (willEdit.isConfirmed) {
                    form.submit();
                }
            });
        });

    </script>
@endpush