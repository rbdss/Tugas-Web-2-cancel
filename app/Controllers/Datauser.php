<?php

namespace App\Controllers;

use App\Models\UserModel;

class Datauser extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna',
            'user' => $this->userModel->getUser()
        ];

        return view('datauser/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail user',
            'user' => $this->userModel->getUser($id)
        ];

        //user not found
        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        };

        return view('datauser/detail', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Pengguna',
            'validation' => \Config\Services::validation()
        ];
        return view('datauser/tambah', $data);
    }

    public function simpan()
    {
        //validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal {field} tidak boleh kosong.'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,1024]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar (Max. 1MB).',
                    'is_image' => 'Format yang anda pilih tidak sah (.jpg, .jpeg, .png).',
                    'mime_in' => 'Format yang anda pilih tidak sah (.jpg, .jpeg, .png).',
                ]
            ]

        ])) {
            return redirect()->to('/datauser/tambah')->withInput();
        }

        //Photo upload
        //upload temporary file
        $filePhoto = $this->request->getFile('photo');
        //no photo upload
        if ($filePhoto->getError() == 4) {
            $namaPhoto = 'profile-icon.png';
        } else {
            //generate random filename
            $namaPhoto = $filePhoto->getRandomName();
            //move to asset
            $filePhoto->move('asset/image', $namaPhoto);
        }


        $this->userModel->save([
            'nama' => $this->request->getVar('nama'),
            'gender' => $this->request->getVar('gender'),
            'tgLahir' => $this->request->getVar('lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'contact' => $this->request->getVar('kontak'),
            'photo' => $namaPhoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/datauser');
    }

    public function delete($id)
    {
        //DELETE USER IMG
        //Find user id
        $user = $this->userModel->find($id);
        //check default img
        if ($user['photo'] != 'profile-icon.png') {
            //delete img
            unlink('asset/image/' . $user['photo']);
        }
        //else
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/datauser');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id)
        ];
        return view('datauser/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal {field} tidak boleh kosong.'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.'
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,1536]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar (Max 1.5MB).',
                    'is_image' => 'Pastikan file anda mempunyai format(.jpg, .jpeg, .png).',
                    'mime_in' => 'Pastikan file anda mempunyai format(.jpg, .jpeg, .png).',
                ]
            ]

        ])) {
            $i = $id;
            return redirect()->to('/datauser/edit/' . $i)->withInput();
        }
        //PHOTO
        $filePhoto = $this->request->getFile('photo');
        //if no change on photo
        if ($filePhoto->getError() == 4) {
            $namaPhoto = $this->request->getVar('oldPhoto');
        } else {
            //generate new filename
            $namaPhoto = $filePhoto->getRandomName();
            //move to asset
            $filePhoto->move('asset/image', $namaPhoto);
            //delete old photo
            unlink('asset/image/' . $this->request->getVar('oldPhoto'));
        }

        $this->userModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'gender' => $this->request->getVar('gender'),
            'tgLahir' => $this->request->getVar('lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'contact' => $this->request->getVar('kontak'),
            'photo' => $namaPhoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/datauser');
    }
}
