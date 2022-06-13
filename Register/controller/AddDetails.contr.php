<?php

class AddDetailsContr extends AddDetails
{

    private $firstname;
    private $middlename;
    private $lastname;
    private $contact_num;
    private $address;

    public function __construct($firstname, $middlename, $lastname, $contact_num, $address)
    {

        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->contact_num = $contact_num;
        $this->address = $address;
    }


    public function AddDetails()
    {
        if ($this->emptyInput() == false) {

            header("location: ../index.php?error=emptyinputs");
            exit();
        }

        $this->AddInfo($this->firstname, $this->middlename, $this->lastname, $this->contact_num, $this->address);
    }

    private function emptyInput()
    {
        $result = true;
        if (
            empty($this->firstname)  ||
            empty($this->middlename) ||
            empty($this->lastname ||
                empty($this->contact_num)) ||
            empty($this->address)

        ) {

            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
