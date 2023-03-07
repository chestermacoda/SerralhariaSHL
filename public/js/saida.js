$(document).ready(function(){
    $(document).on('submit','#addProduto',function(e){
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
            $('.resp').html(data);
        });
    })
    $(document).on('submit','.senhaNova',function(e){
        e.preventDefault();
        alert("bem vindo ao jquery");
        var load = "<p class='text-center'><img src='../public/images/load.gif' style='width:40px; height:30px'></p>";
        $('#resp').html(load);   
        $.ajax({
            url: senha,
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