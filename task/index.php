<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DATA COLLECTION</title>
<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style type="text/css">
 
	body{width: 600px;
		background-image: url(img4.jpeg);
		font-family: calibri;
		padding: 0;
		margin: 0 auto;
        }
    .container{
    	border:1px solid #7ddaff;
    	background-color: #b4c8d0;
    	margin: 0px auto;
    	padding: 30px;
    	border-radius: 4px;

    }
    .form-control{
    	padding: 10px;
    	border:#bdbdbd 1px solid;
    	border-radius: 4px;
    	background-color: #FFF;
    	width: 50%;
    }
    .form-group{
    	padding-bottom: 15px;
    	padding-left: 150px;

    }

    </style>

<body>
  <form action="output.php" method="POST">
	<div class="container">
		<h2><center>Please give the customer,product and servername</center></h2>
		
		<div class="form-group">
			<label for="customer">Select customer</label>
			<select name="customer" class= "form-control" id="customer">
				<option value="">select customer</option>
				<?php
				$conn = mysqli_connect('localhost','root','','server');
				$query = mysqli_query($conn,"select * from customer");
				while($row=mysqli_fetch_array($query)) {
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row["customername"]; ?></option>
				  <?php
				}
			   ?>
			</select>		
		</div>

		<div class="form-group">
			<label for="product">Select product</label>
			<select name="product" id="product"class="form-control">
				<option value="">select product</option>
			</select>		
		</div>

		<div class="form-group">
			<label for="servername">Select servername:</label>
			<select name="server"  id="servername" class= "form-control">
				<option value="">select servername</option>
			</select>		
		</div>
		<!---<div class="form-group">	
		<button type="on-click">SUBMIT</button>	
		</div> --->
		  <center><input type="submit"></center>
         
        <!---if($c = shell_exec($cmd)) {
        //echo "<span style='color:blue;'>$a</span>"
        //}--->
          
	</div>
	<script>
	$(function() {
    $("#customer").change(function() {
    	var c_id = this.value;
    	//alert(c_id);
    	$.ajax({


       type:'POST',
       url: 'ajax.php',
       data:"id="+c_id,
       dataType: "JSON",
       success: function(response){
       //alert(object.keys(response).length);
       	$('#product')
     .find('option')
     .remove()
     .end();
     var option = $('<option>', {
        value: '',
        html: 'select option'
        
      });
      $("#product").append(option);
       for (var i = 0; i < response.length; i++) {
      option = $('<option>', {
        value: response[i].id,
        html: response[i].product
        
      });
      $("#product").append(option);
}
       	
       }
   });
    });
});


	$(function() {
    $("#product").change(function() {
    	var p_id = this.value;
    	//alert(p_id);
    	$.ajax({


       type:'POST',
       url: 'ajax.php',
       data:"p_id="+p_id,
       dataType: "JSON",
       success: function(response){
       	
       	//alert(response); 
       	$('#servername')
     .find('option')
     .remove()
     .end();
     var option = $('<option>', {
        value: '',
        html: 'select option'
        
      });
      $("#servername").append(option);
       for (var i = 0; i < response.length; i++) {
      
      option = $('<option>', {
        value: response[i].id,
        html: response[i].servername
        
      });
      $("#servername").append(option);
}
       }
   });
    });
});
</script>
</form>
</body>
</html>