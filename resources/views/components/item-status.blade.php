<div>
    <section style="{{$bgc}}" class="item" id="{{$i}}" name="txt{{$i}}">
        <section class="ask">
            <div class="lab">
                {{$i}}-{{$msg}}.
            </div>
            <div class="opt">
                <input type="radio" hidden {{$ok_checked}} name="txt{{$i}}" id="{{$i}}_OK" value="Ok" >
                <i onclick="check('i{{$i}}Ok', '{{$i}}_OK', 'i{{$i}}R', '{{$i}}_R', 'i{{$i}}T', '{{$i}}_T', 'ok', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}Ok" style="font-size: 18px;{{$ok_color}}" class="fa fa-thumbs-up" ></i>
                <input type="radio" hidden {{$re_checked}} name="txt{{$i}}" id="{{$i}}_R" value="Recuperar" >
                <i onclick="check('i{{$i}}R', '{{$i}}_R', 'i{{$i}}Ok', '{{$i}}_OK', 'i{{$i}}T', '{{$i}}_T', 're', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}R" style="font-size: 18px;{{$re_color}}" class="fa fa-wrench"></i>
                <input type="radio" hidden {{$tr_checked}} name="txt{{$i}}" id="{{$i}}_T" value="Trocar" >
                <i onclick="check('i{{$i}}T', '{{$i}}_T', 'i{{$i}}R', '{{$i}}_R', 'i{{$i}}Ok', '{{$i}}_OK', 'tr', 'secJust{{$i}}' ,'idJust{{$i}}', '{{$jus[$i] ?? ''}}')"
                id="i{{$i}}T" style="font-size: 18px;{{$tr_color}}" class="fa fa-thumbs-down"></i>
            </div>
            @isset($jus[$i])
                <div>{{$pend_ant}}{{$jus[$i]->descricao ?? ''}}</div>
            @endisset
        </section>
        <section style="{{$disp}}" class="obs" name="txtSecJust{{$i}}" id="secJust{{$i}}">
            <label style="margin-right: 100px;" for="idJust{{$i}}" id="idLabPend{{$i}}">Justificativa:</label>
            <textarea name="txtJust{{$i}}" {{$req}} id="idJust{{$i}}" class='autoExpand' rows='1' data-min-rows='1' placeholder="Ítens substituídos ou recuperados devem ser justificados!">{{$jus[$i]->descricao ?? ''}}</textarea>
        </section>
    </section>
</div>