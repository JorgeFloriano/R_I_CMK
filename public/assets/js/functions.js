
function check(c1, ch, c2, u1, c3, u2, opt, obs, txt, just) {
   var col = document.getElementById(c1).style.color;
   var che = document.getElementById(ch).checked;
   const blue = "rgb(41, 50, 184)";
   const gray = "rgb(198, 194, 194)";
   var checked_color = blue;
  
   document.getElementById(c2).style.color = gray;
   document.getElementById(u1).checked = false;
   document.getElementById(c3).style.color = gray;
   document.getElementById(u2).checked = false;
   if ( opt == 'ok') {
      document.getElementById(txt).required = false;
      document.getElementById(obs).style.display = 'none';
      document.getElementById(txt).placeholder = "Desceva como a pendência foi solucionada!";
      //document.getElementById(txt).value = '';
   } if (opt == 'tr') {
      document.getElementById(obs).style.display = 'block';
      document.getElementById(txt).required = true;
      document.getElementById(txt).placeholder = "Razão da recomendação para substituição o ítem";
      checked_color = 'red';
      if (c1 == "i52T") {
         document.getElementById(txt).value = "Substituir reparos da botoeira.";
      }
   } if (opt == 're') {
      document.getElementById(obs).style.display = 'block';
      document.getElementById(txt).required = true;
      document.getElementById(txt).placeholder = "Razão da recomendação para reparação do ítem";
      checked_color = 'rgb(100, 100, 100)';
   }
   if(che == true && col != gray ) {
      document.getElementById(c1).style.color = gray;
      document.getElementById(ch).checked = false;
      document.getElementById(txt).required = false;
      document.getElementById(obs).style.display = 'none';
      //document.getElementById(txt).value = '';
   } else {
      document.getElementById(c1).style.color = checked_color;
      document.getElementById(ch).checked = true;
   }
   if (document.getElementById(txt).value != '' || just != '') {
      document.getElementById(obs).style.display = 'block';
      document.getElementById(txt).required = true;
      document.getElementById(txt).placeholder = "Descreva a tualização da pendência anterior!";
      //document.getElementById(obs).style.background = 'rgb(239, 239, 174)';
   }
}

function displayon (obs, item) {
   document.getElementById(obs).style.display = 'block';
   document.getElementById(item).style.marginBottom = '0px';
   document.getElementById(item).style.borderRadius = '5px 5px 0px 0px';
   
}

function displayoff (obs, item, txt) {
   document.getElementById(obs).style.display = 'none';
   document.getElementById(item).style.borderRadius = '5px';
   document.getElementById(txt).value = '';
}

function desmarcar (x) {
   document.getElementById(x).setAttribute('checked', '');
}

function marcDesm(x) {
   if (x == document.getElementById(x).id) {
       var ch = document.getElementById(x).checked;
       if(ch == true) {
           document.getElementById(x).checked = false;
       }
       else
           document.getElementById(x).checked = true;
   } else {
       document.getElementById(x).checked = false;
   }
}

function getScrollHeight(elm){
   var savedValue = elm.value
   elm.value = ''
   elm._baseScrollHeight = elm.scrollHeight
   elm.value = savedValue
 }
 
 function onExpandableTextareaInput({ target:elm }){
   // make sure the input event originated from a textarea and it's desired to be auto-expandable
   if( !elm.classList.contains('autoExpand') || !elm.nodeName == 'TEXTAREA' ) return
   
   var minRows = elm.getAttribute('data-min-rows')|0, rows;
   !elm._baseScrollHeight && getScrollHeight(elm)
 
   elm.rows = minRows
   rows = Math.ceil((elm.scrollHeight - elm._baseScrollHeight) / 22)
   elm.rows = minRows + rows
 }
 
 function blockScreen() {
   document.querySelector('html').style.overflow = "hidden";
 }

 function unlockScreen() {
   document.querySelector('html').style.overflow = "";
 }

 function limitDate(d, hi, hf) {
   var date = document.getElementById(d);
   var hini = document.getElementById(hi);
   var hfin = document.getElementById(hf);
   var z_left_h = "";
   var z_left_m = "";
   dataAtual = new Date();
   const hor = dataAtual.getHours();
   const min = dataAtual.getMinutes();
   if (date.value == date.max) {
      if (hor < 10) {
         z_left_h = "0";
      }
      if (min < 10) {
         z_left_m = "0";
      }
      hini.max = z_left_h + hor + ":" + z_left_m + min;
      hfin.max = z_left_h + hor + ":" + z_left_m + min;
   } else {
      hini.max = '';
      hfin.max = '';
   }
 }

 function requiredItem() {
   let show_message = false;
   for (let index = 1; index < 67; index++) {
      if (document.getElementById(index) !== null ) {
         let imp_item = document.getElementById("exclRed"+index).hidden;
         if (imp_item !== null && imp_item == false) {
            var bom_cor = document.getElementById(index + "_OK").checked;
            var reg_cor = document.getElementById(index + "_R").checked;
            var tro_cor = document.getElementById(index + "_T").checked;
            if (bom_cor == reg_cor && bom_cor == tro_cor) {
               show_message = true;
            }
         }
      }
   }
   if (show_message == true) {
      document.getElementById('submit_button').type = "button"
      window.alert("OS ÍTENS COM EXCLAMAÇÃO EM VERMELHO SÃO CRÍTICOS E DE INSPEÇÃO OBRIGATÓRIA, POIS ESTÃO RELACIONADOS À SEGURANÇA!! NO CASO DE ESTAREM EM CONDIÇÕES RUINS, RECOMENDAR O BLOQUEIO DO EQUIPAMENTO!")
   } else {
      window.document.getElementById('submit_button').type = "submit"
   }
 }

 // Important item, if bad txtContadorApto++, if good or more or less txtContadorApto--
 function naoApto(clicked, i) {

   // If element exists
   if (document.getElementById(i) !== null ) {
      let border_item = document.getElementById(i).style.borderColor;

      // If important item (border yellow)
      if (border_item !== null && border_item !== 'white') {

         var ok_id = 'i'+i+'Ok'
         var r_id = 'i'+i+'R'
         var t_id = 'i'+i+'T'

         var ok_checked = document.getElementById(i+'_OK').checked
         var r_checked = document.getElementById(i+'_R').checked
         var t_checked = document.getElementById(i+'_T').checked

         var color_ok = window.getComputedStyle(document.getElementById('i'+i+'Ok'),null).getPropertyValue('color')
         var color_r = window.getComputedStyle(document.getElementById('i'+i+'R'),null).getPropertyValue('color')
         var color_t = window.getComputedStyle(document.getElementById('i'+i+'T'),null).getPropertyValue('color')
         var tcont = document.getElementById("contApto")
         var cont = Number(tcont.value)

         if (clicked.id == t_id && color_t != 'rgb(255, 0, 0)' && t_checked == false) { 

            cont++
            document.getElementById("contApto").value = cont
            //window.alert(clicked.id)
         }
         if (clicked.id != t_id && color_t == 'rgb(255, 0, 0)' && t_checked == true ||
            clicked.id == t_id && color_t == 'rgb(255, 0, 0)' && t_checked == true) {

            cont--
            document.getElementById("contApto").value = cont
         }
         if (cont > 0) {
            document.getElementById('nApto').checked = true;
            document.getElementById("nAptoAlert").innerHTML = "EQUIPAMENTO ESTÁ COM " + String(cont) + " ÍTENS CRÍTICOS EM CONDIÇÕES RUÍNS, RECOMENDA-SE O BLOQUEIO DO MESMO!!"
            document.getElementById("nAptoAlert").hidden = false;
         } else {
            document.getElementById('nApto').checked = false;
            document.getElementById("nAptoAlert").hidden = true;
         }
      }
   }
 }

function limitMed(id_nom, id_lim, id_med) {
   var tmed = document.getElementById(id_med)
   var tlim = document.getElementById(id_lim)
   var tnom = document.getElementById(id_nom)
   var tcont = document.getElementById("contApto")
   

   var med = Number(tmed.value)
   var lim = Number(tlim.innerHTML)
   var nom = Number(tnom.innerHTML)
   var cont = Number(tcont.value)
   var bord_color = window.getComputedStyle(document.getElementById(id_med),null).getPropertyValue('border-color')

   if (med != 0) {
      if ((nom < lim && lim < med) || ( nom > lim && lim > med)) {
         // If border isn't red, turns red
         if (bord_color != 'rgb(255, 0, 0)') {
            cont++
            tmed.style.setProperty('--inputBorder', '1px solid red');
            tmed.style.setProperty('--focusBoxShadow', '0 0 0 .25rem rgba(253, 13, 13, 0.25)');
            document.getElementById("contApto").value = cont;
         }
           
         // If border is red ,turns blue again
      } else {
         if (bord_color == 'rgb(255, 0, 0)') {
            cont--
            tmed.style.setProperty('--inputBorder', '1px solid #86b7fe');
            tmed.style.setProperty('--focusBoxShadow', '0 0 0 .25rem rgba(13,110,253,.25)');
            document.getElementById("contApto").value = cont
         } 
      }
      if (cont > 0) {
         document.getElementById('nApto').checked = true;
         document.getElementById("nAptoAlert").innerHTML = "EQUIPAMENTO ESTÁ COM " + String(cont) + " ÍTENS CRÍTICOS EM CONDIÇÕES RUÍNS, RECOMENDA-SE O BLOQUEIO DO MESMO!!"
         document.getElementById("nAptoAlert").hidden = false;
      } else {
         document.getElementById('nApto').checked = false;
         document.getElementById("nAptoAlert").hidden = true;
      }
   }
}



//border-color:#fe8686;outline:0;box-shadow:0 0 0 .25rem rgba(253, 13, 13, 0.25)
function limitMin() {

}
 
 // global delegated event listener
 document.addEventListener('input', onExpandableTextareaInput)
 
 // OLD SOLUTION USING JQUERY:
 // // Applied globally on all textareas with the "autoExpand" class
 
 // $(document)
 //     .one('focus.autoExpand', 'textarea.autoExpand', function(){
 //         var savedValue = this.value;
 //         this.value = '';
 //         this._baseScrollHeight = this.scrollHeight;
 //         this.value = savedValue;
 //     })
 //     .on('input.autoExpand', 'textarea.autoExpand', function(){
 //         var minRows = this.getAttribute('data-min-rows')|0, rows;
 //         this.rows = minRows;
 //         rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
 //         this.rows = minRows + rows;
 //     });
