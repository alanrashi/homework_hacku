<?php
'<div class="card">
<a href="index.php?item_page=',$items['prod_name'],'"> 
<img class="" src=',$items['url'],' alt="Card image cap" > </a>
<div class="card-body">
    <a href="item_page.php" class="product__title">', $items['prod_name'],'</a>
    <div>
        <span class="product__subscription">Производитель:' ,$items['brand'],'</span>
    </div>
        <div>
            <svg id="icon-check" viewBox="0 0 12 8" width="15px" height="15px">
                <title>check</title><path d="M4.17 6.326L10.193 0 11 .844 4.17 8 1 4.68l.792-.845z" fill-rule="evenodd"></path>
            </svg>
            <span class="in-stock"> в наличии</span>	
            <p class="price">',$items['cost'],'</p>	
        </div>
    <a href="item_page.php" class="btn btn-primary">В КОРЗИНУ</a>
    <a href="item_page.php" class="link_fastbuy">
        <svg id="icon-check" viewBox="0 0 15 15" width="15px" height="15px">
            <title>cursor</title><path d="M14.852 12.687l-2.985-2.985 2.13-1.23a.502.502 0 0 0-.065-.9l-9.497-3.79a.502.502 0 0 0-.651.652l3.787 9.497a.502.502 0 0 0 .9.065l1.23-2.13 2.985 2.986a.501.501 0 0 0 .71 0l1.456-1.457a.502.502 0 0 0 0-.71zm-1.81 1.102l-3.093-3.093a.502.502 0 0 0-.79.104L8.12 12.6 5.148 5.148 12.6 8.12l-1.8 1.04a.501.501 0 0 0-.104.789l3.092 3.093-.747.747zM2.203 1.493a.502.502 0 0 0-.71.709l1.115 1.115a.5.5 0 0 0 .71 0 .502.502 0 0 0 0-.71L2.202 1.493zM2.58 4.96a.502.502 0 0 0-.501-.501H.502a.502.502 0 1 0 0 1.003H2.08a.502.502 0 0 0 .501-.502zm-.203 1.549L1.262 7.623a.501.501 0 1 0 .71.71l1.114-1.115a.502.502 0 1 0-.71-.71zM4.96 2.58a.502.502 0 0 0 .502-.502V.502a.502.502 0 0 0-1.003 0v1.576c0 .277.225.502.502.502zm1.903.653a.5.5 0 0 0 .355-.147L8.333 1.97a.501.501 0 1 0-.71-.71L6.51 2.377a.502.502 0 0 0 .354.857z"></path>
        </svg>
        <span>Купить в 1 клик</span>
    </a>
</div>
</div>';
?>