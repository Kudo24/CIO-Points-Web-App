<?php


class AdminLoginContr extends AdminLogin
{

    private $email;
    private $pwd;

    public function __construct($email, $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function AdminLogin()
    {

        if ($this->emptyInput() == false) {

            header("location: ../index.php?error=emptyinputs");
            exit();
        }

        $this->getAdminUser($this->email, $this->pwd);
        
    }

    private function emptyInput()
    {
        $result = true;

        if (empty($this->email)  || empty($this->pwd)) {
            $result = false;
        }

        return $result;
    }
}
