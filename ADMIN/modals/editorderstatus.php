<div class="modal" tabindex="-1" id="editorderstatusModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Status for Order with ID:  0<span id="orderModalIdDisp">00</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form enctype="multipart/form-data" action="functions/logics.php" method="post">
                <div class="form-group">
                    <input type="text" name="orderid" id="orderModalId" placeholder="1" readonly required hidden/>
                    <input type="text" name="orderstatus" id="orderModalStatus" placeholder="1" readonly required hidden/>
                </div>
                <div class="form-group">
                    <span>Meal Ordered</span>
                    <input type="text" class="form-control" name="meal" id="orderModalMeal" placeholder="Meal:" required readonly />
                </div>
                <div class="form-group">
                    <span>Quantity</span>
                    <input type="text" class="form-control" name="quantity" id="orderModalQuantity" placeholder="Quantity:" required readonly />
                </div>
                <div class="form-group">
                    <span>Total Price</span>
                    <input type="text" class="form-control" name="price" id="orderModalTPrice" placeholder="Price:" required readonly/>
                </div>
                <div class="form-group">
                    <span>Data Placed</span>
                    <input type="text" class="form-control" name="dateplaced" id="orderModalDate" placeholder="Date Placed:" required readonly />
                </div>
                <div class="box-footer clearfix" style="text-align:center;">
                    <span>Update Order Status</span>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <button type="submit" name="edit_order_status" class="col-sm-4 btn btn-default" id="confirmOrderbtn" style="font-size:13px; color:white; background-color:green">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        <div class="col-sm-1"></div>
                        <button type="submit" name="edit_order_status" class="col-sm-4 btn btn-default" id="unconfirmOrderbtn" style="font-size:13px; color:white;background-color:red">Unconfirm <i class="fa fa-arrow-circle-right"></i></button>
                    <div>
                    <hr/>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>