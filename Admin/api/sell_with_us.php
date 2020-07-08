<?php
    include '../config.php';
    //ob_start(); 
    $db->where("id",$_POST['id']);
    $data = $db->get("skyevo_sell_with_us");
    foreach($data as $val){
  ?>
<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" onclick="closeModal()" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title text-center"><?= $val['comp_name'] ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-bordered">
                                <tr><td><b>Company/Firm name</b></td><td><?= $val['comp_name'] ?></td></tr>
                                <tr><td><b>Year of Establishment</b></td><td><?= $val['year_estab'] ?></td></tr>
                                <tr><td><b>Industry Type</b></td><td><?= $val['industry_type'] ?></td></tr>
                                <tr><td><b>PAN Number</b></td><td><?= $val['pan_number'] ?></td></tr>
                                <tr><td><b>Shop/Registration No</b></td><td><?= $val['shop_number'] ?></td></tr>
                                <tr><td><b>Representative name</b></td><td><?= $val['representative_name'] ?></td></tr>
                                <tr><td><b>Designation </b></td><td><?= $val['designation_name'] ?></td></tr>
                                <tr><td><b>Product Details</b></td><td><?= $val['product_details'] ?></td></tr>
                                <tr><td><b>Contact Number 1 (Shop/Office)</b></td><td><?= $val['contact_num1'] ?></td></tr>
                                <tr><td><b>Contact Number 2 (Shop/Office)</b></td><td><?= $val['contact_num2'] ?></td></tr>
                            </table>
                        </div>
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-bordered">
                                
                                <tr><td><b>Contact Number 1 (Representative)</b></td><td><?= $val['contact_repres1'] ?></td></tr>
                                <tr><td><b>Contact Number 2 (Representative)</b></td><td><?= $val['contact_repres2'] ?></td></tr>
                                <tr><td><b>Email Id</b></td><td><?= $val['email_id'] ?></td></tr>
                                <tr><td><b>Address </b></td><td><?= $val['address'] ?></td></tr>
                                <tr><td><b>City </b></td><td><?= $val['city'] ?></td></tr>
                                <tr><td><b>District </b></td><td><?= $val['district'] ?></td></tr>
                                <tr><td><b>State  </b></td><td><?= $val['state'] ?></td></tr>
                                <tr><td><b>Pin code </b></td><td><?= $val['pin_code'] ?></td></tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <h4><b>Documents</b></h4>
                            <table class="table table-bordered">
                                <tr><td><b>Pan Card (Company/Firm)</b></td><td><a href="../seller_document/<?=$val['pan_card']?>" target="_blank"><?= $val['pan_card'] ?></a></td></tr>
                                <tr><td><b>Pan Card (Vendor) </b></td><td><a href="../seller_document/<?=$val['pan_card_vendor']?>" target="_blank"><?= $val['pan_card_vendor'] ?></a></td></tr>
                                <tr><td><b>Passbook/E-Statement (Company/Firm Account)</b></td><td><a href="../seller_document/<?=$val['passbook_statement']?>" target="_blank"><?= $val['passbook_statement'] ?></a></td></tr>
                                <tr><td><b>Address Proof </b></td><td><a href="../seller_document/<?=$val['address_proof']?>" target="_blank"><?= $val['address_proof'] ?></a></td></tr>
                                <tr><td><b>Photo (Vendor) </b></td><td><a href="../seller_document/<?=$val['photo_vendor']?>" target="_blank"><?= $val['photo_vendor'] ?></a></td></tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" onclick="closeModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>
   function closeModal(){
       jQuery('#myModal').modal('hide');
            setTimeout(function(){
            jQuery('#myModal').remove();
            jQuery('modal-backdrop').remove();
            },500);
  } 
</script>
<?php //echo ob_get_clean();  ?>