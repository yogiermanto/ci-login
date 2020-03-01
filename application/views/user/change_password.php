	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

		<div class="row">
			<div class="col-lg-6">
				<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show animation-fade" role="alert">
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
					<div class="card-header py-3"></div>
					<div class="card-body">
						<form action="<?=base_url('user/change_password')?>" method="POST">
							<div class="form-group">
								<label for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?=form_error('current_password', '<small class="text-danger">', '</small>')?>
							</div>
							<div class="form-group">
								<label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                <?=form_error('new_password', '<small class="text-danger">', '</small>')?>
							</div>
							<div class="form-group">
                                <label for="new_password2">Repeat Password</label>
								<input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?=form_error('new_password2', '<small class="text-danger">', '</small>')?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
