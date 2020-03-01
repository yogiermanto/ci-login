	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">

				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
				<?php //var_dump(form_error()); die();?>
				<?=form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

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
				<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>


				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Table Role Management</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Menu</th>
											<th scope="col">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($role as $r) : ?>
										<tr>
											<th scope="row"><?=$no++?></th>
											<td><?=$r['role']?></td>
											<td>
												<a href="<?=base_url('admin/role_access/').$r['id'];?>" class="badge badge-success">Access</a>
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
	<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?=base_url('admin/role')?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
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
