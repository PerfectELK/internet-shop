checkBasket();
$('.add').click(function(e){
    var name = $(this).attr('data-name');
    var id = $(this).attr('data-id');
    var price = $(this).attr('data-price');
    $.ajax({
        url: "../controller/addUnitToBasket.php",
        type: "post",
        async: false,
        data: {
            name: name,
            id: id,
            price: price
        },
       success: function(data){
            console.log(data);
            checkBasket();
       },
       error: function(msg){
            alert('ошибка');
       }
   });
});
    function checkBasket(){
        $.ajax({
            url: "../controller/checkBasket.php",
                type: "post",
                name: name,
            success: function(data){
                $('.bask').html(data);
            },
            error: function(msg){
                alert('ошибка');
            }
        });
    }

$('.minus').click(function(e){
    var name = $(this).attr('data-name');
    var id = $(this).attr('data-id');
    var price = $(this).attr('data-price');
    $.ajax({
        url: "../controller/removeUnitToBasket.php",
        type: "post",
        async: false,
        data: {
            name: name,
            id: id,
            price: price
        },
        success: function(data){
            console.log(data);
            checkBasket();
        },
        error: function(msg){
            alert('ошибка');
        }
    });
});

