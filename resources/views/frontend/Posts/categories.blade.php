@extends('frontend.master')
@section('content')
    <div class="container-fluid" style="background-color: #fafafa; height: 110px;">
        <div class="text-center p-4">
            @if(count($posts) > 0)

                <span class="m-0 subtitle">KATEGORİ</span>
                <h2 class="categoriesTitle">{{ $category->title }}</h2>

            @else

                <h2 class="categoriesTitle">{{ $category->title }}</h2>
                <span class="m-0 subtitle">KATEGORİSİNDE ŞİMDİLİK HABER YOK</span>

            @endif
        </div>


    </div>

    <hr class="mt-0">

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">

                @foreach($posts as $post)
                <div class="card border-0 mt-4">
                    <div class="row hover-img">
                        <div class="col-md-5">
                            <a href="{{ $post->link }}"><img class="card-img-left img-fluid news-img" src="{{ $post->image }}" alt="Başlıca Haberler"></a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body news-card-body px-0">
                                <span class="badge badge-dark mb-1">{{ $post->category->title }}</span>
                                <span class="badge badge-dark mb-1">{{ $post->category->title }}</span>
                                <a class="text-dark" href="{{ $post->title }}"><h5 class=" news-text"><b>{{ $post->title }}</b></h5></a>
                                <span class="text-muted news-author mr-1">{{ $post->user->name }}</span>
                                <span class="mr-1">|</span>
                                <span class="text-muted mr-1" style="font-size: 12px;"><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                                <span class="mr-1">|</span>
                                <span class="dropdown">
                                <span class="dropdown-toggle dropdown-toggle-share text-muted" id="dropdownMenuButton" data-toggle="dropdown" style="font-size: 12px;">
                                    <i class="fas fa-share"></i>
                                </span>
                                <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fab fa-facebook-f dropdown-item-news-i"></i> Facebook</a>
                                    <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-news-i"></i>Twitter</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-envelope dropdown-item-news-i"></i>Email</a>
                                </span>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            @include('frontend.Posts.Inc.views')

        </div>
    </div>

@endsection
