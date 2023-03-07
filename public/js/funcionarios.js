$(document).ready(function(){

    $(document).on("click",".entradas", function(){
        window.print();
    })
    $(document).on("click",".print", function(){
        window.print();
    })

    $(document).on('submit','#addProduto',function(e){
        e.preventDefault();
        //alert("bem vindo ao jquery");
        var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
        $('#resp').html(load);   
        $.ajax({
            url: 'archives/addFuncionarios.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false, 
        }).done(function(data){
            $('.resp').html(data);
        });
    })

    $('#buscar').keyup(function(e){
        e.preventDefault();
            // alert("bem vindo ao ajax")
        var valor = $(this).val().toLowerCase();

        $('.tab tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
        })

    })

    $.ajax({
        url: url,
        method:"GET",
    }).done(function(data){
        $(".tab").html(data)
        // alert(data)
    })

    $(document).on("change","#registo",function(e){
        e.preventDefault();
        var load = "<td colspan='6' ><p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p><td>";
        $('.tab').html(load); 
        var registo = $(this).val();
        // alert(registo)
        $.ajax({
            url: url,
            method:"POST",
            data:{
                registo :registo
            }
        }).done(function(data){
            $(".tab").html(data)
            // alert(data)
        })
    })

    
    $(document).on("click",".entrada",function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        var presenca = $(this).attr("data-id");
        var data = $(this).attr("data-value");
        // alert(registo)
        $.ajax({
            url: table,
            method:"POST",
            data:{
                id :id,
                presenca :presenca,
                data:data
            }
        }).done(function(data){
            $(".resp").html(data)
        })
    
    })

    $(document).on("click",".saida",function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        var presenca = $(this).attr("data-id");
        // alert(registo)
        $.ajax({
            url: "archives/addsaida.php",
            method:"POST",
            data:{
                id :id,
                presenca :presenca
            }
        }).done(function(data){
            $(".resp").html(data)
        })
    
    })




    $(document).on("submit",".all",function(e){
        e.preventDefault();
        // alert(presenca)
        $.ajax({
            url: table,
            method:"POST",
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false, 
        }).done(function(data){
            $(".resp").html(data)
        })
    })
});