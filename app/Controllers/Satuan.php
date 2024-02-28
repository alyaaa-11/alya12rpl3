<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        //
    }

    public function dataSatuan()
    {
        $data = [
            'listSatuan' => $this->satuan->getSatuan()
        ];
        return view('satuan/data-satuan', $data);
    }

    public function tambahSatuan()
    {
        return view('satuan/tambah-satuan');
    }

    public function simpanSatuan()
    {
        $data = [
            'nama_satuan' => $this->request->getVar('txtNamaSatuan'),    
        ];

        $this->satuan->insert($data);
        
        return redirect()->to('/data-satuan')->with('pesan', "Data telah tersimpan.");
    }

    public function editSatuan($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'satuan' => $this->satuan->find($id)
        ];
        return view('satuan/edit-satuan', $data);
    }

    public function simpanEdit($id)
    {
        $data = [
            'nama_satuan' => $this->request->getVar('txtNamaSatuan')
        ];

        $this->satuan->update($id, $data);
        return redirect()->to('data-satuan')->with('pesan', 'Data telah diubah');
    }


    public function delete($id)
    {
        $this->satuan->delete($id);
        return redirect()->to('/data-satuan')->with('pesan', 'Data telah dihapus');
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->satuan->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
        
}
