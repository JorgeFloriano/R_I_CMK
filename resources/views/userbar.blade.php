@php
    $active = "active border-bottom border-dark";
    $equip_active = (request()->route()->getName() == 'equip') ? $active : '';
    $prog_active = (request()->route()->getName() == 'programacao') ? $active : '';
    $relat_active = (request()->route()->getName() == 'relatorios') ? $active : '';
    $models_active = (request()->route()->getName() == 'tec_models.index') ? $active : '';
    $logout_active = (request()->route()->getName() == 'login.destroy') ? $active : '';
@endphp

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex" id="userbar">
        <div class="pt-2">
            <img src="{{ asset('assets/img/talha_color.png')}}" width="50px" alt="logo cmk">
        </div>

        <div class="dropdown pt-4 text-center" style="width: 30%">
            <h4>
                @if (session()->has('success'))
                    {{session()->get('success')}}
                @endif

                @if (auth()->check())
                    {{auth()->user()->name}}
                @endif
            <h4>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" style="width: 130px" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li>
                    <a class="nav-link me-2 {{$equip_active ?? ''}}" href="{{route('equip')}}">
                        <i class="fa fa-cog"></i> Equipamentos
                    </a>
                </li>

                <li>
                    <a class="nav-link me-2 {{$prog_active ?? ''}}" href="{{route('programacao')}}">
                        <i class="fa fa-calendar"></i> Programação
                    </a>
                </li>

                <li>
                    <a class="nav-link me-2 {{$relat_active ?? ''}}" href="{{route('relatorios')}}">
                        <i class="fa fa-file-text"></i> Relatórios
                    </a>
                </li>

                <li>
                    <a class="nav-link me-2 {{$models_active ?? ''}}" href="{{route('tec_models.index')}}">
                        <i class="fa fa-chain"></i> Modelos
                    </a>
                </li>

                <li>
                    <a class="nav-link me-2 {{$logout_active ?? ''}}" href="{{route('login.destroy')}}">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr>

