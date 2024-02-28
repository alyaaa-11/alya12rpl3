<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController{

    public function dataLaporan()
    {
        $data = [
            'listLaporan' => $this->produk->getStok(),
            'listLaporan' => $this->penjualan->getPenjualan()
        ];
        return view('laporan/data-laporan', $data);
    }
}