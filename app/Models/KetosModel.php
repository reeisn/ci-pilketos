<?php

namespace App\Models;
use CodeIgniter\Model;

class KetosModel extends Model
{
    protected $table = 'ketos';
    protected $useTimestamp = true;
    protected $allowedFields = ['id','nama_kandidat','slug','kelas','visi','misi','sampul'];

    public function getKetos($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function search($keyword)
    {
        //versi panjang
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        //vers pendek
        return $this->table('ketos')->like('nama_kandidat', $keyword)->orLike('kelas', $keyword)->orLike('visi', $keyword)
        ->orLike('misi', $keyword);
    }
}
