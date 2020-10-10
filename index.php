<!doctype html>
<html lang="en">
  <head>
    <title>Test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <ul class="nav">
      <!--tips: to change the .nav alignment use .justify-content-center,.justify-content-end or use .flex-column to vertical alignment-->
      <li class="nav-item">
          <a class="nav-link active" href="#">Registration</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="addnewbook.php">Add new copy</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Delete book</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Borrowing</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Returning Book</a>
      </li>
      <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
  </ul>    


  <?php
          if(isset($_POST['search'])){
            $on=$_POST['bookdata'];
            $query = "SELECT * FROM tbl_book WHERE name= '$on' or pbdate='$on' or isbn='$on'";
            $data=mysqli_query($cont,$query);
            if($data){
            $track_data = mysqli_fetch_assoc($data);
            
        ?>
        
        <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Book Information</p>
                                    </div>

    <table class="table table-bordered text-center mt-5">
      <!--<thead>
        <tr>
          <th>Process</th>
          <th>Status</th>
        </tr>
      </thead>-->
      <tbody>
      
        <tr>
          <td class="py-5">Book Name</td>
          <td class="py-5"><?php echo $track_data['name'];?></td>
        </tr>
        <tr>
          <td class="py-5">Publisher Name</td>
          <td class="py-5"><?php echo $track_data['pbname'];?></td>
        </tr>
        <tr>
          <td class="py-5">Author Name</td>
          <td class="py-5"><?php echo $track_data['pbdate'];?></td>
        </tr>
        <tr>
          <td class="py-5">ISBN</td>
          <td class="py-5"><?php echo $track_data['isbn'];?></td>
        </tr>
        <tr>
          <td class="py-5">Edition</td>
          <td class="py-5"><?php echo $track_data['edition'];?></td>
        </tr>
        
      </tbody>
      <?php
      //  }
      ?>
    </table>
            <?php }
            else{  ?>
    <p class="text-center">NO Order Found!</p>
   <?php } 
   }
   ?>

    <form action="" method="post">
                                <div class="container box pb-7">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">User Registration</p>
                                    </div>
                                    <div class="my-6 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Full Name" name="userName" id="userName" autocomplete="off">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="email"  placeholder="Enter Your Email" name="userEmail" id="userEmail" autocomplete="off" >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo" >
                                        <textarea class=""  rows="3" placeholder="Enter Your Address" name="userAdd" id="nameAdd" autocomplete="off" ></textarea>
                                        <span id="userAddMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter Your Number" name="userNum" id="userNum" autocomplete="off">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo" >
                                        <input type="text" placeholder="Enter Street" name="street" id="" >
                                        <span id="userpassMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter Your City" name="city">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter Your age" name="age">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo" >
                                        <input type="Password" placeholder="Enter Your Password" name="userpass" id="userpass" autocomplete="off" >
                                        <span id="userpassMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-Success btnSin px-5 font-weight-bolder mt-3" value="SignUp" name="signup" required>
                                    </div>
                                    
                                </div>
                            </form>

<?php
$databaseHost='localhost';
$databaseName='performence';
$databaseUsername='root';
$databasePassword='';
$cont=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$cont){
	die("Connection failed: ".mysqli_connect_error());
}
else{
 echo"Connected Successfully";
}

if(isset($_POST['signup'])){
	$name=$_POST['userName'];
	$email=$_POST['userEmail'];
	$mobile=$_POST['userNum'];
    $address=$_POST['userAdd'];
    $str=$_POST['street'];
    $city=$_POST['city'];
    $age=$_POST['age'];
	$pass=$_POST['userpass'];
	if($name=="" || $email=="" || $mobile=="" || $address==""  || $str==""  || $city==""  || $age=="" || $pass==""){
		echo "All fields should be filled.Either one or many fields are empty.";
		}

	$inst="INSERT INTO user(name,email,mobile,address,street,city,age,pass) VALUES('$name','$email','$mobile','$address','$str','$city','$age','$pass')"; 
	$data=mysqli_query($cont,$inst);
	if($data == TRUE)
            {
                echo "<script>alert('Data updated successfully..!');window.location='';</script>";   
            }
	else{echo mysqli_error($cont);}
}
?>






  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>