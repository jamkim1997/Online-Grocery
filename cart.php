<?php
if($_GET['function'])
{
    $function_name = $_GET['function'];
    $name = $_GET['name'];
    $quantity = $_GET['quantity'];
    $select = $_GET['select'];
    $price = $_GET['price'];
    switch($function_name){
      case 'Add' : addItem($name, $quantity,$price,$select); break;
    }
}

function addItem($name, $quantity,$price, $select){
  $selected_item = array();
  $selected_price = array();
  
  if($_COOKIE['selectedItems']){
    $selected_item = $_COOKIE['selectedItems'];
    $selected_item = stripslashes($selected_item);
    $selected_item = json_decode($selected_item, true);
  }
  
  if($_COOKIE['selectedPrice']){
    $selected_price = $_COOKIE['selectedPrice'];
    $selected_price = stripslashes($selected_price);
    $selected_price = json_decode($selected_price, true);
  }

    $newName = $name." - ".$quantity;
    if($selected_item[$newName]){
      $selected_item[$newName] = $select + $selected_item[$newName];
    }
    else{
      $selected_item[$newName] = $select;
    }
      $selected_price[$newName] = $price;

    $total_price = $_COOKIE['totalPrice'] + ($price * $select);
    setcookie("totalPrice", $total_price,time()+30*24*60*60);

    $total_num = $_COOKIE['totalNum'] + $select;
    setcookie("totalNum", $total_num,time()+30*24*60*60);

    $selected_item = json_encode($selected_item, true); 
    setcookie("selectedItems", $selected_item,time()+30*24*60*60);
    
    $selected_price = json_encode($selected_price, true); 
    setcookie("selectedPrice", $selected_price,time()+30*24*60*60);
}

?>

<html>
  <head>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#Clear").click(function() {
      $.post( 
          'CartManagement.php', 
          { function: "Clear", price: $('#price').text() },
          function(data){
            location.reload();
          }
          );
      });

      $("#CheckOut").click(function() {
        if($("#itemLabel").length ){
          window.open("Checkout.php", "PopupWindow", "width=600,height=600,scrollbars=yes,resizable=no");
          var date = new Date();
          date.setTime(date.getTime() + 60 * 60 * 1000);
          var expires = "; expires=" + date.toGMTString();
          document.cookie = "checkout=" + "" + "; expires=" + expires + "; path=/";
        }
        else{
          alert("At least add one item in the cart to check out");
        }
        
      })
    });
    </script>
  </head>

  <body>
  <h2>Shopping cart</h2>
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
      echo "<tr><td width='30%'><span style='color:red' id='itemLabel'><b>Items</b><span></td>";
      echo "<td width='20%'><span style='color:red'><b>Quantities</b></span></td>";
      echo "<td width='10%'><span style='color:red'><b>Price</b></span></td>";
      echo "<td width='20%'><span style='color:red'><b>Total</b></span></td></tr>";
      foreach($items as $key => $value){
        echo "<tr><td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "<td>".$price[$key]."</td>";
        echo "<td>".$value * $price[$key]."</td></tr>";
        
      }
      echo "</table>";
  }
  }
  else{
    print "empty<br>";
  }

    if($_COOKIE['totalNum'] > 0){
      echo "<i>Total products</i> : <b>".$_COOKIE['totalNum']."</b>";
      echo "<br>";
      echo "<i>Total Price</i> : $ <b>". $_COOKIE['totalPrice']."</b>";
      echo "<br>";
    }
      echo "<button id='Clear'>Clear</button>  ";
      echo "<button id='CheckOut'>Check out!</button>";
  ?>
  </body>
</html>
