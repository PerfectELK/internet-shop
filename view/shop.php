<div class="container-fluid mt-5">
    <div class="row">
        <? $units = ShopUnit::getUnits();
        foreach ($units as $unit):
        ?>
        <div class="col-2.5 shop-unit border ml-5 mt-4 text-center">
            <div class="card-img mt-3">
                <img src="../img/unit.png" class="mx-auto rounded d-block" alt="Картинка товара">
            </div>
            <span class="name"><?=$unit['name']; ?></span>
            <div class="">Цена : <?=$unit['price'] ?> руб.</div>
            <button data-name="<?=$unit['name'] ?>" data-price="<?=$unit['price'] ?>" data-id="<?=$unit['id'] ?>" class="add btn mr-1 mt-3 mb-2" <? if($unit['availability'] == 0 ):?>disabled<? endif;?>>
                <i class="fas fa-plus">
                </i>
            </button>
            <button data-name="<?=$unit['name'] ?>" data-price="<?=$unit['price'] ?>" data-id="<?=$unit['id'] ?>" class="minus btn ml-1 mt-3 mb-2" <? if($unit['availability'] == 0 ):?>disabled<? endif;?>><i class="fas fa-minus" ></i></button>
        </div>
        <? endforeach;?>
    </div>
</div>