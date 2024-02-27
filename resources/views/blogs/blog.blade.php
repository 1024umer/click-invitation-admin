@include('header');

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="card-header">
Blogs Create
</div>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label for="short_description">Short Description:</label>
        <textarea class="form-control" id="short_description" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="long_description">Long Description:</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="5" required>{{ old('long_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
    </div>

    <div class="form-group">
        <label for="slug">Slug:</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@include('footer');  