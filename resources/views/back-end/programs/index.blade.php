@extends('back-end.layouts.app')

@section('title', __(getUpperPluralModelName($modelName)." Control"))

@include('back-end.inc.plugins.datatable')

@section('content')
    <div class="card">
        @include('back-end.inc.card-header-add-new')
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th style="width:10px"></th>
                        @foreach (config("ryada.models.{$modelName}.fields", []) as $field)
                            @if ($loop->last)
                                <th style="width:200px;">@lang($field)</th>
                            @else
                                <th>@lang($field)</th>
                            @endif
                        @endforeach
                        <th style="width:100px">@lang('Actions')</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection