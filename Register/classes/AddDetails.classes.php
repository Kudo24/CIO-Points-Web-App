<?php

class AddDetails extends Dbh
{
    protected function AddInfo($firstname, $middlename, $lastname, $contact_num, $address)
    {
        $stmt = $this->connect()->prepare('UPDATE user SET first_name = ?, middle_name = ?, last_name = ?, contact_number = ?, ADDRESS = ? WHERE first_name IS NOT NULL;');

        if (!$stmt->execute([$firstname, $middlename, $lastname, $contact_num, $address])) {
            $stmt = null;
            header("location: ../views/AddDetails.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
