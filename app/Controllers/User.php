<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function dashboardAdmin()
    {
        $data = [
            'pendapatan_harian' => $this->penjualan->getPendapatanHarian(),
            'akses' => session()->get('level'),
            'dataStok' =>  $this->produk->getStokNol()
        ];
        return view('dashboard-admin', $data);
    }

    public function dashboard()
    {
        $data = [
            'akses' => session()->get('level')
        ];
        return view('dashboard', $data);
    }

    public function dataUser()
    {
        $session = session();
        $session->set('akses', 'admin');
        $session->set('akses', 'kasir');

        $data = [
            'listUser' => $this->user->findAll(),
            'akses' => session()->get('level')
        ];

        return view('user/data-user', $data);
    }

    public function registrasi()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required',
            'username' => 'required|is_unique[tbl_user.username]',
            'password' => 'required',
            'level' => 'required' 
        ];

        $messages = [
            'nama' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Username sudah digunakan! Harap coba lagi.'
            ],
            'username' => [
                'required' => 'Tidak boleh kosong!'
            ],
            'password' => [
                'required' => 'Tidak boleh kosong!'
            ],
            'level' => [
                'required' => 'Tidak boleh kosong!'
            ]
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        //menampung data dari form registrasi
        $dataUser = [
            'nama_user' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level')
        ];

        //menyimpan ke mysql tabel user
        $this->user->insert($dataUser);
        // jika berhasil simpan diarahkan ke halaman data user
        return redirect()->to('/data-user')->with('info', '<span class="alert alert-success alert-dismissible fade show">Registrasi berhasil</span>');
    }

    public function login()
    {
        // 1 membuat validasi form
        $validasiForm = [
            'username' => 'required',
            'password' => 'required'
        ];

        // pengujian validasi form
        if ($this->validate($validasiForm)) {
            // siapkan 2 var yaitu $user dan $pass
            $user = $this->request->getPost('username');
            $pass = $this->request->getPost('password');

            // var digunakan untuk mengecek siapa yang login
            $whereLogin = [
                'username' => $user,
                'password' => $pass
            ];

            //select * from user where username='$user' and password='$pass'
            $cekLogin = $this->user->getUser($user, $pass);

            // var_dump($cekLogin);

            if (count($cekLogin) == 1) { //untuk kasus sukses login
                // jika ditemukan 1 data
                $dataSession = [
                    'id_user' => $cekLogin[0]['id_user'],
                    'username' => $cekLogin[0]['username'],
                    'password' => $cekLogin[0]['password'],
                    'nama_user' => $cekLogin[0]['nama_user'],
                    'level' => $cekLogin[0]['level'],
                    'sudahkahLogin' => true
                ];

                session()->set($dataSession);

                return redirect()->to('/dashboard-admin');
            } else {
                // jika tidak ditemukan data apapun
                return redirect()->to('/login')->with('pesan', '<p class="text-danger text-center">Username atau Password Salah.</p>');
            }
        }
        return view('user/login');
    }

    public function editUser($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->user->updateUser($id),
            'enumValues' => $this->user->getEnumValues()
        ];
        return view('user/edit-user', $data);
    }

    public function simpanUser()
    {
        $data = [
            'nama_user' => $this->request->getVar('txtNama_user'),
            'username' => $this->request->getVar('txtUsername'),
            'password' => $this->request->getVar('txtPassword'),
            'level' => $this->request->getVar('txtLevel')
        ];

        $this->user->update($this->request->getVar('id'), $data);
        return redirect()->to('data-user')->with('pesan', 'Data telah diubah');
    }

    public function delete($id)
    {
        $this->user->delete($id);
        return redirect()->to('/data-user')->with('pesan', 'Data telah dihapus.');
    }

    public function profile()
    {
        return view('user/profile');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }

    public function tambahUser()
    {
        return view('user/registrasi');
    }
}
