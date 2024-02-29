@include('header');

<section class="container my-5">
    <form action="{{ isset($blog) ? route('blog.update', $blog->slug) : route('blog.store') }}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2>Blogs {{ isset($blog) ? 'Update' : 'Create' }}</h2>
        {{-- @if (session('error'))
            <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title"
                        name="title" value="{{ old('title', isset($blog) ? $blog->title : '') }}" >
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" id="slug" name="slug"
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
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  {{ isset($blog) ? '' : 'required' }}>
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
            <input class="form-control" name="meta_tag" value="{{ isset($blog) ? $blog->meta_tag : '' }}">
            <small>Please write complete meta tag</small>
        </div>
        <div class="form-group">
            <label> Is Trending?</label>
            <input type="checkbox" name="is_trending" {{ isset($blog) && $blog->is_trending == 1 ? 'checked' : '' }}
                id="">
        </div>
        <div class="form-group">
            <label> Is Popular?</label>
            <input type="checkbox" name="is_popular" {{ isset($blog) && $blog->is_popular == 1 ? 'checked' : '' }}id="">
        </div>
        <div class="form-group">
            <label> Is Latest?</label>
            <input type="checkbox" name="is_latest" {{ isset($blog) && $blog->is_latest == 1 ? 'checked' : '' }}
                id="">
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
