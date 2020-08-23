@extends('layouts.app')

@section('content')
<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
	<div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
		<div class="my-3 py-3">
			<h2 class="display-5">Мой Лог</h2>
		</div>
		<div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
			<a href="{{ url('/logs') }}" class="btn btn-dark btn-lg" style="margin-top:25%;">Открыть</a>
		</div>
	</div>
	<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
		<div class="my-3 p-3">
			<h2 class="display-5">Проекты</h2>
		</div>
		<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
			<a href="{{ url('/projects') }}" class="btn btn-light btn-lg" style="margin-top:25%;">Открыть</a>
		</div>
	</div>
</div>
@endsection