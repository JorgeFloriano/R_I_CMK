@extends('layouts.home_layout')

@section('content')
    
     <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-2">Relatórios</h3>
                <hr>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nº Relat.</th>
                            <th>Nº Equip.</th>
                            <th>Data</th>
                            <th><i class="fa fa-search"></i></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($relats as $relat)
                            <tr>
                                <td>{{$relat->id}}</td>
                                <td>{{$relat->equipamento_id}}</td>
                                <td>{{date('d/m/Y',strtotime($relat->created_at))}}</td>
                                <td>
                                    <a href="{{route('relat_show', ['id' => $relat->id])}}" class="btn btn-primary btn-sm">
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
