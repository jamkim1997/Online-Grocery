<?php
    if($_COOKIE['selectedItems']){
    $items = $_COOKIE['selectedItems'];
    $items = stripslashes($items);
    $items = json_decode($items, true);
    
    $price = $_COOKIE['selectedPrice'];
    $price = stripslashes($price);
    $price = json_decode($price, true);
    
    
    

  if(sizeof($items) >0){
      echo "<table width='100%'>";
      echo "<tr><td width='30%'><span style='color:red'><b>Items</b><span></td>";
      echo "<td width='20%'><span style='color:red'><b>Quantities</b></span></td>";
      echo "<td width='30%'><span style='color:red'><b>Price</b></span></td></tr>";
      foreach($items as $key => $value){
        echo "<tr><td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "<td>".$price[$key]."</td></tr>";
      }
      echo "</table>";
  }
  }

    if($_COOKIE['totalNum'] > 0){
      echo "<i>Total products</i> : <b>".$_COOKIE['totalNum']."</b>";
      echo "<br>";
      echo "<i>Total Price</i> : $ <b>". $_COOKIE['totalPrice']."</b>";
    }
?>