$(document).ready(function(){

    $(document).on("click",".entradas", function(){
        window.print();
    })

    $(document).on('submit','.update',function(e){
        e.preventDefault();
        //alert("bem vindo ao jquery");
        var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
        $('#resp').html(load);   
        $.ajax({
            url: 'archives/UpdateFunc.php',
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
 
  
   
    
    
});