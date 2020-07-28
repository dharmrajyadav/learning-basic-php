
<?php
        error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product-Home</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

   

</head>
<body>


        <?php
                if(!empty($errors))
            echo $errors;
        
        ?>

<?php
                if(!empty($message))
            echo $message;
        
        ?>

<div class="container">

<form   name="myform" id="myform" class="well form-horizontal"   enctype="multipart/form-data" >
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>User Form</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Product-Name:</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"></span>
<input  name="productname" id="productname" placeholder="Product Name" class="form-control"  type="text"  >
</div>
</div>
</div>


<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label">Product-Price:</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"></span>
<input  name="productprice" id="productprice" placeholder="Product Price" class="form-control"  type="text"  >
</div>
</div>
</div>

<!-- Text input-->
   
<div class="form-group">
<label class="col-md-4 control-label">Product_Description:</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"></span>
    <textarea rows="4" cols="50" name="productdescription" id="productdescription" form="usrform">
Enter Description Here...</textarea>
</div>
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label">Product-Image</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"></span>
    <input type="file"  id='files' name="files[]" class="form-control" multiple>

</div>
</div>
</div>
<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><br>
<input type="submit" class="btn btn-success" id="formSubmit" name='formSubmit' value="Upload Image"/></div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->


</body>
 <script>

$(document).ready(function()
{
    $('#formSubmit').click(function()
    {
        var form_data = new FormData();
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) 
        {
           form_data.append("files[]", document.getElementById('files').files[index]);
        }


        var productname = $("#productname").val();
       var productprice = $("#productprice").val();
       var productdescription = $("#productdescription").val();
    //    var filename = $("#filename").val();
       $.ajax({
                type:'post', 
                url:'{{ route('images.upload') }}',
                 data: {productname: productname,productprice: productprice,productdescription:productdescription,form_data:form_data},
                 success: function(data)
                 {
                     alert(data);
                }

    });

    });

});


</script> 




<!-- 
<script>  
$(document).ready(function() 
{ 
    $('#image').bind('change', function() 
{ 
    var a=(this.files[0].size); 
    alert(a); 
    if(a > 2000000) 
    { 
        alert('large');
         };
          }); 
          });

$("#fullname").on("blur", function() {
   if ( !$(this).val().match('[a-zA-Z\s]+') ) {
    alert("Please enter characters only.");
   } 
});

$("#contact").on("blur", function() {
   if ( !$(this).val().match('[0-9]{10}') ) {
    alert("Please enter valid contact Number.");
   } 
});


</script> -->

</html>
