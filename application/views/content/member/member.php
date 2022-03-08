<div class="col-desk-9 col-sm-9">

        <div id="data-member" class="row" style="padding:30px;">
            <table class="display" id="member" width="100%" style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="30%"></th>
                        <!-- <th width="15%">Email</th>
                        <th width="15%">Kontak</th>
                        <th width="15%">Tgl Daftar</th> -->
                        <th width="65%">View</th>
                    </tr>
                </thead>
                <tbody>
                  <?php

                  $x=0;
                  foreach ($member as $mem) {
                  $x++;
                  ?>
                  <tr>
                    <td><?= $x ?></td>
                    <td><?= $mem->full_name ?></td>
                    <td>
                      <img onclick="get_member_by_id(<?= $mem->member_id ?>)" src="<?= base_url() ?>assets/icons/view.png" width="10%" alt="" style="cursor:pointer;">
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- VIEW MEMBER -->
        <div id="view-member" class="row" style="padding:30px;display:none;">
          <div class="title"> </div>
          <a href="<?= base_url() ?>member">Back</a>
          <table >
              <tr>
                <td colspan="2">
                  <img id="img" src="" alt="" width="30%">
                </td>
              </tr>
              <tr>
                <td >
                  Nama Member
                </td>
                <td>
                  <span id="full_name"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Email
                </td>
                <td>
                  <span id="email"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Kontak
                </td>
                <td>
                  <span id="kontak"></span>
                </td>
              </tr>
              <tr>
                <td >
                  Tanggal Daftar
                </td>
                <td>
                  <span id="join_date"></span>
                </td>
              </tr>
          </table>

        </div>
        <!-- END OF EDIT MEMBER -->



      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/jquery.dataTables.js'?>"></script>
