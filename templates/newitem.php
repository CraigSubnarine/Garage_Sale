<?php
  include "base.php";
  include "../lib.php";

  if (isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    //$type = $_POST['type'];
    $type='N/A';
    $price = $_POST['price'];
    $uid=$_SESSION['id'];
    $res = saveItem($name, $uid, $price, $type, $description, $quantity);
  }

?>
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form action="../index.php/additem" method="POST">
     <div class="form-group ">
      <label class="control-label requiredField" for="name">
       Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="name" name="name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="select">
       Select a Type
       <span class="asteriskField">
        *
       </span>
      </label>
      <select class="select form-control" id="type" name="type">
        <option value="Other">
        Other
       </option>
       <option value="Clothing">
        Clothing
       </option>
       <option value="Electronic">
        Electronic
       </option>
       <option value="Footwear">
        Footwear
       </option>
      </select>
     </div>
     <div class="form-group ">
      <label class="control-label " for="description">
       Description
      </label>
      <textarea class="form-control" cols="40" id="description" name="description" rows="10"></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="quantity">
       Quantity
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="quantity" name="quantity" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="price">
       Price
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="price" name="price" type="text"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-warning " name="submit" type="submit">
        <span class="glyphicon glyphicon glyphicon-floppy-disk"></span>
        Submit
       </button>
       <a href="../templates/home.php">
        <button class="btn btn-danger " name="cancel_submit" type="submit">
        <span class="glyphicon glyphicon glyphicon-floppy-remove"></span> Cancel
       </button>
      </a>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
