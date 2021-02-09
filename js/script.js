//Pesquisa
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#body_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });	
  });
});

//Shorter da tabela
$(function() {
  $("#table").tablesorter({
            sortInitialOrder: 'asc',
            sortList: [[0,0]] 

  });
});


