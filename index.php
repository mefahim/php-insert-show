<?php
require_once'./Blog.php';
$add=new Blog();
if(isset($_POST['save'])){
$m=$add->insert($_POST);
}

if(isset($_GET['uid'])){
  $id=$_GET['uid'];
  $delete=$add->delete($id);
	
}
if (isset($_POST['updateId'])){
	$up=$add->update($_POST);
}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<title></title>
</head>
<body>
   <div class="row">
   	<div class="col-md-6 offset-md-3 mt-5">
   	  <form action="" method="POST">
   	  	<div class="form-group">
   	  	 <label>Name</label>
   	  	 <input type="text" name="name" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Email</label>
   	  	 <input type="text" name="email" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Mobile</label>
   	  	 <input type="text" name="mobile" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>District</label>
   	  	 <input type="text" name="district" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Status</label>
   	  	 <select name="status" class="form-control">
   	  	 	<option value="1">--Select Option--</option>
   	  	 	<option value="1">Active</option>
   	  	 	<option value="2">Inactive</option>
   	  	 </select>
   	  	</div>
   	  	<div>
   	  	 <button class="form-control btn btn-success text-white mt-3" name="save">Submit</button>
   	  	</div>
   	  </form>	
   	</div>
   </div>

<div class="row">
 <div class="col-md-6 offset-md-3 mt-5">
   <table class="table table-striped">
   	 <tr>
   	 	<th>#SL No</th>
   	 	<th>Name</th>
   	 	<th>Email</th>
   	 	<th>Mobile</th>
   	 	<th>District</th>
   	 	<th>Status</th>
   	 	<th>Action</th>
   	 </tr>
   	 <?php
      $show=$add->view();
      while($data=$show->fetch_assoc()){
      	echo '<tr>
      	    <th>'.$data["id"].'</th>
	   	 	<th>'.$data["name"].'</th>
	   	 	<th>'.$data["email"].'</th>
	   	 	<th>'.$data["mobile"].'</th>
	   	 	<th>'.$data["district"].'</th>
	   	 	<th>'.$data["status"].'</th>
	   	 	<th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit1'.$data['id'].'"><i class="fa-solid fa-pen-to-square"></i>
            </button>
	   	 	<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete1'.$data["id"].'"><i class="fa-solid fa-trash"></i>
            </button></th>
	      	</tr>';

	  ?>
<!-- Modal -->
<div class="modal fade" id="delete1<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
      </div>
      <div class="modal-body">
        Are you sure delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
       <form method="GET">
        <button type="submit" name="uid" value="<?php echo $data['id'] ?>" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit1<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal"
         aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="row">
   	<div class="col-md-6 offset-md-3 mt-3">
   	  <form action="" method="POST">
   	  	<div class="form-group">
   	  	 <label>Name</label>
   	  	 <input type="hidden" name="id" value="<?php echo $data['id']?>" class="form-control">
   	  	 <input type="text" name="name" value="<?php echo $data['name']?>" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Email</label>
   	  	 <input type="text" name="email" value="<?php echo $data['email']?>" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Mobile</label>
   	  	 <input type="text" name="mobile" value="<?php echo $data['mobile']?>" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>District</label>
   	  	 <input type="text" name="district" value="<?php echo $data['district']?>" class="form-control">
   	  	</div>
   	  	<div class="form-group">
   	  	 <label>Status</label>
   	  	 <select name="status" class="form-control">
             <?php
              if ($data['status']==1) {
              	echo '<option value="1">Active</option>';
              }
              else if($data['status']==2){
              	echo '<option value="2">Inative</option>';
              }
             ?>
   	  	 	<option value="1">--Select Option--</option>
   	  	 	<option value="1">Active</option>
   	  	 	<option value="2">Inactive</option>
   	  	 </select>
   	  	</div>
   	  	<div>
   	  	 <button type="submit" name="updateId" value="<?php echo $data['id'] ?>" class="btn btn-success btn-block">Update</button>
   	  	</div>
   	  </form>	
   	</div>
   </div>
    </div>
    </div>
  </div>
</div>

<?php

      }

   	 ?>
   </table>
 </div>	
</div>













</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"
    integrity="sha512-9GacT4119eY3AcosfWtHMsT5JyZudrexyEVzTBWV3viP/YfB9e2pEy3N7WXL3SV6ASXpTU0vzzSxsbfsuUH4sQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="<script src=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"
    integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</html>