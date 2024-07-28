
    @foreach ($js as $key => $j)
        @php
            $file_exists = null;
            $class = "";
            if (!isset($j->solucao) || $j->solucao == '') {
                $obs = $j->descricao;
                if (in_array($j->num_item, $important_itens)) {
                    $class = "light-bad";
                }
            } else {
                $obs = $j->descricao." (pendência foi solucionada - ".$j->solucao.")";
            }
            $file = 'storage/pend_photos/img_report'.$r->id.'_item'.$j->num_item.'.jpg';
            if (file_exists($file)) {
                $file_exists = true;
            } 
        @endphp

            @if (($key + 3) % 3 == 0)
                <div class="row m-0">
            @endif

            <div class="col-4 pends {{$class}}">
                <div>Item {{$j->num_item}} - {{date('d/m/Y',strtotime($j->created_at))}}</div>
                @isset($file_exists)
                    <img src={{asset($file)}} width='100%' alt=" - Sem imagem para exibir.">
                @endisset
                {{$obs}}
            </div>

            @if ((($key + 1) % 3 == 0) || ($loop->last))
                </div>
            @endif
    @endforeach

