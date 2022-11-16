<?php
class User {
    private int $id;
    private mysqli $db;
    private string $login;
    private string $password;
    private string $firstname;
    private string $lastname;

    public function __construct(string $login, string $password) {
        $this->login = $login;
        $this->password = $password;
        $this->firstname = "";
        $this->lastname = "";
        global $db;
        $this->db = &$db;
    }

    public function register() :bool {
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $db = new mysqli('localhost', 'root', '', 'uzytkownicy');
        $preparedQuery = $db->prepare($query); 
        $preparedQuery->bind_param('ssss', $this->login, $passwordHash, 
                                            $this->firstname, $this->lastname);
       $result = $preparedQuery->execute();
       return $result;
    }
    
    public function login() : bool {
        $query = "SELECT * FROM user WHERE login = ? LIMIT 1";
        $preparedQuery = $this->db->prepare($query); 
        $preparedQuery->bind_param('s', $this->login);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $passwordHash = $row['password'];
            if(password_verify($this->password, $passwordHash)) {
                $this->id = $row['id'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function setfirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    public function setlastname(string $lastname) {
        $this->lastname = $lastname;
    }
    public function getname() : string {
        return $this->firstname . " " . $this->lastname;
    }
}
?>