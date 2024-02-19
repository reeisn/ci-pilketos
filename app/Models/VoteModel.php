<?php

namespace App\Models;
use CodeIgniter\Model;

class VoteModel extends Model
{
    protected $table = 'vote';
    protected $useTimestamp = true;
    protected $allowedFields = ['id_kandidat','nama_kandidat','slug','nama_siswa','sampul'];

    public function getVote($slug = false)
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
