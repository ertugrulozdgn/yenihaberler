@extends('backend.master')
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editör Ekleme</h3>
            </div>
            <div class="box-body">
                <form action="{{action('Backend\UsersController@store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Profil Fotoğrafı</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Adı Soyadı</label>
                                <input class="form-control" type="text" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Şifre</label>
                                <input class="form-control" type="password" name="password" required autocomplete="new-password">
                                <small class="form-text text-muted">Şifreniz 8-20 karakter uzunluğunda olmalıdır.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Şifreyi Onayla</label>
                                <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Yetki</label><br>
                                <select class="form-control" name="role">
                                    <option value="author" {{old('role') == 'author' ? 'selected' : ''}}>Yazar</option>
                                    <option value="admin" {{old('role') == 'admin' ? 'selected' : ''}}>Admin</option>
                                </select>
                            </div>


                            <div class="col-xs-6">
                                <label>Durum</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Aktif</option>
                                    <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer" align="right">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
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
            <li  class="active"><a href="{{ action('Backend\UsersController@index') }}"><i class="fa fa-users"></i> <span>Editörler</span></a></li>
            <li class="header"></li>
            <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
        </ul>
    @endif

@endsection
