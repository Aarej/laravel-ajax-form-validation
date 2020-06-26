  <form method="post" enctype="multipart/form-data" id="submit-Form" method="POST">
      @csrf
      <input type="hidden" id="submit-route" value="{{ route('adduser') }}">
      <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
                  <div class="box-body">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Fist Name</label>
                              <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Enter first name">
                              <span class="text-danger" id="f_name-err"></span>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Last Name.</label>
                              <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Enter last name">
                              <span class="text-danger" id="l_name-err"></span>
                          </div>
                      </div>
                  </div>
              </div>    
          </div>        
          <div class="col-md-12">
              <div class="box-body"> 
                  <div class="form-group text-right">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                  </div> 
              </div>      
          </div>
      </div>    
  </form>
