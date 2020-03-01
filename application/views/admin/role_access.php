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
                
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Role Access : <?=$role[0]['role'];?></h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Menu</th>
											<th scope="col">Access</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($list_menu as $lm) : ?>
										<tr>
											<th scope="row"><?=$no++?></th>
											<td><?=$lm['menu']?></td>
											<td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" <?=check_access($role[0]['id'], $lm['id'])?> data-role="<?=$role[0]['id']?>" data-menu="<?=$lm['id']?>">
                                            </div>
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
