<?php
session_start();

if ($_GET["name"] == "Intel") { // Если GET-параметр равен Intel
    $_SESSION["name"] = "Intel"; // Помещаем в сессию значение Intel
  }
  elseif ($_GET["name"] == "ASUS") { 
    $_SESSION["name"] = "Asus"; 
  }
  elseif ($_GET["name"] == "Lenovo") { 
    $_SESSION["name"] = "Lenovo"; 
  }
  elseif ($_GET["name"] == "Nvidia") { 
    $_SESSION["name"] = "Nvidia"; 
  }
  elseif ($_GET["name"] == "All") { 
    $_SESSION["name"] = "All"; 
  }



$name = isset($_SESSION["name"]) ? $_SESSION["name"] : 'All'; // Берём из сессии , либо ставим по умолчанию

require 'session_param.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script>
			$(document).ready(function() {
			    $("#slide3").slider({values:[100,100000],
			    min:0,
			    max:100000,
			    range:true,
			    step:100,
			    slide:function(event,ui){
			       $("#range").val(ui.values[0]+" руб. - "+ui.values[1]+" руб.")
			    }})
			})
		</script>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
	<div class=''>
		<nav class="navbar navbar-expand-sm">
  		<a class="navbar-brand" href="#">BitByBit</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		 </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
			<a class="nav-link" href="#">Main<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
			<a class="nav-link" href="#">Shipping</a>
		      </li>
		      <li class="nav-item dropdown active">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Catalog
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Action</a>
			  <a class="dropdown-item" href="#">Another action</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Something else here</a>
			</div>
		      </li>
		      <li class="nav-item">
			<a class="nav-link " href="#" tabindex="-1" aria-disabled="true">About us</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
		</nav>
	<hr>
	</div>
			<div class="container-fluid">
                 <div class="row">
                        <div class="col list_product">                            
                            <div class="list_name_product">
								<?php
								require "catalog.php";
								echo $catalog['list_name']; ?>
                            </div>
                            
                            <ul class="beads">
							<?php 
							foreach ($catalog['items'] as $item) { 
							echo '<li><a href="index.php?name=',$item['list_name'],'">', $item['list_name'],'</a></li>';
							};
							?>  
                            </ul>
                            <div class="list_name_product">
                                ЦЕНА
                            </div> 
                        <div id="tabs-3">
                            <p> Укажите с помощью ползунков ниже подходящий Вам ценовой диапазон для покупки материалов: <input type="text" id="range" value="100 руб. - 100000 руб."/></p>
                            <div id="slide3"></div> 
                        </div>
                    </div>

                        <div class="col">
                            <h3 class="actii">
							<?php
								require "item_card.php";
								echo $card_items['card']; ?>
							</h3>

                            <div class="card-columns"> 
                                    <div class="card-desk">

									<?php

                                    if(!$_GET["item_page"]) {

									foreach ($card_items['items'] as $items) {
										$str1 = $name;
										$str2 = $items['brand'];
										if ($name == 'All') {
                                            echo  '
                                            <div class="card">
                                                    <a href="index.php?item_page=',$items['prod_name'],'"> 
                                                    <img class="" src=',$items['url'],' alt="Card image cap" > </a>
                                                    <div class="card-body">
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="product__title">', $items['prod_name'],'</a>
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
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="btn btn-primary">В КОРЗИНУ</a>
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="link_fastbuy">
                                                            <svg id="icon-check" viewBox="0 0 15 15" width="15px" height="15px">
                                                                <title>cursor</title><path d="M14.852 12.687l-2.985-2.985 2.13-1.23a.502.502 0 0 0-.065-.9l-9.497-3.79a.502.502 0 0 0-.651.652l3.787 9.497a.502.502 0 0 0 .9.065l1.23-2.13 2.985 2.986a.501.501 0 0 0 .71 0l1.456-1.457a.502.502 0 0 0 0-.71zm-1.81 1.102l-3.093-3.093a.502.502 0 0 0-.79.104L8.12 12.6 5.148 5.148 12.6 8.12l-1.8 1.04a.501.501 0 0 0-.104.789l3.092 3.093-.747.747zM2.203 1.493a.502.502 0 0 0-.71.709l1.115 1.115a.5.5 0 0 0 .71 0 .502.502 0 0 0 0-.71L2.202 1.493zM2.58 4.96a.502.502 0 0 0-.501-.501H.502a.502.502 0 1 0 0 1.003H2.08a.502.502 0 0 0 .501-.502zm-.203 1.549L1.262 7.623a.501.501 0 1 0 .71.71l1.114-1.115a.502.502 0 1 0-.71-.71zM4.96 2.58a.502.502 0 0 0 .502-.502V.502a.502.502 0 0 0-1.003 0v1.576c0 .277.225.502.502.502zm1.903.653a.5.5 0 0 0 .355-.147L8.333 1.97a.501.501 0 1 0-.71-.71L6.51 2.377a.502.502 0 0 0 .354.857z"></path>
                                                            </svg>
                                                            <span>Купить в 1 клик</span>
                                                        </a>
                                                    </div>
												</div>';
												
										} 
                                        if (strcmp($str1, $str2) == 0) {
                                        echo  '<div class="card">
                                                    <a href="index.php?item_page=',$items['prod_name'],'"> 
                                                    <img class="" src=',$items['url'],' alt="Card image cap" > </a>
                                                    <div class="card-body">
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="product__title">', $items['prod_name'],'</a>
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
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="btn btn-primary">В КОРЗИНУ</a>
                                                        <a href="index.php?item_page=',$items['prod_name'],'" class="link_fastbuy">
                                                            <svg id="icon-check" viewBox="0 0 15 15" width="15px" height="15px">
                                                                <title>cursor</title><path d="M14.852 12.687l-2.985-2.985 2.13-1.23a.502.502 0 0 0-.065-.9l-9.497-3.79a.502.502 0 0 0-.651.652l3.787 9.497a.502.502 0 0 0 .9.065l1.23-2.13 2.985 2.986a.501.501 0 0 0 .71 0l1.456-1.457a.502.502 0 0 0 0-.71zm-1.81 1.102l-3.093-3.093a.502.502 0 0 0-.79.104L8.12 12.6 5.148 5.148 12.6 8.12l-1.8 1.04a.501.501 0 0 0-.104.789l3.092 3.093-.747.747zM2.203 1.493a.502.502 0 0 0-.71.709l1.115 1.115a.5.5 0 0 0 .71 0 .502.502 0 0 0 0-.71L2.202 1.493zM2.58 4.96a.502.502 0 0 0-.501-.501H.502a.502.502 0 1 0 0 1.003H2.08a.502.502 0 0 0 .501-.502zm-.203 1.549L1.262 7.623a.501.501 0 1 0 .71.71l1.114-1.115a.502.502 0 1 0-.71-.71zM4.96 2.58a.502.502 0 0 0 .502-.502V.502a.502.502 0 0 0-1.003 0v1.576c0 .277.225.502.502.502zm1.903.653a.5.5 0 0 0 .355-.147L8.333 1.97a.501.501 0 1 0-.71-.71L6.51 2.377a.502.502 0 0 0 .354.857z"></path>
                                                            </svg>
                                                            <span>Купить в 1 клик</span>
                                                        </a>
                                                    </div>
												</div>';
									}
                                };
                            } else {
                                require 'item_buy_page.php';
                            }
												?>
                                            
                                        </div>
                                </div>
                        </div>
						</div>
						</div>
                        
		<footer>
                    <div class="row justify-content-between">
                        <ul class="ftli">
                            <li><a href="#">Поддержка</a></li>
                            <li><a href="#">Приватность</a></li>
                            <li><a href="#">Сообщить об ошибке</a></li>
                        </ul>
                        <ul class="ftli">
                            <li><a href="#">Оплата</a></li>
                            <li><a href="#">Возврат</a></li>
                            <li><a href="#">Доставка</a></li>
                        </ul>
                        <div>
                            <h3 class="footer_info">АДРЕСА МАГАЗИНОВ</h3>
                            <p class="footer_info">LA USA</p>
                        </div>
                        <p class="footer_info"> 
                            Работаем ежедневно с 08:00 до 22:00
                                        <br>
                            Доставка в любые районы и области 
                        </p>
    
                    </div>
                    
                    <p class="foottxt" > BitByBit &copy; все права защищены </p>
        </footer>
	</body>
</html>