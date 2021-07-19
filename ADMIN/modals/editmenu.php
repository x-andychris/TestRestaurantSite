<div class="modal-warning modal fade" id="editmenuModal" role="dialog">
    <div class="modal-dialog" style="background-color:white">
        <div class="modal-content">
            <div class="modal-header">
                <tr>
                    <td>
                        <span class="modal-title" id = "menuModalTitle" style="text-align: center; font-weight: bold; font-size:20px">Breakfast</span>
                    </td>
                    <td>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span></button>
                    </td>
                </tr>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="functions/logics.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="menuModalId" placeholder="1" readonly required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="meal" id="menuModalMeal" placeholder="Meal:" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="menuModalPrice" placeholder="Price:" required />
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="photo"  id="menuModalPhoto" accept="image/png, .jpeg, .jpg, image/gif" />
                        <!-- used an extra input since file inputs does not support value change -->
                        <input type="input" name="photo2"  id="menuModalPhoto2" readonly hidden/>
                    </div>
                    <div>
                        <textarea placeholder="Description" id="menuModalDescription" style="width: 100%; height: 125px; resize:none; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; color:black" name="description" required></textarea>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" name="edit_menu" class="pull-right btn btn-default" id="sendEmail">Update <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="modal_footer">
                <!-- <button type="button" class="btn btn-outline crunch-no crunch-bnt crunch-primary" data-dismiss="modal">Close</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>