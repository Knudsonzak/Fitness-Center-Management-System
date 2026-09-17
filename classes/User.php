<?php

class User{
    protected string $name;
    protected string $email;

    public function __construct($n, $e)
    {
        $this->name = $n;
        $this->email = $e;
    }

    public function setName($n)
    {
        $this->name = $n;
    }

    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function viewProfile()
    {
        return "Name: $this->name, Email: $this->email";
    }
}

?>
