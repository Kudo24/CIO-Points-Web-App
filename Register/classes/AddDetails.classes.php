<?php

class AddDetails extends Dbh
{

    protected function AddInfo($firstname, $middlename, $lastname, $contact_num, $address)
    {
        $stmt = $this->connect()->prepare('UPDATE user set first_name = ?, middle_name = ?, last_name = ?, contact_number = ?, address = ? where first_name is not null;');

        if (!$stmt->execute(array($firstname, $middlename, $lastname, $contact_num, $address))) {
            $stmt = null;
            header("location: ../views/AddDetails.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
