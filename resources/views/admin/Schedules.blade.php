@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-transparent">
                <h1>Графік розкладу заходу</h1>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <!-- Форма створення графіка -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Створити графік</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <div id="scheduleList">
                            <!-- Один блок для початку -->
                            <div class="schedule-entry row mb-3">
                                <div class="col-md-2">
                                    <select name="schedules[0][day]" class="form-control" required>
                                        <option value="">День</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="time" name="schedules[0][time]" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="schedules[0][value]" class="form-control"
                                        placeholder="Подія" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-entry">Видалити</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" id="addScheduleRow">+</button>
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
                    <h3 class="card-title">Редагування графік</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover example-menu-table">
                        <thead>
                            <tr>
                                <th>День</th>
                                <th>Час</th>
                                <th>Подія</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Schedule as $item)
                                <tr>
                                    <td>День - {{ $item->day }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>
                                        <button class="btn btn-block btn-info"
                                            onclick="scheduleModal({{ $item->id }})">Відкрити панель</button>

                                        <form action="{{ route('schedule.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Точно видалити?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-block bg-gradient-danger"
                                                type="submit">Видалити</button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="scheduleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editFormLabelCategory{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 500px;">
                                        <div class="modal-content">
                                            <form action="{{ route('schedule.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editFormLabelCategory{{ $item->id }}">
                                                        Редагування інформації</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <select name="day" class="form-control" required>
                                                                <option selected>{{ $item->day }}</option>
                                                                <option value="">День</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="time" name="time" class="form-control"
                                                                required value="{{ $item->time }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="value" class="form-control"
                                                                placeholder="Подія" value="{{ $item->value }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Оновити</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Скасувати</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function scheduleModal(itemId) {
                                        $('#scheduleModal' + itemId).modal('show');
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
        let entryIndex = 1;

        $('#addScheduleRow').on('click', function() {
            let newEntry = `
        <div class="schedule-entry row mb-3">
            <div class="col-md-2">
                <select name="schedules[${entryIndex}][day]" class="form-control" required>
                    <option value="">День</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="time" name="schedules[${entryIndex}][time]" class="form-control" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="schedules[${entryIndex}][value]" class="form-control" placeholder="Подія" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-entry">Видалити</button>
            </div>
        </div>
        `;
            $('#scheduleList').append(newEntry);
            entryIndex++;
        });

        $(document).on('click', '.remove-entry', function() {
            $(this).closest('.schedule-entry').remove();
        });
    </script>
@endsection
