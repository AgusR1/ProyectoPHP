$( "#registra_catedra" ).click(function() {
  $("#menu").hide();
  $("#catedra_registro").show("slow");
});
$( "#registro_cat_volver" ).click(function() {
  $("#menu").show("slow");
  $("#catedra_registro").hide();
});
$( "#ver_cat" ).click(function() {
  $("#menu").hide();
  $("#ver_catedras").show("slow");
});
$( "#ver_cat_volver" ).click(function() {
  $("#menu").show("slow");
  $("#ver_catedras").hide();
});
