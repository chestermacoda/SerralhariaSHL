$(document).ready(function(){
    $(document).on('submit','#modal-form',function(e){
        e.preventDefault();
        //alert("bem vindo ao jquery");
        var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
        $('#resp').html(load);   
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false, 
        }).done(function(data){
            $('#resp').html(data);
        });
    })

    setTimeout(tabela,100)
    function tabela(){
        $.ajax({
            url: table,
            method:"GET",
        }).done(function(data){
            $(".tab").html(data)
            // alert(data)
        })
    }

    
        $('#buscar').keyup(function(e){
        e.preventDefault();
            // alert("bem vindo ao ajax")
        var valor = $(this).val().toLowerCase();

        $('.tab tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
        })

        })
    

    $('#buscar').change(function(e){
        e.preventDefault();
            var valor = $(this).val();
             
            $.ajax({
                url: buscar,
                method:"POST",
                data:{
                    valor: valor
                }
            }).done(function(data){
                $(".tab").html(data)
                // alert(data)
                
            })             
        });

        $('.delet').click(function(e){
        e.preventDefault();
            var id = $(this).attr("id");
            var resposta = confirm("Deseja continuar com esta ação?");
            // alert("bem vindo ao ajjax")
            if(resposta == true)
                {
                $.ajax({
                    url: "archives/DeletTools.php",
                    method:"POST",
                    data:{
                        id: id
                    }
                }).done(function(data){
                    $(".resp").html(data)
                    
                })   
            }
        });
        
        $('#busca').keyup(function(e){
            e.preventDefault();
                // alert("bem vindo ao ajax")
            var valor = $(this).val().toLowerCase();

            $('.tab tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1)
            })

        })

        $(document).on("change","#registo",function(e){
            e.preventDefault();
            var registo = $(this).val();
            // alert(registo)
            $.ajax({
                url: registo,
                method:"POST",
                data:{
                    registo :registo
                }
            }).done(function(data){
                $(".tab").html(data)
                // alert(data)
            })
        })

        
        // deletar notificacoes.php
        $(document).on("click",".remover",function(e){
            e.preventDefault();
            var resposta = confirm("Deseja continuar com esta ação?");
            // alert("bem vindo ao ajjax")
            if(resposta == true)
            {
            var delet = $(this).attr("id");
            
            $.ajax({
                url: "archives/deletenotificatio.php",
                method:"POST",
                data:{
                    delet :delet
                }
            }).done(function(data){
                // $(".tab").html(data)
                alert(data)
            }) }else{

            }
        })
    

    // $(document).on("change","#registo",function(e){
    //     e.preventDefault();
    //     var registo = $(this).val();
    //     // alert(registo)
    //     $.ajax({
    //         url: "archives/produtos.php",
    //         method:"POST",
    //         data:{
    //             registo :registo
    //         }
    //     }).done(function(data){
    //         $(".tab").html(data)
    //         // alert(data)
    //     })
    // })

    // setTimeout(tabela,50000) 

    $(document).on("click",".retorno",function(){
        var resposta = confirm("Deseja continuar com esta ação?");
        // alert(idRequi);
        if(resposta == true)
        {
            
            var status = $(this).attr("data-value");
            var quantidade = $(this).attr("data-id");
            var id_ferramenta = $(this).attr("data-set");
            var idRequi = $(this).attr("id");
            $.ajax({
            url: 'archives/ToolsReturn.php',
            method: 'POST',
            data:{
                idRequi :idRequi,
                status :status,
                quantidade:quantidade,
                id_ferramenta :id_ferramenta
            }
            }).done(function(data){
                    // $(".tab").html(data)
                    // alert(data)
                    location.reload()
            })
            
        }else{
            // alert("cancelado")
        }
    })
    
});