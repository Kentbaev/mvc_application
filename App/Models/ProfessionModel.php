<?php

namespace App\Models;

use App\Core\Model;

class ProfessionModel extends Model
{
    public function selectAll()
    {
        $this->query = $this->db->prepare("SELECT * FROM professions");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
