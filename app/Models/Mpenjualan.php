<?php

namespace App\Models;

use App\Controllers\Penjualan;
use CodeIgniter\Model;

class Mpenjualan extends Model
{
    protected $table            = 'tbl_penjualan';
    protected $primaryKey       = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_penjualan','no_faktur','tgl_penjualan','total','id_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function generateNoFaktur()
    {
        $prefix = 'PJLN';
        $lastFaktur = $this->orderBy('id_penjualan', 'DESC')->first();

        if (!$lastFaktur) {
            $code = $prefix . '001';
        } else {
            $lastCode = substr($lastFaktur['no_faktur'], strlen($prefix));
            $nextCode = str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);
            $code = $prefix . $nextCode;
        }

        return $code;
    }

    public function getPenjualan()
    {
        $produk = new Mproduk();
        $produk->select('tbl_penjualan.no_faktur, tbl_penjualan.tgl_penjualan, tbl_user.username');
        $produk->join('tbl_user', 'tbl_user.id_user=tbl=penjualan.id_user', 'LEFT');
        $produk->orderBy('tbl_penjualan.id_penjualan', 'DESC');
        return $produk->find();
    }

    public function getPendapatanHarian()
    {
        $today = date('Y-m-d');
        return $this->where('DATE(tgl_penjualan)', $today)->select('SUM(total) AS pendapatan_harian')->get()->getRow()->pendapatan_harian;
    }

    public function generateTransactionNumber()
    {
        // Dapatkan tahun dua angka terakhir
        $tahun = date('y');

        // Dapatkan nomor urut terakhir dari database
        $lastTransaction = $this->orderBy('id_penjualan', 'DESC')->first();

        // Ambil nomor urut terakhir atau setel ke 0 jika belum ada transaksi sebelumnya
        $lastNumber = ($lastTransaction) ? intval(substr($lastTransaction['no_faktur'], -4)) : 0;

        // Increment nomor urut
        $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        // Hasilkan nomor transaksi dengan format SCDPSYYMMDDXXXX
        $noFaktur = 'PJM' . $tahun . date('md') . $nextNumber;

        // Simpan nomor transaksi dalam sesi
        session()->set('GeneratedTransactionNumber', $noFaktur);

        return $noFaktur;
    }

    public function getTotalHargaById($idPenjualan)
    {
        $query = $this->select('total')->where('id_penjualan', $idPenjualan)->first();
        // Periksa apakah hasil kueri tidak kosong sebelum mengakses indeks 'total'
        if ($query) {
            return $query['total'];
        } else {
            // Jika hasil kueri kosong, kembalikan nilai default, misalnya 0
            return 0;
        }
    }
}
