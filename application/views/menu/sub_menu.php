	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg">

				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
				<?php if ($this->form_validation->error_array()) :  ?>
					<?php foreach ($this->form_validation->error_array() as $value => $key) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?=$key?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endforeach ?>
				<?php endif ?>
  

				<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?=$this->session->flashdata('success')?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>

				<?php if($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?=$this->session->flashdata('error')?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>

				<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubmenuModal">Add New
					Submenu</a>


				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Table Menu Management</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Title</th>
											<th scope="col">Menu</th>
											<th scope="col">Url</th>
											<th scope="col">Icon</th>
											<th scope="col">Active</th>
											<th scope="col">Sequence</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($list_sub_menu as $lsm) : ?>
										<tr>
											<th scope="row"><?=$no++?></th>
											<td><?=$lsm['title']?></td>
											<td><?=$lsm['menu']?></td>
											<td><?=$lsm['url']?></td>
											<td><?=$lsm['icon']?></td>
											<td><?=$lsm['is_active']?></td>
											<td><?=$lsm['sequence']?></td>
											<td>
												<a href="" class="badge badge-warning">Edit</a>
												<a href="" class="badge badge-danger">Delete</a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Modal -->
	<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newSubmenuModalLabel">Add New Submenu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?=base_url('menu/sub_menu')?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="title">Submenu Title</label>
							<input type="text" class="form-control" id="title" name="title">
						</div>
						<div class="form-group">
							<label for="menu_id">Select Menu</label>
							<select class="form-control" id="menu_id" name="menu_id">
								<option>Choose...</option>
								<?php foreach($select_menu as $sm) : ?>
									<option value="<?= $sm['id']?>"><?= $sm['menu']?></option>
									<?php endforeach ?>
								</select>
							</div>
						<div class="form-group">
							<label for="url">Submenu Url</label>
							<input type="text" class="form-control" id="url" name="url" >
						</div>
						<div class="form-group">
							<label for="url">Submenu Icon</label>
							<input type="text" class="form-control" id="icon" name="icon">
						</div>
						<div class="form-group">
							<label for="sequence">Sequence</label>
							<input type="text" class="form-control" id="sequence" name="sequence">
						</div>
						<label for="url">Status</label>
						<br>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadio1" name="is_active" class="custom-control-input" value="1" checked>
							<label class="custom-control-label" for="customRadio1">Active</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadio2" name="is_active" class="custom-control-input" value="0" >
							<label class="custom-control-label" for="customRadio2">No Active</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
