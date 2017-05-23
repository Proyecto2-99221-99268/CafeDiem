$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

function guardar(){
console.log("soy un simple mortal... naaa soy usr");
}

function recuperar () {

	console.log("recuperar usuario");
}