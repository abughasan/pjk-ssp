<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			<?=$judul?>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<i class="icon-home"></i>
				<?=anchor('', 'Home');?>
				<i class="icon-angle-right"></i>
			</li>
			<li>
				<?=$judul?>
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class='col-md-12'>
		<div class='portlet box green'>
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-file"></i> Form Input SSP
				</div>
			</div>
			<div class='portlet-body form'>
				<div class="alert alert-danger" id='error' style='display: none;'>
					<strong>Warning!</strong>
					<ul id='error_text'></ul>
				</div>
				<div class="alert alert-success" id='success' style='display: none;'>
					<strong>Success!</strong>
					<p>Data Anda sudah diperbarui.</p>
				</div>
							
<?php $form_attributes = array ('id' => 'frmUpdate', 'name' => 'frmUpdate', 'role' => "form", 'class' => 'form-horizontal'); ?>
<div class="form-body">
				
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo form_open('ssp_post', $attributes); ?>
	
	<div class="form-group">
		<label  class="col-md-3 control-label" for='pemungut'>Pemungut Pajak <span class="required">*</span></label>
		<div class="col-md-4">
			<select name="pemungut" id="pemungut" class="form-control" required>
				<option value="">--------</option>
				<?php foreach($pemungut as $row): ?>
				<option value="<?=$row->ppid?>"><?=$row->nama?> (<?=$row->npwp?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
    </div>
	
	<div class="form-group">
		<label  class="col-md-3 control-label" for='alamat'>Nilai Belanja <span class="required">*</span></label>
		<div class="col-md-9">
			<input class="form-control" id="nilaitransaksi" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" />
			<?php echo form_error('nilai'); ?>
		</div>
    </div>
	
	<div class="form-group">
		<label  class="col-md-3 control-label" for='alamat'>Jenis Belanja <span class="required">*</span></label>
		<div class="col-md-4">
			<select name="belanja" id="belanja" class="form-control">
				<option>-pilih jenis belanja-</option>
				<?php foreach($belanja as $row): ?>
				<option value="<?=$row->belanjaid?>"><?=$row->belanja?></option>
				<?php endforeach; ?>
			</select>
		</div>
    </div>

	<div class="form-group">
		<label  class="col-md-3 control-label" for='bulan'>Bulan <span class="required">*</span></label>
		<div class="col-md-2">
			<input class="form-control" id="bulan" type="text" name="bulan" maxlength="4" value="<?php echo set_value('bulan'); ?>" data-provide="datepicker" data-date-autoclose="true" data-date="date(yyyy-mm-dd)" data-date-format="mm" data-date-min-view-mode="months" />
			<?php echo form_error('tahun'); ?>
		</div>
		<label  class="col-md-1 control-label" for='tahun'>Tahun <span class="required">*</span></label>
		<div class="col-md-2">
			<input class="form-control" id="tahun" type="text" name="tahun" maxlength="4" value="<?php echo set_value('tahun'); ?>" data-provide="datepicker" data-date-autoclose="true" data-date="date(yyyy-mm-dd)" data-date-format="yyyy" data-date-min-view-mode="years" />
			<?php echo form_error('tahun'); ?>
		</div>
    </div>

	<div class="form-group">
		<label  class="col-md-3 control-label" for='uraian'>Tambahan uraian <span class="required"></span></label>
		<div class="col-md-9">
			<input class="form-control" id="uraian" type="text" name="uraian" value="<?php echo set_value('uraian'); ?>"  />
			<?php echo form_error('uraian'); ?>
		</div>
    </div>
	
    <div class="form-group">
	<label  class="col-md-3 control-label" for='kenapajak'>Kena Pajak <span class="required"></span></label>
		<div class="col-md-9">
			<div class='controls' id="keterangan_pajak"></div>
		</div>	
    </div>
	
    </fieldset>

</div>
								
			<div class="form-actions fluid">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn btn-success">Input Data</button>
					<?=anchor('', 'Kembali', array('class' => 'btn default'));?>
					<span id='loading' style='display: none;'>Memproses data, mohon tunggu...</span>
				</div>
			</div>
		<?=form_close();?>
		
	</div>
</div>
				
		<!-- END PAGE -->

	<script>
		$('#belanja').change(function(){
			var belanjaid = $('#belanja option:selected').val();
			var nilai = $('#nilaitransaksi').val();
			var npwp = $('#pemungut').val();
			// alert(belanjaid);
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_auto/cekpajak",
				data: { belanjaid: belanjaid, nilai: nilai, npwp: npwp }
				})
				.done(function( msg ) {
					$('#keterangan_pajak').html(msg);
				});
		});
	</script>