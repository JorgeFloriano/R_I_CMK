@extends('layouts.home_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-2">Programação de Abril</h3>
                <hr>

                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Cap.</th>
                                <th>Fabr.</th>
                                <th>R.I.</th>
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
                                        <a href="{{route('relat_form', ['id' => $equip->id])}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

            </div>
        </div>
     </div>

@endsection

