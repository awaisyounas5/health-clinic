@extends('layouts.landing')
@section('content')
    <section class="page-title page-title-layout5 bg-overlay">
        <div class="bg-img"><img src="assets/images/page-titles/8.jpg" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">Health Essentials</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-title -->

    <!-- ======================
    Blog Grid
    ========================= -->
    <section class="blog-grid">
        <div class="container">
            <div class="row">

                @foreach ($blogs as $blog)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="post-item">
                        <div class="post__img">
                            <a href="blog-single-post.html">
                                <img src="{{asset('assets/upload/'.$blog->thumbnail)}}" alt="post image" loading="lazy">
                            </a>
                        </div>
                        <!-- /.post__img -->
                        <div class="post__body">
                            <div class="post__meta-cat">
                                <a href="#">{{$blog->blog_category->title}}</a>
                            </div>
                            <!-- /.blog-meta-cat -->
                            <div class="post__meta d-flex">
                                <span class="post__meta-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                <a class="post__meta-author" href="#">{{ucwords(str_replace('_', ' ', $blog->user->name))}}</a>
                            </div>
                            <h4 class="post__title"><a href="#">{{$blog->title}}</a></h4>

                            <p class="post__desc">{!! Str::limit($blog->description,200)!!}
                            </p>
                            <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                                <span>Read More</span>
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                        <!-- /.post__body -->
                    </div>
                    <!-- /.post-item -->
                </div>
                @endforeach

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="pagination-area">
                        <ul class="pagination justify-content-center">
                            @if ($blogs->onFirstPage())
                                <li class="disabled"><a href="#">&laquo;</a></li>
                            @else
                                <li><a href="{{ $blogs->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                @if ($i == $blogs->currentPage())
                                    <li class="current"><a href="#">{{ $i }}</a></li>
                                @else
                                    <li><a href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            @if ($blogs->hasMorePages())
                                <li><a href="{{ $blogs->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="disabled"><a href="#">&raquo;</a></li>
                            @endif
                        </ul>
                    </nav>

                    <!-- .pagination-area -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@endsection
