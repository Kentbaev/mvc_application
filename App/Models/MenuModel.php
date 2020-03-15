<?php

namespace App\Models;

use App\Core\Model;

class MenuModel extends Model
{
    public function mainMenu()
    {
        $this->query = $this->db->prepare("SELECT * FROM main_menu");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

