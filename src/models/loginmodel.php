<?php
class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUser(string $email)
    {
        $userData = [];
        try {
            $query = $this->db->connect()->prepare(
                "SELECT email,password FROM users WHERE email = :email "
            );
            $query->execute([
                ":email" => $email
            ]);
            while ($item = $query->fetch()) {
                $userData["email"] = $item["email"];
                $userData["password"] = $item["password"];
            }
            return $userData;
        } catch (PDOException $e) {
            return [];
        }
    }
}
