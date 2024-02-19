<?php

namespace App\Controllers;
use App\Models\KetosModel;

class Ketos extends BaseController
{
    protected $ketosModel;
    public function __construct()
    {
        $this->ketosModel = new ketosModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_ketos') ? $this->request->getVar('page_ketos') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $ketos = $this->ketosModel->search($keyword);
        } else {
            $ketos = $this->ketosModel;
        }
        $data = [
            'title' => 'Daftar Kandidat',
            //$buku = $this->bukuModel->findAll();
            'ketos' => $ketos->paginate(6, 'ketos'),
            'pager' => $this->ketosModel->pager,
            'currentPage' => $currentPage
        ];
        return view('/ketos/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Kandidat',
            'ketos' => $this->ketosModel->getKetos($slug)
        ];
        return view ('/ketos/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Kandidat',
            'validation' => \Config\Services::validation()
        ];

        return view('/ketos/create', $data);
    }

    public function save()
    {
        //validate input
        if (!$this->validate([
            'nama_kandidat' => [
                'rules' => 'required|is_unique[ketos.nama_kandidat]',
                'errors' => [
                    'required' => '{field} nama kandidat harus diisi.',
                    'is_unique' => '{field} nama sudah terdaftar'
                ]
                ],

            'kelas' => [
                'rules' => 'required[ketos.kelas]',
                'errors' => [
                    'required' => '{field} kelas harus diisi.',
                            ]
                ],

            'visi' => [
                'rules' => 'required[ketos.visi]',
                'errors' => [
                    'required' => '{field} visi harus diisi.',
                            ]
                ],

            'misi' => [
                'rules' => 'required[ketos.misi]',
                'errors' => [
                    'required' => '{field} misi harus diisi.',
                            ]
                ],

                'sampul' => [
                    'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                    //'uploaded' => '{field} sampul wajib dipilih',
                    'max_size' => 'Ukuran Gambar Maksimal 2mb',
                    'is_image' => 'File yang anda pilih harus berupa gambar',
                    'mime_in' => 'File yang anda pilih harus berupa gambar'
                                ]
                        ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/buku/create')->withInput()->with('validation', $validation);
             return redirect()->to('/ketos/create')->withInput();
            }

        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar yang diupload
        if($fileSampul->getError()==4){
            $namaSampul = 'default.png';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan ke folder public img
            $fileSampul ->move('img', $namaSampul);
        }

        //ambil nama file
        // $namaSampul = $fileSampul->getName();
        
        $slug = url_title ($this->request->getVar('nama_kandidat'), '-', true);
        $this->ketosModel->save([
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'visi' =>$this->request->getVar('visi'),
            'misi' =>$this->request->getVar('misi'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/ketos');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $ketos = $this->ketosModel->find($id);
        //cek jika default
        if($ketos['sampul'] != 'default.png'){
            //hapus gambar
            unlink('img/' . $ketos['sampul'] );
        }
        
        $this->ketosModel->delete($id);

        session()->setFlashdata('dihapuz', 'Data Berhasil DiHapus!');
        return redirect()->to('/ketos');

        
    }

    public function edit($slug)
    {

        // session();
        $data = [
            'title' => 'Form Ubah Ketos',
            'validation' => \Config\Services::validation(),
            'ketos' => $this->ketosModel->getKetos($slug)
        ];

        return view('/ketos/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $ketosLama = $this->ketosModel->getKetos($this->request->getVar('slug'));
        if ($ketosLama['nama_kandidat'] == $this->request->getVar('nama_kandidat')) {
            $rule_nama_kandidat = 'required';
        } else {
            $rule_nama_kandidat = 'required|is_unique[ketos.nama$rule_nama_kandidat]';
        }
        
         //validate ubah 
         if (!$this->validate([
            'nama_kandidat' => [
                'rules' => $rule_nama_kandidat,
                'errors' => [
                    'required' => '{field} nama_kandidat harus diisi.',
                    'is_unique' => '{field} namanya sudah terdaftar'
                ]
                ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                //'uploaded' => '{field} sampul wajib dipilih',
                'max_size' => 'Ukuran Gambar Maksimal 2mb',
                'is_image' => 'File yang anda pilih harus berupa gambar',
                'mime_in' => 'File yang anda pilih harus berupa gambar'
                                ]
                            ]    
        ])) {
            return redirect()->to('/ketos/edit/' . $this->request->getVar('slug'))->withInput();
            }

        $fileSampul = $this->request->getFile('sampul');

        //cek gambar, apakah tetap yg lama
        if($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar 
            $fileSampul->move('img', $namaSampul);
            //hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }


        //cek nama_kandidat
        $slug = url_title ($this->request->getVar('nama_kandidat'), '-', true);
        $this->ketosModel->save([
            'id' => $id,
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'visi' =>$this->request->getVar('visi'),
            'misi' =>$this->request->getVar('misi'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to('/ketos');
            }
        }
