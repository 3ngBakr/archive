@extends('back-end.layouts.app')

@section('title', __(getUpperPluralModelName($modelName)." Control"))

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h6 class="mb-0">@lang(getUpperPluralModelName($modelName)." List")</h6>

            @can('edit permission')
                <button type="submit"
                        form="permissions-form"
                        class="btn btn-outline-primary px-5 radius-30">
                    <i class="bx bx-save mr-1"></i>@lang("Save ".getUpperPluralModelName($modelName))
                </button>
            @endcan
        </div>
    </div>
    <form id="permissions-form" action="{{ route("admin.permissions.store") }}" method="post">
        @csrf
        @foreach ($permissions as $tab => $permissionGroups)
            <div class="col">
                <h6 class="mb-0 text-uppercase">@lang(getUpperModelName($tab))</h6>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            @foreach ($permissionGroups as $group => $permission)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active':'' }}" data-bs-toggle="tab"
                                       href="#tab{{ $tab }}-{{ $loop->index }}"
                                       role="tab"
                                       aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon">
                                                <i class="{{ config("ryada.models.{$group}.icon") }} font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">@lang(getUpperPluralModelName($group))</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content py-3">
                            @foreach ($permissionGroups as $group => $permission)
                                <div class="tab-pane fade {{ $loop->first ? 'show active':'' }}"
                                     id="tab{{ $tab }}-{{ $loop->index }}" role="tabpanel">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">@lang("Roles")</th>
                                            @foreach(config("ryada.model_permissions", []) as $perm)
                                                <th scope="col">@lang(getUpperModelName($perm))</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <th scope="col">{{ $role->name }}</th>

                                                <input type="hidden" name="group" value="{{ $group }}">

                                                @foreach($permission as $perm)
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox"
                                                                   name="{{ $role->name }}[]"
                                                                   value="{{ $perm->id }}"
                                                                   class="form-check-input"
                                                                    {{ $role->permissions->contains($perm) ? 'checked':'' }}>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </form>
@endsection