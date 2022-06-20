<?php

class AdminLogin extends Dbh
{

    protected function getAdminUser($email, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT password from user where email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
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
            $stmt = $this->connect()->prepare("SELECT role.role_id, user.first_name, user.last_name,user.email, user.password, role.is_admin from user RIGHT JOIN role ON role.user_id = user.user_id WHERE role.is_admin = 'yes' and user.email = ? and user.password = ?;");

            if (!$stmt->execute(array($email, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=Adminnotfound");
                exit();
            }

            $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['adminid'] = $admin[0]['role_id'];
            $_SESSION['adminfirstname'] = $admin[0]['first_name'];
        }
        $stmt = null;
    }
}
