/* Gera listras coloridas nas páginas lista.php de cada categoria do menu */

$(document).ready(function(){
  $('tr:gt(0)').mouseenter(function() {
    $(this).addClass('listra')
  });
  $('tr').mouseleave(function() {
    $(this).removeClass('listra');
  });
});

/* Validação do cadastro de categorias */

function validaDestaque() {

  if(document.getElementById("nomeDes").value == "") {
    window.alert("Preencha o campo Título");
    document.getElementById("nomeDes").focus();
    return false;
  }

  return true;
}

/* Validação do cadastro de destaques */

function validaCategoria() {

  if(document.getElementById("nomeCat").value == "") {
    window.alert("Preencha o campo Categoria");
    document.getElementById("nomeCat").focus();
    return false;
  }

  return true;
}

/* Validação do cadastro de usuários administrativos */

function validaUsuario() {

  if(document.getElementById("username").value == "") {
	  window.alert("Preencha o campo Usuário");
	  document.getElementById("username").focus();
  	return false;
  }

  if(document.getElementById("senha").value == "") {
	  window.alert("Preencha o campo Senha");
	  document.getElementById("senha").focus();
  	return false;
  }

  if(document.getElementById("nome").value == "") {
	  window.alert("Preencha o campo Nome");
	  document.getElementById("nome").focus();
  	return false;
  }

  return true;
}

/* Validação do email */

$(document).ready(function() {
  $("#email").blur(function() {
    var str = $("#email").val();
    var padrao = /^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[.]+[0-9a-zA-Z-]{2,4})/g;
    var resultado = padrao.test(str);

    if($(this).val() == "") {
      alert("Informe um E-mail");
      $("#email").focus();
      return false;
    }

    if(resultado == false) {

      alert("E-mail Inválido");
      $("#email").focus();
      return false;
    }
  });
});

/* Datepicker */

$(document).ready(function() {
  $(function() {
    $("#dtIni").datepicker({
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior'
    });

    $("#dtFim").datepicker({
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior'
    });
  });
});




/**/

/**
* Abre popup centralizado.
* url - local da página pra exibição no popup
* w - width largura do popup
* h - height  altura do poup
*/
function abrirPopup(url,w,h) {
var newW = w + 100;
var newH = h + 100;
var left = (screen.width-newW)/2;
var top = (screen.height-newH)/2;
var newwindow = window.open(url, 'name', 'width='+newW+',height='+newH+',left='+left+',top='+top);
newwindow.resizeTo(newW, newH);
 
//posiciona o popup no centro da tela
newwindow.moveTo(left, top);
newwindow.focus();
return false;
}