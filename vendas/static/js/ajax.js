$(document).ready(function(){
    $(".form-atualiza").submit(function (event) {
        event.preventDefault();
        var inputs = $(this).serialize();
        url = this.action;
        var tab = $(this).parent().next().next();
        $.post(url,inputs,
            function(response){
                $('#tot1').html($($.parseHTML(response)).filter("#tot1").html())
                $('#tot2').html($($.parseHTML(response)).filter("#tot2").html())
                tab.html($($.parseHTML(response)).filter("#sub-total").html());
        });
      });
 });