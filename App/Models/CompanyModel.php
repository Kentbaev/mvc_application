<?php

namespace App\Models;

use App\Core\Model;

class CompanyModel extends Model
{
    public function selectAll()
    {
        $this->query = $this->db->prepare("SELECT * FROM companies CROSS JOIN cities WHERE companies.city_id = cities.city_id ORDER BY company_id ASC");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert($company_name ,$company_address ,$city_id)
    {
        $this->query = $this->db->prepare("INSERT INTO companies(company_name, company_address, city_id) VALUES (:company_name,:company_address, :city_id)");
        $this->query->execute([':company_name' => $company_name ,':company_address' => $company_address ,':city_id' => $city_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($company_id)
    {
        $this->query = $this->db->prepare("DELETE FROM companies WHERE company_id=:company_id");
        $this->query->execute([':company_id' => $company_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($company_id, $company_name, $company_address, $city_id)
    {
        $this->query = $this->db->prepare("UPDATE companies SET company_name=:company_name, company_address=:company_address,city_id=:city_id WHERE company_id=:company_id");
        $this->query->execute([':company_name' => $company_name, ':company_address' => $company_address, ':city_id' => $city_id, ':company_id' => $company_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

}
