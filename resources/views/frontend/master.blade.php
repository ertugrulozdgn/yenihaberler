<!doctype html>
<html lang="en">
<head>

    <title>Yeni Haberler</title>

    <meta charset="utf-8">
    <meta name="description" content="Yeni Haberler Web Sitesi">
    <meta name="keywords" content="yeni haberler,yenihaberler,haber,haberler">
    <meta name="author" content="Ertuğrul ÖZDOĞAN">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/custom.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity=" sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>


    {{--Adsense--}}
    <script data-ad-client="ca-pub-8534781179674476" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<body>


@widget('header')

@yield('content')



<footer class="container-fluid text-muted mt-4">
    <div class="container">
        <span><b>YENİHABERLER YAYIN GRUBU</b></span>
        <span style="float: right;"><b>Ertuğrul ÖZDOĞAN</b></span><br>
        <span>yenihaberler Yayın Grubu Tüm Hakları Saklıdır © 2020</span>
        <span style="float: right;">Yazılım ve Sistem Yönetimi</span>
    </div>
</footer>



<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ec8f52cd70a1e82"></script>




</body>
</html>
