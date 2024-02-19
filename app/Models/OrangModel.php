<?php

namespace App\Models;
use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $useTimestamp = true;
    protected $allowedFields = ['nama', 'vote'];

    public function search($keyword)
    {
        //versi panjang
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        //vers pendek
        return $this->table('orang')->like('nama', $keyword)->orLike('vote', $keyword);
    }

}
