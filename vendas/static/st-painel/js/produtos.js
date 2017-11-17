//5-ovos 6-couve
//
//
//        conteudo += "<div class='row'> <div class='col-md-2'><img src='img/legumes/batata.jpg' class='imagem'> </div> <div class='col-md-4'><p>batata</p></div> <div class='col-md-3 col-md-offset-3'><select id='iniciohora' name='horario' class='form-control'> <option value='1'>1 kg</option> <option value='2'>2 kg</option> <option value='3'>3 kg</option> <option value='4'>4 kg</option> </select></div> </div>";
//
//var caminhos =["legumes/batata.png","legumes/cebola.jpg","legumes/cenoura.png","legumes/tomate.jpg","legumes/alho.png",
//"ovos/ovos.png","verduras/couve.jpg","acai.png"];
//var nomes =["Batata","Cebola","Cenoura","Tomate","alhos","Ovos","Couve","Açai"];
//var valores = [15, 3, 4, 5, 15.29, 4, 4, 2];

function addCarrinho(item, valor) {
    var opcoes = document.getElementsByClassName("qtd")[item];
    if (opcoes.options[opcoes.selectedIndex].value == 0) {
        alert("Por favor,escolha uma quantidade diferente de zero!");
    } else {
        var carrinho = document.getElementsByClassName("carrinho")[item]
        if (carrinho.value == "adicionado") {
            carrinho.innerHTML = "+ Adicionar ao carrinho";
            carrinho.value = "removido";
            remover(item);
        } else {
            carrinho.value = "adicionado";
            carrinho.innerHTML = "- Remover";
            var peso = opcoes.options[opcoes.selectedIndex].innerHTML;
            var conteudoCarrinho = document.getElementById("conteudoCa").innerHTML;
            var nome = document.getElementsByClassName("nome")[item].innerHTML;
            var caminhoFoto = document.getElementsByClassName("foto-produto")[item].src;
            var valorItem = document.getElementsByClassName("valorTotal")[item].innerHTML;
            conteudoCarrinho += "<div id=" + item + " class='row produtoDoCarrinho'> <div class='col-md-2 col-xs-3'><img src='" + caminhoFoto + "' class='imagem'> </div> <div class='col-md-5 col-xs-3 '><span id=\"nome" + item + "\">" + nome + "</span></div> <div class='col-md-3 col-xs-3 '><select id=\"qtdCarrinho" + item + "\" name=\"qtd" + item + "\" onchange=\"mudaQtdCarrinho(" + item + "," + valor + ")\" class=\"qtd form-control \">" + opcoes.innerHTML + " </select> <div class=\"remover\"  onclick=\"remover(" + item + ")\">remover</div></div> <div class=\"col-md-2 col-xs-3 subValor\"><span id=\"subValor" + item + "\" class=\"subValor\">" + valorItem + "</span></div> </div>";
            document.getElementById("cabecalho-carrinho").style.display = "block";
            document.getElementById("conteudoCa").innerHTML = conteudoCarrinho;
            //conteudoCarrinho += "<div id="+item+" class='row produtoDoCarrinho'> <div class='col-md-2 col-xs-3'><img src='"+caminho+"' class='imagem'> <div class=\"remover\"  onclick=\"remover("+item+")\">remover</div> </div> <div class='col-md-5 col-xs-3'><p>"+nome+"</p></div> <div class='col-md-3 col-xs-3 '><div>"+peso+"</div><div onclick=\"mudaQtdC("+item+")\" class=\"mudaQtdC\">mudar quantidade</div></div> <div class=\"col-md-2 col-xs-3 subValor\"><p id=\"subValor"+item+"\" class=\"subValor\">"+valorItem+"<//p></div> </div>"; document.getElementById("conteudoCa").innerHTML= conteudoCarrinho;
            for (var i = 0; i < valores.length; i++) {
                if (document.getElementById("qtdCarrinho" + i)) {
                    document.getElementById("qtdCarrinho" + i).options[document.getElementsByClassName("qtd")[i].selectedIndex].selected = true;
                }
            }
            calcularValorDoCarrinho();
        }
    }

}


function troco() {
    document.getElementById("trocoPara").innerHTML = "Troco para";
    document.getElementById("troco").innerHTML = "<select class='form-control' name='bandeira'> <option value='2'>RS 2</option> <option value='5'>RS 5</option> <option value='10'>RS 10</option> <option value='20'>RS 20</option><option value='50'>RS 50</option><option value='100'>RS 100</option> </select> </div>";
}

function cartao() {
    document.getElementById("trocoPara").innerHTML = "bandeira";
    document.getElementById("troco").innerHTML = "<select class='form-control' name='bandeira'> <option value='visa'>Visa</option> <option value='outros'>Outros </option> <option value='master'>Master</option> <option value='vale'>Vale</option> </select> </div>";
}

function enviaCarrinho() {
    document.getElementById("itensCarr").innerHTML = "";
    for (var i = 0; i < valores.length; i++) {
        if (document.getElementById("qtdCarrinho" + i)) {
            var e = document.getElementById("qtdCarrinho" + i);
            var qtd = e.options[e.selectedIndex].value;
            document.getElementById("itensCarr").innerHTML += "<input style=\"display:none\" name=\"" + i + "\" value=\"" + qtd + " \">";
        }
    }

}

// funções para mostra itens no menu
function apagar(nome) {
    var vetor = document.getElementsByClassName(nome);
    for (var i = 0; i < vetor.length; i++) {
        vetor[i].style = "display:none;";
    }
}

function most(nome) {
    var vetor = document.getElementsByClassName(nome);
    for (var i = 0; i < vetor.length; i++) {
        vetor[i].style = "display:block;";
    }
}

function mostrar(nome) {
    if (nome == "legumes") {
        document.getElementsByClassName("elemento")[2].style = "border-radius: 10px;background-color:#FF4500; color:#fff;";
        document.getElementsByClassName("elemento")[3].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[4].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[5].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[6].style = "color:#FF4500; background-color:#fff;";

        apagar("ovos");
        apagar("verduras");
        apagar("acai");
    }
    if (nome == "verduras") {
        document.getElementsByClassName("elemento")[3].style = "border-radius: 10px;background-color:#FF4500; color:#fff;";
        document.getElementsByClassName("elemento")[2].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[4].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[5].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[6].style = "color:#FF4500; background-color:#fff;";
        apagar("legumes");
        apagar("ovos");
        apagar("acai");
    }
    if (nome == "acai") {
        document.getElementsByClassName("elemento")[4].style = "border-radius: 10px;background-color:#FF4500; color:#fff;";
        document.getElementsByClassName("elemento")[2].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[3].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[5].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[6].style = "color:#FF4500; background-color:#fff;";
        apagar("legumes");
        apagar("verduras");
        apagar("ovos");
    }
    if (nome == "ovos") {
        document.getElementsByClassName("elemento")[5].style = "border-radius: 10px;background-color:#FF4500; color:#fff;";
        document.getElementsByClassName("elemento")[2].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[3].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[4].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[6].style = "color:#FF4500; background-color:#fff;";
        apagar("legumes");
        apagar("verduras");
        apagar("acai");
    }
    if (nome == "todos") {
        document.getElementsByClassName("elemento")[6].style = "border-radius: 10px;background-color:#FF4500; color:#fff;";
        document.getElementsByClassName("elemento")[2].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[3].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[4].style = "color:#FF4500; background-color:#fff;";
        document.getElementsByClassName("elemento")[5].style = "color:#FF4500; background-color:#fff;";
        most("acai");
        most("legumes");
        most("ovos");
        most("verduras");
    } else {
        most(nome);
    }
}

/*
function calcularValorDoCarrinho(valor) {
    var valorToral = 0;
    for (var i = 0; i < valores.length; i++) {
        if (document.getElementById("qtdCarrinho" + i)) {
            valorToral = valorToral + (valores[i] * document.getElementById("qtdCarrinho" + i).options[document.getElementById("qtdCarrinho" + i).selectedIndex].value);
        }
    }
    document.getElementById("valorDoTotal").innerHTML = valorToral;
}

function remover(item) {
    var produto = document.getElementById(item);
    produto.parentNode.removeChild(produto);
    var carrinho = document.getElementsByClassName("carrinho")[item]
    carrinho.innerHTML = "+ Adicionar ao carrinho";
    carrinho.value = "removido";
    calcularValorDoCarrinho();
}

function mudaQtdCarrinho(pos, valor) {
    //var valores = [50, 3, 4, 5, 15.29, 4, 4, 2];
    var e1 = document.getElementsByClassName("qtd")[pos];
    var e = document.getElementById("qtdCarrinho" + pos);
    e1.options[e.selectedIndex].selected = true;
    var qtd = e.options[e.selectedIndex].value;
    if (qtd == 0) {
        document.getElementById("subValor" + pos).innerHTML = "";
        document.getElementsByClassName("valorTotal")[pos].innerHTML = "";
    } else {
        document.getElementById("subValor" + pos).innerHTML = "R$ " + qtd * valor;
        document.getElementsByClassName("valorTotal")[pos].innerHTML = "R$ " + qtd * valor;
    }
    calcularValorDoCarrinho();
}

function mudaQtd(pos, valor) {
    //var valores = [15, 3, 4, 5, 15.29, 4, 4, 2];
    var e = document.getElementsByClassName("qtd")[pos];
    var qtd = e.options[e.selectedIndex].value;
    if (qtd == 0) {
        document.getElementsByClassName("valorTotal")[pos].innerHTML = "";
    } else {
        document.getElementsByClassName("valorTotal")[pos].innerHTML = "R$ " + qtd * valor;
    }
    calcularValorDoCarrinho();

}

*/
