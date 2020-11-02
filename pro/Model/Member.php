<?php
namespace Phppot;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

  
    public function isUsernameExists($username)
    {
        $query = 'SELECT * FROM tbl_member where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

  
    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM tbl_member where email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    public function registerMember()
    {
        $isUsernameExists = $this->isUsernameExists($_POST["username"]);
        $isEmailExists = $this->isEmailExists($_POST["email"]);
        if ($isUsernameExists) {
            $response = array(
                "status" => "error",
                "message" => "Użytkownik o takiej nazwie już istnieje."
            );
        } else if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Użytkownik o takim adresie e-mail już istnieje."
            );
        } else {
            if (! empty($_POST["signup-password"])) {

                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }

         

            $query = 'INSERT INTO tbl_member (type_of_user,avatar, username, password, email, nip, company, adress, mobile) VALUES ("customer", "'.$this->ds->avatar.'", ?, ?, ?, ?, ?, ?, ?)';
            $paramType = 'sssssss';
            $paramValue = array(
                $_POST["username"],
                $hashedPassword,
                $_POST["email"],
                $_POST["nip"],
                $_POST["company"],
                $_POST["adress"],
                $_POST["mobile"]
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "Zarejestrowałeś się pomyślnie"
                );
            }
        }
        return $response;
    }












    public function updateMember()
    {

       

        $memberRecord = $this->getMember($_SESSION["username"]);




            $query = 'UPDATE tbl_member SET avatar = ?, email = ?, nip = ?, company  = ?, adress = ?, mobile = ? WHERE id_user= "'.$memberRecord[0]["id_user"].'"';
            $paramType = 'ssssss';
            $paramValue = array(
                $_POST["avatar"],
                $_POST["email"],
                $_POST["nip"],
                $_POST["company"],
                $_POST["adress"],
                $_POST["mobile"]
            );

            
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "Zaktualizowałeś swój profil pomyślnie"
                );

            }
            



            
            session_write_close();
        }
    
    
    














    public function getMember($username)
    {
        $query = 'SELECT * FROM tbl_member where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        
        return $memberRecord;
    }

   
    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["username"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            
            session_start();
            $_SESSION["id_user"] = $memberRecord[0]["id_user"];
            $_SESSION["username"] = $memberRecord[0]["username"];
            $_SESSION["email"] = $memberRecord[0]["email"];
            $_SESSION["nip"] = $memberRecord[0]["nip"];
            $_SESSION["company"] = $memberRecord[0]["company"];
            $_SESSION["adress"] = $memberRecord[0]["adress"];
            $_SESSION["mobile"] = $memberRecord[0]["mobile"];
            $_SESSION["status"] = $memberRecord[0]["status"];



            $_SESSION["avatar"] = $memberRecord[0]["avatar"];
            $_SESSION["type_of_user"] = $memberRecord[0]["type_of_user"];


            session_write_close();
            $url = "./home.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Błędna nazwa użytkownika lub błędne hasło";
            return $loginStatus;
        }
    }




  



    




}
