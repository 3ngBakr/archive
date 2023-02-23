@extends('back-end.layouts.app')

@section('title', __("Edit ". getUpperModelName($modelName)))

@include('back-end.inc.plugins.select2')
@include('back-end.inc.plugins.ckeditor5')

@section('content')
    <div class="card">
        @include('back-end.inc.card-header-back-to-list', ['title' => "Edit ". getUpperModelName($modelName)])

        <div class="card-body">
            <form method="POST" action="{{ route("admin.".getPluralModelName($modelName).".update", [$row->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include("back-end.".getPluralModelName($modelName).".form")
                @include("back-end.inc.form-button-save", ['title' => 'Save'])
            </form>
        </div>
    </div>
@endsection