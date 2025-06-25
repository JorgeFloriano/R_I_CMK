<style>
    .ico {
        background-color: #1e3b5d;
        color: white;
    }
    a {
        text-decoration: none;
    }
    a:hover, i:hover {
        color: rgb(129, 190, 208)
    }
</style>
<div class="container-fluid" id="userbar">
    <div class="row pe-1 mb-2 ico">
        <div class="col-4 p-2">
            JL Dev
        </div>
        <div class="col-6 pt-4" style="font-size: large">
            @if (session()->has('success'))
                {{session()->get('success')}}
            @endif

            @if (auth()->check())
                {{auth()->user()->name}}
            @endif
        </div>
        <div class="nav-item dropdown col-2 pt-3 text-center">
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
        </div>
      
    </div>
</div>