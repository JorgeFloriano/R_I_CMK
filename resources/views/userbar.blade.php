<style>
    .ico {
        color: #1e3b5d;
    }
    a {
        text-decoration: none;
        color: #1e3b5d;
    }
    a:hover, i:hover {
        color: rgb(129, 190, 208)
    }
</style>
<div class="container" id="userbar">
    <div class="row px-1 pt-2 ico">
        {{-- <div class="col-4">
            <img src="{{ asset('assets/img/talha_color.png')}}" width="50px" alt="logo cmk">
        </div>
        <div class="col-6 pt-4" style="font-size: 20px; font-weight: bold">
            @if (session()->has('success'))
                {{session()->get('success')}}
            @endif

            @if (auth()->check())
                {{auth()->user()->name}}
            @endif
        </div>
        <div class="nav-item dropdown col-2 pt-4 text-end">
            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i style="font-size: x-large" class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item btn-lg" href="{{route('equip')}}"><i class="fa fa-cog"></i> Equipamentos</a></li>
              <li><a class="dropdown-item btn-lg" href="{{route('programacao')}}"><i class="fa fa-calendar"></i> Programação</a></li>
              <li><a class="dropdown-item btn-lg" href="{{route('relatorios')}}"><i class="fa fa-file-text"></i> Relatórios</a></li>
              <li><a class="dropdown-item btn-lg" href="{{route('tec_models.index')}}"><i class="fa fa-chain"></i> Modelos</a></li>
              <li><a class="dropdown-item btn-lg" href="{{route('login.destroy')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div> --}}

        <div class="col-2">
            <img src="{{ asset('assets/img/talha_color.png')}}" width="50px" alt="logo cmk">
        </div>
        <div class="col-2 pt-4" style="font-size: 20px; font-weight: bold">
            @if (session()->has('success'))
                {{session()->get('success')}}
            @endif

            @if (auth()->check())
                {{auth()->user()->name}}
            @endif
        </div>
        <ul class="nav col-8 pt-4" style="justify-content: flex-end">
            <li><a class="nav-link" href="{{route('equip')}}"><i class="fa fa-cog"></i> Equipamentos |</a></li>
              <li><a class="nav-link" href="{{route('programacao')}}"><i class="fa fa-calendar"></i> Programação |</a></li>
              <li><a class="nav-link" href="{{route('relatorios')}}"><i class="fa fa-file-text"></i> Relatórios |</a></li>
              <li><a class="nav-link" href="{{route('tec_models.index')}}"><i class="fa fa-chain"></i> Modelos |</a></li>
              <li><a class="nav-link" href="{{route('login.destroy')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
        
    </div>
</div>

{{-- <hr> --}}