					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						LAPORAN PERBULAN <small><?php echo $this->session->userdata('bln'); ?> / <?php echo $this->session->userdata('pjk'); ?></small>
					</h3>
					
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="icon-home"></i>
							<?=anchor('', 'Home');?>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							laporan perbulan
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class='col-md-12'>
					<div class='portlet box grey'>
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-file"></i> Data Input SSP Perbulan
							</div>
						</div>
						<div class='portlet-body form'>
							<?php $form_attributes = array ('id' => 'frmUpdate', 'set_value'=>'id_bulan', 'name' => 'frmUpdate', 'role' => "form", 'class' => 'form-horizontal'); ?>
							<?=form_open('laporan', $form_attributes);?>
								<div class="form-body" style="border: solid 1px #000">

									<div class="form-group">
										
										<div class="col-md-2" style="padding-right: 3px !important;">
											<select data-placeholder="Pilih Bulan" class="form-control" name="id_bulan" id="id_bulan" required>
												<option value=""> -- Pilih Bulan --</option>
												<?php
													foreach($bulan->result_array() as $r)
													{
														if($id_bulan==$r['id_bulan'])
														{
												?>
													<option value="<?php echo $r['id_bulan']; ?>" selected="selected"><?php echo $r['bulan']; ?></option>
												<?php
														}
														else
														{
												?>
													<option value="<?php echo $r['id_bulan']; ?>"><?php echo $r['bulan']; ?></option>
												<?php
														}
													}
												?>
											</select>
										</div>
										
										<button name="submit" type="submit" class="btn green"><i class="icon-search icon-white"></i> Lihat Data</button>
										<a href="laporan_ssp/refresh" class="btn btn-default"><i class="icon-search icon-refresh"></i> Refresh</a>
									</div>

							<?=form_close();?>
							
							<hr>
							<p style="text-align:center; font-weight:bold; font-size: 20px;">LAPORAN PEMBUATAN SSP<br>
							DINAS KEBERSIHAN PERTAMANAN DAN PEMAKAMAN							
							</p>
							
							
							
							<table class="table table-bordered table-hover">				 
								<tr>
									<th style="text-align:center">No</th>
									<th style="text-align:center">Tanggal</th>
									<th style="text-align:center">Wajib Pajak</th>
									<th style="text-align:center">Kegiatan</th>
									<th style="text-align:center">Nilai Object Pajak</th>									
									<th style="text-align:center">Cetak SSP</th>									
								</tr>
							
							<tbody>
								<?php									 
										$no = 1;
										if($tbl_transaksi->num_rows() > 0)
										{		
										foreach ($tbl_transaksi->result_array() as $db){	
										
										?>		
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $db['tgl_otomatis']; ?>
											<td><?php echo $this->app_model->getSelectedData('tbl_wp',array('wpid'=>$db['wpid']))->row()->nama; ?></td>
											<td></td>
											<td><?php echo number_format($db['nilai_belanja'],0,',','.') ?></td>
											<td>
											<?php
												$ssp = $this->app_model->manualQuery("
												SELECT * FROM tbl_detail_transaksi tdt INNER JOIN tbl_jp tj 
												ON tdt.jpid = tj.jpid
												 WHERE kode_tr = {$db['kode_tr']}
												")->result();
												foreach($ssp as $row):
													?><a href="<?=base_url()?>laporan_ssp/blanko/<?=$row->kode_tr."-".$row->iddetail?>" class="btn btn-sm btn-<?php (($row->kd_akun=='411211') ? print 'info' : print 'danger' ) ?>">
														<b><?=$row->nm_jenis?></b>
														(<?=$row->kd_akun?> -
														<?=$row->kd_jenis?>)
													</a> <?php
												endforeach;
											?>
											</td>																						
										</tr>
										<?php
											$no++;
											}
										}	
										else
										{
										?>					
											<tr>
												<td colspan="7">Belum ada data</td>
											</tr>
										<?php	
										} 
										?>
							
							
									<tr align="center">				
											<?php
												//echo $paginator;
											?>
										</td>
									</tr>
								</tbody>
							</table>
							
							</div>
						</div>
					</div>