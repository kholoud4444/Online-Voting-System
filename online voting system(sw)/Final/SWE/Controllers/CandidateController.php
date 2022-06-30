<?php 

require_once '../../Models/Candidate.php';
require_once '../../Controllers/DBController.php';
class CandidateController{
    protected $db;
    
    public function getCandidates()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select *  from candidate ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }

    }
    public function addCandidate(Candidate $candidate)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
             $query="INSERT INTO `candidate`( `ElectionId`, `FirstName`, `LastName`, `Photo`) VALUES (  '$candidate->ElectionId' ,'$candidate->FirstName' ,'$candidate->LastName', '$candidate->Photo' )";
             return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }  
    }
   

    public function updateCandidate(Candidate $candidate){
        $this->db=new DBController;
        if($this->db->openConnection())
        {
          $query="UPDATE  `candidate` SET `FirstName`='$candidate->FirstName',`lastname`='$candidate->LastName' ,`ElectionId`='$candidate->ElectionId' "; 
           return $this->db->update($query);
        }
        else{
            echo "Error in Database Connection";
            return false; 
        }
    }
  

    public function deleteCandidate($id){
        $this->db=new DBController;
        if($this->db->openConnection()){
            $qry="DELETE FROM `candidate` WHERE id='$id'";
            return $this->db->delete($qry);
        }
        else
        {
            echo "Error in Database Connection";
             return false;

        }
    }

}