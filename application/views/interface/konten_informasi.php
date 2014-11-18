	<div class="form-group">
		<div class="col-md-12 input-group">											
			<?php date_default_timezone_set('Asia/Jakarta');?>
			<?php gmdate("Y-m-d H:i:s", time()+60*60*7);?>
			<?php $namaHari = array("Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");?>
			<?php $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Desember");?>
			<?php $today= date('l, F j, Y');?>
			<?php //$sekarang = $namaHari[date('N')].",".date('j')." ".$namaBulan[date('n')-1]." ".date('Y');?>			
			
			<p align="right"><font color="white" size="50px"><span id="tanggalku"></span></font><br/>
			<font color="white"><?=$today;?></font></p>
		</div>
	</div>
	
	
<script type="text/javascript"> 
	function addZero(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}
	// 1 detik = 1000 
	window.setTimeout("waktu()",1000); 
	function waktu() {
		var tanggal = new Date(); 
		setTimeout("waktu()",1000); 
		document.getElementById("tanggalku").innerHTML = 
		tanggal.getHours()+":"+addZero(tanggal.getMinutes())+":"+tanggal.getSeconds(); 
	 } 
</script> 
