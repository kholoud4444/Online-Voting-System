<?php 
require_once '../../Controllers/DBController.php';
require_once '../../Models/Voter.php';

class VoterController
{
    protected $database;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function addvoter(Voter $voter){
     $this->database=new DBController;
       if($this->database->openConnection()){
       $qry="INSERT INTO `voter`( `FirstName`, `LastName`, `Password`, `Photo`) VALUES ('$voter->FirstName','$voter->LastName','$voter->password','$voter->photo')";
       return $this->database->insert($qry);
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }



    }
    public function selectallvoter(){
        $this->database=new DBController;
        if($this->database->openConnection()){
            $qry="SELECT * FROM `voter`";
            return $this->database->select($qry);
        }
        else
        {
            echo "Error in Database Connection";
        return false;  
        }
    }
    public function deletevoter($voterid){
        $this->database=new DBController;
        if($this->database->openConnection()){
            $qry="DELETE FROM `voter` WHERE id='$voterid'";
            return $this->database->delete($qry);
        }
        else
        {
            echo "Error in Database Connection";
             return false;

        }
    }
   
    
}

?>