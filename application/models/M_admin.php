<?php 
/**
* 
*/
class M_admin extends CI_Model
{
	

/**
=====================================================================================================================================
DATA GOLONGAN
===================================================================================================================================== 
*/
	public function lihat_golongan($id_golongan='')
	{
		if ($id_golongan =='') {
			return $this->db->get('golongan')->result_array();
		}else{
			$this->db->where('id_golongan',$id_golongan);
			return $this->db->get('golongan')->row_array();
		}
	}
	public function proses_tambah_golongan($data)
	{
		$this->db->insert('golongan',$data);
	}
	public function proses_edit_golongan($data,$id_golongan)
	{
		$this->db->where('id_golongan',$id_golongan);
		$this->db->update('golongan',$data);
	}
	public function proses_hapus_golongan($id){
		$where = array(
			'id_golongan' => $id
			);
		$this->db->where($where);
		$this->db->delete('golongan');
	}

/**
=====================================================================================================================================
DATA UNIT
===================================================================================================================================== 
*/
	
	public function lihat_unit($id_unit='')
	{
		if ($id_unit =='') {
			return $this->db->query("SELECT unit.id_unit,unit.nama_unit, golongan.golongan,golongan.id_golongan from golongan join unit on golongan.id_golongan=unit.id_golongan")->result_array();

		}else{
			
			return $this->db->query("SELECT unit.id_unit,unit.nama_unit, golongan.golongan,golongan.id_golongan from golongan join unit on golongan.id_golongan=unit.id_golongan where unit.id_unit='$id_unit'")->row_array();
		}
	}
		public function proses_tambah_unit($data)
	{
		$this->db->insert('unit',$data);
	}

	public function proses_edit_unit($data,$id_unit)
	{
		$this->db->where('id_unit',$id_unit);
		$this->db->update('unit',$data);
	}

	/**
=====================================================================================================================================
DATA AKUN
===================================================================================================================================== 
*/
public function lihat_akun($id_akun='')
	{
		if ($id_akun =='') {
			return $this->db->query("SELECT akun.id_akun,akun.level,akun.username,akun.password, unit.id_unit,unit.nama_unit from unit join akun on unit.id_unit=akun.id_unit")->result_array();

		}else{
			
			return $this->db->query("SELECT akun.id_akun,akun.username,akun.level,akun.password, unit.id_unit,unit.nama_unit from unit join akun on unit.id_unit=akun.id_unit where akun.id_akun='$id_akun'")->row_array();
		}
	}
 	public function proses_tambah_akun($data)
	{
		$this->db->insert('akun',$data);
	}
	public function proses_edit_akun($data,$id_akun)
	{
		$this->db->where('id_akun',$id_akun);
		$this->db->update('akun',$data);
	}



	/**
=====================================================================================================================================
DATA Agenda
===================================================================================================================================== 
*/

public function lihat_agenda($id_agenda='')
	{
		if ($id_agenda =='') {
			return $this->db->query("SELECT agenda.id_agenda,agenda.nama_agenda,agenda.tanggal_agenda,agenda.tanggal_selesai,agenda.jam_mulai,agenda.jam_mulai,agenda.jam_selesai,agenda.status,agenda.tanggal_pengajuan,agenda.tanggal_publish, display.display, unit.id_unit,unit.nama_unit, display.id_display from unit join agenda on unit.id_unit=agenda.id_unit join display on display.id_display=agenda.id_display")->result_array();

		}else{
			
			return $this->db->query("SELECT agenda.id_agenda,agenda.nama_agenda,agenda.tanggal_agenda,agenda.tanggal_selesai,agenda.jam_mulai,agenda.jam_mulai,agenda.jam_selesai,agenda.status,agenda.tanggal_pengajuan,agenda.tanggal_publish, display.display, unit.id_unit,unit.nama_unit, display.id_display from unit join agenda on unit.id_unit=agenda.id_unit join display on display.id_display=agenda.id_display where agenda.id_agenda='$id_agenda'")->row_array();
		}

	}

	public function proses_tambah_agenda($data)
	{
		$this->db->insert('agenda',$data);
	}

	public function proses_edit_agenda($data,$id_agenda)
	{
		$this->db->where('id_agenda',$id_agenda);
		$this->db->update('agenda',$data);
	}

	public function proses_hapus_akun($id){
		$where = array(
			'id_akun' => $id
			);
		$this->db->where($where);
		$this->db->delete('akun');
	}



	/**
=====================================================================================================================================
DATA DISPLAY
===================================================================================================================================== 
*/

public function lihat_display_edit($where){
	return $this->db->get_where('display',$where);
}

public function lihat_display($id_display='')
	{
		if ($id_display =='') {
			return $this->db->get('display')->result_array();
		}else{
			$this->db->where('id_display',$id_display);
			return $this->db->get('display')->row_array();
		}
	}

		public function proses_tambah_display($data)
	{
		$this->db->insert('display',$data);
	}

		public function proses_edit_display()
	{
		$id = $this->input->post('id_display');
		$nama = $this->input->post('display');

		$data = array(
			'id_display' => $id,
			'display' => $nama, 
					
		);
		$where = array(
			'id_display' => $id
			);
		$this->db->where($where);
		$this->db->update('display',$data);
	}
	

	public function delete($id){
		$where = array(
			'id_display' => $id
			);
		$this->db->where($where);
		$this->db->delete('display');
	}


	
}
?>