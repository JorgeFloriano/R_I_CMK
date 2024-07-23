<div id="idItem{{$i}}" class="{{$class}}">
    <section class="item" id="{{$i}}" name="txt{{$i}}">
        <section class="ask">
            <div class="lab">
                <span class="p-1 "><span style="color:#dc3545; font-weight: bold;">{{$c_important}}</span>{{$zero.$i}}</span>-{{$msg}}
            </div>
            <div class="opt">
                <input type="radio" hidden {{$ok_checked}} name="txt{{$i}}" id="{{$i}}_OK" value="Ok">
                <i onclick="naoApto(this,{{$i}}), check('i{{$i}}Ok', '{{$i}}_OK', 'i{{$i}}R', '{{$i}}_R', 'i{{$i}}T', '{{$i}}_T', 'ok', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}Ok" style="font-size: 18px;{{$ok_color}}" class="fa fa-thumbs-up" ></i>
                <input type="radio" hidden {{$re_checked}} name="txt{{$i}}" id="{{$i}}_R" value="Recuperar">
                <i onclick="naoApto(this,{{$i}}), check('i{{$i}}R', '{{$i}}_R', 'i{{$i}}Ok', '{{$i}}_OK', 'i{{$i}}T', '{{$i}}_T', 're', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}R" style="font-size: 18px;{{$re_color}}" class="fa fa-wrench"></i>
                <input type="radio" hidden {{$tr_checked}} name="txt{{$i}}" id="{{$i}}_T" value="Trocar">
                <i onclick="naoApto(this,{{$i}}), check('i{{$i}}T', '{{$i}}_T', 'i{{$i}}R', '{{$i}}_R', 'i{{$i}}Ok', '{{$i}}_OK', 'tr', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}T" style="font-size: 18px;{{$tr_color}}" class="fa fa-thumbs-down"></i>
            </div>
        </section>
        @isset($jus[$i])
            <div class="p-1 my-1 alert alert-warning"><span style="color: #ffc107; font-weight: bold;"></span> Observação do relatório anterior: <br>
                {{$jus[$i]->descricao ?? ''}}</div>
        @endisset
        <section style="{{$disp}}" class="obs" name="txtSecJust{{$i}}" id="secJust{{$i}}">
            <label style="margin-right: 100px;" for="idJust{{$i}}" id="idLabPend{{$i}}">Justificativa:</label>
            <textarea name="txtJust{{$i}}" {{$req}} id="idJust{{$i}}" class='autoExpand' rows='1' data-min-rows='1' placeholder="Ítens substituídos ou recuperados devem ser justificados!">{{$jus[$i]->descricao ?? ''}}</textarea>
        </section>
    </section>
</div>