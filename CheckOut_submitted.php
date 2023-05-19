<html>
  <head>
    <title>My submitted form</title>
  </head>

  <body> 
    Hello <?php echo $_POST['name'];?>
    </br>
    </br>
    The order will be delivered to 
    <b><?php echo $_POST['address']." ".$_POST['surburb']." ". $_POST['state']." ".$_POST['country'];?> </b>
    </br>
    Details will be sent via the email :  <b><?php echo $_POST['email'];?>.</b>
  

  </body>
</html>
