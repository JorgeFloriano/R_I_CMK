
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
         let border_item = document.getElementById(index).style.borderColor;
         if (border_item !== null && border_item !== 'white') {
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
      window.alert("Os ítens com contorno em amarelo são críticos e de inspeção obrigatória, pois estão relacionados à segurança!! No caso de estarem em condições ruins, recomendar o bloqueio do equipamento!")
   } else {
      window.document.getElementById('submit_button').type = "submit"
   }
 }

 function naoApto(i) {
   if (document.getElementById(i) !== null ) {
      let border_item = document.getElementById(i).style.borderColor;
      if (border_item !== null && border_item !== 'white') {
         document.getElementById('nApto').checked = true;
      }
   }
 }

function limitMax() {
   var tmed = document.getElementById('med11elos')
   var tmax = document.getElementById('max11elos')
   var med = Number(tmed.value)
   var max = Number(tmax.innerHTML)
   if (med > max) {
      // Border turns red
      tmed.style.setProperty('--inputBorder', '1px solid red');
      tmed.style.setProperty('--focusBoxShadow', '0 0 0 .25rem rgba(253, 13, 13, 0.25)');
      window.alert("A medida ultrapassou o valor limite, o equipamento não está apto para operar com segurança!!")
      document.getElementById('nApto').checked = true;
        
      // Border turns blue again
   } else {
      tmed.style.setProperty('--inputBorder', '1px solid #86b7fe');
      tmed.style.setProperty('--focusBoxShadow', '0 0 0 .25rem rgba(13,110,253,.25)');
      document.getElementById('nApto').checked = false;
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
