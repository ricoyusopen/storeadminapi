      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open('member/edit');?>
          <?php echo form_hidden('member_id',$member[0]->member_id);?>

          <table width="100%">
              <tr><td>Nama</td><td><?php echo form_input('full_name',$member[0]->full_name);?></td></tr>
              <tr><td>Email</td><td><?php echo form_input('email',$member[0]->email);?></td></tr>
              <tr><td>Phone</td><td><?php echo form_input('phone',$member[0]->phone);?></td></tr>
              <tr><td colspan="2">
                  <?php echo form_submit('submit','Simpan');?>
                  <?php echo anchor('member','Back');?></td></tr>
          </table>
          <?php
          echo form_close();
          ?>
        </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
