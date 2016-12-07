<?php
  require __DIR__ . "\base.php";
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

        <!-- <div class="row"> -->
            <div id="row_sec"></div>
        <!-- </div> -->



    </div>
</body>
    <!-- /.container -->
</html>
