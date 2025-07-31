@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Редагування категорії</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover example-menu-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Назва</th>
                                <th>Сторінка</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceCategories as $item)
                                <tr>
                                    <td style="text-align: center">
                                        <form class="imageUploadForm"
                                            action="{{ route('admin.panel.edit.category.source', $item->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="imageInput-{{ $item->id }}">
                                                <img class="previewImage"
                                                    src="{{ asset('storage/' . $item->category_banner) }}"
                                                    data-id="{{ $item->id }}" style="cursor: pointer; width: 100px;">
                                            </label>
                                            <input type="file" class="imageInput" id="imageInput-{{ $item->id }}"
                                                name="image" style="display: none;" accept="image/*">
                                        </form>
                                        @error('image')
                                            <b class="text-danger">Зображення занадто велике! Максимальне - 2040кб</b>
                                        @enderror
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="{{ route('services.category', $item->link) }}" target="_blank">Відкрити</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-block btn-info"
                                            onclick="editFormCategory({{ $item->id }})">Відкрити панель</button>
                                        <a href="{{ route('admin.panel.delete.category', $item->id) }}"
                                            class="btn btn-block btn-danger">Видалити</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editFormCategory{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editFormLabelCategory{{ $item->id }}"
                                    aria-hidden="true">
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
                                                <form action="{{ route('admin.panel.edit.category.content', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Назва категорії</label>
                                                            <input type="text" class="form-control" name="category_name"
                                                                value="{{ $item->name }}">
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
                                    function editFormCategory(itemId) {
                                        $('#editFormCategory' + itemId).modal('show');
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Редагування каталогу</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover example-menu-table">
                        <thead>
                            <tr>
                                <th>Назва</th>
                                <th>Прив'язаний до</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceCatalog as $item)
                                @php
                                    $getCategoryName = $serviceCategories->find($item->id_category);
                                @endphp
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <b class="text-danger">
                                            {{ $getCategoryName->name }}
                                        </b>
                                    </td>
                                    <td>
                                        <button class="btn btn-block btn-warning"
                                            onclick="editFormCatalog({{ $item->id }})">Відкрити панель</button>
                                        <a href="{{ route('admin.panel.delete.catalog', $item->id) }}"
                                            class="btn btn-block btn-danger">Видалити</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editFormCatalog{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editFormLabelCatalog{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 500px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabelCatalog{{ $item->id }}">
                                                    Редагування інформації</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.panel.edit.catalog.content', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Назва каталогу</label>
                                                            <input type="text" class="form-control" name="catalog_name"
                                                                value="{{ $item->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Прив'язати до категорії</label>
                                                            <select class="form-control" name="category_id">
                                                                @foreach ($serviceCategories as $el)
                                                                    <option value="{{ $el->id }}"
                                                                        @if ($el->id == $item->id_category) selected @endif>
                                                                        {{ $el->name }}</option>
                                                                @endforeach
                                                            </select>
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
                                    function editFormCatalog(itemId) {
                                        $('#editFormCatalog' + itemId).modal('show');
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Редагування Послуги</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover example-menu-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Назва</th>
                                <th>Каталог \ Категорія</th>
                                <th>Сторінка</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceList as $item)
                                @php
                                    $getCatalog = $serviceCatalog->find($item->parent_catalog_id);
                                    $getCategory = $serviceCategories->find($getCatalog->id_category);
                                @endphp
                                <tr>
                                    <td style="text-align: center">
                                        <form class="imageUploadFormService"
                                            action="{{ route('admin.panel.edit.service.source', $item->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="imageInputService-{{ $item->id }}">
                                                <img class="previewImageService"
                                                    src="{{ asset('storage/' . $item->icon) }}"
                                                    data-id="{{ $item->id }}" style="cursor: pointer; width: 100px;">
                                            </label>
                                            <input type="file" class="imageInputService"
                                                id="imageInputService-{{ $item->id }}" name="image"
                                                style="display: none;" accept="image/*">
                                        </form>
                                        @error('image')
                                            <b class="text-danger">Зображення занадто велике! Максимальне - 2040кб</b>
                                        @enderror
                                    </td>
                                    <td>{{ $item->name }} / <small class="text-info">{{ $item->title }}</small></td>
                                    <td>
                                        <span class="text-info"><small>{{ $getCatalog->name }}</small> /
                                            <b>({{ $getCategory->name }})</b></span>
                                    </td>
                                    <td>
                                        <a href="{{ route('services.service.page', ['name' => $getCategory->link, 'catalog' => $getCatalog->link, 'service_link' => $item->link]) }}"
                                            target="_blank">Відкрити</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-block btn-info"
                                            onclick="editFormService({{ $item->id }})">Відкрити панель</button>
                                        <a href="{{ route('admin.panel.delete.service', $item->id) }}"
                                            class="btn btn-block btn-danger">Видалити</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editFormService{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editFormLabelService{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 1200px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabelService{{ $item->id }}">
                                                    Редагування інформації</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.panel.edit.service.content', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Назва послуги</label>
                                                            <input type="text" class="form-control"
                                                                name="service_name" value="{{ $item->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Прив'язати до каталогу</label>
                                                            <select class="form-control" name="catalog_id">
                                                                @foreach ($serviceCatalog as $el)
                                                                    <option value="{{ $el->id }}"
                                                                        @if ($el->id == $item->parent_catalog_id) selected @endif>
                                                                        {{ $el->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Короткий опис</label>
                                                            <textarea class="form-control" name="sub_description">{!! $item->description !!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Контент</label>
                                                            <textarea class="summernote" name="value">{!! $item->value !!}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Заголовок</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $item->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ключові слова</label>
                                                            <input type="text" class="form-control" name="keys"
                                                                value="{{ $item->keys }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>SEO</label>
                                                            <textarea class="p-3 codeMirrorDemo" name="seo_tags">{{ $item->seo_tags }}</textarea>
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
                                    function editFormService(itemId) {
                                        $('#editFormService' + itemId).modal('show');
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
    <script>
        $(function() {
            $(".example-menu-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.previewImage').forEach(img => {
                img.addEventListener('click', function() {
                    let id = this.dataset.id;
                    document.getElementById('imageInput-' + id).click();
                });
            });

            document.querySelectorAll('.imageInput').forEach(input => {
                input.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        this.closest('.imageUploadForm').submit();
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.previewImageService').forEach(img => {
                img.addEventListener('click', function() {
                    let id = this.dataset.id;
                    document.getElementById('imageInputService-' + id).click();
                });
            });

            document.querySelectorAll('.imageInputService').forEach(input => {
                input.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        this.closest('.imageUploadFormService').submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150
            });
            document.querySelectorAll(".codeMirrorDemo").forEach(textarea => {
                CodeMirror.fromTextArea(textarea, {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            });
        });
    </script>
@endsection
