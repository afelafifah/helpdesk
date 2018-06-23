<?php
class M_data_keluhan extends CI_Model
{

	function __construct()
	{
		parent::__construct();

		// Setup nama tabel ktp
		$this->tbl_ktp = 'frm_data_ktp';
	}

	
	/**
	* Model untuk mendapatkan data berdasarkan ID 
	*
	* @param id Integer
	**/
	function get_frm_data_ktp( $id )
	{
		// Set data dalam bentuk array
		$array_data = array( 
			'id' => $id
			);

		// Melakukan query menggunakan active record get_where
		$query = $this->db->get_where( $this->tbl_ktp , $array_data );

		// Jika data lebih dari 0, return array
		if( $query->num_rows() > 0 ) {

			// Menampilkan data dalam bentuk array
			$result = $query->row();

		} else {	
	
			// Jika data kosong, maka return array kosong
			$result = FALSE;
		}

		// Mengembalikan data result ke controller
		return $result;		
	}


	/**
	* Model untuk mendapatkan semua data KTP 
	*
	* @param id Integer
	**/
	function get_all_frm_data_ktp()
	{
		// Melakukan query menggunakan active record get
		$query = $this->db->get( $this->tbl_ktp );

		// Jika data lebih dari 0, return array
		if( $query->num_rows() > 0 ) {

			// result data
			$result = $query->result_array();

		} else {	
	
			// Jika data kosong, maka return array kosong
			$result = FALSE;
		}

		// Return data ke controller
		return $result;
	}


	/**
	* Model untuk insert data KTP 
	*
	* @param params Array
	**/
	function add_frm_data_ktp( $params )
	{
		// $params merupakan list data array yang dikirim dari controller ke Model ini
		$query = $this->db->insert( $this->tbl_ktp , $params);

		if( $query === TRUE )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	
	/**
	* Model untuk upate data KTP 
	*
	* @param params Array
	**/
	function update_frm_data_ktp( $id, $params )
	{
		// Menggunakan id sebagai referensi key update
		$this->db->where('id', $id);

		// Update data menggunakan active record, $params merupakan data array yang dikirim dari controller ke model ini		
		$result = $this->db->update($this->tbl_ktp , $params);

		return $result;
	}

	
	/**
	* Model untuk hapus data KTP 
	*
	* @param id Integer
	**/
	function delete_frm_data_ktp( $id )
	{
		$array_delete = array(
			'id' => $id
			);

		$result = $this->db->delete( $this->tbl_ktp , $array_delete);

		return $result;
	}
}