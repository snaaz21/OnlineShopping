<!--Saima Naz and Dalee Kumawat-->
<?php
session_start();
if($_SESSION["admin"]==" ")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}

?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"shoestore");
?>
      <html>
	  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="admin/css/style.css">

    
    
    
  </head>
	  <body>
	 
        <div class="grid_10">
		
            <div class="box round first">
                <h2>
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Product Categoty</td>
					<td>
					<select name="pcategory">
					<option value="mobilephones">Men Shoes</option>
					<option value="tablet" selected>Women Shoes</option>
					<option value="upcomingdeals">Upcomings...</option>
				
					</select>
					</td>
					</tr>
					<tr>
					
					<td>product_brand</td>
					<td><input type="text" name="pb" value=""></td>
					</tr>
					<tr>
					<td>product_title</td>
					<td><input type="text" name="ptit" value=""></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value=""></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty" value=""></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					
					<tr>
					<td>Product keyword</td>
					<td>
					<textarea cols="15" rows="10" name="pkey"></textarea>
			        </td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" name="pdesc"></textarea>
			        </td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"><li><a href="showSupplier.php"style="color:white;><span class="glyphicon glyphicon-user"></span>View Supplier</a></li></td>
					
				    
					
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_images/".$v3.$fnm;
   $dst1=$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



mysqli_query($link,"insert into products values('','$_POST[pcategory]','$_POST[pb]','$_POST[ptit]','$_POST[pprice]','$_POST[pdesc]','$dst1','$_POST[pkey]','$_POST[pqty]')");


}

?>					
					
					
                </div>
            </div>
 
    
</body>	
</html>
     
