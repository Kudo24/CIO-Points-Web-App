<?php

class RegisterContr extends Register
{

    private $email;
    private $pwd;
    private $pwdRepeat;
    


    public function __construct($email, $pwd, $pwdRepeat)
    {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }
    public function registerUser()
    {
        if ($this->emptyInput() == false) {

            header("location: ../index.php?error=emptyinputs");
            exit();
        }


        if ($this->invalidEmail() == false) {

            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if ($this->pwdMatch() == false) {

            header("location: ../index.php?error=InvalidPwd");
            exit();
        }

        if ($this->emailTakenCheck() == false) {

            header("location: ../index.php?error=Invaliduser");
            exit();
        }

        if ($this->StrongPwd() == false) {
            header("location: ../index.php?error=PasswordIsWeak");
            exit();
        }

        $this->setUsers($this->pwd, $this->email);
    }
    private function emptyInput()
    {
        $result = true;
        if (
            empty($this->email)  || empty($this->pwd) || empty($this->pwdRepeat)

        ) {

            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail()
    {
        $result = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = true;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function emailTakenCheck()
    {
        $result = true;
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function StrongPwd()
    {
        $result = true;
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
