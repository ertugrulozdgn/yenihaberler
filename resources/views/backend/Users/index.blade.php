@extends('backend.master')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editörler</h3>

                <div align="right">
                    <a href="{{action('Backend\UsersController@create')}}"><button class="btn btn-warning">Kullanıcı Oluştur</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Profil Fotoğrafı</th>
                        <th>Yetki</th>
                        <th>Ad Soyad</th>
                        <th>Email</th>
                        <th>Üyelik Tarihi</th>
                        <th></th>
                    </tr>
                    <tbody>
                        @foreach($users as $user)
                        <tr id="item-{{$user->id}}" class="{{ $user->status == 0 ? 'alert alert-light' : '' }}">
                            <td width="150"><img class="img-fluid" src="/images/{{$user->image}}" style="max-width: 100px;" alt=""></td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('j F Y H:i') }}</td>
                            <td width="5"><a href="{{action('Backend\UsersController@edit',[$user->id])}}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $user->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylıyor musunuz?','Bu işlem geri alınamaz',
                function () {
                    $.ajax({
                        type:"DELETE",
                        url:"users/"+destroy_id,
                        success: function (msg) {
                            if (msg)
                            {
                                $("#item-"+destroy_id).remove();
                                alertify.success("Silme işlemi Başarılı");
                            }
                            else
                            {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        }
                    });

                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.')
                },
            )
        });
    </script>

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
