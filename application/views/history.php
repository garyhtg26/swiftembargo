

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">History Trade Screening</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary"><i class="fa fa-print mr-1"></i>Print</button>
              </div>
            </div>
          </div>


          <div id="section-to-print" class="table-responsive mb-4">
          <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th class="th-sm">ID

                </th>
                <th class="th-sm">Result

                </th>
                <th class="th-sm">Username

                </th>
                <th class="th-sm">Created Date

                </th>
                <th class="th-sm">Action

                </th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post) : ?>
              <tr>
                <td><?php echo $post->REQUEST_ID ?></td>
                <td><?php echo $post->STATUS ?></td>
                <td><?php echo $post->USER_ID ?></td>
                <td><?php
                        $timestamp = strtotime(substr($post->CREATED_TIMESTAMP,0,9));
                        $new_date = date("d M Y", $timestamp);
                        echo $new_date;
                   
                    ?>
                 </td>
                <td><button onclick="window.location='<?php echo base_url('output/'.$post->REQUEST_ID) ?>'" type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> Detail</button></td>
              </tr>
              <?php endforeach ?>

            </tbody>
           
          </table>
          </div>
          
      
        </main>
      </div>
    </div>
