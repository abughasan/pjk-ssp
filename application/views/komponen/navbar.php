<?php 
	$status = $this->session->userdata('stts');
	if($status == 'operator')
	{
?>	
	<nav class="navbar navbar-inverse navbar1" role="navigation">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="<?=base_url()?>">APLIKASI SSP</a>	  
		</div>		
		
		<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">		
			<ul class="nav navbar-nav">				
				
			<!-- /.navigasi untuk operator masih kosong -->				
				
			</ul>				
			<ul class="nav navbar-nav">        		
			  <a class="btn btn-danger navbar-btn" href="<?=base_url()?>app/logout"><?=showicon('off')?> Logout</a>		
			</ul>	
		</div><!-- /.navbar-collapse -->
		
	  </div><!-- /.container-fluid -->
	</nav>
<?php 
	}
	else
	{
?>	
		<nav class="navbar navbar-inverse navbar1" role="navigation">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?=base_url()?>"><span class="nav_brand">DKPP -</span> APLIKASI SSP</a>	  
			</div>
			
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">		
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url(); ?>dashboard"><i class="icon-fire"></i> Beranda</a></li>		
			</ul>
			
			<ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire"></i> Master <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>jenis_pajak">Master Jenis Pajak</a></li>
					<li><a href="<?php echo base_url(); ?>pejabat">Master Pengguna Anggaran</a></li>			
					<li><a href="<?php echo base_url(); ?>pp">Master Pemungut Pajak</a></li>							            			
					<li><a href="<?php echo base_url(); ?>login">Master User</a></li>							            			
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire"></i> Perangkat <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>backup">Backup Data</a></li>					
					<li><a href="<?php echo base_url(); ?>pengajuan">Informasi</a></li>					
					<li class="divider"></li>
					<li><a href="<?php echo base_url(); ?>transaksi">Setelan Aplikasi</a></li>						
				  </ul>
				</li>				
			</ul>
			
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url(); ?>ssp_auto"><i class="icon-plus-sign"></i> Input Baru</a></li>		
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire"></i> Laporan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>laporan/pertanggal">Laporan Menyusul</a></li>						
					</ul>
				</li>					
			</ul>
			
			<ul class="nav navbar-nav">        
				<li class="dropdown">
					<a style="text-transform:capitalize; color:#BE72C0;" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Halo, <?php echo $this->session->userdata('nama_pengguna'); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>profile"><i class="icon-user"></i> Profil saya</a></li>
						<li><a href="<?php echo base_url(); ?>profile/chpasswd"><i class="icon-user"></i> Ubah Password</a></li>												
						<li class="divider"></li>						
						<li><a onclick="requestFullScreen()"><i class="icon-move"></i> Layar Penuh</a></li>						
						<li><a style="color:red;" href="<?=base_url()?>app/logout"><?=showicon('off')?> Logout</a></li>						
					</ul>
				</li>		
			 </ul>
			 
			<!--<ul class="nav navbar-nav">        		
			  <a class="btn btn-danger navbar-btn" href="<?=base_url()?>app/logout"><?=showicon('off')?> Logout</a>		
			</ul>-->	
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

<?php
	}	
?>	
