
//0-batata   1-cebola 2-cenoura   3-tomate   4-alho
//5-ovos 6-couve
//
//
//

  var valores = [2, 3, 4, 5, 15,4,4,2];
  var preco = document.getElementsByClassName("preco");
  for (var i = 0; i < preco.length; i++) {
    if(i == 5){
      preco[i].innerHTML = "R$ "+ valores[i] + " a dúzia";
    }
    else{
      preco[i].innerHTML = "R$ "+ valores[i] + " o kg";
    }
  }
