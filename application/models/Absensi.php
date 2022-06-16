<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi extends CI_Model{
		public function get()
		{
			//$page, $size
			//, $size, $page
			return $this->db->get('absensi');
		}

		public function detail($id)
		{
			return $this->db->get_where('absensi',['id'=>$id]);
		}
		public function detail_pegawai($id_pegawai,$dari='',$sampai='')
		{
			$sql = "SELECT nama,
						(SELECT COUNT(*)/2 FROM absensi WHERE id_pegawai='$id_pegawai' AND keterangan='' AND tanggal BETWEEN '$dari' AND '$sampai') AS masuk,
						(SELECT COUNT(*)/2 FROM absensi WHERE id_pegawai='$id_pegawai' AND keterangan='S' AND tanggal BETWEEN '$dari' AND '$sampai') AS sakit, 
						(SELECT COUNT(*)/2 FROM absensi WHERE id_pegawai='$id_pegawai' AND keterangan='I' AND tanggal BETWEEN '$dari' AND '$sampai') AS izin, 
						(SELECT COUNT(*)/2 FROM absensi WHERE id_pegawai='$id_pegawai' AND keterangan='A' AND tanggal BETWEEN '$dari' AND '$sampai') AS alpha,
						DATEDIFF('$sampai','$dari')+1 AS selisih
					FROM absensi WHERE id_pegawai='$id_pegawai' GROUP BY id_pegawai";
			return $this->db->query($sql);
		}

		public function insert($dataAbsensi)
		{
			$dataPegawai = $this->db->get_where('pegawai',['id'=>$dataAbsensi['id_pegawai']])->row_array();
			$val = array(
				'id_pegawai'	=> $dataAbsensi['id_pegawai'],
				'nama'			=> @$dataPegawai['nama'],
				'keterangan'	=> $dataAbsensi['keterangan'],
				'kategori' 		=> $dataAbsensi['kategori'],
				'jam' 			=> $dataAbsensi['jam']
			);
			$this->db->insert('absensi', $val);
		}

		public function laporan($dari,$sampai)
		{
			// ===> masuk = jumlah hari masuk * 0.5
					// kenapa 0.5?? 
					// karena masuk_pagi = 0.5 gaji, masuk siang = 0.5 gaji
			// #### HANYA ABSENSI YG STATUSNYA TIDAK I, A, ATAU S YG DIHITUNG SBG GAJI
			// ===> gaji_diterima
				// masuk * gaji_harian
			$sql = "SELECT a.id_pegawai, p.nama, p.gaji, (COUNT(a.id)*0.5) AS masuk, 
						((COUNT(a.id)*0.5)*p.gaji) AS gaji_diterima 
					FROM pegawai p
					INNER JOIN absensi a ON p.id=a.id_pegawai
					WHERE a.keterangan='' 
					AND a.tanggal BETWEEN '$dari' AND '$sampai' 
					GROUP BY a.id_pegawai";
			return $this->db->query($sql);
		}
		public function laporan2($dari,$sampai)
		{
			# GROUP BY a.id_pegawai, a.tanggal
			$sql = "SELECT * FROM absensi a
					WHERE a.tanggal BETWEEN '$dari' AND '$sampai'
					ORDER BY a.id_pegawai, a.tanggal, a.kategori";
			return $this->db->query($sql);
		}
	}