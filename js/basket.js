$('.remove-all-units').click(function(){
    $.ajax({
        url: "../controller/removeAllUnits.php",
        type: "post",
        async: false,
        success: function(data){
            setTimeout( 'location="/?id=basket";', 200 );
        },
        error: function(msg){
            alert('ошибка');
        }
    });
});



