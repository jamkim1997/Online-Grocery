<!DOCTYPE html>

<html>
  <head>
    <title>Check out Form</title>
  </head>

  <body>
    <h1>Check Out Form</h1>
    <table>
      <form action="CheckOut_submitted.php" method="POST" onsubmit="return validate()">
        <tr>
          <td>
            <label for="name">Name <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="text" name="name" id="name"/>
          </td>
          <td rowspan="7">
            <iframe src="./price_frame.php" height = 350 width=200% style='flex-grow: 1; border: none; margin: 0; padding: 0;'></iframe>
          </td>
        </tr>
        <tr>
          <td>
            <label for="address">Address <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="text" name="address" id="address"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="suburb">Suburb <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="text" name="suburb" id="suburb" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="state">State <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="text" name="state" id="state"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="country">Country <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="text" name="country" id="country" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">Email address <span style="color: red">*</span></label>
          </td>
          <td>
            <input type="email" name="email" id="email"/>
          </td>
        </tr>
        <tr>
          <td>
          </td>
          <td>
            <input type="submit" value="Purchase" >
          </td>
        </tr>
      </form>
    </table>
    
    

<script type="text/javascript">
function validate()
{
    if (document.getElementById("name").value=="")
    {
        alert("Please enter your username");
        return false;
    }
    if (document.getElementById("address").value=="")
    {
        alert("Please enter your address");
        return false;
    }
    if (document.getElementById("suburb").value=="")
    {
        alert("Please enter your suburb");
        return false;
    }
    if (document.getElementById("state").value=="")
    {
        alert("Please enter your state");
        return false;
    }
    if (document.getElementById("country").value=="")
    {
        alert("Please enter your country");
        return false;
    }
    return true;   
}
</script>
  </body>
</html>
