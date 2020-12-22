var x = 1;
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah'+x+'').
      attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(function() {
  $('.nascimento').mask('00/00/0000');
  $('.capo').mask('00-0000');
  $('.cnpj').mask('00.000.000/0000-00', {reverse: false});
  $('.cpf').mask('000.000.000-00', {reverse: false});
  $('.rg').mask('00.000.000-0', {reverse: false});
  $('.dinheiro').mask('R$ #.##0,00', {reverse: true});
  $('.entramoney').mask('R$ ##0,00', {reverse: false});
  $('.entrada').mask('#.##0,00', {reverse: true});
  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
  };
  $('.celular').mask(SPMaskBehavior, spOptions);     

  $('#val_slider, #prazo_slider').slider({
    formatter: function(value) {
      return value;
    }
  });

});



var fileUpload = document.getElementById("fileUpload"),
uploadLabel = document.querySelector("label[for='fileUpload']"),
fileInsert = document.createElement("button");
fileInsert.id = "fileSelector";
fileInsert.innerHTML = uploadLabel.innerHTML;
fileUpload.parentNode.insertBefore(fileInsert, fileUpload.nextSibling);
fileUpload.style.display = "none";
uploadLabel.style.display = "none";
fileInsert.addEventListener('click', function(e){
  e.preventDefault();
  fileUpload.click();
}, false);

function previewImage(input) {
  var preview = document.getElementById('preview');
  var imgForm = document.getElementById('filehandler');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var imgPreview = document.getElementById('imgpreview');
      imgPreview.setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    imgPreview.setAttribute('src', '../images/perfil.jpg');
  } 
};