@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Форма создания услуги -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Створити магазин</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('Shops.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Баннер</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner"
                                                id="exampleInputFile" name="icon">
                                            <label class="custom-file-label" for="exampleInputFile">Завантажте
                                                картинку</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Назва</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Посилання</label>
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Короткий опис</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Редагування магазинів</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover example-menu-table">
                        <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Сторінка</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Shops as $item)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $item->banner) }}" width="100px" height="100px">
                                        <b>{{ $item->name }}</b>
                                    </td>
                                    <td><a href="{{ $item->link }}" target="_blank">Відкрити</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-block btn-info"
                                            onclick="shopsModal({{ $item->id }})">Відкрити панель</button>

                                        <form action="{{ route('Shops.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Точно видалити?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-block bg-gradient-danger"
                                                type="submit">Видалити</button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="shopsModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editFormLabelCategory{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 500px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabelCategory{{ $item->id }}">
                                                    Редагування інформації</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Shops.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Баннер</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        name="banner" id="exampleInputFile" name="icon">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Завантажте
                                                                        картинку</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Назва</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Посилання</label>
                                                            <input type="text" class="form-control" name="link" value="{{ $item->link }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Короткий опис</label>
                                                            <textarea class="form-control" name="description">{!! $item->description !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function shopsModal(itemId) {
                                        $('#shopsModal' + itemId).modal('show');
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('script_adm')
@endsection
