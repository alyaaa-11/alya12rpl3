<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function dataKategori()
    {
        $data = [
            'listKategori' => $this->kategori->getKategori()
        ];
        return view('kategori/data-kategori', $data);
    }

    public function tambahKategori()
    {
        return view('kategori/tambah-kategori');
    }

    public function simpanKategori()
    {
        $data = [
            'nama_kategori' => $this->request->getVar('txtNamaKategori'),
        ];

        $this->kategori->insert($data);

        return redirect()->to('/data-kategori')->with('pesan', "Data telah tersimpan.");
    }

    public function editKategori($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->find($id)
        ];
        return view('kategori/edit-kategori', $data);
    }

    public function simpanEdit($id)
    {
        $data = [
            'nama_kategori' => $this->request->getVar('txtNamaKategori')
        ];

        $this->kategori->update($id, $data);
        return redirect()->to('data-kategori')->with('pesan', 'Data telah diubah');
    }


    public function delete($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('/data-kategori')->with('pesan', 'Data telah dihapus');
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->kategori->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
}
