		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<?php //foreach($arr as $a) :?>
				<?php //var_dump($a);?>
			<?php //endforeach; die();?>


			<?php foreach($menu as $m) :?>
				<!-- Heading -->
				<div class="sidebar-heading">
					<?= $m['menu']?>
				</div>
				
				<?php foreach($subMenu as $subMenuIteration1) : ?>
					<?php foreach($subMenuIteration1 as $sm) : ?>				
						<!-- Nav Item - Dashboard -->
						<?php if($m['id'] == $sm['menu_id']) : ?>
							<li class="nav-item <?=($title == $sm['title']) ? 'active' : '' ?>">
								<a class="nav-link pb-0" href="<?= base_url($sm['url'])?>">
									<i class="<?=$sm['icon']?>"></i>
									<span><?=$sm['title']?></span>
								</a>
							</li>
						<?php endif ?>
					<?php endforeach ?>	
				<?php endforeach ?>
				
				<hr class="sidebar-divider mt-3">

			<?php endforeach ?>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->