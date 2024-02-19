<?php

namespace App\Controllers;
use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }
        $data = [
            'title' => 'Daftar Orang',
            //'orang' => $this->orangModel->findAll()
            'orang' => $orang->paginate(6, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ];
        return view('orang/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Kandidat',
            'validation' => \Config\Services::validation()
        ];

        return view('/orang/create', $data);
    }

    public function save()
    {
        //validate input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[orang.nama]',
                'errors' => [
                    'required' => '{field} nama anda harus diisi.',
                    'is_unique' => '{field} nama sudah terdaftar'
                ]
                ],

            'vote' => [
                'rules' => 'required[orang.vote]',
                'errors' => [
                    'required' => '{field} vote harus diisi.',
                            ]
                ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/buku/create')->withInput()->with('validation', $validation);
             return redirect()->to('/orang/create')->withInput();
            }

        
        $slug = url_title ($this->request->getVar('nama'), '-', true);
        $this->orangModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'vote' => $this->request->getVar('kelas'),
        ]);

        session()->setFlashdata('pesan', 'Voting Berhasil Ditambahkan!');
        return redirect()->to('/orang');
    }

    public function delete($id)
    {
        $this->orangModel->delete($id);

        session()->setFlashdata('dihapuz', 'Vote Berhasil DiHapus!');
        return redirect()->to('/orang');

        
    }

}