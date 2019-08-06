 		<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <?= $this->session->flashdata('message'); ?>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR ITEM </h3>
				  <div class="box-tools pull-right">
				  	  <?php echo anchor('item/create', '<i class="fa fa-plus-square-o"></i> Tambah', 'class="btn btn-box-tool" data-toggle="tooltip" title="Tambah item"'); ?>
			          <?php anchor('item/add', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download excel"'); ?>
			          <?php anchor('siswa/upl', '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-box-tool" data-toggle="tooltip" title="Download word"'); ?>
		      	  </div>

                </div><!-- /.box-header -->
                <div class='box-body'>
			        <table class="table table-bordered table-striped" id="table">
			            <thead>
			                <tr>
			                    <th width="30px">No</th>
			                    <th>Kode Item</th>
							    <th>Nama</th>
							    <th>Harga Beli</th>
							    <th>Harga Jual</th>
							    <th>Deskripsi</th>
							    <th>Aksi</th>
					        </tr>
					    </thead>
						<tbody>
							<?php $start = 0; foreach ($items as $i): ?>
					        <tr>
							    <td><?= ++$start ?></td>
							    <td><?= $i->kditem ?></td>
							    <td><?= $i->nama ?></td>
							    <td><?= rupiah($i->harga_beli) ?></td>
							    <td><?= rupiah($i->harga_jual) ?></td>
							    <td><?= $i->deskripsi ?></td>
							    <td width="140px">
							    	<div class="btn-group">
									  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Aksi <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="<?= base_url('item/detail/'.$i->kditem) ?>" class="toggle-modal">Detail</a></li>
									    <li><a href="<?= base_url('item/edit/'.$i->kditem) ?>">Edit</a></li>
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