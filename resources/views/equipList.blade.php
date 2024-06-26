@extends('layouts.home_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-2">Equipamentos {{$title}}</h3>
                <hr>
                <div>
                    <a href="{{route('new_equip')}}" class="btn btn-primary">Cadastrar</a>
                    <a href="{{route($route)}}" class="btn btn-secondary">{{$msg}}</a>
                </div>
                <hr>

                @if ($equips->count() === 0)
                    <p>não há equipamentos para exibir !</p>
                @else
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nº</th>
                                <th>Modelo</th>
                                <th>Cap.</th>
                                <th>Fabr.</th>
                                <th>Edit</th>
                                <th>{{$cond}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($equips as $equip)
                                <tr>
                                    <td>{{$equip->id}}</td>
                                    <td>{{$equip->modelo}}</td>
                                    <td>{{$equip->capacidade}}</td>
                                    <td>{{$equip->fabricante}}</td>
                                    <td>
                                        <a href="{{route('edit_equip', ['id' => $equip->id])}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($equip->ativo === 1)
                                            <a href="{{route('desat_equip', ['id' => $equip->id])}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @else
                                            <a href="{{route('ativ_equip', ['id' => $equip->id])}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-cogs"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                @endif

            </div>
        </div>
     </div>

@endsection

