@extends('layouts.master')
@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush
@section('page_title', 'Category')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary my-2">Buat data baru</a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>
                                {{-- <!-- <a href="{{ route('categories.show', $c->id) }}" class="btn btn-primary">Detail</a> --> --}}
                                <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{route('categories.destroy', $cat->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
@endsection

@push('script')
<script src="{{asset('sb_admin/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('sb_admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush