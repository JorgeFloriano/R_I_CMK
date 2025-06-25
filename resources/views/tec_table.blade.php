@extends('layouts.equipamentos_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-group my-2">
                    <div class="my-2" id="back">
                        <a style="color:rgb(41, 50, 184)" href="{{route('login.index')}}">
                            <i class="fa fa-chevron-left" ></i>
                        </a>
                    </div>
                </div>
                <h3 class="mt-2">Talhas elétricas de corrente</h3>
                <hr>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Modelo</th>
                            <th>Máx. 11 elos</th>
                            <th>Máx. W1</th>
                            <th>Min. Y</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tecms as $tecm)
                            <tr>
                                <td>{{$tecm->descricao}}</td>
                                <td>{{$tecm->max_elos}}</td>
                                <td>{{$tecm->max_w1}}</td>
                                <td>{{$tecm->min_y}}</td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
     </div>
@endsection
