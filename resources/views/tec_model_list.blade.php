@extends('layouts.home_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-2">Talhas elétricas de corrente</h3>
                <hr>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nº</th>
                            <th>Modelo</th>
                            <th>Fabricante</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tecms as $tecm)
                            <tr>
                                <td>{{$tecm->id}}</td>
                                <td>{{$tecm->descricao}}</td>
                                <td>{{$tecm->fabricante}}</td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
     </div>
@endsection
