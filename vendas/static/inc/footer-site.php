
<!--<script>
    //0-batata   1-cebola 2-cenoura   3-tomate   4-alho
    //5-ovos 6-couve
    //
    //
    //
    //
    if (screen.width < 768) {

    }

    var valores = [2, 3, 4, 5, 15.29, 4, 4, 2];
    var preco = document.getElementsByClassName("preco");
    for (var i = 0; i < preco.length; i++) {
        if (i == 5 || i == 4) {
            if (i == 4) {
                preco[i].innerHTML = "R$ 15,29<span class='kilo'>/kg</span>";
            } else {
                preco[i].innerHTML = "R$ " + valores[i] + ",00<span class='kilo'>/dz</span>";
            }
        } else {
            preco[i].innerHTML = "R$ " + valores[i] + ",00<span class='kilo'>/kg</span>";
        }
    }
</script>-->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 2500 //changes the speed
    })
</script>

</body>

</html>
