<?php

class UserLogin extends Dbh
{

    protected function getUser($email, $pwd)
    {

        $stmt = $this->connect()->prepare('SELECT password from user where email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfoundttt");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]['password']);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $pwd = $pwdHashed[0]['password'];
            $stmt = $this->connect()->prepare('SELECT * from user where email = ? and password = ?;');

            if (!$stmt->execute(array($email, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfoundssss");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $user[0]['user_id'];
            $_SESSION['firstname'] = $user[0]['first_name'];
        }
        $stmt = null;
    }
}
