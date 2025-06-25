
    @foreach ($js as $key => $j)
        @php
            $class = "";
            if (!isset($j->solucao) || $j->solucao == '') {
                $obs = $j->descricao;
                if (in_array($j->num_item, $important_itens)) {
                    $class = "light-bad";
                }
            } else {
                $obs = $j->descricao." (pendência foi solucionada - ".$j->solucao.")";
            }
        @endphp

            @if (($key + 3) % 3 == 0)
                <div class="row m-0">
            @endif

            <div class="col-4 pends {{$class}}">
                <div>Item {{$j->num_item}} - {{date('d/m/Y',strtotime($j->created_at))}}</div>

                @isset($j->soluc_img)
                    <img src={{ url("storage/{$j->soluc_img}") }} width='100%' alt=" - Sem imagem para exibir.">
                @endisset

                @if(!isset($j->soluc_img) && isset($j->descr_img))
                    <img src={{ url("storage/{$j->descr_img}") }} width='100%' alt=" - Sem imagem para exibir.">
                @endif
                {{$obs}}
            </div>

            @if ((($key + 1) % 3 == 0) || ($loop->last))
                </div>
            @endif
    @endforeach

