<?php
class User {
    private int $id;
    private string $login;
    private string $password;
    private string $firstname;
    private string $lastname;

    public function __construct(string $login, string $password) {
        $this->login = $login;
        $this->password = $password;
        $this->firstname = "";
        $this->lastname = "";
    }

    public function register() {
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $db = new mysqli('localhost', 'root', '', 'uzytkownicy');
        $preparedQuery = $db->prepare($query); 
        $preparedQuery->bind_param('ssss', $this->login, $passwordHash, 
                                            $this->firstname, $this->lastname);
        $preparedQuery->execute();
    }
}

?>