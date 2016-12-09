<?php
  include "base.php";
  include "../lib.php";
?>


  <div class="container">
    <button type="button" class="btn btn-warning" href="#"><span class="glyphicon glyphicon-edit"></span> Edit Contact Info</button>
    <button type="button" class="btn btn-warning" href="#"><span class="glyphicon glyphicon-tasks"></span> View My Stats</button>
    <hr>
    <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <select id="select_options" class="form-control" >
                              <option value="">Select Avalibility</option>
                              <option value="all">All Items</option>
                              <option value="avalible">Avalible</option>
                              <option value="unavalible">Unavalible</option>
                          </select>
                      </div>
                  </div>
              </div>
    </div>
      <!-- Project One -->
        <div class="row">
                <!-- <div class="col-md-6 panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                </div> -->

                <!-- <div class="col-md-5 panel-body">
                      <h4>Product name</h4>
                      <p>Price</p>
                      <p>Type</p>
                      <p>Quantity</p>
                      <button type="button" class="btn btn-primary btn-primary" href="#"><span class="glyphicon glyphicon-edit"></span> Edit Item</i></Button>
                      <button type="button" class="btn btn-primary btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span> Delete Item</i></Button>
                </div> -->
                <div id="row2_sec"></div>
        </div>
      <!-- /.row -->



  </div>
  <!-- /.container -->
