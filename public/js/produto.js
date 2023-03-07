$(document).ready(function(){
    $(document).on('submit','#addProduto',function(e){
        e.preventDefault();
        //alert("bem vindo ao jquery");
        var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
        $('#resp').html(load);   
        $.ajax({
            url: 'archives/addmaterial.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false, 
        }).done(function(data){
            $('.resp').html(data);
        });
    })
});