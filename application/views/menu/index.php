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
				<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>


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
											<th scope="col">Menu</th>
											<th scope="col">Sequence</th>
											<th scope="col">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($list_menu as $lm) : ?>
										<tr>
											<th scope="row"><?=$no++?></th>
											<td><?=$lm['menu']?></td>
											<td><?=$lm['sequence']?></td>
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
	<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?=base_url('menu')?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="sequence" name="sequence" placeholder="Sequence">
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
