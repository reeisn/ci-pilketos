<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
                 'title' => 'web | Skanic',
        ];
        return view('pages/home' , $data);
    }
    public function vote()
    {
        $data = [
            'title' => 'Halaman Voting SIPITOS',
        ];
        return view('pages/vote' , $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Meet The Dev!',
            'alamat'=>[
                [
                    'tipe'=>'Name: Ri',
                    'alamat'=>'Jl. Ciapus',
                    'kab'=>'Bogor'
                ]
            ]
        ];
        return view('pages/contact' , $data);
    }
}
