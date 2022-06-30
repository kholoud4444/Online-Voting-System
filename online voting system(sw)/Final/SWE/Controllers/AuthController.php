<?php 

require_once '../../Models/Admin.php';
require_once '../../Controllers/DBController.php';
class AuthController
{
    protected $db;
    public function login(Voter $voter)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="SELECT * FROM `voter` WHERE Id=$voter->Id and Password	=$voter->password";//good
            $result=$this->db->select($query);//good
            if($result===false)
            {
                echo "Error in Query";
                return false;
            }
            else
            {
                
                session_start();
                $_SESSION["userId"]=$result[0]["Id"];
                $_SESSION["voterpass"]=$result[0]["Password"];
                if($result[0]["roleId"]==1)
                {
                    $_SESSION["userRole"]="Admin";
                }
                else
                {
                    $_SESSION["userRole"]="Voter";
                }
                $this->db->closeConnection();
                return true;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }

    
}

?>