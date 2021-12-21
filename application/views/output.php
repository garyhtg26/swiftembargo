<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Output</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="fa fa-print mr-1"></i>Print</button>
              </div> 
            </div>
          </div>

        <div id="section-to-print" class="hasil">

        <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
        <?php if ($post->STATUS ==="GO") { ?>
            <h1 class="display-4" style="color: green; font-weight: 500;">GO</h1>
                <p class="lead">The transaction is clear, please continue</p>
        <?php   } else { ?>
            <h1 class="display-4" style="color: red; font-weight: 500;">HOLD</h1>  
                <p class="lead">For details screening information please <a href="http://10.230.83.97:8080/sironembargo">click here</a></p>
        <?php    }
        ?>
        </div>
        </div>
        
         <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" style="height:100%;"><?php echo $this->session->userdata('sesuatu')?> </textarea>   -->
         <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" style="height:100%;"><?php echo $this->session->userdata('final')?> </textarea>   -->
         


        <form class="mt-4 mb-4">
        <div class="form-group row">
            <span class="col-form-label pl-3">1.</span>
            <label for="" class="col-sm-4 col-form-label">Documentary Credit Number/Letter of Credit Number/Request ID</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->REQUEST_ID?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">2.</span>
            <label for="" class="col-sm-4 col-form-label">Issuing Bank/Presenting Bank</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->ISSUING_BANK ?></label>
                <?php if($post->ISSUING_BANK_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">3.</span>
            <label for="" class="col-sm-4 col-form-label">Advising Bank/Nego Bank/Remitting Bank</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->ADVISING_BANK ?></label>
                <?php if($post->ADVISING_BANK_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">4.</span>
            <label for="" class="col-sm-4 col-form-label">Applicant/Drawee/Buyer</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->APPLICANT ?></label>
                <?php if($post->APPLICANT_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">5.</span>
            <label for="" class="col-sm-4 col-form-label">Beneficiary/Drawer/Seller</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->BENEFICIARY ?></label>
                <?php if($post->BENEFICIARY_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">6.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Loading</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->PORT_OF_LOADING ?></label>
                <?php if($post->PORT_OF_LOADING_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">7.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Discharge</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->PORT_OF_DISCHARGE ?></label>
                <?php if($post->PORT_OF_DISCHARGE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">8.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Taking in charge</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->PLACE_OF_TAKING_IN_CHARGE ?></label>
                <?php if($post->PLACE_OF_TAKING_IN_CHARGE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">9.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Destination</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->PLACE_OF_DESTINATION ?></label>
                <?php if($post->PLACE_OF_DESTINATION_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">10.</span>
            <label for="" class="col-sm-4 col-form-label">Description of gooods</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->DESCRIPTION_OF_GOOODS ?></label>
                <?php if($post->DESCRIPTION_OF_GOOODS_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">11.</span>
            <div class="col-sm-4 col-form-label">Country of origin</div>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $country->COUNTRY ?></label>
                <?php if($post->COUNTRY_OF_ORIGIN_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">12.</span>
            <label for="" class="col-sm-4 col-form-label">Shipper</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->SHIPPER ?></label>
                <?php if($post->SHIPPER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">13.</span>
            <label for="" class="col-sm-4 col-form-label">Notify Party</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->NOTIFY_PARTY ?></label>
                <?php if($post->NOTIFY_PARTY_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">14.</span>
            <label for="" class="col-sm-4 col-form-label">Consignee</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->CONSIGNEE ?></label>
                <?php if($post->CONSIGNEE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">15.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - pre carriage</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->VESSEL_PRE_CARRIAGE ?></label>
                <?php if($post->VESSEL_PRE_CARRIAGE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">16.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - main vessel</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->VESSEL_MAIN_VESSEL ?></label>
                <?php if($post->VESSEL_MAIN_VESSEL_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">17.</span>
            <label for="" class="col-sm-4 col-form-label">Carrier</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->CARRIER ?></label>
                <?php if($post->CARRIER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">18.</span>
            <label for="" class="col-sm-4 col-form-label">Master</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->MASTER ?></label>
                <?php if($post->MASTER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">19.</span>
            <label for="" class="col-sm-4 col-form-label">Charterer</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->CHARTERER ?></label>
                <?php if($post->CHARTERER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">20.</span>
            <label for="" class="col-sm-4 col-form-label">Owner</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->OWNER ?></label>
                <?php if($post->OWNER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">21.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Carrier/Master/Charterer/Owner</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->AGENT_OF_CARRIER ?></label>
                <?php if($post->AGENT_OF_CARRIER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">22.</span>
            <label for="" class="col-sm-4 col-form-label">Delivery agent in transport document</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->DELIVERY_AGENT_IN_TRANSPORT_DOC ?></label>
                <?php if($post->DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">23.</span>
            <label for="" class="col-sm-4 col-form-label">Shipping Company</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->SHIPPING_COMPANY ?></label>
                <?php if($post->SHIPPING_COMPANY_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">24.</span>
            <label for="" class="col-sm-4 col-form-label">Insurance Company</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->INSURANCE_COMPANY ?></label>
                <?php if($post->INSURANCE_COMPANY_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">25.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Insurance Company</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->AGENT_OF_INSURANCE_COMPANY ?></label>
                <?php if($post->AGENT_OF_INSURANCE_COMPANY_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">26.</span>
            <label for="" class="col-sm-4 col-form-label">Settling Agent of Insurance</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->SETTLING_AGENT_OF_INSURANCE ?></label>
                <?php if($post->SETTLING_AGENT_OF_INSURANCE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">27.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Cert of Analysis/Certificate of Origin</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->ISSUER_OF_CERT_OF_ANALYSIS ?></label>
                <?php if($post->ISSUER_OF_CERT_OF_ANALYSIS_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">28.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Packing List</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->ISSUER_OF_PACKING_LIST ?></label>
                <?php if($post->ISSUER_OF_PACKING_LIST_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">29.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Health Certificate/Other Certificate</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->ISSUER_OF_HEALTH_CERTIFICATE ?></label>
                <?php if($post->ISSUER_OF_HEALTH_CERTIFICATE_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">30.</span>
            <label for="" class="col-sm-4 col-form-label">Manufacturer</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->MANUFACTURER ?></label>
                <?php if($post->MANUFACTURER_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">31.</span>
            <label for="" class="col-sm-4 col-form-label">Others</label>
            <div class="col-sm-7 col-form-label">
                <label>: <?php echo $post->OTHERS ?></label>
                <?php if($post->OTHERS_HIT == 'Y') : ?>
                <i style="color:red;" class="ml-2 fas fa-exclamation-circle"></i>
                <?php endif; ?>
            </div>
        </div>
	    </form>
            
        </div> 
          
        </main>
      </div>
    </div>
