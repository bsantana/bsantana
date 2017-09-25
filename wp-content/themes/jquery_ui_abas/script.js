$("#tabs").tabs();

// numero de tabs geradas
$numTabs = $("#tabs ul li").length
alert($("#tabs ul li.ui-state-active a").index());
$("#tabs ul li.ui-state-active a").eq(0).hide();
// função do botão próximo
$("#prox").click(function(){  
  // aba que esta ativa no momento
  $currentTab = parseInt($("#tabs ul li.ui-state-active a").attr("id").replace(/\D/g,''));
  
  // se for a ultima, nao deixa mudar
  // caso contrário, vai pra prox
  if ($currentTab == $numTabs){
    //$("#ui-id-" + ($currentTab -$numTabs + 1)).click();
  } else {

    $("#ui-id-" + ($currentTab + 1)).click();
    alert($("#tabs ul li.ui-state-active").index())
  }
})

// função do botão anterior
$("#ant").click(function(){  
  // aba que esta ativa no momento
  $currentTab = parseInt($("#tabs ul li.ui-state-active a").attr("id").replace(/\D/g,''));
  
  // se for a primeira, nao deixa mudar
  // caso contrário, vai pra anterior
  if ($currentTab == 1){
    $("#ui-id-" + ($currentTab + $numTabs - 1)).click();
  } else {
    $("#ui-id-" + ($currentTab - 1)).click();
  }
})