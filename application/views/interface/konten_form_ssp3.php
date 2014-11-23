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
<div class="form-body" id="forminputssp">
				
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo form_open('ssp_auto/post', $attributes); ?>
	
	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='pemungut'>Pemungut Pajak <span class="required">*</span></label>
		<div class="col-md-4">
			<select name="pemungut" id="pemungut" class="form-control" required>
				<?php foreach($pemungut as $row): ?>
				<option value="<?=$row->ppid?>"><?=$row->nama?> (<?=$row->npwp?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
    </div>
	
	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='password'>NPWP Wajib Pajak <span class="required">*</span></label>
		<div class="col-md-4">
			<input class="form-control" id="npwp" type="text" name="npwp" maxlength="20" value="<?php echo set_value('npwp');echo $this->session->userdata('npwp_pilihan'); ?>" required /> 
			<?php echo form_error('npwp'); ?>
		</div>
		<a href="<?=base_url()?>index.php/ssp_post/browse_npwp" onclick="javascript:void window.open('<?=base_url()?>index.php/ssp_post/browse_npwp','1415958925631','width=500,height=500,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;" class="btn btn-warning">Pilih Wajib Pajak</a>
		<span class="hide">Saved.!</span>
	</div>

	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='password'>Nama Wajib Pajak <span class="required">*</span></label>
		<div class="col-md-9">
			<input class="form-control" id="nama_wp" type="text" name="nama_wp" maxlength="20" value="<?php echo set_value('nama_wp');echo $this->session->userdata('nama_pilihan'); ?>"/>
			<?php echo form_error('nama_wp'); ?>
		</div>
    </div>
    
	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='alamat'>Alamat <span class="required">*</span></label>
		<div class="col-md-9">
			<?php echo form_textarea( array( 'class'=>'form-control', 'name' => 'alamat', 'rows' => '5', 'cols' => '80', 'value' => ((set_value('alamat')=='') ? $this->session->userdata('alamat_pilihan') : set_value('alamat') ), 'id' => 'alamat' ) )?>
			<?php echo form_error('alamat'); ?>
		</div>
    </div>
	
	<div class="form-group formhilang">
		<label class="col-md-3 control-label" for='bulan'>Bulan <span class="required">*</span></label>
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
	
	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='nilai'>Nilai Belanja <span class="required">*</span></label>
		<div class="col-md-9">
			<input class="form-control" id="nilaitransaksi" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" required/>
			<?php echo form_error('nilai'); ?>
		</div>
    </div>
	
	<div class="form-group formhilang">
		<label  class="col-md-3 control-label" for='alamat'>Jenis Belanja <span class="required">*</span></label>
		<div class="col-md-4">
			<select name="belanja" id="belanja" class="form-control" required>
				<option>-pilih jenis belanja-</option>
				<?php foreach($belanja as $row): ?>
				<option value="<?=$row->belanjaid?>"><?=$row->belanja?></option>
				<?php endforeach; ?>
			</select>
		</div>
    </div>

    <div class="form-group formhilang">
	<label  class="col-md-3 control-label" for='kenapajak'>Kena Pajak <span class="required"></span></label>
		<div class="col-md-9">
			<div class='controls' id="keterangan_pajak"></div>
		</div>	
    </div>
	
	<div class="form-group" id="pesanberhasil" style="display:none">
		<div class="col-xs-3"></div>
		<div class="col-xs-9">
			<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Berhasil.!</strong> Data telah tersimpan dalam database. Tunggu sebentar anda akan diarahkan ke halaman laporan SSP
			</div>
		</div>
	</div>
	
    </fieldset>

</div>
								
			<div class="form-actions fluid">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn btn-success">Simpan </button>
					<?=anchor('', 'Kembali', array('class' => 'btn default'));?>
					<span id='loading' style='display: none;'>Memproses data, mohon tunggu...</span>
				</div>
			</div>
		<?=form_close();?>
		
	</div>
</div>
				
		<!-- END PAGE -->

	<script>
		$('#nilaitransaksi').focusout(function(){
			//cek wajib pajak baru / lama
			var npwp = $('#npwp').val();
			var nama = $('#nama_wp').val();
			var alamat = $('#alamat').val();
			if (npwp!='' && nama!='') {
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_auto/cek_wp",
				data: {npwp:npwp}
			}).done(function(msg){
				if (msg=='0') {
					// alert('baru');
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>index.php/ssp_auto/input_wp",
						data: {npwp:npwp,nama:nama,alamat:alamat}
					}).done(function(){
						$( this ).next( "span" ).css( "display", "inline" ).fadeOut( 1000 );
					});
				}else{
					// alert('lama');
				}
			});
			}
		});
		$('#belanja').change(function(){
			var belanjaid = $('#belanja option:selected').val();
			var nilai = $('#nilaitransaksi').val();
			var npwp = $('#pemungut').val();
			// alert(nilai);
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_auto/cekpajak",
				data: { belanjaid: belanjaid, nilai: nilai, npwp: npwp }
				})
				.done(function( msg ) {
					$('#keterangan_pajak').html(msg);
				});
		});
		$('#forminputssp').submit(function(){
			var pp = $('#pemungut option:selected').val();
			var nilai = $('#nilaitransaksi').val();
			var belanja = $('#belanja option:selected').val();
			var uraian = $('#uraian').val();
			var bulan = $('#bulan').val();
			var tahun = $('#tahun').val();
			var ppn = $('#ppn').val();
			var pph = $('#pph').val();
			var npwp = $('#npwp').val();
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_auto/post",
				data: { 
					pp: pp, 
					nilai: nilai, 
					belanja: belanja,
					uraian: uraian,
					bulan: bulan,
					tahun: tahun,
					ppn: ppn,
					pph: pph,
					npwp: npwp
				}
			})
			.done(function( msg ) {
					$('.formhilang').hide('slow');
					$('#pesanberhasil').show('slow');
					setTimeout(function(){ window.location = '<?=base_url()?>laporan_ssp'; }, 3000);
			});
			return false;
		});
	</script>