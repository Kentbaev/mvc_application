<?php

namespace App\Models;

use App\Core\Model;

class UserModel extends Model
{
    public function userAuth($user_login, $user_password)
    {
        $this->query = $this->db->prepare("SELECT user_role FROM users WHERE user_login = :user_login AND user_password = :user_password");
        $this->query->execute([':user_login' => $user_login,':user_password' => $user_password]);
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

