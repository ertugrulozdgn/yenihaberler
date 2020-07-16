@extends('backend.master')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kategoriler</h3>
                <div align="right">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#createModal">Kategori Oluştur</button>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Başlık</th>
                        <th>slug</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr id="item-{{ $category->id }}">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td width="5"><a class="button" style="border-radius: 50%" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            @if($category->id > 1)
                                <td width="5"><a href="javascript:void(0)" class="button" style="border-radius: 50%"><i id="{{ $category->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                            @endif
                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </section>




    {{--MODAL--}}

    <!-- Create -->
    <div class="modal fade" id="createModal" tabindex="-1" r>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Yeni Kategori</h4>
                </div>
                <form action="{{ action('Backend\CategoriesController@store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Yeni Kategori</h4>
                </div>
                <form action="{{ action('Backend\CategoriesController@update',[$category->id]) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Güncelle</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--Delete--}}
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
                        url:"categories/"+destroy_id,
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
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÜLER</li>
        <li><a href="{{ action('Backend\DefaultController@index') }}"><i class="fa fa-clone"></i> <span>Anasayfa</span></a></li>
        <li><a href="{{ action('Backend\PostsController@index') }}"><i class="fa fa-clone"></i> <span>Tüm Yazılar</span></a></li>
        <li><a href=""><i class="fa fa-file-o"></i> <span>Yazılarım</span></a></li>
        <li><a href="{{ action('Backend\PostsController@create') }}"><i class="fa fa-plus"></i> <span>Yazı Ekle</span></a></li>
        <li  class="active"><a href="{{ action('Backend\CategoriesController@index') }}"><i class="fa fa-bars"></i> <span>Kategoriler</span></a></li>
        <li><a href="{{ action('Backend\UsersController@index') }}"><i class="fa fa-users"></i> <span>Editörler</span></a></li>
        <li class="header"></li>
        <li><a href="{{action('Backend\DefaultController@logout')}}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
    </ul>
@endsection

