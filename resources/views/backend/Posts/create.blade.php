@extends('backend.master')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Yazı Ekleme</h3>
            </div>

            <div class="box-body">
                <form action="{{ action('Backend\PostsController@store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Resim Seç</label>
                                <input class="form-control"  type="file" name="image">
                            </div>

                            <div class="col-xs-6">
                                <label>Oluşturulma Tarihi</label><br>
                                <input class="form-control" type="datetime" name="" value="{{date("Y-m-d H:i")}}" readonly>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Kategoriler</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id  ? 'selected' : ''}}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Başlık</label>
                                <input class="form-control" type="text" name="title" value="{{old('title')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Özet</label>
                                <textarea class="form-control" type="text" name="summary" rows="5" >{{old('summary')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>İçerik</label>
                                <textarea id="editor" class="form-control" type="text" name="content">{{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                              <Label>Haberin Yeri</Label>
                                <select class="form-control" name="location">
                                    <option value="1" {{old('location') == 1 ? 'selected' : ''}}>Normal</option>
                                    <option value="2" {{old('location') == 2 ? 'selected' : ''}}>Manşet</option>
                                </select>
                            </div>

                            @if(Auth::user()->role == 'admin' )
                                <div class="col-xs-6">
                                    <label>Haberin Durumu</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Pasif</option>
                                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Aktif</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Kaydet</button>
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
            <li><a href="{{ action('Backend\DefaultController@index') }}"><i class="fa fa-clone"></i> <span>Anasayfa</span></a></li>
            <li><a href="{{action('Backend\AuthPostsController@index')}}"><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
            <li class="active"><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
            <li class="header"></li>
            <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
        </ul>
    @endif
@endsection
