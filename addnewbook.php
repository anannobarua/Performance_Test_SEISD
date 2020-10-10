
 
    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Delete Book Information</p></div>
    <form action="" method="post">
    
                <input class="form-control mr-sm-2" type="text" name="isbn" placeholder="Enter ISBN NUmber">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="delete" >Delete Book</button>
    </form>
    <form action="" method="post">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">ADD BOOK</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Book Name" name="bookName" id="userName" autocomplete="off">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Publisher name" name="pbname"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
        
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Author Name" name="pbdate" >
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Subject Name" name="sub" >
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo" >
                                        <input type="text" placeholder="Enter editin" name="edition" id="" >
                                        <span id="userpassMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter ISBN number" name="isbn">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter Number of copieees" name="ncopy">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="ADD book" name="add" required>
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


          if(isset($_POST['delete'])){
            $on1=$_POST['isbn'];
            $query1 = "DELETE FROM book WHERE isbn='$on1'";
            $data=mysqli_query($cont,$query1);
            if($data == TRUE)
            {
                echo "<script>alert('Data Deleted successfully..!');window.location='';</script>";   
            }
	else{echo mysqli_error($cont);}
            
        
        }
            
        

if(isset($_POST['add'])){
	$name=$_POST['bookName'];
	$pbname=$_POST['pbname'];
    $pbdate=$_POST['pbdate'];
    $sub=$_POST['sub'];
    $edition=$_POST['edition'];
    $isbn=$_POST['isbn'];
    $ncopy=$_POST['ncopy'];
    
	if($name=="" || $pbname=="" || $pbdate=="" || $edition==""  || $isbn==""  || $ncopy=="" || $sub==""  ){
		echo "All fields should be filled.Either one or many fields are empty.";
		}
else{
	$inst="INSERT INTO book(name,pbname,pbdate,sub,edition,isbn,ncopy) VALUES('$name','$pbname','$pbdate','$sub','$edition','$isbn','$ncopy')"; 
	$data=mysqli_query($cont,$inst);
	if($data == TRUE)
            {
                echo "<script>alert('Data updated successfully..!');window.location='';</script>";   
            }
	else{echo mysqli_error($cont);}
}
}
?>

 