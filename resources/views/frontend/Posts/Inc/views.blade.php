
<div class="col-md-3 font-weight-bold postView">
    <h6 class="text-muted mt-4 postView"><b>Bugün En Çok Okunanlar</b></h6>

    <hr class="postView">

    @php $i = 1 @endphp
    @foreach($postTodayViews as $postTodayView)
        <div class="card border-0 ">
            <div class="row mt-3 ">
                <div class="col-md-5 p-0">
                    <span class="notify-badge"><b>{{ $i }}</b></span>
                    <a href="{{ $postTodayView->link }}"><img class="card-img-left img-fluid" style="min-height: 80px" src="{{ $postTodayView->image }}" alt="{{ $postTodayView->titke }}"></a>

                </div>
                <div class="col-md-7 postView">
                    <div class="card-body right-news-card-body" >
                        <a class="text-dark" href="{{ $postTodayView->link }}"><h6 class="m-0"><b>{{ $postTodayView->title }}</b></h6></a>
                        <span class="text-muted" style="font-size: 12px;"><i style="color: green;" class="fas fa-eye"></i> {{ $postTodayView->hit }}</span>

                    </div>
                </div>
            </div>
        </div>
        @php $i++ @endphp
    @endforeach

    <br>
    <br>

    <h6 class="text-muted mt-4 postView"><b>En Çok Okunanlar</b></h6>

    <hr class="postView">

    @php $i = 1 @endphp
    @foreach($postsViews as $postView)
    <div class="card border-0">
        <div class="row mt-3">
            <div class="col-md-5 p-0 postView">
                <span class="notify-badge"><b>{{ $i }}</b></span>
                <a href="{{$postView->link}}"><img class="card-img-left img-fluid" style="min-height: 80px" src="{{ $postView->image }}" alt="{{ $postView->titke }}"></a>

            </div>
            <div class="col-md-7 postView">
                <div class="card-body right-news-card-body" >
                    <a class="text-dark" href="{{ $postView->link }}"><h6 class="m-0"><b>{{ $postView->title }}</b></h6></a>
                    <span class="text-muted" style="font-size: 12px;"><i style="color: green;" class="fas fa-eye"></i> {{ $postView->hit }}</span>

                </div>
            </div>
        </div>
    </div>
    @php $i++ @endphp
    @endforeach

    <h6 class="text-muted mt-5 postView"><b>Sosyal Medya</b></h6>

    <hr class="postView">

    <button class="social-media mt-1 mr-2 postView" style="background-color: #3059B0;"><i class="fab fa-facebook-f"></i></button>
    <button class="social-media mt-1 mr-2 postView" style="background-color: #55ACEF;"><i class="fab fa-twitter"></i></button>
    <button class="social-media mt-1 mr-2 postView" style="background-color: #F77737;"><i class="fab fa-instagram"></i></button>
    <button class="social-media mt-1 mr-2 postView" style="background-color: #CD201F;"><i class="fab fa-youtube"></i></button>
</div>

