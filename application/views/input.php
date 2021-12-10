<?php 
date_default_timezone_set('Asia/Jakarta');
$date = date('d-M-Y h:i:s', time());

    $currentDate = date('ymd');

    $id = "00000012";

     $currentDatee = "TS{$currentDate}{$id}" 

  

 ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Input Form Screening</h1>
           
          </div>

        <div class=" mt-4 mb-4" >
        <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>
        <form  method="POST" action="<?php echo base_url('Process') ?>">
        <div class="form-group row">
            <span class="col-form-label pl-3">1.</span>
            <label for="" class="col-sm-4 col-form-label">Documentary Credit Number/Letter of Credit Number/Request ID</label>
            <div class="input-group col-sm-7">
                <div class="input-group-prepend" style="height: 38px;">
                    <div class="input-group-text">
                        <input onchange="toggleCheckbox(this)" type="checkbox" aria-label="Checkbox for following text input"> <span class="ml-2" style="color: grey;font-size: smaller;font-weight: 400;">auto generate</span>
                    </div>
                </div>
                <input type="text" class="form-control" id="noid" name="REQUEST_ID" placeholder="" >
            </div>
        </div>
        <!-- <?php echo $generate ?> -->
        <div class="form-group row">
            <span class="col-form-label pl-3">2.</span>
            <label for="" class="col-sm-4 col-form-label">Issuing Bank/Presenting Bank</label>
            <div class="col-sm-7">
            <input type="text"  name="ISSUING_BANK" class="form-control" id="" placeholder="">
            </div> 
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">3.</span>
            <label for="" class="col-sm-4 col-form-label">Advising Bank/Nego Bank/Remitting Bank</label>
            <div class="col-sm-7">
            <input type="text" name="ADVISING_BANK" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">4.</span>
            <label for="" class="col-sm-4 col-form-label">Applicant/Drawee/Buyer</label>
            <div class="col-sm-7">
            <input type="text" name="APPLICANT" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">5.</span>
            <label for="" class="col-sm-4 col-form-label">Beneficiary/Drawer/Seller</label>
            <div class="col-sm-7">
            <input type="text" name="BENEFICIARY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">6.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Loading</label>
            <div class="col-sm-7">
            <input type="text" name="PORT_OF_LOADING" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">7.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Discharge</label>
            <div class="col-sm-7">
            <input type="text" name="PORT_OF_DISCHARGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">8.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Taking in Charge</label>
            <div class="col-sm-7">
            <input type="text" name="PLACE_OF_TAKING_IN_CHARGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">9.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Destination</label>
            <div class="col-sm-7">
            <input type="text" name="PLACE_OF_DESTINATION" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">10.</span>
            <label for="" class="col-sm-4 col-form-label">Description of Goods</label>
            <div class="col-sm-7">
            <input type="text" name="DESCRIPTION_OF_GOOODS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">11.</span>
            <div class="col-sm-4 col-form-label">Country of Origin</div>
            <div class="col-sm-7">
            <select name="COUNTRY_OF_ORIGIN" class="form-control" id="exampleFormControlSelect1">
            <option value="">Select Country</option>
            <?php foreach($country as $c) : ?>
                <option value="IBBK<?php echo $c->CODE ?>JA">
                    <?php echo $c->COUNTRY  ?>
                </option>
            <?php endforeach ?> 
            </select>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">12.</span>
            <label for="" class="col-sm-4 col-form-label">Shipper</label>
            <div class="col-sm-7">
            <input name="SHIPPER" type="text" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">13.</span>
            <label for="" class="col-sm-4 col-form-label">Notify Party</label>
            <div class="col-sm-7">
            <input type="text" name="NOTIFY_PARTY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">14.</span>
            <label for="" class="col-sm-4 col-form-label">Consignee</label>
            <div class="col-sm-7">
            <input type="text" name="CONSIGNEE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">15.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - Pre Carriage</label>
            <div class="col-sm-7">
            <input type="text" name="VESSEL_PRE_CARRIAGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">16.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - Main Vessel</label>
            <div class="col-sm-7">
            <input type="text" name="VESSEL_MAIN_VESSEL" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">17.</span>
            <label for="" class="col-sm-4 col-form-label">Carrier</label>
            <div class="col-sm-7">
            <input type="text" name="CARRIER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">18.</span>
            <label for="" class="col-sm-4 col-form-label">Master</label>
            <div class="col-sm-7">
            <input type="text" name="MASTER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">19.</span>
            <label for="" class="col-sm-4 col-form-label">Charterer</label>
            <div class="col-sm-7">
            <input type="text" name="CHARTERER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">20.</span>
            <label for="" class="col-sm-4 col-form-label">Owner</label>
            <div class="col-sm-7">
            <input type="text" name="OWNER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">21.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Carrier/Master/Charterer/Owner</label>
            <div class="col-sm-7">
            <input type="text" name="AGENT_OF_CARRIER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">22.</span>
            <label for="" class="col-sm-4 col-form-label">Delivery Agent in Transport Document</label>
            <div class="col-sm-7">
            <input type="text" name="DELIVERY_AGENT_IN_TRANSPORT_DOC" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">23.</span>
            <label for="" class="col-sm-4 col-form-label">Shipping Company</label>
            <div class="col-sm-7">
            <input type="text" name="SHIPPING_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">24.</span>
            <label for="" class="col-sm-4 col-form-label">Insurance Company</label>
            <div class="col-sm-7">
            <input type="text" name="INSURANCE_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">25.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Insurance Company</label>
            <div class="col-sm-7">
            <input type="text" name="AGENT_OF_INSURANCE_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">26.</span>
            <label for="" class="col-sm-4 col-form-label">Settling Agent of Insurance</label>
            <div class="col-sm-7">
            <input type="text" name="SETTLING_AGENT_OF_INSURANCE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">27.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Cert of Analysis/Certificate of Origin</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_CERT_OF_ANALYSIS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">28.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Packing List</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_PACKING_LIST" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">29.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Health Certificate/Other Certificate</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_HEALTH_CERTIFICATE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">30.</span>
            <label for="" class="col-sm-4 col-form-label">Manufacturer</label>
            <div class="col-sm-7">
            <input type="text" name="MANUFACTURER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">31.</span>
            <label for="" class="col-sm-4 col-form-label">Others</label>
            <div class="col-sm-7">
            <input type="text" name="OTHERS" class="form-control" id="" placeholder="">
            </div>
        </div>
       
       
        <input type="hidden" value="<?php echo (isset($date)) ? $date: ''?>" name="CREATED_TIMESTAMP" class="form-control" id="" placeholder="">
        <input type="hidden" value="" name="USER_ID" class="form-control" id="username" placeholder="">
        
        <div class="form-group row">
            <div class="col text-center">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
        </form>
        </div>
        </div> 
          
        </main>
      </div>
    </div>
