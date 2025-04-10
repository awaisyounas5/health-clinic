@extends('layouts.landing')
@section('content')
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="blog blog-single pt-0 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="post-item mb-0">
                        <div class="post__img">
                            <a href="#">
                                <img src="{{ asset('assets/upload/'.$blog->thumbnail) }}" alt="post image" loading="lazy">
                            </a>
                        </div>
                        <!-- /.post-img -->
                        <div class="post__body pb-0">
                            <div class="post__meta-cat">
                                <a href="#">{{$blog->blog_category->title}}</a>
                            </div>
                            <!-- /.blog-meta-cat -->
                            <div class="post__meta d-flex align-items-center mb-20">
                                <span class="post__meta-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                <a class="post__meta-author" href="#">{{ucwords(str_replace('_', ' ', $blog->user->name))}}</a>

                            </div>
                            <!-- /.blog-meta -->
                            <h1 class="post__title mb-30">
                               {{$blog->title}}
                            </h1>
                            <div class="post__desc">
                               {!! $blog->description !!}
                            </div>
                            <!-- /.blog-desc -->
                        </div>
                    </div>

                    <div class="widget-nav d-flex justify-content-between mb-40">
                        @if($previous)
                        <a href="{{route('single_blog',$previous->slug)}}" class="widget-nav__prev d-flex flex-wrap">
                            <div class="widget-nav__img">
                                <img src="{{ asset('assets/upload/'.$previous->thumbnail) }}" alt="blog thumb">
                            </div>
                            <div class="widget-nav__content">
                                <span>Previous Post</span>
                                <h5 class="widget-nav__ttile mb-0">{{@$previous->title}}</h5>
                            </div>
                        </a>
                        @endif
                        @if($next)
                        <!-- /.widget-prev  -->
                        <a href="{{route('single_blog',$next->slug)}}" class="widget-nav__next d-flex flex-wrap">
                            <div class="widget-nav__img">
                                <img src="{{ asset('assets/upload/'.$next->thumbnail) }}" alt="blog thumb">
                            </div>
                            <div class="widget-nav__content">
                                <span>Next Post</span>
                                <h5 class="widget-nav__ttile mb-0">{{@$next->title}}</h5>
                            </div>
                        </a>
                        @endif
                        <!-- /.widget-next  -->
                    </div>

                </div>

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar">


                        <div class="widget widget-posts">
                            <h5 class="widget__title">Recent Posts</h5>
                            <div class="widget__content">
                               @foreach ($blogs as $blog_recent )

                                <div class="widget-post-item d-flex align-items-center">
                                    <div class="widget-post__img">
                                        <a href="{{route('single_blog',$blog_recent->slug)}}"><img src="{{asset('assets/upload/'.$blog_recent->thumbnail)}}" alt="thumb"></a>
                                    </div>
                                    <!-- /.widget-post-img -->
                                    <div class="widget-post__content">
                                        <span class="widget-post__date">{{ \Carbon\Carbon::parse($blog_recent->created_at)->format('M d, Y') }}</span>
                                        <h4 class="widget-post__title"><a href="{{route('single_blog',$blog_recent->slug)}}">{{$blog_recent->title}}</a>
                                        </h4>
                                    </div>
                                    <!-- /.widget-post-content -->
                                </div>
                               @endforeach
                            </div>
                            <!-- /.widget-content -->
                        </div>
                        <!-- /.widget-posts -->
                        <div class="widget widget-categories">
                            <h5 class="widget__title">Categories</h5>
                            <div class="widget-content">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($category_counts as $count)

                                    <li><a href="#"><span class="cat-count">{{@$count->count}}</span><span>{{@$count->title}}</span></a></li>
                                    @endforeach

                                    </li>
                                </ul>
                            </div>
                            <!-- /.widget-content -->
                        </div>


                    </aside>
                    <!-- /.sidebar -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@endsection
