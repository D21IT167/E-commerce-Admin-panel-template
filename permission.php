<?php
include "header.php";
?>


<div class="content mt-4">
    <div class="container">
        <div class="page-title">
            <h3>User Permissions</h3>
        </div>
        
        <div class="container mt-4">
          <div class="row">
            <div class="col-12">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Role</th>
                    <th scope="col">dashboard</th>
                    <th scope="col">orders</th>
                    <th scope="col">sales</th>
                    <th scope="col">products</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Administrator</td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1" >
                          <label class="custom-control-label" for="customCheck1"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1" >
                          <label class="custom-control-label" for="customCheck1"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Manager</td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                          <label class="custom-control-label" for="customCheck2"></label>
                      </div>
                    </td>
                    
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        
            <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
                <a href="role.php" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include "footer.php";
?>