$(document).ready(function(){

    $(".name").click(function(e){
        e.preventDefault();
        // editar perfil e sair do sistema 
         $(".ul").toggle("200")
         $(".describe").hide("200")
         $(".descricao").hide("200")
    })
    $(".bell").click(function(e){
        e.preventDefault();
        // ver notificacoes do sistema e outras variaveis
         $(".descricao").toggle("200")
         $(".describe").hide("200")
         $(".out ul").hide("200")
    })
    $(".comment").click(function(e){
        e.preventDefault();
        // ver notificacoes do sistema e outras variaveis
         $(".describe").toggle("200")
         $(".descricao").hide("200")
         $(".out ul").hide("200")
    })
    $(".hmburguer").click(function(e){
        // menu amburguer 
        $("header").css({
            left:  "0"
        })
        $(this).hide();
        $(".close").show();
    })
    $(".close").click(function(e){
        // menu amburguer 
        $("header").css({
            left:  "-100%"
        })
        $(this).hide();
        $(".hmburguer").show();
    })

    $(".Product").click(function(){
        $(".p").slideToggle();
    })

    $(".supliers").click(function(){
        // fornecedor
        $(".f").slideToggle();
    })
    $(".tools").click(function(){
        // fornecedor
        $(".t").slideToggle();
    })
     
    
    $.ajax({
        url: "archives/bell.php",
        method:"GET",
    }).done(function(data){
        $(".bels").html(data)
        // alert(data)
    })
})