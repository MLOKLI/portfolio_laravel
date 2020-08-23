@extends('layouts.app')

@section('content')
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <a href="{{URL::previous()}}" class="btn btn-dark">На предыдущую страницу</a>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            @if ($log->count() != 0)
                <div class="timeline">
                    @foreach($log as $item)
                        <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                            <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                                <h3 class=" text-light">{{$item->caption}}</h3>
                                <p>{{$item->description}}</p>
                            </div>
                            <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                                <img src="{{asset('assets\img\clock.svg')}}" class="img-fluid" alt="img">
                            </div>
                            <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                                <time>{{date_format($item->created_at, 'd.m.Y')}}</time>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="timeline">
                    <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                        <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                            <h3 class=" text-light">Лог отсутствует</h3>
                            <p>Логи данного проекта отсутствуют.</p>
                        </div>
                        <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                            <img src="https://mlokliapi.000webhostapp.com/assets\img\clock.svg" class="img-fluid" alt="img">
                        </div>
                        <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                            <time>{{date("d.m.Y")}}</time>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
