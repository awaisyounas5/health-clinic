<div class="header">
    <div class="header-left">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('assets/img/login-logo.png')}}" width="200" alt>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><img src="{{asset('assets/img/icons/bar-icon.svg')}}" alt></a>
    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="{{asset('assets/img/icons/bar-icon.svg')}}"
            alt></a>
    <ul class="nav user-menu float-end">
        <li class="nav-item dropdown d-none d-md-block">
            <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img
                    src="{{asset('assets/img/icons/note-icon-01.svg')}}" alt>@if(!Auth::user()->unreadNotifications->isEmpty())<span class="pulse"></span>@endif </a>
        </li>
        <li class="nav-item dropdown has-arrow user-profile-list">
            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                <div class="user-names">
                    <h5>{{ucwords(str_replace('_', ' ', Auth::user()->name))}}</h5>
                    <span>{{ ucwords(str_replace('_', ' ', Auth::user()->getRoleNames()[0])) }} </span>
                </div>
                <span class="user-img">
                    <img src="{{asset(Auth::user()->photo? 'assets/upload/'.Auth::user()->photo: 'assets/img/profiles/avatar-05.jpg')}}" alt="Admin">
                </span>
            </a>
            @role('company')
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('company.view.profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{route('company.edit.profile')}}">Edit Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
            </div>
            @elserole('patient')
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('patient.view.profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{route('patient.edit.profile')}}">Edit Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
            </div>
            @elserole('staff_member')
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('staff_member.view.profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{route('staff_member.edit.profile')}}">Edit Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
            </div>
            @elserole('manager')
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('manager.view.profile')}}">My Profile</a>
                <a class="dropdown-item" href="{{route('manager.edit.profile')}}">Edit Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
            </div>
            @endrole
        </li>
        @role('company')
        <li class="nav-item ">
            <a href="{{route('company.setting.change_password')}}" class="hasnotifications nav-link"><img src="{{asset('assets/img/icons/setting-icon-01.svg')}}"
                    alt> </a>
        </li>
        @elserole('patient')
        <li class="nav-item ">
            <a href="{{route('patient.setting.change_password')}}" class="hasnotifications nav-link"><img src="{{asset('assets/img/icons/setting-icon-01.svg')}}"
                    alt> </a>
        </li>
        @elserole('staff_member')
        <li class="nav-item ">
            <a href="{{route('staff_member.setting.change_password')}}" class="hasnotifications nav-link"><img src="{{asset('assets/img/icons/setting-icon-01.svg')}}"
                    alt> </a>
        </li>
        @elserole('manager')
        <li class="nav-item ">
            <a href="{{route('manager.setting.change_password')}}" class="hasnotifications nav-link"><img src="{{asset('assets/img/icons/setting-icon-01.svg')}}"
                    alt> </a>
        </li>
        @endrole

    </ul>
    <div class="dropdown mobile-user-menu float-end">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa-solid fa-ellipsis-vertical"></i></a>
                @role('company')
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('company.view.profile')}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('company.edit.profile')}}">Edit Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                @elserole('patient')
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('patient.view.profile')}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('patient.edit.profile')}}">Edit Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                @elserole('staff_member')
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('staff_member.view.profile')}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('staff_member.edit.profile')}}">Edit Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                @elserole('manager')
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('manager.view.profile')}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('manager.edit.profile')}}">Edit Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                </div>
                @endrole
    </div>
</div>
