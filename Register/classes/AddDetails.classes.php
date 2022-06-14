<?php

class AddDetails extends Dbh
{
    protected function AddInfo($firstname, $middlename, $lastname, $contact_num, $address)
    {
        $stmt = $this->connect()->prepare("UPDATE user SET first_name = ?, middle_name = ?, last_name = ?, contact_number = ?, ADDRESS = ? WHERE first_name = 'empty' ;");

        if (!$stmt->execute([$firstname, $middlename, $lastname, $contact_num, $address])) {
            $stmt = null;
            header("location: ../views/AddDetails.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }



    protected function IsLogin($firstname, $middlename, $lastname)
    {
        $stmt = $this->connect()->prepare('SELECT * from user where first_name = ? and middle_name = ? and last_name = ?;');
        if (!$stmt->execute([$firstname, $middlename, $lastname])) {
            $stmt = null;
            header("location: ../views/AddDetails.php?error=NotLogin");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['userid'] = $user[0]['user_id'];
        $_SESSION['firstname'] = $user[0]['first_name'];

        $stmt = null;
    }
}
