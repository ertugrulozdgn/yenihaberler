@extends('frontend.master')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div id="control" class="carousel slide col-md-6 mt-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#control" data-slide-to="0" class="active"></li>
                    <li data-target="#control" data-slide-to="1" ></li>
                    <li data-target="#control" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                @foreach($headlines as $headline)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} hover-img ">
                        <a href="{{ $headline->link }}">
                            <img class="img-fluid" src="{{$headline->image}}" alt="Manset">
                            <div class="carousel-caption content">
                                <span class="badge mr-2">{{ $headline->category->title }}</span>
                                <span style="font-size: 12px;"><i class="far fa-clock"></i> {{$headline->created_at->diffForHumans()}}</span>
                                <h4><b>{{ $headline->title }}</b></h4>

                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
                <a href="#control" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Previous</span></a>

                <a href="#control" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            @foreach($headlines_middle as $headline_middle)
            <div class="col-md-3 mt-3 hover-img">
                <div class="card card-middle border-0">
                    <a href="{{ $headline_middle->link }}">
                        <img class="card-img card-img-middle img-fluid" src="{{$headline_middle->image}}" alt="Manset">
                        <div class="card-img-overlay d-flex align-content-end flex-wrap text-white">
                            <span class="badge mr-2">{{$headline_middle->category->title}}</span>
                            <span style="font-size: 12px;"><i class="far fa-clock"></i> {{$headline_middle->created_at->diffForHumans()}}</span>
                            <h5><b>{{$headline_middle->title}}</b></h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach


            <div class="col-md-3 mt-3">
                @foreach($headlines_right as $headline_right)
                    <a href="{{ $headline_right->link }}" class="hover-img">
                        <div class="card border-0 {{ $loop->first ? 'mb-1' : '' }}">
                            <img class="card-img card-img-right" src="{{$headline_right->image}}" alt="Manset">
                            <div class="card-img-overlay d-flex align-content-end flex-wrap text-white" style="margin-top: 85px;">
                                <span class="badge mr-2">{{$headline_right->category->title}}</span>
                                <span style="font-size: 10px;"><i class="far fa-clock"></i> {{$headline_right->created_at->diffForHumans()}}</span>
                                <h6><b>{{$headline_right->title}}</b></h6>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h6 class="text-muted mt-4"><b>Başlıca Haberler</b></h6>

                <hr>

                @foreach($posts as $post)
                <div class="card border-0 mt-4">
                    <div class="row hover-img">
                        <div class="col-md-5">
                            <a href="{{ $post->link }}"><img class="card-img-left img-fluid news-img" src="{{ $post->image }}" alt="Başlıca Haberler"></a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body news-card-body px-0">
                                <span class="badge badge-dark mb-1" >{{ $post->category->title }}</span>
                                <a class="text-dark" href="{{ $post->link }}"><h5 class="news-text"><b>{{$post->title}}</b></h5></a>
                                <span class="text-muted news-author mr-1">{{$post->user->name}}</span>
                                <span class="mr-1">|</span>
                                <span class="text-muted mr-1" style="font-size: 12px;"><i class="far fa-clock"></i> {{$post->created_at->diffForHumans()}}</span>
{{--                                <span class="mr-1">|</span>--}}
{{--                                <span class="dropdown">--}}
{{--                                    <span class="dropdown-toggle dropdown-toggle-share text-muted" id="dropdownMenuButton" data-toggle="dropdown" style="font-size: 12px;">--}}
{{--                                        <i class="fas fa-share"></i>--}}
{{--                                    </span>--}}
{{--                                    <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                        <a class="dropdown-item" href="#"><i class="fab fa-facebook-f dropdown-item-news-i"></i> Facebook</a>--}}
{{--                                        <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-news-i"></i>Twitter</a>--}}
{{--                                        <a class="dropdown-item" href="#"><i class="fas fa-envelope dropdown-item-news-i"></i>Email</a>--}}
{{--                                    </span>--}}
{{--                                </span>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <hr>

                {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}

                <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

            </div>

            @include('frontend.Posts.Inc.views')

        </div>
    </div>

    <script>
        // ===== Scroll to Top ====
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 750) {        //750px ten sonra ortaya çıksın
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop : 0
            }, 500);
        });
    </script>
@endsection
