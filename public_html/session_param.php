<?php

if ($_GET["item_page"]) { // Если GET-параметр равен Intel
    $_SESSION["item_page"] = $_GET["item_page"]; // Помещаем в сессию значение Intel
  }
elseif ($_GET["item_page"] == "All") { 
    $_SESSION["item_page"] = "Asus"; 
  }

$item_page = isset($_SESSION["item_page"]) ? $_SESSION["item_page"]: null;

?>