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
$( "#ver_al" ).click(function() {
  $("#menu").hide();
  $("#ver_alumnos").show("slow");
});
$( "#ver_alum_volver" ).click(function() {
  $("#menu").show("slow");
  $("#ver_alumnos").hide();
});
$( "#reg_al" ).click(function() {
  $("#menu").hide();
  $("#alumno_registro").show("slow");
});
$( "#registro_alu_volver" ).click(function() {
  $("#menu").show("slow");
  $("#alumno_registro").hide();
});
