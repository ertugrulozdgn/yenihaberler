<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand mr-4" href="{{ route('news.home') }}"><img style="max-width: 160px; margin-left: -20px;" src="/frontend/images/yenihaberlerlogo.png" alt="Haber Logo"></a>
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#menuopen">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuopen">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.home') }}">ANASAYFA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.category',['slug' => 'haber']) }}">HABER</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">KATEGORİLER</a>
                    <div class="dropdown-menu">
                        @foreach($categories as $category)
                            <a class="dropdown-item mb-2" href="{{ $category->link }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            @include('frontend.Posts.Inc.search')

            <div id="social-links">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http://yenihaberler.online"><i class="fab fa-facebook-f fa-lg mr-4"></i></a>
                <a href="https://twitter.com/intent/tweet?text=Yeni Haberler &amp;url=http://yenihaberler.com"><i class="fab fa-twitter fa-lg mr-4"></i></a>
                <a href="https://wa.me/?text=http://yenihaberler.online"><i class="fab fa-whatsapp fa-lg"></i></a>
            </div>


        </div>
    </div>
</nav>
