<div class="container">
    <div class="row">
        <div class="col-6 text-center unit-container">
            <h4 class="mt-3">Ваши товары:</h4>
            <? if(isset($_SESSION['units'])){foreach($_SESSION['units'] as $units => $unit):?>
            <div class="col-2.5 shop-unit border ml-5 mt-4">
                <div class="card-img mt-3">
                    <img src="../img/unit.png" class="mx-auto rounded d-block" alt="Картинка товара">
                </div>
                <span class="name"><?=$unit['name']; ?></span>
                <div class="pb-3">Цена : <?=$unit['price'] ?> руб.</div>
            </div>
            <?endforeach;}?>
        </div>
        <div class="col mt-5 ml-sm-5">
            <div><button class="btn btn-success btn-lg mt-3 order" <?if(!isset($_SESSION['units'])):?>disabled<?endif;?>>Сделать заказ</button></div>
            <div class="all-units">
                <h5>Всего товаров:</h5>
                <span><?=count($_SESSION['units'])?></span><br />
                <h5>Товаров на сумму:</h5>
                <span><?=
                    $price;
                    if(isset($_SESSION['units'])) {
                        foreach ($_SESSION['units'] as $units => $unit) {
                            $price = $price + $unit['price'];
                        }
                        echo $price;
                    } else{
                        echo 0;
                    }
                    ?> руб.</span>
            </div>
            <div><button class="remove-all-units btn btn-danger btn-lg mt-2" <?if(!isset($_SESSION['units'])):?>disabled<?endif;?>>Очитить корзину</button></div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>
$('.order').click(function(){
$.ajax({
url: "../controller/order.php",
type: "post",
data: {order: <?php
        foreach($_SESSION['units'] as $units => $unit) {
            $arr[] = $unit;
        }
        $json = json_encode($arr);
        echo $json;
            ?>},
async: false,
success: function(data){
    setTimeout( 'location="/?id=basket";', 200 );
},
error: function(msg){
alert('ошибка');
}
});
});
</script>