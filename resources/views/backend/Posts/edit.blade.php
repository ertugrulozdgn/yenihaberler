@extends('backend.master')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Yazı Düzenleme</h3>
            </div>

            <div class="box-body">
                <form action="{{ action('Backend\PostsController@update',[$post->id]) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="col-xs-6">
                            <label>Yüklenen Resim</label><br>
                            <img class="img-fluid" src="{{$post->image}}" style="width: 100%; max-width: 300px;" alt="">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Resim Seç <small class="text-muted">(Lüten tekrar dosya seçmeyi unutmayınız!!!)</small></label>
                                <input class="form-control"  type="file" name="image">
                            </div>

                            <div class="col-xs-6">
                                <label>Kategoriler</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{$post->category_id == $category->id ? 'selected=' : ''}}> {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Başlık</label>
                                <input class="form-control" type="text" name="title" value="{{$post->title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Özet</label>
                                <textarea class="form-control" type="text" name="summary" rows="5">{{$post->summary}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>İçerik</label>
                                <textarea id="editor" class="form-control" type="text" name="content">{{$post->content}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <Label>Haberin Yeri</Label>
                                <select class="form-control" name="location">
                                    <option value="1" {{$post->location == 1 ? 'selected' : ''}}>Normal</option>
                                    <option value="2" {{$post->location == 2 ? 'selected' : ''}}>Manşet</option>
                                </select>
                            </div>

                            @if(Auth::user()->role == 'admin' )
                                <div class="col-xs-6">
                                    <label>Haberin Durumu</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{$post->status == 0 ? 'selected' : ''}}>Pasif</option>
                                        <option value="1" {{$post->status == 1 ? 'selected' : ''}}>Aktif</option>
                                    </select>
                                </div>
                            @endif
                    </div>

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Güncelle</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor')
    </script>
@endsection

@section('menu')
    @if(Auth::user()->role == 'admin')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜLER</li>
            <li><a href="{{ action('Backend\DefaultController@index') }}"><i class="fa fa-clone"></i> <span>Anasayfa</span></a></li>
            <li><a href="{{ action('Backend\PostsController@index') }}"><i class="fa fa-clone"></i> <span>Tüm Yazılar</span></a></li>
            <li><a href="{{action('Backend\AuthPostsController@index')}}"><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
            <li class="active"><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
            <li><a href="{{ action('Backend\CategoriesController@index') }}"><i class="fa fa-bars"></i> <span>Kategoriler</span></a></li>
            <li><a href="{{ action('Backend\UsersController@index') }}"><i class="fa fa-users"></i> <span>Editörler</span></a></li>
            <li class="header"></li>
            <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
        </ul>
    @endif
    @if(Auth::user()->role == 'author')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜLER</li>
            <li><a href="{{action('Backend\AuthPostsController@index')}}"><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
            <li class="active"><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
            <li class="header"></li>
            <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
        </ul>
    @endif
@endsection
