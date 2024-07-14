@extends('layouts.home_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                @if (session()->has('message'))
                    {{session()->get('message')}}
                @endif
                <h3 class="mt-2">Talhas elétricas de corrente</h3>
                <hr>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nº</th>
                            <th>Modelo</th>
                            <th>Fabricante</th>
                            <th>Show</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tecms as $tecm)
                            <tr>
                                <td>{{$tecm->id}}</td>
                                <td>{{$tecm->descricao}}</td>
                                <td>{{$tecm->fabricante}}</td>
                                <td>
                                    <a href="{{route('tec_models.edit', ['tec_model' => $tecm->id])}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-file-text"></i>
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
