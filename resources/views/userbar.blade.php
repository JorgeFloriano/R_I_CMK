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
<div class="container-fluid ico" id="userbar">
    <div class="row pe-1">
        <div class="col-6 p-2">
            <img src="{{asset('assets/img/logo_cmk_white.png')}}" alt="logo cmk" width="75px">
        </div>
        <div class="col-2 p-2 ico text-center">
            <a href="{{route('equip')}}">
                <i style="font-size: x-large" class="fa fa-cog ico"></i>
                <div style="font-size: xx-small">
                    Equipamentos
                </div>
            </a>
        </div>
        <div class="col-2 p-2 ico text-center">
            <a href="{{route('programacao')}}">
                <i style="font-size: x-large" class="fa fa-calendar ico"></i>
                <div style="font-size: xx-small">
                    Programação
                </div>
            </a>
        </div>
        <div class="col-2 p-2 ico text-center">
            <a href="{{route('relatorios')}}">
                <i style="font-size: x-large" class="fa fa-file-text ico"></i>
                <div style="font-size: xx-small">
                    Relatórios
                </div>
            </a>
        </div>
    </div>
</div>