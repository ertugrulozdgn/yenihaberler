@extends('frontend.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 pr-4">
                <ol class="breadcrumb bg-white p-0 mt-5 mb-2">
                    <li class="breadcrumb-item"><a class="text-muted" href="#">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a class="text-muted" href="#">{{ $post->category->title }}</a></li>
                    <li class="breadcrumb-item"><a class="text-muted" href="#"><b>{{ $post->title }}</b></a></li>
                </ol>

                <h2 class="font-weight-bold detailTitle">{{ $post->title }}</h2>

                <span class="text-muted">{{ $post->user->name }}</span>
                <span class="text-muted">—</span>
                <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>

                <div class="addthis_inline_share_toolbox mt-2"></div>



                <div class="row">
{{--                    <div class="col-md-1 mt-4" style="position: sticky;">--}}
{{--                        <span class="detail-share text-muted text-center">PAYLAŞ</span>--}}
{{--                        <a href="" class="btn btn-primary detail-share-facebook mt-2"><i class="fab fa-facebook-f detail-share-facebook-icon"></i></a>--}}
{{--                        <a href="" class="btn btn-info detail-share-twitter"><i class="fab fa-twitter detail-share-twitter-icon"></i></i></a>--}}
{{--                        <hr>--}}
{{--                        <a href="" class="btn btn-light detail-share-comment"><i class="far fa-comment-dots detail-share-comment-icon"></i></a>--}}
{{--                    </div>--}}
                    <div class="col-md-12">
                        <p class="detailDescription mt-2" style="text-align: justify;">{{ $post->summary }}</p>

                        <p id="p" type="text" class="detailContent">{!!  $post->content !!}</p>
                    </div>
                </div>

                <hr>

                <h6 class="text-muted mt-4"><b>Benzer Haberler</b></h6>


                <div class="row">
                    @foreach($otherPosts as $otherPost)
                    <div class="col-md-4">
                        <a href="{{ $otherPost->link }}">
                            <div class="card mt-2 ">
                                <img class="card-img-top other-news" src="{{ $otherPost->image }}">
                            </div>
                            <div class="card-body p-0">
                                <h6 class="font-weight-bold text-dark" style="text-align: justify">{{ $otherPost->title }}</h6>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            @include('frontend.Posts.Inc.views')

        </div>
    </div>
@endsection
