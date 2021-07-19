<div class="modal" tabindex="-1" id="getUserDetailsModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" style="float:left">Pickup Information</span>
        <button type="button" style="float:right" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
      </div>
      <div class="modal-body" style="clear:both">
          <form enctype="multipart/form-data" action="functions/logics.php" method="post">
              <div class="form-group">
                  <span>Full Name</span>
                  <input type="text" class="form-control" name="orderid" id="userFullName" placeholder="Full Name" required/>
              </div>
              <div class="form-group">
                  <span>Phone Number</span>
                  <input type="text" class="form-control" name="orderid" id="userContactNumber" placeholder="Contact Number" required/>
              </div>
              <div class="box-footer clearfix">
                  <button type="button" onclick="validateuser()" class="pull-right btn btn-default" id="sendEmail">Complete Order <i class="fa fa-arrow-circle-right"></i></button>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>