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
    }
}
?>