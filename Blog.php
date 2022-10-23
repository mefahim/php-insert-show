<?php
Class Blog{
	private $con;
	function __construct(){
		$this->con=new mysqli("localhost","root","","employee");
	}
	function insert($data){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$district=$_POST['district'];
		$status=$_POST['status'];
        if (empty($name)) {
        	echo '<span class="alert alert-danger">Name is required</span>';
        }
         if (empty($email)) {
         echo '<span class="alert alert-danger">Email is required</span>';
        }
        if (empty($mobile)) {
        	echo '<span class="alert alert-danger">Mobile is required</span>';
        }
         if (empty($district)) {
         echo '<span class="alert alert-danger">District is required</span>';
        }
        else{
		$result=$this->con->query("INSERT INTO tbl_info1(name,email,mobile,district,status)VALUES('$name','$email','$mobile','$district','$status')");
		   if ($result) {
		   	 echo "data save";
		   }
		   else{
		   	echo "not save";
		   }
         }
	}
    function view(){
    	$result=$this->con->query("SELECT *FROM tbl_info1");
    	return $result;
    }

    function delete($id){
    	$delete=$this->con->query("DELETE FROM tbl_info1 WHERE id='$id'");
    	return $delete;
    }

    function update($data){
    	 $id = $data['id'];
    	$name=$_POST['name'];
    	$email=$_POST['email'];
    	$mobile=$_POST['mobile'];
    	$district=$_POST['district'];
    	$status=$_POST['status'];
    	$update=$this->con->query("UPDATE tbl_info1 SET name='$name', email='$email',mobile='$mobile',district='$district',status='$status' WHERE id='$id' ");

    	 if ($update) {
            header("location: index.php");
         }
    
    }


}




?>