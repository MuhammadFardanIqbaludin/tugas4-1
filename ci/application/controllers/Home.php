<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "http://localhost/ci/api/posyandu");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		$data = array(
			'data' => json_decode($data),
			'page' => 'data'
		);

		$this->load->view('master', $data);
	}

	public function add()
	{
		$submit	= $this->input->post('submit');
		$nama	= $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		if ($submit) {
			$param = [
				'nama' 		=> $nama,
				'alamat'	=> $alamat
			];

			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, "http://localhost/ci/api/posyandu/add");
			curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($c, CURLOPT_HEADER, FALSE);
			curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($c, CURLOPT_POST, TRUE);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($param));

			$data = curl_exec($c);

 			header('location:'.base_url());
		}

		$this->load->view('master',['page' => 'add']);
	}

	public function edit()
	{
		$id 	= $this->uri->segment(3);
		$submit	= $this->input->post('submit');

		if ($submit) {
			$nama	= $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$id 	= $this->input->post('id');	

			$param = [
				'id'		=> $id,
				'nama' 		=> $nama,
				'alamat'	=> $alamat
			];

			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, "http://localhost/ci/api/posyandu/edit");
			curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($c, CURLOPT_HEADER, FALSE);
			curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($c, CURLOPT_POST, TRUE);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($param));

			$data = curl_exec($c);

			print_r(json_decode($data));

			header('location:'.base_url());
		}

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "http://localhost/ci/api/posyandu?id=$id");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		$data = array(
			'data' => json_decode($data),
			'page' => 'update'
		);

		$this->load->view('master', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "http://localhost/ci/api/posyandu/delete?id=$id");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		header('location:'.base_url());
	}
}
