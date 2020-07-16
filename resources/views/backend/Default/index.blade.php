@extends('backend.master')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Anasayfa</h3>
            </div>

            <div class="box-body">
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Konum</th>
                            <th>Yazar</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Son Güncelleyen</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="{{ $post->link }}" target="_blank"><img class="img-fluid" src="{{$post->image}}" style="max-width: 120px;" alt=""></a></td>
                                <td><a href="{{ $post->link }}" target="_blank" style="color: black">{{ $post->title }}</a></td>
                                <td>{{ $post->location_name }}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{ $post->created_at->format('j F Y H:i')}}</td>
                                <td>{{ $post->updated_by}}</td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('menu')
   @if(Auth::user()->role == 'admin')
       <ul class="sidebar-menu" data-widget="tree">
           <li class="header">MENÜLER</li>
           <li><a href="{{ action('Backend\DefaultController@index') }}"><i class="fa fa-clone"></i> <span>Anasayfa</span></a></li>
           <li><a href="{{ action('Backend\PostsController@index') }}"><i class="fa fa-clone"></i> <span>Tüm Yazılar</span></a></li>
           <li><a href="{{action('Backend\AuthPostsController@index')}}"><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
           <li><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
           <li><a href="{{ action('Backend\CategoriesController@index') }}"><i class="fa fa-bars"></i> <span>Kategoriler</span></a></li>
           <li><a href="{{ action('Backend\UsersController@index') }}"><i class="fa fa-users"></i> <span>Editörler</span></a></li>
           <li class="header"></li>
           <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
       </ul>
   @endif
   @if(Auth::user()->role == 'author')
       <ul class="sidebar-menu" data-widget="tree">
           <li class="header">MENÜLER</li>
           <li><a href="{{ action('Backend\DefaultController@index') }}"><i class="fa fa-clone"></i> <span>Anasayfa</span></a></li>
           <li><a href="{{action('Backend\AuthPostsController@index')}}"><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
           <li><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
           <li class="header"></li>
           <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
       </ul>
   @endif
@endsection

