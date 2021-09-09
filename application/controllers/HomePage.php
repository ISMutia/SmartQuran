<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomePage extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/dashboard', '', FALSE);
	}

	public function alquran()
	{
		$this->load->view('alquran/index', '', FALSE);
	}

	public function asmaulhusna()
	{
		$this->load->view('asmaulhusna/index', '', FALSE);
	}

	public function doaharian()
	{
		$this->load->view('doaharian/index', '', FALSE);
	}

	public function surah()
	{
		$this->load->view('alquran/surah/index', '', FALSE);
	}

	public function arahkiblat()
	{
		$this->load->view('arahkiblat/index', '', FALSE);
	}

	public function info()
	{
		$this->load->view('info/index', '', FALSE);
	}

	public function alquran1()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.quran.sutanlab.id/surah",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		// }
		$this->load->view('alquran/index', $response, FALSE);
		// echo json_encode($response);

		// $jsonData = Array();
		// $jsonData = json_decode($response);
		// echo $jsonData->status; //oke

	}

	public function asmaulhusna1()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://islamic-api-zhirrr.vercel.app/api/asmaulhusna",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		// }
		$this->load->view('asmaulhusna/index', $response, FALSE);

		// $jsonData = Array();
		// $jsonData = json_decode($response);
		// echo $jsonData->status; //oke

	}

	public function doaharian1()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://islamic-api-zhirrr.vercel.app/api/doaharian",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		// }
		$this->load->view('doaharian/index', $response, FALSE);

		// $jsonData = array();
		// $jsonData = json_decode($response);
		// //echo $response;
		// $json = array(
		//     "msg" => "success",
		//     "perpage" => 10,
		//     "count" => count($jsonData->data),
		//     "data" => $jsonData->data
		// );
		// echo json_encode($json);
		// echo $jsonData->status; //oke

	}

	public function surah1()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.quran.sutanlab.id/surah",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		// }
		$this->load->view('alquran/surah/index', $response, FALSE);

		// $jsonData = Array();
		// $jsonData = json_decode($response);
		// echo $jsonData->status; //oke

	}
}

/* End of file Template.php */
