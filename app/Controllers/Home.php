<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		helper('sn');
	}
	public function index()
	{
		
		$data = [
			'judul' => 'Homepage'
		];
		tampilan('antrian/index', $data);
	}
}
