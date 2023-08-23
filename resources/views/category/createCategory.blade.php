<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<body>
    <form method="post" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name">
        </div>
        <input type="submit" class="btn btn-primary" value="Input Category">
    </form>
</body>
</html>