<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
       
        <div>
            <a href="{{ route('home') }}" class="standard-logo"
            data-dark-logo="#">
            <img src="#" class="logo-icon" alt="logo icon">
        </a>
        </div>
        <div>
            <h4 class="logo-text text-dark">{{ __('إرشيف') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    {{-- navigation --}}
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}"  data-simplebar="false">
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">{{ __('Dashboard') }}</div></div>
            </a>
        </li>
   
        <li class="menu-label">{{ __('Users Management') }}</li>
        <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "mm-active" : "" }}">
            <a href="{{ route('admin.users.index') }}"  data-simplebar="false">
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='lni lni-users'></i></div>
                <div class="menu-title">{{ __('Users') }}</div></div>
            </a>
        </li>
        <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "mm-active" : "" }}">
            <a href="{{ route('admin.roles.index') }}"  data-simplebar="false">
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='lni lni-briefcase'></i></div>
                <div class="menu-title">{{ __('Roles') }}</div></div>
            </a>
        </li>
        <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "mm-active" : "" }}">
            <a  href="{{ route('admin.permissions.index') }}"  data-simplebar="false">
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='lni lni-unlock'></i></div>
                <div class="menu-title ">{{ __('Permissions') }}</div></div>
            </a>
        </li>
        <li class="menu-label">{{ __('Download Center') }}</li>
        <li class="{{ request()->is("admin/downloads") || request()->is("admin/downloads/*") ? "mm-active" : "" }}">
              <a href="{{ route('admin.documents.index') }}"  data-simplebar="false">
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='lni lni-files'></i></div>
                <div class="menu-title">{{ __('Documents') }}</div></div>
            </a>
        </li>
        <li class="{{ request()->is("admin/doc-types") || request()->is("admin/doc-types/*") ? "mm-active" : "" }}">
            <a href="{{ route('admin.document_types.index') }}" data-simplebar="false" >
                <div class="d-flex  align-items-center">
                <div class="parent-icon"><i class='lni lni-layers'></i></div>
                <div class="menu-title">{{ __('Types') }}</div></div>
            </a>
        </li>
        <li class="menu-label">{{ __('Service Management') }}</li>
   
    </ul>
    {{-- end navigation --}}
</div>
