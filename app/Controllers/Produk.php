<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function dataProduk()
    {
        $data = [
            'listProduk' => $this->produk->getProduk()
        ];
        return view('produk/data-produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->findAll(),
            'satuan' => $this->satuan->findAll(),
            'kodeProduk' => $this->produk->generateProductCode()

        ];
        return view('produk/tambah-produk', $data);
    }


    public function simpanProduk()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtKodeProduk' => 'required|is_unique[tbl_produk.kode_produk]',
            'txtNamaProduk' => 'required|is_unique[tbl_produk.nama_produk]',
            'harga_beli' => 'required',
            'harga_jual' => 'required|checkHargaValid[hargaBeli,hargaJual]',
            'txtStok' => 'required|greater_than[0]',
            'txtSatuan' => 'required',
            'txtKategori' => 'required',
        ];

        $messages = [
            'txtKodeProduk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Kode produk sudah ada!',
            ],
            'txtNamaProduk' => [
                'required' => 'Nama produk tidak boleh kosong!',
                'is_unique' => 'Nama produk sudah ada!'
            ],
            'harga_beli' => [
                'required' => 'Harga beli tidak boleh kosong!',
            ],
            'harga_jual' => [
                'required' => 'Harga jual tidak boleh kosong!',
                'checkHargaValid' => 'Harga jual tidak boleh lebih kecil dari harga beli!'
            ],
            'txtStok' => [
                'required' => 'Stok tidak boleh kosong!',
                'greater_than' => 'Stok harus lebih besar dari 0!'
            ],
            'txtSatuan' => [
                'required' => 'Satuan tidak boleh kosong!',
            ],
            'txtKategori' => [
                'required' => 'kategori tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_produk' => $this->request->getPost('txtKodeProduk'),
            'nama_produk' => $this->request->getPost('txtNamaProduk'),
            'harga_beli' => str_replace('.', '', $this->request->getPost('harga_beli')),
            'harga_jual' => str_replace('.', '', $this->request->getPost('harga_jual')),
            'stok' => str_replace('.', '', $this->request->getPost('txtStok')),
            'id_satuan' => $this->request->getPost('txtSatuan'),
            'id_kategori' => $this->request->getPost('txtKategori'),
        ];

        // var_dump($data);

        $this->produk->insert($data);

        return redirect()->to('/data-produk')->with('pesan', "Data telah tersimpan.");
    }

    public function editProduk($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $this->produk->find($id),
            'satuan' => $this->satuan->find(),
            'kategori' => $this->kategori->find(),
            'kode_produk' => $this->produk->generateProductCode()

        ];
        return view('produk/edit-produk', $data);
    }

    public function simpanEdit($id)
    {
        $data = [
            "nama_produk" => $this->request->getPost('txtnamaproduk'),
            "harga_beli" => str_replace('.', '', $this->request->getPost('txthargabeli')),
            "harga_jual" => str_replace('.', '', $this->request->getPost('txthargajual')),
            "id_satuan" => $this->request->getPost('txtsatuan'),
            "id_kategori" => $this->request->getPost('txtkategori'),
            "stok" => str_replace('.', '', $this->request->getPost('txtstok'))
        ];
        // var_dump($data);
        $this->produk->update($id, $data);
        return redirect()->to('data-produk')->with('pesan', 'Data telah diubah');
    }

    public function delete($id)
    {
        $this->produk->delete($id);
        return redirect()->to('/data-produk')->with('pesan', 'Data telah dihapus');
    }
}
