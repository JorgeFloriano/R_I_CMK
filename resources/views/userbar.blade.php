<style>
    .ico {
        background-color: rgb(41, 50, 184);
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
    <div class="row pe-1">
        <div class="col-3 p-2">
            <img src="{{asset('assets/img/logo_cmk.jpg')}}" alt="logo cmk" width="70px">
        </div>
        <div class="col-3 p-2 ico text-center" style="border-radius: 0px 0px 0px 5px;">
            <a href="{{route('equip')}}">
                <i style="font-size: x-large" class="fa fa-cog ico"></i>
                <div style="font-size: xx-small">
                    Equipamentos
                </div>
            </a>
        </div>
        <div class="col-3 p-2 ico text-center">
            <a href="{{route('programacao')}}">
                <i style="font-size: x-large" class="fa fa-calendar ico"></i>
                <div style="font-size: xx-small">
                    Programação
                </div>
            </a>
        </div>
        <div class="col-3 p-2 ico text-center">
            <a href="{{route('relatorios')}}">
                <i style="font-size: x-large" class="fa fa-file-o ico"></i>
                <div style="font-size: xx-small">
                    Relatórios
                </div>
            </a>
        </div>
    </div>
</div>
