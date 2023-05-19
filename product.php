<!DOCTYPE html>
<html>
  <head>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  </head>

  <body>
    <?php
      print "<h2>Product details </h2>";
      if(!isset($_COOKIE['item'])) {
        print "<p> Choose the item on the left navigation image  </p>";
      }
      else{
        $link = mysqli_connect("aahqxpadqblo46.cmetpeg2omjk.us-east-1.rds.amazonaws.com","uts","internet","uts") or die("Cannot connect to the server !");

        $query_string = "select * from products where product_id =".$_COOKIE['item'].";";
        $result = mysqli_query($link, $query_string);
        
        $product_data = array(
            "item_name" => "test_name",
            "item_price" => "100",
            "item_stock" => "test_stock",
            "item_quality" => "test_quality"
        );
        
        while($data = mysqli_fetch_assoc($result)){
            $product_data['item_name'] = $data["product_name"];
            $product_data['item_price']= $data["unit_price"];
            $product_data['item_stock'] = $data["in_stock"];
            $product_data['item_quality'] = $data["unit_quantity"];
            }
        mysqli_close($link);
        $data = $product_data;
    
        $item_name = $data['item_name'];
        $item_quality = $data['item_quality'];
        $item_stock = $data['item_stock'];
        $item_price = $data['item_price'];
    
        setcookie("item_name", $item_name,time()+30*24*60*60);
        setcookie("item_quality", $item_quality,time()+30*24*60*60);
        setcookie("item_stock", $item_stock,time()+30*24*60*60);
        setcookie("item_price", $item_price,time()+30*24*60*60);
        
        echo "<table>";
        echo "<tr><td><b>Product name  </b></td>";
        echo "<td> $item_name </td> <td rowspan=4><image src='./Images/$item_name.png' width=200 height=200></td></tr>";
        echo "<tr><td><b>Quanitity</b></td>";
        echo "<td> $item_quality </td></tr>";
        echo "<tr><td><b>Price</b></td>";
        echo "<td> $$item_price </td></tr>";
        echo "<tr><td><b>Stock</b></td>";
        echo "<td> $item_stock </td></tr>";
        echo "</table>";
      }
    ?>
    
  </body>
</html>
