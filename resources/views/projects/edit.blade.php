@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <h3 class="pb-4 mb-4 border-bottom">
                @if(isset($project))Редоктирование поста@elseНовый проект@endif
            </h3>
            @if(isset($project))
            <form method="post" action="{{route('projects.update', $project->slug)}}" enctype="multipart/form-data">
            @method('PATCH')
            @else
            <form method="post" action="{{route('projects.store')}}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="projectName">Название</label>
                                    <input name="name" type="text" class="form-control" id="projectName" placeholder="Название проекта" value="@if(isset($project)){{$project->name}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="projectDescription">Описание проекта</label>
                                    <textarea name="description" class="form-control" id="projectDescription" rows="5">@if(isset($project)){{$project->description}}@endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="projectImage">Добавить обложку</label>
                                    @if(isset($project) && $project->image != '')
                                        <div class="form-check delete_checkbox">
                                            <input class="form-check-input" type="checkbox" value="true" name="deleteImage" id="deleteImage">
                                            <label class="form-check-label" for="deleteImage">
                                                Удалить
                                            </label>
                                        </div>
                                        <img class="img-thumbnail" src="{{asset('image-project')}}/{{$project->image}}" alt="{{$project->name}}">
                                    @endif
                                    <input name="image" type="file" class="form-control-file" id="projectImage" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="projectGithub">Ссылка на GitHub</label>
                                    <input name="github" type="text" class="form-control" id="projectGithub" placeholder="Ссылка на GitHub" value="@if(isset($project)){{$project->github}}@endif">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="projectCreated_at">Дата создания</label>
                                    <input name="created_at" type="text" class="form-control" id="projectCreated_at" placeholder="Дата создания" disabled value="@if(isset($project)){{$project->created_at}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="projectUpdated_at">Дата редактирования</label>
                                    <input name="updated_at" type="text" class="form-control" id="projectUpdated_at" placeholder="Дата редактирования" disabled value="@if(isset($project)){{$project->updated_at}}@endif">
                                </div>
                                <hr>
                                @if(isset($project))
                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                @else
                                <button type="submit" class="btn btn-success">Добавить</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if(isset($project))
            <form method="post" action="{{route('projects.destroy', $project->slug)}}">
            @method('DELETE')
            @csrf
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
@endsection
