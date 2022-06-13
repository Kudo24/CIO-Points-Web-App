<?php


class Register extends Dbh
{
    protected function setUsers($pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO user (password, email) values (?,?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute([$hashedPwd, $email])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT user_id FROM user Where email = ?;');
        $resultCheck = true;

        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }

        return $resultCheck;
    }
}
