@extends('back-end.layouts.app')

@section('title', __("Show " . getUpperModelName($modelName)))

@section('content')
    <div class="card">
        @include('back-end.inc.card-header-back-to-list', ['title' => "Show " . getUpperModelName($modelName)])
        <div class="card-body">
            @include("back-end." . getPluralModelName($modelName) . ".show")
        </div>
    </div>
@endsection