 		<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <?= $this->session->flashdata('message'); ?>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR CUSTOMER </h3>
				  <div class="box-tools pull-right">
				  	  <?php echo anchor('customer/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah item"'); ?>
		      	  </div>

                </div><!-- /.box-header -->
                <div class='box-body'>
			        <table class="table table-bordered table-striped" id="table">
			            <thead>
			                <tr>
			                    <th width="30px">No</th>
							    <th>Nama</th>
							    <th>Perusahaan</th>
							    <th>Nama Kontak</th>
							    <th>Email</th>
							    <th>Telp</th>
							    <th>Aksi</th>
					        </tr>
					    </thead>
						<tbody>
							<?php $start = 0; foreach($customers as $c): ?>
							<tr>
								<td><?= ++$start ?></td>
								<td><?= $c->display_name ?></td>
								<td><?= $c->company_name ?></td>
								<td><?= $c->salutation. ' '.$c->first_name.' '.$c->last_name ?></td>
								<td><?= $c->email ?></td>
								<td><?= $c->phone ?></td>
								<td width="140px">
							    	<div class="btn-group">
									  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Aksi <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="<?= base_url('customer/detail/'.$c->id) ?>" >Detail</a></li>
									    <li><a href="<?= base_url('customer/edit/'.$c->id) ?>">Edit</a></li>
									  </ul>
									</div>
							    </td>
							</tr>
							<?php endforeach; ?>
			            </tbody>
			        </table>
			        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
			        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
			        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
			        <script>
			        	$(document).ready(function () {
							$("#table").dataTable();
						});
			        </script>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->