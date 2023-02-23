@extends('back-end.layouts.app')

@section('title', __("Create ". getUpperModelName($modelName)))

@include('back-end.inc.plugins.ckeditor5')
@include('back-end.inc.plugins.select2')

@section('content')
    <div class="card">
        @include('back-end.inc.card-header-back-to-list', ['title' => "Create ". getUpperModelName($modelName)])
        <div class="card-body">
            <form method="POST" action="{{ route("admin.".getPluralModelName($modelName).".store") }}"
                  enctype="multipart/form-data">
                @csrf
                @include("back-end.".getPluralModelName($modelName).".form")
                @include("back-end.inc.form-button-save", ['title' => 'Add'])
            </form>
        </div>
    </div>
@endsection