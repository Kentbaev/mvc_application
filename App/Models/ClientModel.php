<?php

namespace App\Models;

use App\Core\Model;

class ClientModel extends Model
{
    public function clientsList()
    {
        $this->query = $this->db->prepare("SELECT * FROM clients CROSS JOIN professions,companies WHERE clients.profession_id = professions.profession_id AND clients.company_id = companies.company_id ORDER BY client_id ASC");
        $this->query->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function clientCard($client_id)
    {
        $this->query = $this->db->prepare("SELECT * FROM clients WHERE `client_id` = :client_id");
        $this->query->execute([':client_id' => $client_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert($client_full_name ,$client_email ,$client_phone_number ,$company_id ,$profession_id)
    {
        $this->query = $this->db->prepare("INSERT INTO clients(client_full_name, client_email, client_phone_number, company_id, profession_id) VALUES (:client_full_name,:client_email, :client_phone_number, :company_id, :profession_id)");
        $this->query->execute([':client_full_name' => $client_full_name ,':client_email' => $client_email ,':client_phone_number' => $client_phone_number ,':company_id' => $company_id ,':profession_id' => $profession_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($client_id)
    {
        $this->query = $this->db->prepare("DELETE FROM clients WHERE `client_id` = :client_id");
        $this->query->execute([':client_id' => $client_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($client_id, $client_full_name, $client_email, $client_phone_number, $company_id, $profession_id)
    {
        $this->query = $this->db->prepare("UPDATE clients SET client_full_name=:client_full_name, client_email=:client_email,client_phone_number=:client_phone_number,company_id=:company_id,profession_id=:profession_id WHERE client_id=:client_id");
        $this->query->execute([':client_id' => $client_id, ':client_full_name' => $client_full_name, ':client_email' => $client_email, ':client_phone_number' => $client_phone_number,':company_id' => $company_id, ':profession_id' => $profession_id]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}