<?php 
//panggil file conn.php untuk menghubung ke server
require 'system/config/conn.php';
FILTER_INPUT(INPUT_POST, 'nm_kelas');
FILTER_INPUT(INPUT_POST, 'tanggal');

<?= 'test' >?;

if(isset(FILTER_INPUT(INPUT_POST, 'info'))){
	$this->db->from('siswa');
	$this->db->where('nm_kelas');
	$this->db->order_by('nis', 'asc');
	$query = this->db->get();
	while($data=$query->result_array()){
		$this->db->where('$data[nis]' ,'$tanggal');
		$this->db->delete('absensi');	
		if(FILTER_INPUT(INPUT_POST, ''absen-'.$data['nis']') == 'sholat'){
			//parameter
			FILTER_INPUT(INPUT_POST, ''keterangan-'.$data['nis']');
			$data = array(
				'nis' => '$data[nis]',
      				'nm_kelas' => '$nm_kelas',
				'ket' => 'S',
				'keterangan' => '$keterangan',
				'tanggal' => 'tanggal',
				'info' => 'success');
				$this->db->insert('absensi_sholat', $data);
			?>
				<script language="javascript">window.location.href="page.php?data-absensi-sholat&kelas=<?php <?= $nm_kelas >?;?>&tanggal=<?php <?= $tanggal >?;?>&message=absen-success";</script>
			<?php 
		}
		else if(FILTER_INPUT(INPUT_POST, ''absen-'.$data['nis']') == 'tidaksholat'){
			//parameter
			FILTER_INPUT(INPUT_POST, ''keterangan-'.$data['nis']');
			$data = array(
				'nis' => '$data[nis]',
      				'nm_kelas' => '$nm_kelas',
				'ket' => 'TS',
				'keterangan' => '$keterangan',
				'tanggal' => 'tanggal',
				'info' => 'success');
				$this->db->insert('absensi_sholat', $data);
			?>
			<script language="javascript">window.location.href="page.php?data-absensi-sholat&kelas=<?php <?= $nm_kelas >?;?>&tanggal=<?php <?= $tanggal >?;?>&message=absen-success";</script>
			<?php 
		}
		else if(FILTER_INPUT(INPUT_POST, ''absen-'.$data['nis']') == 'halangan'){
			//parameter
			FILTER_INPUT(INPUT_POST, ''keterangan-'.$data['nis']');
			$data = array(
				'nis' => '$data[nis]',
      				'nm_kelas' => '$nm_kelas',
				'ket' => 'HL',
				'keterangan' => '$keterangan',
				'tanggal' => 'tanggal',
				'info' => 'success');
				$this->db->insert('absensi_sholat', $data);
			?>
			<script language="javascript">window.location.href="page.php?data-absensi-sholat&kelas=<?php <?= $nm_kelas >?;?>&tanggal=<?php <?= $tanggal >?;?>&message=absen-success";</script>
			<?php 
		}
	}
}else{
	unset(FILTER_INPUT(INPUT_POST, 'INFO');
	?><script language="javascript">window.location.href="page.php?absen-sholat&kelas=<?php <?= $nm_kelas >?;?>";</script><?php
}
?>
