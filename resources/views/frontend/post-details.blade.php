@extends('frontend.master')

@section('content')
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                    <div class="post-single-image">
                        <img src="{{ asset('uploads/post/preview') }}/{{ $post->preview_image }}" alt="">
                    </div>

                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">
                            <h2>{{ $post->title }}</h2>
                            <ul class="entry-meta">
                                @if ($post->author->photo != '')
                                    <li class="post-author-img"><img
                                            src="{{ asset('uploads/author') }}/{{ $post->author->photo }}" alt="">
                                    </li>
                                @else
                                    <li class="post-author-img"><img src="assets/img/author/1.jpg" alt=""></li>
                                @endif
                                <li class="post-author"> <a
                                        href="{{ route('author.post', $post->author->id) }}">{{ $post->author->name }}</a>
                                </li>
                                <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span
                                            class="line"></span> Livestyle</a></li>
                                <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                            </ul>

                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">

                            {!! $post->description !!}

                        </div>

                        <!--post-single-bottom-->
                        <div class="post-single-bottom">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">
                                    @foreach ($tags as $tag)
                                        <li>
                                            <a
                                                href="blog-layout-2.html">{{ App\Models\Tag::where('id', $tag)->first()->name }}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    @if ($post->author->photo != '')
                                        <li class="post-author-img"><img
                                                src="{{ asset('uploads/author') }}/{{ $post->author->photo }}"
                                                alt="">
                                        </li>
                                    @else
                                        <li class="post-author-img"><img src="{{ asset('assets/img/author/1.jpg') }}"
                                                alt=""></li>
                                    @endif
                                </div>
                                <div class="content">
                                    <h4>{{ $post->author->name }}</h4>
                                    <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni.
                                        Pede vidi condimentum et aenean hendrerit.
                                        Quis sem justo nisi varius.
                                    </p>
                                    <div class="social-media">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--post-single-Related posts-->
                        <div class="post-single-next-previous">
                            <div class="row ">
                                <!--prevvious post-->
                                <div class="col-md-6">
                                    <div class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="assets/img/blog/1.jpg" alt="...">
                                            </a>
                                        </div>

                                        <div class="small-post-content">
                                            <small> <a href="post-single.html"> <i class="las la-arrow-left"></i>Previous
                                                    post</a></small>

                                            <p>
                                                <a href="post-single.html">You can’t build a reputation on what you are
                                                    going to do.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/-->

                                <!--next post-->
                                <div class="col-md-6">
                                    <div class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="assets/img/blog/2.jpg" alt="...">
                                            </a>
                                        </div>

                                        <div class="small-post-content">
                                            <small> <a href="post-single.html">Next post <i
                                                        class="las la-arrow-right"></i></a> </small>
                                            <p>
                                                <a href="post-single.html">Brand yourself for the career you want, not the
                                                    job you have</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/-->
                            </div>
                        </div>
                        <!--post-single-Ads-->
                        <div class="post-single-ads ">
                            <div class="ads">
                                <img src="{{ asset('frontend_assets/img/ads/ads.jpg') }}" alt="">
                            </div>
                        </div>

                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Comments-->
                            <h4>{{ $count }} Comments</h4>
                            <ul class="comments">
                                <!--comment1-->

                                @forelse ($comments as $comment)
                                    <li class="comment-item pt-0">
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <img src="{{ asset('frontend_assets/img/other/use2.jpg') }}"
                                                        alt="">
                                                    <li>{{ $comment->author_name }}</li>
                                                    <li class="slash"></li>
                                                    <li>{{ $comment->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                            <p>{{ $comment->comment_body }}
                                            </p>
                                            <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                        </div>

                                    </li>
                                @empty
                                    <h2>No Comment Found!</h2>
                                @endforelse

                            </ul>
                            <!--Leave-comments-->
                            <div class="comments-form">
                                <h4>Leave a Reply</h4>
                                <!--form-->
                                <form class="form " action="{{ route('add.comment') }}" method="POST"
                                    id="main_contact_form">
                                    @csrf
                                    <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                                    @if (session('comment_success'))
                                        <div class="alert alert-success contact_msg" role="alert">
                                            {{ session('comment_success') }}
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Name*" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Email*" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"
                                                    required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="post_id" id="post_id"
                                                        class="form-control" placeholder="post Id*"
                                                        value="{{ $post->id }}" required="required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn-custom">
                                                Send Comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--/-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--instagram-->
    <div class="instagram">
        <div class="container-fluid">
            <div class="instagram-area">
                <div class="instagram-list">
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/1.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>

                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/2.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/3.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/4.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/5.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="assets/img/instagram/6.jpg" alt="">
                            <div class="icon">
                                <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
