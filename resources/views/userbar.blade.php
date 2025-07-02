<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex" id="userbar">
        <div class="pt-2">
            <img src="{{ asset('assets/img/talha_color.png')}}" width="50px" alt="logo cmk">
        </div>

        <div class="dropdown pt-4" style="width: 40%; text-align: center;">
            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                @if (session()->has('success'))
                    {{session()->get('success')}}
                @endif

                @if (auth()->check())
                    {{auth()->user()->name}}
                @endif
            </a>
        
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="{{route('login.destroy')}}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li><a class="nav-link me-2" href="{{route('equip')}}"><i class="fa fa-cog"></i> Equipamentos</a></li>
                <li><a class="nav-link me-2" href="{{route('programacao')}}"><i class="fa fa-calendar"></i> Programação</a></li>
                <li><a class="nav-link me-2" href="{{route('relatorios')}}"><i class="fa fa-file-text"></i> Relatórios</a></li>
                <li><a class="nav-link me-2" href="{{route('tec_models.index')}}"><i class="fa fa-chain"></i> Modelos</a></li>
            </ul>
        </div>
    </div>
</nav>
<hr>

