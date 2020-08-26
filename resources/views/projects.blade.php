@extends('layouts.app')

@section('content')
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <a href="{{URL::previous()}}" class="btn btn-dark">На предыдущую страницу</a>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <h3 class="pb-4 mb-4 border-bottom">
                @if (isset($project)) {{$project->name}} @else Проекты @endif
            </h3>

            <div class="row">
                @if (empty($project))
                    @guest @else
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <a href="{{route('projects.create')}}" class="btn btn-dark btn-sm btn-block pt-4 pb-4"><i class="fas fa-plus"></i> Новый проект</a>
                                </div>
                            </div>
                        </div>
                    @endguest
                    @if ($projects->count() != 0)
                        @foreach($projects as $project)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="text-right col pr-1" style="position:absolute;">
						                <span class="badge badge-primary">
							                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"></path><path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"></path></svg>
							                {{date_format($project->created_at, 'd.m.Y')}}
						                </span>
                                        @guest @else
                                        <a href="{{route('projects.edit', $project->slug)}}" class="badge badge-danger"><i class="fas fa-edit"></i></a>
                                        @endguest
                                    </div>
                                    @if ($project->image != '')
                                        <img src="{{asset('image-project')}}/{{$project->image}}" alt="{{$project->name}}" class="bd-placeholder-img card-img-top" width="100%" height="225" />
                                    @endif
                                    <div class="card-body">
                                        <p class="card-text">{{Str::limit($project->description, 50)}}</p>
                                        <a href="{{route('projects.show', $project->slug)}}" class="btn btn-dark btn-sm btn-block mt-3">Подробнее</a>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                        <a href="{{$project->github}}" class="text-info" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="navbar-nav-svg" viewBox="0 0 510 600" role="img"><path fill="currentColor" fill-rule="evenodd" d="M256 0C114.64 0 0 114.61 0 256c0 113.09 73.34 209 175.08 242.9 12.8 2.35 17.47-5.56 17.47-12.34 0-6.08-.22-22.18-.35-43.54-71.2 15.49-86.2-34.34-86.2-34.34-11.64-29.57-28.42-37.45-28.42-37.45-23.27-15.84 1.73-15.55 1.73-15.55 25.69 1.81 39.21 26.38 39.21 26.38 22.84 39.12 59.92 27.82 74.5 21.27 2.33-16.54 8.94-27.82 16.25-34.22-56.84-6.43-116.6-28.43-116.6-126.49 0-27.95 10-50.8 26.35-68.69-2.63-6.48-11.42-32.5 2.51-67.75 0 0 21.49-6.88 70.4 26.24a242.65 242.65 0 0 1 128.18 0c48.87-33.13 70.33-26.24 70.33-26.24 14 35.25 5.18 61.27 2.55 67.75 16.41 17.9 26.31 40.75 26.31 68.69 0 98.35-59.85 120-116.88 126.32 9.19 7.9 17.38 23.53 17.38 47.41 0 34.22-.31 61.83-.31 70.23 0 6.85 4.61 14.81 17.6 12.31C438.72 464.97 512 369.08 512 256.02 512 114.62 397.37 0 256 0z"></path></svg>
                                            GitHub
                                        </a>
                                        <a href="{{route('logs.show', $project->slug)}}" class="text-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="navbar-nav-svg" viewBox="0 0 650 650" role="img"><path fill="currentColor" fill-rule="evenodd" d="M486.201,196.124h-13.166V132.59c0-0.396-0.062-0.795-0.115-1.196c-0.021-2.523-0.825-5-2.552-6.963L364.657,3.677 c-0.033-0.031-0.064-0.042-0.085-0.073c-0.63-0.707-1.364-1.292-2.143-1.795c-0.229-0.157-0.461-0.286-0.702-0.421 c-0.672-0.366-1.387-0.671-2.121-0.892c-0.2-0.055-0.379-0.136-0.577-0.188C358.23,0.118,357.401,0,356.562,0H96.757 C84.894,0,75.256,9.651,75.256,21.502v174.613H62.092c-16.971,0-30.732,13.756-30.732,30.733v159.812 c0,16.968,13.761,30.731,30.732,30.731h13.164V526.79c0,11.854,9.638,21.501,21.501,21.501h354.776 c11.853,0,21.501-9.647,21.501-21.501V417.392h13.166c16.966,0,30.729-13.764,30.729-30.731V226.854 C516.93,209.872,503.167,196.124,486.201,196.124z M96.757,21.502h249.054v110.009c0,5.939,4.817,10.75,10.751,10.75h94.972v53.861 H96.757V21.502z M317.816,303.427c0,47.77-28.973,76.746-71.558,76.746c-43.234,0-68.531-32.641-68.531-74.152 c0-43.679,27.887-76.319,70.906-76.319C293.389,229.702,317.816,263.213,317.816,303.427z M82.153,377.79V232.085h33.073v118.039 h57.944v27.66H82.153V377.79z M451.534,520.962H96.757v-103.57h354.776V520.962z M461.176,371.092 c-10.162,3.454-29.402,8.209-48.641,8.209c-26.589,0-45.833-6.698-59.24-19.664c-13.396-12.535-20.75-31.568-20.529-52.967 c0.214-48.436,35.448-76.108,83.229-76.108c18.814,0,33.292,3.688,40.431,7.139l-6.92,26.37 c-7.999-3.457-17.942-6.268-33.942-6.268c-27.449,0-48.209,15.567-48.209,47.134c0,30.049,18.807,47.771,45.831,47.771 c7.564,0,13.623-0.852,16.21-2.152v-30.488h-22.478v-25.723h54.258V371.092L461.176,371.092z"/><path fill="currentColor" fill-rule="evenodd" d="M212.533,305.37c0,28.535,13.407,48.64,35.452,48.64c22.268,0,35.021-21.186,35.021-49.5 c0-26.153-12.539-48.655-35.237-48.655C225.504,255.854,212.533,277.047,212.533,305.37z"/></svg>
                                            Log
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col">
                            <div class="alert alert-secondary text-center" role="alert">
                                Проекты отсутствуют
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col">
                        <div class="text-right col pr-5" style="position:absolute;">
					        <span class="badge badge-primary">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"></path><path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"></path></svg>
							    {{date_format($project->created_at, 'd.m.Y')}}
						    </span>
                            @guest @else
                            <a href="{{route('projects.edit', $project->slug)}}" class="badge badge-danger"><i class="fas fa-edit"></i></a>
                            @endguest
                        </div>
                        @if ($project->image != '')
                            <div style="width:100%;height:200px;background:url({{asset('image-project')}}/{{$project->image}});background-position:top;background-size:cover;box-shadow: inset 0px -5px 100px #676767;">
                            </div>
                        @endif
                        <p class="text-md-left mt-3">
                            <a href="{{$project->github}}" class="text-info" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="navbar-nav-svg" viewBox="0 0 510 600" role="img"><path fill="currentColor" fill-rule="evenodd" d="M256 0C114.64 0 0 114.61 0 256c0 113.09 73.34 209 175.08 242.9 12.8 2.35 17.47-5.56 17.47-12.34 0-6.08-.22-22.18-.35-43.54-71.2 15.49-86.2-34.34-86.2-34.34-11.64-29.57-28.42-37.45-28.42-37.45-23.27-15.84 1.73-15.55 1.73-15.55 25.69 1.81 39.21 26.38 39.21 26.38 22.84 39.12 59.92 27.82 74.5 21.27 2.33-16.54 8.94-27.82 16.25-34.22-56.84-6.43-116.6-28.43-116.6-126.49 0-27.95 10-50.8 26.35-68.69-2.63-6.48-11.42-32.5 2.51-67.75 0 0 21.49-6.88 70.4 26.24a242.65 242.65 0 0 1 128.18 0c48.87-33.13 70.33-26.24 70.33-26.24 14 35.25 5.18 61.27 2.55 67.75 16.41 17.9 26.31 40.75 26.31 68.69 0 98.35-59.85 120-116.88 126.32 9.19 7.9 17.38 23.53 17.38 47.41 0 34.22-.31 61.83-.31 70.23 0 6.85 4.61 14.81 17.6 12.31C438.72 464.97 512 369.08 512 256.02 512 114.62 397.37 0 256 0z"></path></svg>
                                GitHub
                            </a>
                            |
                            <a href="{{route('logs.show', $project->id)}}" class="text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="navbar-nav-svg" viewBox="0 0 650 650" role="img"><path fill="currentColor" fill-rule="evenodd" d="M486.201,196.124h-13.166V132.59c0-0.396-0.062-0.795-0.115-1.196c-0.021-2.523-0.825-5-2.552-6.963L364.657,3.677 c-0.033-0.031-0.064-0.042-0.085-0.073c-0.63-0.707-1.364-1.292-2.143-1.795c-0.229-0.157-0.461-0.286-0.702-0.421 c-0.672-0.366-1.387-0.671-2.121-0.892c-0.2-0.055-0.379-0.136-0.577-0.188C358.23,0.118,357.401,0,356.562,0H96.757 C84.894,0,75.256,9.651,75.256,21.502v174.613H62.092c-16.971,0-30.732,13.756-30.732,30.733v159.812 c0,16.968,13.761,30.731,30.732,30.731h13.164V526.79c0,11.854,9.638,21.501,21.501,21.501h354.776 c11.853,0,21.501-9.647,21.501-21.501V417.392h13.166c16.966,0,30.729-13.764,30.729-30.731V226.854 C516.93,209.872,503.167,196.124,486.201,196.124z M96.757,21.502h249.054v110.009c0,5.939,4.817,10.75,10.751,10.75h94.972v53.861 H96.757V21.502z M317.816,303.427c0,47.77-28.973,76.746-71.558,76.746c-43.234,0-68.531-32.641-68.531-74.152 c0-43.679,27.887-76.319,70.906-76.319C293.389,229.702,317.816,263.213,317.816,303.427z M82.153,377.79V232.085h33.073v118.039 h57.944v27.66H82.153V377.79z M451.534,520.962H96.757v-103.57h354.776V520.962z M461.176,371.092 c-10.162,3.454-29.402,8.209-48.641,8.209c-26.589,0-45.833-6.698-59.24-19.664c-13.396-12.535-20.75-31.568-20.529-52.967 c0.214-48.436,35.448-76.108,83.229-76.108c18.814,0,33.292,3.688,40.431,7.139l-6.92,26.37 c-7.999-3.457-17.942-6.268-33.942-6.268c-27.449,0-48.209,15.567-48.209,47.134c0,30.049,18.807,47.771,45.831,47.771 c7.564,0,13.623-0.852,16.21-2.152v-30.488h-22.478v-25.723h54.258V371.092L461.176,371.092z"></path><path fill="currentColor" fill-rule="evenodd" d="M212.533,305.37c0,28.535,13.407,48.64,35.452,48.64c22.268,0,35.021-21.186,35.021-49.5 c0-26.153-12.539-48.655-35.237-48.655C225.504,255.854,212.533,277.047,212.533,305.37z"></path></svg>
                                Log
                            </a>
                        <p>{{$project->description}}</p>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
