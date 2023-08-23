<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('categories.create') }}">Buat data baru</a>
    <table id="example1" class="table table-bordered table-striped">
        {{-- @dd($genre) --}}
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $c->id) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{route('categories.destroy', $c->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </button> --}}
                          <!-- Modal -->
                          {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Deleting Data category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Are you sure deleting this data? It will not be restored after this action.
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <form action="{{route('categories.destroy', $c->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>