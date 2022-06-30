<?php 

require_once '../../Models/Election_model.php';
require_once '../../Controllers/DBController.php';
class Election_controller{
    protected $db;
    public function getElections()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT * FROM `election` ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    
    public function addElection(Election_model $election)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            
            $qry="insert into  `election`(`Id`, `Name`, `EndDate`, `AdminId`)  values ('$election->id','$election->Name','$election->EndDate','$election->AdminId')";
            return $this->db->insert($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function deleteElection($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $qry="DELETE FROM `election` WHERE Id ='$id' ";
            return $this->db->delete($qry);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
   
    public function selectallElection(){
      $this->db=new DBController;
      if($this->db->openConnection()){
          $qry="SELECT * FROM `election`";
          return $this->db->select($qry);
      }
      else
      {
          echo "Error in Database Connection";
      return false;  
      }
  }
  public function updateCandidate(Election_model $election){
   $this->db=new DBController;
   if($this->db->openConnection())
   {
     $query="UPDATE `election` SET  `Name`=`$election->Name',`EndDate`='$election->EndDate' WHERE `Id`='$election->id' "; 
      return $this->db->update($query);
   }
   else{
       echo "Error in Database Connection";
       return false; 
   }
}
public function electionbrows($id){
   $this->db=new DBController;
   if($this->db->openConnection()){
       $qry="SELECT * FROM `election` WHERE Id='$id'";
       return $this->db->select($qry);
   }
   else
   {
       echo "Error in Database Connection";
   return false;  
   }
}
public function selelectcandidate($id)
{
     $this->db=new DBController;
     if($this->db->openConnection())
     {
        $query="SELECT * FROM `candidate` WHERE ElectionId ='$id' ";
        return $this->db->select($query);
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }

}
  
}

?>