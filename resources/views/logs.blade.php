@extends('layouts.app')

@section('content')
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <a href="{{URL::previous()}}" class="btn btn-dark">На предыдущую страницу</a>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="timeline">
                @guest @else
                <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                    <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                        <h3 class=" text-light">Новый лог</h3>
                        <p><a href="{{route('logs.create')}}" class="btn btn-dark btn-sm btn-block pt-2 pb-2"><i class="fas fa-plus"></i> Новый лог</a></p>
                    </div>
                    <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                        <img src="https://mlokliapi.000webhostapp.com/assets\img\clock.svg" class="img-fluid" alt="img">
                    </div>
                    <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                        <time>{{date("d.m.Y")}}</time>
                    </div>
                </div>
                @endguest
            @if ($log->count() != 0)
            @foreach($log as $item)
                <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                    <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                        <h3 class=" text-light">{{$item->caption}}
                            @guest @else
                            <a href="{{route('logs.edit', $item->slug)}}" class="badge badge-danger" style="float:right;font-size:12px;"><i class="fas fa-edit"></i></a>
                            @endguest</h3>
                        <p>
                            {{$item->description}}
                        </p>
                    </div>
                    <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                        <img src="{{asset('assets\img\clock.svg')}}" class="img-fluid" alt="img">
                    </div>
                    <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                        <time>{{date_format($item->created_at, 'd.m.Y')}}</time>
                    </div>
                </div>
            @endforeach
            @else
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
            @endif
            </div>
        </div>
    </div>
@endsection
