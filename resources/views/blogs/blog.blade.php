@include('header');

<section class="container my-5">
    <form action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2>Blogs Create</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ isset($blog) ? $blog->title : '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" id="slug" name="slug" readonly
                        value="{{ isset($blog) ? $blog->slug : '' }}">
                    <small>Slug will be generated automatically.</small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="short_description">Short Description:</label>
            <textarea class="form-control" id="short_description" name="short_description" rows="3" required>{{ isset($blog) ? $blog->short_description : '' }}</textarea>
        </div>

        <div class="form-group">
            <label>Long Description:</label>
            <textarea class="form-control" id="editor" name="long_description" rows="5">{{ isset($blog) ? print $blog->long_description : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        @if (isset($blog))
            <div class="my-3">
                <label for="">Curent Image</label>
                <img src="{{ asset('storage/' . $blog->image) }}" width="100" height="100">
            </div>
        @endif
        <div class="form-group">
            <label>Page Title</label>
            <input class="form-control" name="page_title" required value="{{ isset($blog) ? $blog->page_title : '' }}">
            <small>This title belongs to the browser's tab</small>
        </div>

        <div class="form-group">
            <label>Meta Tag</label>
            <input class="form-control" name="meta_tag" required value="{{ isset($blog) ? $blog->meta_tag : '' }}">
            <small>Please write complete meta tag</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            removePlugins: ['EasyImage', 'ImageUpload'],
            shouldNotGroupWhenFull: true,
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function() {
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w-]+/g, '')
                .replace(/--+/g, '-');
        }

        $('#title').on('input', function() {
            var titleValue = $(this).val();
            var slugValue = slugify(titleValue);
            $('#slug').val(slugValue);
        });
    });
</script>
@include('footer');
