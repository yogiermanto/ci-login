				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
					<div class="row">
						<div class="col-lg-6">
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
						</div>
					</div>
					<div class="card mb-3" style="max-width: 540px;">
						<div class="row no-gutters">
							<div class="col-md-4">
								<img src="<?= base_url('assets/img/profile/').$user['image']?>" class="card-img" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><?=$user['name']?></h5>
									<p class="card-text"><?=$user['email']?></p>
									<p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']);?></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->