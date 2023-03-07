$(document).ready(function(){
    $.ajax({
        url: "archives/produtos.php",
        method:"GET",
    }).done(function(data){
        $(".tab").html(data)
        // alert(data)
    })
    // registo
    $(document).on("change","#registo",function(e){
        e.preventDefault();
        var registo = $(this).val();
        // alert(registo)
        $.ajax({
            url: "archives/produtos.php",
            method:"POST",
            data:{
                registo :registo
            }
        }).done(function(data){
            $(".tab").html(data)
            // alert(data)
        })
    })
    
})