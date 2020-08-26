@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <h3 class="pb-4 mb-4 border-bottom">
                @if(isset($log))Редактирование лога@elseНовый лог@endif
            </h3>
            @if(isset($log))
            <form method="post" action="{{route('logs.update', $log->slug)}}">
            @method('PATCH')
            <form method="post" action="{{route('logs.store')}}">
            @endif
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Проект</label>
                                    <select class="form-control" name="project_id">
                                        @foreach($projects as $project)
                                        <option value="{{$project->id}}" @if(isset($log) && $project->id == $log->project_id) selected @endif>{{$project->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="logsName">Заголовок</label>
                                    <input name="caption" type="text" class="form-control" id="logsName" placeholder="Название лога" value="@if(isset($log)){{$log->caption}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="logsDescription">Текст лога</label>
                                    <textarea name="description" class="form-control" id="logsDescription" rows="5">@if(isset($log)){{$log->description}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="projectCreated_at">Дата создания</label>
                                    <input name="created_at" type="text" class="form-control" id="projectCreated_at" placeholder="Дата создания" disabled value="@if(isset($log)){{$log->created_at}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="projectUpdated_at">Дата редактирования</label>
                                    <input name="updated_at" type="text" class="form-control" id="projectUpdated_at" placeholder="Дата редактирования" disabled value="@if(isset($log)){{$log->updated_at}}@endif">
                                </div>
                                <hr>
                                @if(isset($log))
                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                @else
                                <button type="submit" class="btn btn-success">Добавить</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if(isset($log))
            <form method="post" action="{{route('logs.destroy', $log->slug)}}">
            @method('DELETE')
            @csrf
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
@endsection
