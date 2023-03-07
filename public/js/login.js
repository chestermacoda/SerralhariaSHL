$(document).ready(function(){
    $(document).on('submit','.form',function(e){
        e.preventDefault();
        var load = "<p class='text-center'><img src='public/images/load.gif' style='width:40px; height:30px'></p>";
        $('.resp').html(load);   
        // alert("bem vindo")
        $.ajax({
            url: 'public/ajax/login.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false, 
        }).done(function(data){
            $('.resp').html(data);
            // alert(data)
        });
    })
});