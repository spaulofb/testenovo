<?php
// JavaScript Document
?>
<script type="text/javascript" >
//   Corrigir os campos retirando os Espacos Desnecess?rios 
function acertar_espacos(campo,campo_value) {
    //  verificando os espacos no campo nome 
    var teste =   campo_value.replace(/ +/g," ");
    // document.getElementById(campo).value=trim(teste);  trim = teste.replace(/^\s+|\s+$/g,"")
    document.getElementById(campo).value=teste.replace(/^\s+|\s+$/g,"");
    return;
}
//
//  Funcao para alinhar o campo
function alinhar_texto(id,valor) {
    if( document.getElementById(id) ) {
        var id_valor = document.getElementById(id).value;
        document.getElementById(id).value=trim(id_valor);
        //
    }
   return;
}
//   Aceitar o BACKSPACE  
function backspace_yes(event,id_nome) {
         //  var e = (e)? e : event;
         var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
         var tecla = keyCode;
    //   if(  tecla==8   ) {

    // if ( tecla==8 && ( event.srcElement.form==null || event.srcElement.isTextEdit==false )  ) {    
    if ( ( tecla==8 || tecla==37 )  && ( event.srcElement.form==null || event.srcElement.isTextEdit==false )  ) {    
        event.cancelBubble = true;  
        event.returnValue = true;  
        if( document.getElementById(id_nome) ) {
            var str=document.getElementById(id_nome).value; 
            var m_length = str.length;
            document.getElementById(id_nome).value=str.substr(0,m_length-1);
        }
        return;
    }
}
//
//  Aumentar ou diminuir o tamanho de uma DIV em porcentagem
function ChangeZoom(selectTag,div_alterar) {
        // Returns the index of the selected option
        var whichSelected = selectTag.selectedIndex;

        // Returns the text of the selected option
        var indexValue = selectTag.options[whichSelected].text;
        if( document.getElementById(div_alterar) ) {
             var div = document.getElementById (div_alterar);
             if( 'zoom' in div.style ) {
                  div.style.zoom = indexValue;
             } else {
                  alert("Your browser doesn't support this example!");
             }
            //
        } else {
            alert("DIV ID N?O ENCONTRADO");
        }
    //   
}
//
// Validar E_Mail
function checkEmail(m_email_nome,m_email_valor) {
   var filtro=/^.+@.+\..{2,3}$/;
   // if ( filtro.test(document.form.email.value) == false ) {
  if ( m_email_valor.length<1 ) return true;       
  if ( filtro.test(m_email_valor) == false ) {    
    alert("O e-mail informado n?o ? v?lido");
    // document.form.email.focus();
    document.getElementById(m_email_nome).value="";
    return   document.getElementById(m_email_nome).focus();
  }
return true;
}
//
//  Comparando duas data - inicial e final
function comparadatas(dtini,dtfin) {
        
    //  var data1 = trim(document.getElementById("data1").value) ;
    //  var data2 =trim(document.getElementById("data2").value) ;

    if( document.getElementById(dtini)===null ) {
        alert("ID: "+dtini+" inexistente.")
    }
    if( document.getElementById(dtfin)===null ) {
        alert("ID: "+dtfin+" inexistente.")
    }


    var data1 = trim(document.getElementById(dtini).value);
    var data2 =trim(document.getElementById(dtfin).value);


    if( data1.length!=10   ) data1="00/00/0000";
    if( data2.length!=10  ) data2="00/00/0000";

    var nova_data1=parseInt(data1.split("/")[2].toString()+data1.split("/")[1].toString()+data1.split("/")[0].toString());
    var nova_data2=parseInt(data2.split("/")[2].toString()+data2.split("/")[1].toString()+data2.split("/")[0].toString());
    m_erro=false;
    if( nova_data2=="00/00/0000" ) {
        if( nova_data1>nova_data2 ) {
             //
             alert('ATEN??O: Data Inicial ? MAIOR que Data Final');
               // document.all.campos.final.focus();
             // document.all.campos.final.select();
             //  return false;
             msg_erro = '<span class="texto_normal" style="color: #000; text-align: center;">';
             msg_erro += 'ERRO:&nbsp;<span style="color: #FF0000;">';
             final_msg_erro = '</span></span>';
             msg_erro = msg_erro+'ATEN??O: Data Inicial ? MAIOR que Data Final'+final_msg_erro;
             //  document.getElementById("msg_erro").innerHTML=msg_erro;
            //  Verify element exist
             var m_msg_erro=0;
             if( document.getElementById("label_msg_erro") ) {
                if( document.getElementById("label_msg_erro").style.display="none" ) {
                    document.getElementById("label_msg_erro").style.display="block";                
                }
             }
             //
             if( document.getElementById("msg_erro") ) {
                if( document.getElementById("msg_erro").style.display="none" ) {
                    document.getElementById("msg_erro").style.display="block";                
                }
                m_msg_erro=1;
             }
             if( m_msg_erro==1 ) {
                 document.getElementById("msg_erro").innerHTML=msg_erro;
             } else {
                 if( document.getElementById("label_msg_erro") ) {
                     document.getElementById("label_msg_erro").innerHTML=msg_erro;
                 }    
             }
             // Final do Verify element exist - label_msg_erro e msg_erro 
             document.getElementById(dtini).focus();    
             m_erro = true;
             return m_erro;

        }
        //
    }
    return m_erro;
}
//
//  Desativar elemento de mensagem
function desat_msg(a,b) {
    if( document.getElementById(a) ) document.getElementById(a).style.display="none";
    if( document.getElementById(b) ) document.getElementById(b).style.display="none";
}
//
//  Funcoes  em javascript
function dv11(NumDado, NumDig, LimMult) {
//
// ------------------------------------------------------------------
//					CalculaDigitoMod11
//  dv11(Dado, NumDig, LimMult)
//  Retorna o(s) NumDig D?gitos de Controle M?dulo 11 do NumDado
//  limitando o Valor de Multiplica??o em LimMult:
// 
//  N?meros Comuns:     NumDig     LimMult
//       CPF               2           12
//       CNPJ              2            9
//       PIS,C/C,Age       1            9
// ------------------------------------------------------------------
	var Dado = NumDado;
	var n;
	var dv="";
	for(n=1; n<=NumDig; n++){
		var Soma = 0;
		var Mult = 2;
		var i;
		for(i=Dado.length - 1; i>=0; i--){
			Soma += Mult * parseInt(Dado.substr(i,1));
			if(++Mult > LimMult) Mult = 2;
		}
		var digito = ((Soma * 10)%11)%10 ;
		dv += digito.toString();
		Dado += digito.toString();
  }
  return dv;
}
//
//
var i_exoc=0;
function exoc(id,i_exoc,msg) {
   if( i_exoc==0 ) {
       if( document.getElementById(id) ) {
           if( document.getElementById(id).style.display="block"  ) {
              document.getElementById(id).style.display="none";                   
           }
       } 
   }
   if( i_exoc==1 ) {
       if( document.getElementById(id) ) {
           if( document.getElementById(id).style.display="none"  ) {
               document.getElementById(id).style.display="block";
               if( typeof msg!="undefined" ) {
                   document.getElementById(id).innerHTML=msg;
               }
           }
       } 
       i_exoc=0;
   }
   return;
}
//
//
//  Verificando as datas
function formata(val,m_event)  {
    //
    var  nome_do_campo="";
    //
    if( document.getElementById("label_msg_erro") ) {
        if( document.getElementById("label_msg_erro").style.display="block" ) {
             document.getElementById("label_msg_erro").style.display="none";        
        }     
    }
    var pass = val.value;
    var expr = /[0123456789]/;
    var m_pass_length = pass.length;
    var whichCode = (window.Event) ? m_event.which : m_event.keyCode;
    if( ( whichCode==13 ) && ( m_pass_length<1  ) ) { 
         if( val.name=="datacompra") {
               nome_do_campo = "valor";
         } else if( val.name=="notadata" ) {
               nome_do_campo = "garantiai";
               document.getElementById(nome_do_campo).value="//";    
         } else if( val.name=="garantiai") { 
               nome_do_campo = "garantiaf";
               document.getElementById(nome_do_campo).value="//";    
         } else if( val.name=="garantiaf") {
               nome_do_campo = "instaldata";
               document.getElementById(nome_do_campo).value="//";       
         } else if(  val.name == "instaldata") { 
                nome_do_campo = "serie";
                msg_erro_aqui='<p class="texto_normal" style="color: #000; text-align: center;">';
                msg_erro_aqui+='<span style="color: #FF0000;">';
                msg_erro_aqui=msg_erro_aqui+'Digitar N&uacute;mero de S&eacute;rie do Patrimonio.'+final_msg_erro_ini;
                if( document.getElementById("label_msg_erro") ) {
                     if( document.getElementById("label_msg_erro").style.display="none" ) {
                             document.getElementById("label_msg_erro").style.display="block";        
                     }     
                      document.getElementById("label_msg_erro").innerHTML=msg_erro_aqui;
                }
                //  document.getElementById("msg_erro").innerHTML=msg_erro_aqui;                
         } else if( val.name=="acaodata" ) { 
              nome_do_campo="acaomotivo";
         }
         document.getElementById(nome_do_campo).disabled = false;                    
         return document.getElementById(nome_do_campo).focus();
    }
    //
    for(i=0; i<pass.length; i++) {
        // charAt -> retorna o caractere posicionado no ?ndice especificado
        var lchar = val.value.charAt(i);
        var nchar = val.value.charAt(i+1);
        if( i==0 ) {
           // search -> retorna um valor inteiro, indicando a posi??o do inicio da primeira
           // ocorr?ncia de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o m?todo retornara -1
           // instStr.search(expReg);
           if( ( lchar.search(expr)!=0 ) || (lchar>3)) {
                val.value = "";
           }
        } else if(i==1) {
               if( lchar.search(expr)!=0 ) {
                   // substring(indice1,indice2)
                   // indice1, indice2 -> ser? usado para delimitar a string
                   var tst1 = val.value.substring(0,(i));
                   val.value = tst1;                
                   continue;            
               }
               if( ( nchar!='/' ) && ( nchar!='' ) ) {
                     var tst1 = val.value.substring(0, (i)+1);
                     if(nchar.search(expr) != 0) 
                         var tst2 = val.value.substring(i+2, pass.length);
                     else
                        var tst2 = val.value.substring(i+1, pass.length);
    
                     val.value = tst1 + '/' + tst2;
               }
         } else if( i==4 ) {
                if(lchar.search(expr) != 0){
                    var tst1 = val.value.substring(0, (i));
                    val.value = tst1;
                    continue;            
                }
                if( ( nchar!='/' ) && ( nchar!='' ) ) {
                    var tst1 = val.value.substring(0, (i)+1);
                    if(nchar.search(expr) != 0) 
                        var tst2 = val.value.substring(i+2, pass.length);
                    else
                        var tst2 = val.value.substring(i+1, pass.length);
    
                    val.value = tst1 + '/' + tst2;
                }
         }
         if( i>=6 ) {
              if( lchar.search(expr)!=0 ) {
                    var tst1 = val.value.substring(0, (i));
                    val.value = tst1;            
              }
         }
     }
     // if( pass.length>10) {
     if( pass.length==10) {
          val.value = val.value.substring(0, 10);
          //  str.value = val.value.substring(0, 10);
          //  dia = (str.value.substring(0,2)); 
          dia = (val.value.substring(0,2)); 
          //  mes = (str.value.substring(3,5)); 
          mes = (val.value.substring(3,5)); 
          //  ano = (str.value.substring(6,10)); 
          ano = (val.value.substring(6,10)); 
          cons = true; 
          // Verifica se foram digitados n?meros
          if( isNaN(dia) || isNaN(mes) || isNaN(ano) ) {
               alert("Preencha a data somente com n?meros."); 
               str.value = "";
               str.focus(); 
               return false;
          }
          // Verifica o dia valido para cada mes 
          if( ( dia<01 ) || ( dia<01 || dia>30 ) && ( mes==04 || mes==06 || mes==09 || mes==11 ) || dia>31 ) { 
               cons = false; 
          } 
          // Verifica se o mes e valido 
          if( mes<01 || mes>12 ) { 
             cons=false; 
          } 
          // Verifica se e ano bissexto 
          if( mes==2 && ( dia<01 || dia>29 || ( dia>28 && ( parseInt(ano/4)!=ano/4) ) ) ) { 
               cons=false; 
          } 
          data_atual_ano=new Date();
          ano_atual = data_atual_ano.getFullYear();
          if( ( cons==false ) || ( ano>ano_atual ) ) { 
               // alert("A data inserida n?o ? v?lida: " + str.value); 
               if( val.value=="00/00/0000" || val.value=="//" || val.value=="" ) {
                   return true;
               }
               //
               alert("A data inserida n?o ? v?lida: "+val.value); 
               //  str.value = "";
               val.value = "";
               //  str.focus(); 
               val.focus(); 
               return false;
          } else {
              if( val.name=="datacompra") {
                  //  document.getElementById('partede').disabled = false;                    
                  nome_do_campo="valor"
              } else if( val.name=="notadata") {
                  nome_do_campo="garantiai"
              } else if( val.name=="garantiai") { 
                  nome_do_campo="garantiaf"
              } else if( val.name=="garantiaf") {                
                  nome_do_campo="instaldata";
              } else if( val.name=="instaldata" ) {                       
                  nome_do_campo="serie";
                  msg_erro_aqui='<p class="texto_normal" style="color: #000; text-align: center;">';
                  msg_erro_aqui+='<span style="color: #FF0000;">';            
                  msg_erro_aqui = msg_erro_aqui+'Digitar N&uacute;mero de S&eacute;rie do Patrimonio.'+final_msg_erro_ini;
                  if( document.getElementById("label_msg_erro") ) {
                       if( document.getElementById("label_msg_erro").style.display="none" ) {
                             document.getElementById("label_msg_erro").style.display="block";        
                       }     
                       document.getElementById("label_msg_erro").innerHTML=msg_erro_aqui;
                  }
                  //  document.getElementById("msg_erro").innerHTML=msg_erro_aqui;                

            }  else if( val.name=="acaodata") { 
                 nome_do_campo="acaomotivo";
            }
            document.getElementById(nome_do_campo).disabled=false;                    
            return document.getElementById(nome_do_campo).focus();                            
       } 
     }     
     return true;
}
//
// function recebida da function mascara
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
//
//  Limpar todos os Objetos HTML da P?gina com JavaScript
function limpar_elements(div, subdivs) {
    //div = document.getElementById(div).firstChild;
    // div = document.getElementById(div).firstChild.nodeValue;
    var elements = document.getElementById(div).getElementsByTagName("*");
    var m_name_recebido = "";
    for (var i = 0; i < elements.length; i++) {
            var m_id_name = elements.item(i).name;
            var m_id_type = elements[i].type;
            if( ( typeof m_id_name == 'undefined' ) || ( typeof m_id_type == 'undefined' ) ) continue;
            if( ( m_id_name == m_name_recebido ) && ( typeof m_id_type == 'undefined' ) ) continue;            
            m_name_recebido = elements.item(i).name;
            field_type = m_id_type.toString();
            switch(field_type) { 
                case "text":  
                case "password":  
                case "textarea": 
                case "hidden":     
                    elements[i].value = "";  
                    break; 
                case "radio": 
                 case "checkbox": 
                    if ( elements[i].checked ) { 
                        elements[i].checked = false;  
                    } 
                    break; 
                case "select-one": 
                case "select-multi": 
                    elements[i].selectedIndex = 0; 
                    break; 
                default:  
                    break; 
            } 
    }
}
//
//  Para acertar Telefone/Fax
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
//
//  Correcao campo valor monetario
function mask_money(w,e,m,r,a){
        // Cancela se o evento for Backspace
        if (!e) var e = window.event
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        // Vari?veis da fun??o
        var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
        var mask = (!r) ? m : m.reverse();
        var pre  = (a ) ? a.pre : "";
        var pos  = (a ) ? a.pos : "";
        var ret  = "";
        if( code==9 || code==8 || txt.length==mask.replace(/[^#]+/g,'').length) return false;
        // Loop na m?scara para aplicar os caracteres
        for(var x=0,y=0, z=mask.length;x<z && y<txt.length;) {
            if( mask.charAt(x)!='#') {
               ret += mask.charAt(x); x++; 
            } else {
              ret += txt.charAt(y); y++; x++; 
            } 
        }
        // Retorno da fun??o
        ret = (!r) ? ret : ret.reverse()    
        w.value = pre+ret+pos; 
        //
}
// Novo m?todo para o objeto 'String'
String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
};
//
//  Final - function mask_money
//
function mouse_out_menu(obj)  {
          obj.className = 'itemOn';
        // document.getElementById(obj).className = 'itemOn';
        // document.getElementById(obj).style.color = "#000000";
        // document.getElementById(obj).style.background="#7CFC00";
}
//
//  Passando o Mouse em uma TAG
function mouse_over_menu(obj) {
        obj.className = 'itemOver';
        // document.getElementById(obj).className = 'itemOver';
        // document.getElementById(obj).style.color = "#000000";
        // document.getElementById(obj).style.background="#FFFFFF";
}
//
//  NAO aceitar a tecla ENTER - IMPORTANTE PARA NAO EXECUTAR
//  IMPORTANTE - JAVASCRIPT NAO ACEITAR A TECLA ENTER
function noenter() {
   //
   var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
   var tecla = keyCode;
   var formulario=document.form;
   if( formulario==null ) {
       if( tecla==13 ) {
           event.keyCode=0; event.returnValue=false;
           return false;
       }
   } else {
       var m_elements_total = document.form.length; 
       for( i=0; i<=m_elements_total; i++ ) {   
           var teste=document.form.elements[i];
           if( teste==null ) continue;
           var m_id_type=document.form.elements[i].type;
           switch(m_id_type) {
                case "undefined":
                //  case "hidden":   precisa de dados as vezes              
                case "button":
                case "image":
                case "reset":
                case "submit":
                   if( tecla==13 ) {
                       event.keyCode=0; event.returnValue=false;
                       return false;
                   }
                default:
                   continue;
           }
       }        
   }
}
//
//   NAO aceitar o BACKSPACE - IMPORTANTE PARA NAO VOLTAR PAGINA
function no_backspace(event) {
         //  var e = (e)? e : event;
         var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
         var tecla = keyCode;
    //   if(  tecla==8   ) {
    if( tecla==8 && ( event.srcElement.form==null || event.srcElement.isTextEdit==false )  ) {         
         event.cancelBubble = true;  
         event.returnValue = false;  
         return false;
    }
}
//
/*
      Proximo Campo  
*/
function proximoCampo(objeto,e) {
    var e = (e) ? e : event;    
    var  maxchr = objeto.getAttribute("maxlength");
    var teste_name = objeto.name;
    document.getElementById(teste_name).value =  trim(document.getElementById(teste_name).value);
    var id_chr = document.getElementById(teste_name).value;
    if( id_chr.length==maxchr ) {
         var i;
         for (i = 0; i <= objeto.form.elements.length; i++)  if (objeto == objeto.form.elements[i] ) break;
                 i = (i + 1);
                  var m_id_type = objeto.form.elements[i].type;  // Quando tag  type=hidden  passar
                  if ( m_id_type=="hidden" || objeto.form.elements[i].id=="limpar"  ) i++;
                 if ( objeto.form.elements.length<i ) i =  objeto.form.elements.length;
                 if ( typeof(objeto.form.elements[i].id)!="undefined"  ) {
                           teste_name = objeto.form.elements[i].id;
                           document.getElementById(teste_name).focus();
                  }
   }
}
//   Final - Proximo Campo
//
//  Remover espaco quando digitar
function remove1Espaco(texto) {
     return texto.replace(/\s+/,"");
}
/*** Remove Espaco do elemento ID  ***/
function rmspc(id) {
     var string = document.getElementById(id).value; 
     var valorId =string.split(' ').join('');
     return valorId;
}
/*****  Final - Remove Espaco do elemento ID  ***/
///
///   Somente letras - [a-z][A-Z]
function somente_letras(id,dados) {
    var string = dados.replace(/([^a-zA-Z])/g,""); 
    var pos =  dados.search(/([^a-zA-Z])/g);
    if( pos!=-1  ) {
        document.getElementById(id).value=string;        
        alert("ERRO: Digitar somente letras.");
        return false;
    }
    return;
}
//
//  Aceitando apenas - Numero e ponto
function somente_numero(campo)  {
    var digits="0123456789."   
    var campo_temp   
    chr = campo.value.length;
    maxchr = campo.getAttribute("maxlength");
    //
    for (var i=0;i<campo.value.length;i++){   
         campo_temp=campo.value.substring(i,i+1)   
         if (digits.indexOf(campo_temp)==-1){   
            campo.value = campo.value.substring(0,i);   
         }   
    }  
    if ( chr == maxchr) {
       return mudando_de_campo(campo);    
    }
}
//
//
function str_repeat(string,nrep) {
	var n;
	var stringf = "";
	for(n=1; n<=nrep; n++){
		stringf += string;
	}
	return stringf;
}
//
/*
      Tempo para fechar o site 
*/
var timer;
function timedClose() {
        clearTimeout(timer);
        //  timer = setTimeout("dochange('Sair')",tempo_exec);
                /*
                    Dentro da pagina precisa do arquivo XHConn.js
                        e tambem da function dochange
                */      
                //  timer = setTimeout("dochange('Sair','Sair')",180000);
         timer = setTimeout("dochange('Sair','Sair')",1080000);
         return;
}
//
/*
    Alinhar texto - tirar espacos em branco
*/
//  Alinhar Texto - como o TRIM do php
//  Removendo os espacos antes e depois
function trim(str) { return str.replace(/^\s+|\s+$/g,""); }
//
/*	
function trim(str)  {
  if ( str ) {
    if(str.length < 1)
      return "";
    str = RTrim(str);
    str = LTrim(str);    

    if(str == "")
      return "";
    else
      return str;
  } else {
    return "";
  }
}
function RTrim(str) {
    var espaco = String.fromCharCode(32);
    var tamanho = str.length;
    var temp = "";
    if(tamanho < 0)
      return "";
  
    var temp2 = tamanho - 1;
    while(temp2 > -1){
      if(str.charAt(temp2) == espaco){
        // n?o faz nada
     } else {
        temp = str.substring(0, temp2 + 1);
        break;
      }
      temp2--;
    }
    return temp;
}
function LTrim(str){
    var espaco = String.fromCharCode(32);
    var tamanho = str.length;
    var temp = "";
    if(tamanho < 0)  return "";
    var temp2 = 0;
    while(temp2 < tamanho){
      if(str.charAt(temp2) == espaco)  {
          
      }  else{
         temp = str.substring(temp2, tamanho);
         break;
      }
      temp2++;
    }
    return temp;
}
//  Final alinhar texto sem espacos

//  Duas funcoes para o campo ID hora
//  1 - Verifica o numero de caracteres HORA   
function mascara_hora(hora,m_id,minutos) { 
          var myhora=''; 
		  hora = trim(hora);
		  document.getElementById(m_id).value = hora;
          myhora = myhora + hora; 
          if ( myhora.length==2 ) { 
                 myhora=myhora+':';
				 if( ! minutos ) myhora=myhora+"00";
                 // document.forms[0].hora.value = myhora; 
				document.getElementById(m_id).value = myhora; 				
          } 
          if ( myhora.length==5 ) verifica_hora(m_id);  
} 
//  2 - Verifica valores numericos recebido - HORA
*/
//
// VERIFICA SE DATA FINAL ? MAIOR QUE INICIAL
function verificadatas(dtinicial_nome, dtfinal_nome, dtInicial, dtFinal) {
    //  Verify element exist
    if( document.getElementById("label_msg_erro") ) {
        if( document.getElementById("label_msg_erro").style.display="block" ) {
            document.getElementById("label_msg_erro").style.display="none";                
        }
    }
    //
    if( document.getElementById("msg_erro") ) {
        if( document.getElementById("msg_erro").style.display="block" ) {
            document.getElementById("msg_erro").style.display="none";                
        }
    }
    //
    var dtini_nome = dtinicial_nome;
    var dtfim_nome = dtfinal_nome;
    var dtini = trim(dtInicial);
    var dtfim = trim(dtFinal);
    
    if( dtini=="//" || dtini.length<10 || dtini=="00/00/0000" ) dtini="00/00/0000";
    if( dtfim=="//" || dtfim.length<10 || dtfim=="00/00/0000" ) dtfim="00/00/0000";
    
    if( ( dtini=='' ) && ( dtfim=='' ) ) {
         // alert('Complete os Campos.');
        //  campos.inicial.focus();
        //  return false;
        m_corrigir = confirm("Digitar as datas?"); 
        if( m_corrigir==true ) {   // testa se o usuario clicou em cancelar
              document.getElementById("label_msg_erro").style.display="";
               msg_erro = '<p class="texto_normal" style="color: #000; text-align: center;">';
            msg_erro += 'ERRO:&nbsp;<span style="color: #FF0000;">';
            final_msg_erro = '</span></p>';
            msg_erro = msg_erro+'PATRIMONIO N?O ALTERADO.<br>Digitar as datas do Patrimonio'+final_msg_erro;
               //  document.getElementById("msg_erro").innerHTML=msg_erro;
            
            //  Verify element exist
            var m_msg_erro=0;
            if( document.getElementById("label_msg_erro") ) {
                if( document.getElementById("label_msg_erro").style.display="none" ) {
                    document.getElementById("label_msg_erro").style.display="block";                
                }
            }
            //
            if( document.getElementById("msg_erro") ) {
                if( document.getElementById("msg_erro").style.display="none" ) {
                    document.getElementById("msg_erro").style.display="block";                
                }
                m_msg_erro=1;
            }
            if( m_msg_erro==1 ) {
                 document.getElementById("msg_erro").innerHTML=msg_erro;
            } else {
                 if( document.getElementById("label_msg_erro") ) {
                     document.getElementById("label_msg_erro").innerHTML=msg_erro;
                 }    
            }
            // Final do Verify element exist - label_msg_erro e msg_erro 
            //             
               document.getElementById(dtini_nome).focus();    
            //    return false;            
            m_erro = true;
            return m_erro;
        } else if( m_corrigir == false ) { 
            m_erro = false;
            return m_erro;
        }
    }
    
    datInicio = new Date(dtini.substring(6,10), 
                         dtini.substring(3,5), 
                         dtini.substring(0,2));
    datInicio.setMonth(datInicio.getMonth() - 1); 
    
    
    datFim = new Date(dtfim.substring(6,10), 
                      dtfim.substring(3,5), 
                      dtfim.substring(0,2));
                     
    datFim.setMonth(datFim.getMonth() - 1); 
    if( datInicio<=datFim ){
         // alert('Cadastro Completo!');
          return true;
    } else if( ( datInicio=='' ) && ( datFim=='' ) ) {        
         m_erro = false;
         return m_erro;
    } else if( ( datInicio=='//' ) && ( datFim=='//' ) ) {        
         m_erro = false;
         return m_erro;
    } else if( ( datInicio.toString()=='NaN' ) && ( datFim.toString()=='NaN' ) ) {        
         m_erro = false;
         return m_erro;
    } else {
         alert('ATEN??O: Data Inicial ? MAIOR que Data Final');
           // document.all.campos.final.focus();
         // document.all.campos.final.select();
         //  return false;
         msg_erro = '<p class="texto_normal" style="color: #000; text-align: center;">';
         msg_erro += 'ERRO:&nbsp;<span style="color: #FF0000;">';
         final_msg_erro = '</span></p>';
         msg_erro = msg_erro+'PATRIMONIO N?O ALTERADO.<br>ATEN??O: Data Inicial ? MAIOR que Data Final'+final_msg_erro;
         //  document.getElementById("msg_erro").innerHTML=msg_erro;
        //  Verify element exist
         var m_msg_erro=0;
         if( document.getElementById("label_msg_erro") ) {
            if( document.getElementById("label_msg_erro").style.display="none" ) {
                document.getElementById("label_msg_erro").style.display="block";                
            }
         }
         //
         if( document.getElementById("msg_erro") ) {
            if( document.getElementById("msg_erro").style.display="none" ) {
                document.getElementById("msg_erro").style.display="block";                
            }
            m_msg_erro=1;
         }
         if( m_msg_erro==1 ) {
             document.getElementById("msg_erro").innerHTML=msg_erro;
         } else {
             if( document.getElementById("label_msg_erro") ) {
                 document.getElementById("label_msg_erro").innerHTML=msg_erro;
             }    
         }
         // Final do Verify element exist - label_msg_erro e msg_erro 
         document.getElementById(dtini_nome).focus();    
         m_erro = true;
         return m_erro;
   }    
}
//
// VALIDA O CAMPO DATA PASSANDO O FOCO 
function verificaFoco(objeto,foco) {
    if( objeto.value.length==10 ) {                            
        foco.focus();
        return false;
    }
}
//
function verifica_hora(hora_id) { 
          /*    hrs = (document.forms[0].hora.value.substring(0,2)); 
                  min = (document.forms[0].hora.value.substring(3,5)); 
          */
		  var hrs = (document.getElementById(hora_id).value.substring(0,2)); 
          var min = (document.getElementById(hora_id).value.substring(3,5)); 
  
          /*    alert('hrs '+ hrs); 
               alert('min '+ min);  */
               
              situacao=""; 
              // verifica data e hora 
              if ( ( hrs==00 ) || ( hrs < 00 ) || ( hrs > 23 ) || ( min < 00 ) || ( min > 59 ) ) { 
			      var m_hora = document.getElementById(hora_id).value;
                  situacao = "falsa"; 
              } 
               
              //  if (document.forms[0].hora.value == "") { 
			  if ( document.getElementById(hora_id).value=="" ) { 
                  situacao = "falsa"; 
              } 

              if ( situacao=="falsa" ) { 
                   alert("Hora inv?lida: "+m_hora); 
                   //  document.forms[0].hora.focus(); 
   				   document.getElementById(hora_id).value="";
				   document.getElementById(hora_id).focus();
              } 
} 
//  Final das funcoes para campo ID HORA
//
//   Forca da Senha
function verificaForca(campo) {
    var div=document.getElementById('div_forca_senha');
    var valor = campo.value;
    var contemNumeros = /[0-9]/;
    var contemLetras = /[a-z]/i;
    var contemEspecial = /[@#$%;*&+]/;
    var contagem = 0;

    if ( valor.length > 0 ) {
        if (contemNumeros.test(valor)) contagem++;
        if (contemLetras.test(valor)) contagem++;
        if (contemEspecial.test(valor)) contagem++;

        switch ( contagem ) {
            case 1: {
                div.style.background ="#CCCCCC";
                div.innerHTML = "Senha Fraca!";
            } break;
            case 2: {
             //   div.style.background ="#009900";
                div.style.background ="#FFFF00";
                div.innerHTML = "Senha Mediana!";
            } break;
            case 3: {
              //  div.style.background = "#FF0000";
                div.style.background = "#00FF00";
                div.innerHTML = "Senha Forte!";
            } break;
            default: {
                div.style.background="#FFFFFF";
                div.innerHTML = "ERRO n&atilde;o esperado. Informe ao Analista/Programador. ";
            }
        }
    }
} 
//
// 2. VERIFICA SE DATA FINAL ? MAIOR - IMPORTANTE PRA DATAS - FUNCOES_JS.PHP
function verifica_Datas_parte2(campo_inicial,dtInicial,campo_final,dtFinal) {
    var dtini = dtInicial.replace(/^\s+|\s+$/g,"");
    var dtfim = dtFinal.replace(/^\s+|\s+$/g,"");
    
    /* var whichCode = (window.Event) ? m_event.which : m_event.keyCode;
    if ( ( whichCode == 13 ) && ( m_pass_length<1  ) ) { 
         return true;
    } */
    var regex = /^(GARANTIAI|VIGENCIAI|GARANTIAF|VIGENCIAF)$/i;
    // regular expression to match required date format - dd/mm/yyyy
    var re_date = /^\d{1,2}\/\d{1,2}\/\d{4}$|^\/\/$/;
    if( typeof dtini!="undefined" ) {
       if( ! dtini.length<1 ) {
          if( ! dtini.match(re_date) ) {
              alert("Digitar Data com 10 caracteres. Exemplo: 01/09/1898");
              var campo_inicial_id=campo_inicial.id;
              document.getElementById(campo_inicial_id).value="";
              document.getElementById(campo_inicial_id).focus();
              //  campo_inicial.name.focus();
              return false;
          } 
       }        
    }
    if( typeof dtfim!="undefined" ) {
       if( ! dtfim.length<1 ) {
          if( ! dtfim.match(re_date) ) {
              alert("Digitar Data com 10 caracteres. Exemplo: 01/09/1898");
              var campo_final_id=campo_final.id;
              document.getElementById(campo_final_id).value="";
              document.getElementById(campo_final_id).focus();
              //  campo_inicial.name.focus();
              return false;
          } 
       }        
    }

    
       
    if( (dtini=='') && (dtfim=='') ) {
        resposta = confirm("Completar os campos?")
        if ( resposta==false) {  // testa se o usuario clicou em cancelar
            return true;
        } else {
            // campos.inicial.focus();
            var campo_inicial_id=campo_inicial.id;
            document.getElementById(campo_inicial_id).value="";
            document.getElementById(campo_inicial_id).focus();
            //  campo_inicial.name.focus();
            return false;
       }    
    }
    //
    //
    datInicio = new Date(dtini.substring(6,10), 
                         dtini.substring(3,5), 
                         dtini.substring(0,2));
    datInicio.setMonth(datInicio.getMonth() - 1); 
    
    if( dtfim!='' && dtfim!='//' && dtfim.length>0 ) {
        datFim = new Date(dtfim.substring(6,10), 
                          dtfim.substring(3,5), 
                          dtfim.substring(0,2));
                         
        datFim.setMonth(datFim.getMonth() - 1); 
        //
    
        if( datInicio<=datFim ) {
            //  alert('Cadastro Completo!');
            return true;
        } else {
            alert('ATEN??O: Data Inicial ? maior que Data Final');
            $("#"+campo_final.name).val("");
            $("#"+campo_final.name).focus();
            // $("#"+campo_final.name).select();
           // document.all.campos.final.focus();
           //    document.all.campos.final.select();
            return false;
        }    
    }
    //
}
//
// Evento onKeyUp para verificar DATA - outra funcao - Parte 1
function verifica_data1(val)  {
       var pass = val.value;
     var val_name=val.name;  
    var expr = /[0123456789]/;
    var m_pass_length = pass.length;
    /* var whichCode = (window.Event) ? m_event.which : m_event.keyCode;
    if ( ( whichCode == 13 ) && ( m_pass_length<1  ) ) { 
         return true;
    } */
    var regex = /^(GARANTIAI|VIGENCIAI|GARANTIAF|VIGENCIAF)$/i;

    
/*  alert(" js/funcoes_js.php/388  -  val.name = "+val.name+" -  pass = "+pass+" - m_pass_length = "+m_pass_length+"  --->> val_name = "+val_name+"  -- val_name.regex = "+val_name.match(regex));
  return;    
    
    if( ( m_pass_length<10 ) && ( val.name.toUpperCase()=="GARANTIAF" ) ) {
        document.getElementById("GARANTIAF").value="";
        alert("Digitar Data com 10 caracteres. Exemplo: 01/09/1898")
        return true;
    } */
    if( m_pass_length<1 ) return;
    
    // for(i=0; i<pass.length; i++) {
    for(i=0; i<m_pass_length; i++) {
        // charAt -> retorna o caractere posicionado no ?ndice especificado
        var lchar = val.value.charAt(i);
        var nchar = val.value.charAt(i+1);
        if(i==0) {
           // search -> retorna um valor inteiro, indicando a posi??o do inicio da primeira
           // ocorr?ncia de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o m?todo retornara -1
           // instStr.search(expReg);
           if ((lchar.search(expr) != 0) || (lchar>3)){
              val.value = "";
           }
        } else if(i==1) {
               if(lchar.search(expr) != 0){
                  // substring(indice1,indice2)
                  // indice1, indice2 -> ser? usado para delimitar a string
                  var tst1 = val.value.substring(0,(i));
                  val.value = tst1;                
                   continue;            
               }
               if( (nchar != '/') && (nchar != '') ) {
                     var tst1 = val.value.substring(0, (i)+1);
                    if(nchar.search(expr) != 0) 
                        var tst2 = val.value.substring(i+2, pass.length);
                    else
                        var tst2 = val.value.substring(i+1, pass.length);
    
                    val.value = tst1 + '/' + tst2;
               }
         } else if(i==4) {
                if( lchar.search(expr) != 0){
                     var tst1 = val.value.substring(0, (i));
                     val.value = tst1;
                     continue;            
                }
                if( (nchar != '/') && (nchar != '') ) {
                    var tst1 = val.value.substring(0, (i)+1);
                    if(nchar.search(expr) != 0) 
                        var tst2 = val.value.substring(i+2, pass.length);
                    else
                        var tst2 = val.value.substring(i+1, pass.length);
    
                    val.value = tst1 + '/' + tst2;
                }
         }
         if( i>=6 ) {
             if(lchar.search(expr) != 0) {
                  var tst1 = val.value.substring(0, (i));
                  val.value = tst1;            
             }
         }
     }
     if( pass.length==10 ) {
         val.value = val.value.substring(0, 10);
         return true;
     }
     //    return true;
}  // Final parte 1 - DATA onkeyup verifica_data
//
// Evento onKeyUp para verificar DATA - outra funcao - Parte 2
function verifica_data2(val)  {
        var str = val.value.substring(0, 10);
        str = str.toString();
        var val_id = val.id;        
        cons = true; 
        if ( str.length>=1 && str.length<10 ) {
            str="";
            document.getElementById(val_id).value="";
            cons = false; 
        }
        //  Verifica se o campo final nao esta vazio
        //  e o campo inicial esta vazio
        if(  val_id.toUpperCase()=="VIGENCIAF" ) {
            if( str.length>=10 )  {
                if( document.getElementById("vigenciai") ) {
                    var valor_cpo_inicial=trim(document.getElementById("vigenciai").value);
                    var length_cpo_inicial=valor_cpo_inicial.length;
                    if( length_cpo_inicial<1 ) {
                        alert("Preencha a data inicial com n?meros.");    
                        document.getElementById("vigenciai").focus();                   
                        return false;
                    }
                }                
            } else if( str.length<10 ) return true;
        } 
        if( str=="" ) return true;        
        dia = (str.substring(0,2)); 
        mes = (str.substring(3,5)); 
        ano = (str.substring(6,10));         
           // verifica se foram digitados n?meros
        if (isNaN(dia) || isNaN(mes) || isNaN(ano)){
            alert("Preencha a data somente com n?meros."); 
            // str.value = ""; str.focus(); 
            //  return false;
            $("#"+val_id).val(''); 
           // str.focus();
           $("#"+val_id).focus();
           //  event.returnValue=false;
            return false;
        } 
        
        // verifica o dia valido para cada mes 
        if( (dia < 01)||(dia < 01 || dia > 30) && 
             (mes == 04 || mes == 06 || 
              mes == 09 || mes == 11 ) ||  dia > 31) { 
            cons = false; 
        } 
        // verifica se o mes e valido 
        if( mes < 01 || mes > 12 ) { 
            cons = false; 
        } 
        // verifica se e ano bissexto 
       if( mes == 2 && ( dia < 01 || dia > 29 || 
           ( dia > 28 &&   (parseInt(ano / 4) != ano / 4)))) { 
            cons = false; 
       } 
       //
       if( cons == false) { 
          alert("A data inserida n?o ? v?lida: " + str); 
          $("#"+val_id).val(''); 
          // str.focus();
          $("#"+val_id).focus();
        //  event.returnValue=false;
          return false;
       } 
       //
       var y=0;
       var array_data =["vigenciai","vigenciaf"];
       var array_valor = new Array();
       var dtini=""; var dtfim="";
       for( var i=0; i<array_data.length; i++ ) {
           if( document.getElementById(array_data[i])  ) {
               array_valor[y]=document.getElementById(array_data[i]).value;
               y++;
           }
       }
       if(typeof array_valor[0]!=="undefined") dtini=array_valor[0];
       if(typeof array_valor[1]!=="undefined") dtfim=array_valor[1];
       
       //
       var datInicio = new Date(dtini.substring(6,10), 
                         dtini.substring(3,5), 
                         dtini.substring(0,2));
       datInicio.setMonth(datInicio.getMonth() - 1); 
    
    
       var datFim = new Date(dtfim.substring(6,10), 
                      dtfim.substring(3,5), 
                      dtfim.substring(0,2));
                     
       datFim.setMonth(datFim.getMonth() - 1); 
       //  if( array_valor[0]<=array_valor[1] ) {
       var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
       if( dtfim.length>9 ) {
           if( dtfim.match(re) && dtfim!='00/00/0000' ) {
               if( datInicio>=datFim){           
                   /*  Alterado em 20130322  */
                   alert('ATEN??O: Data Inicial ? maior que Data Final');
                  /*  $("#"+campo_final.name).val("");
                  $("#"+campo_final.name).focus();  */
                  document.getElementById(val_id).focus();
                  return false;  
               }    
           }
       } else if( dtfim.length<=9 ) {
           document.getElementById(val_id).value="";
       }    
    return;  
}
//
//  Function para verificar CEP
function verificaCEP(campo,valor){
  //  var CEP = document.form3.CEP.value;
  if( document.getElementById("label_msg_erro") ) { 
      document.getElementById("label_msg_erro").innerHTML="";  
      document.getElementById("label_msg_erro").style.display="none";
  }
  //
  var CEP = valor;
  //  var valorCEP = isNaN(document.form3.CEP.value);  //verifica se s? possui n?meros
  var valorCEP = isNaN(document.getElementById(campo).value);  //verifica se s? possui n?meros
  if(  valorCEP || CEP.length != 8 ) {
        //  document.form3.CEP.style.backgroundColor = "#FF333A";
        if ( CEP.length < 1 ) {
             m_corrigir = confirm("Digitar CEP com 8 n?meros?"); 
             if( m_corrigir == true ) {   // testa se o usuario clicou em cancelar
                  if( document.getElementById("label_msg_erro") ) { 
                      msg_erro = msg_erro_ini+'Digitar CEP com 8 n&uacute;meros'+final_msg_erro_ini;
                      document.getElementById("label_msg_erro").style.display="block";
                      document.getElementById("label_msg_erro").innerHTML=msg_erro;
                  } else {
                      alert("ERRO: Digitar CEP com 8 n&uacute;meros.");
                  }  
                  return document.getElementById(campo).focus();
             }
        } else { 
            document.getElementById(campo).backgroundColor="#FF333A";
             //  document.form3.CEP.value = "";
            document.getElementById(campo).value="";
            alert("O CEP possui "+CEP.length+" d?gitos.\nDigite somente n?meros.");
            return   document.getElementById(campo).focus();
        }
  } else {
        //  document.form3.CEP.style.backgroundColor = "transparent";
        document.getElementById(campo).backgroundColor = "transparent";
        var prefixo = CEP.substr(0, 5);
        var sufixo = CEP.substr(5, 7);
        //  document.form3.CEP.value = prefixo+"-"+sufixo+"";
        //  document.getElementById(campo).value =     prefixo+"-"+sufixo+"";
        document.getElementById(campo).value =     prefixo+sufixo+"";
  }
}
//
//  Para acertar Telefone/Fax
function telefone(v) {
    v=v.replace(/\D/g,"")                 //Remove tudo o que n?o ? d?gito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca par?nteses em volta dos dois primeiros d?gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca h?fen entre o quarto e o quinto d?gitos
    return v
}
//
</script>