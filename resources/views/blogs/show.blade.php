<title>Click Invitations - Users</title>
@include('header')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Blog</h4>
                            <a href="{{ route('blog.list') }}" class="btn btn-secondary ml-2 text-white export">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                        
                                <img  src="{{ asset('storage/' . $blog->image) }}" alt="" style="width:100%; height: 100%;">
                                 <h1 class="title mt-5">{{ $blog->title }}</h1>  
                                 <p class=" short_description"><?php print($blog->short_description); ?></p>
                                 <p class="long_description"><?php print($blog->long_description ); ?></p>
                                  <p class="date-time">{{ $blog->created_at }}</p>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('footer')
<style>
.table-responsive{
    font-size: 19px;
}
</style>