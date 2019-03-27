<style>
    div {
        margin: auto;
        width: 100px;
        height: 100px;
        font-size: 70px;
        padding-top: 15px;
        text-align: center;
    }
    .paaris{
        background: red;
    }
    .paaritu{
        background: green;
    }
</style>
<?php
// genereerime juhuslik täisarv vahemikus 0 kuni 100
$arv = rand(0, 100);
// arvutame jääk 2-ga jagamisel
$jaak = $arv % 2;
// kontrollime kui jääk on 0 - paaris arv
if($jaak == 0){
    echo '<div class="paaris">'.$arv.'</div>';
} else {
    echo '<div class="paaritu">'.$arv.'</div>';
}

