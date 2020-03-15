<?php

namespace App\Models;

use App\Core\Model;

class ProductModel extends Model
{
    protected $count;
    
    public function productCount()
    {
        $this->query = $this->db->prepare("SELECT COUNT(*) FROM products");
        $this->query->execute();
        $this->count = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->count = ceil($this->count[0]['COUNT(*)'] / 4);
    }

    public function selectAll()
    {
        $this->query = $this->db->prepare("SELECT * FROM products ORDER BY product_id ASC");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function select($from)
    {
        $this->query = $this->db->prepare("SELECT * FROM products ORDER BY product_id ASC LIMIT " . $from . ",4 ");
        $this->query->execute();
        $rows = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        $result = ['count' => $this->count, 'rows' => $rows];
        return $result;
    }

}
