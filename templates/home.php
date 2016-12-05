<?php
  require "base.php";
?>

  <div class="container">
    <div class="row">
            <div class="col-lg-4">
              <div class="">
                  <div class="panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-warning" href="#"><span class="glyphicon glyphicon-search"></span> Search</i></Button>
                        </span>
                    </div><!-- /input-group -->
                  </div>
              </div>
            </div><!-- /.col-lg-6 -->
              <div class="col-md-4">
                      <div class="panel-body">
                          <select id="select_options" class="form-control" >
                              <option value="">Select Type</option>
                              <option value="clothes">Clothes</option>
                              <option value="computer">Computers</option>
                              <option value="phones">Cell Phones</option>
                              <option value="nouns">Nouns</option>
                              <option value="names">Names</option>
                          </select>
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="panel-body">
                          <select id="select_options" class="form-control" >
                              <option value="">Select Avalibility</option>
                              <option value="all">All</option>
                              <option value="avalible">Avalible</option>
                              <option value="unavalible">Unavalible</option>
                          </select>
                      </div>
              </div>
      </div>

      <!-- Project One -->
        <div class="row">
                <div class="col-md-6 panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                </div>
                    <div class="col-md-5 panel-body">
                        <h4>Product name</h4>
                        <p>Price</p>
                        <p>Type</p>
                        <button type="button" class="btn btn-warning" href="#"><span class="glyphicon glyphicon-eye-open"></span> View Product</i></Button>
                    </div>
          </div>
      <!-- /.row -->

    </div>
</body>
    <!-- /.container -->
</html>