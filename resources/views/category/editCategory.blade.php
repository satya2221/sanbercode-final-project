<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>
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
</body>
</html>