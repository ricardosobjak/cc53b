/*
var show = false;

$("li")
  .hide()
  .parent()
  .before("<a href='#'>Mostrar empresas</a>");
$("a").click(function() {
  if (show) $("li").hide();
  else $("li").show();
  show = !show;
});
*/

$("#btnget1").click(function() {
  alert("Texo: " + $("#elemento").text());
});

$("#btnget2").click(function() {
  alert("HTML: " + $("#elemento").html());
});

$("#btnget3").click(function() {
  alert("Value: " + $("#nome").val());
});

$("#btnset1").click(function() {
  $("#texto1").text("Isto é um texto");
});

$("#btnset2").click(function() {
  $("#texto2").html("<b>Isto é um texto com HTML</b>");
});

$("#btnset3").click(function() {
  $("#texto3").val("Juca");
});

$("#btnappend").click(function() {
  var fruta = $("#fruta").val();
  $("#pFruta").append(`, ${fruta}`);
  $("#olFruta").append(`<li>${fruta}</li>`);
});

$("#btnprepend").click(function() {
  var fruta = $("#fruta").val();
  $("#pFruta").prepend(`${fruta}, `);
  $("#olFruta").prepend(`<li>${fruta}</li>`);
});

var contCidade = 1;

$("#btnbefore").click(function() {
  var cidade = `Cidade ${contCidade++}`;
  $("#med").before(`<li>${cidade}</li>`);
});

$("#btnafter").click(function() {
  var cidade = `Cidade ${contCidade++}`;
  $("#med").after(`<li>${cidade}</li>`);
});

$("#btnremove").click(function() {
  $("#divRemove").remove();
  event.target.remove();
});

$("#btndanger").click(function() {
  $("#divAlert").removeClass().addClass("alert alert-danger");
});

$("#btnwarning").click(function() {
  $("#divAlert").removeClass().addClass("alert alert-warning");
});

$("#btninfo").click(function() {
  $("#divAlert").removeClass().addClass("alert alert-info");
});

$("#btnsuccess").click(function() {
  $("#divAlert").removeClass().addClass("alert alert-success");
});
