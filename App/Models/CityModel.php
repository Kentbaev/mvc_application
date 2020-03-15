<?php

namespace App\Models;

use App\Core\Model;

class CityModel extends Model
{
    public function selectAll()
    {
        $this->query = $this->db->prepare("SELECT * FROM  cities ORDER BY city_id ASC");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
