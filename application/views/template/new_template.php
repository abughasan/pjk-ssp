
	<!-- starting new template satu kolom
		available for 
			desktop medium width >= 992px
			desktop / tablet small width >= 768px
	-->
	
	
<!-- BEGIN PAGE -->
<div class="page-content">			
	<!-- BEGIN PAGE HEADER-->
	<div class="row">
		<div class="col-md-12">	

	<?php if (! empty($interface)): ?>
	<?php foreach($interface as $isi): ?>
		<?php $this->load->view("interface/konten_".$isi); ?>
	<?php endforeach; ?>
	<?php endif; ?>
	
			
	
		</div>
	</div>
	<!-- END PAGE CONTENT--> 
</div>
<!-- END PAGE -->