<center>
<html>
	<head>
		<title>Registration Form</title>
		<style>
				form{
					 background-color:gray;
					 border:2px solid black;
					 margin-left:250px;
					 margin-right:250px;
					 padding-bottom:20px;
					 color:white;
				}
		</style>
	</head>
	<body>
		<form method="POST">
		<h2 style="background-color:lightgray; border:0.2px solid black; border-radius:20px 100px; color:darkorange;">STUDENT REGISTRATION FORM</h2>
		
		Enter your Name: <input name="name"/> <input type="submit" name="edit" value="Edit"/> <br><br> 
		Enter your USN: <input name="usn"/><br><br>
		Enter your MobNo: <input name="mob"/><br><br>
		Enter your Address: <input name="addr"/><br><br>
		Select Gender:  Male<input type="radio" name="gender" value="Male"/>
		Female<input type="radio" name="gender" value="Female"><br><br>
		Select Your Course:
		<select name="course">
			<option value="">Select</option>
			<option value="BCA">BCA</option>
			<option value="BBA">BBA</option>
			<option value="BCom">BCom</option>
			<option value="BSc">BSc</option>
			<option value="BA">BA</option>
			<option value="BPharm">BPharm</option>
			<option value="BE">BE</option>
		</select><br><br>
		<input type="submit" name="insert" value="Insert" style="background-color:lightgreen; border-radius:50px 90px;"/>
		
		</form>
		
		<form method="post">
			<br><input placeholder="Enter Name..." name="name2"/>
			<input type="submit" name="search" value="Search"/>
		</form>
	</body>
</html>

<?php
 $host="localhost";
 $user="root";
 $passwd="";
 $db="clg";
 
 $conn=mysqli_connect($host,$user,$passwd,$db) or die("<h4>Database not connected...</h4>");
 if(isset($_POST['insert']))
 {
	 $name=$_POST['name'];
	 $usn=$_POST['usn'];
	 $mob=$_POST['mob'];
	 $addr=$_POST['addr'];
	 $gender=$_POST['gender'];
	 $course=$_POST['course'];
	 
	 $sql="insert into student values('','$name','$usn','$mob','$addr','$gender','$course')";
	 $result=mysqli_query($conn, $sql);
	 
	 if($result==1)
		 echo "Data inserted successfully";
	 else
		 echo "Data not inserted successfully";
 }
 
 // search code starts from here
 if(isset($_POST['search']))
 {
	 $name=$_POST['name2'];
	 $sql="select *from student where name like '%".$name."%'";
	 $res=mysqli_query($conn, $sql);
	 $count=mysqli_num_rows($res);
	 echo "<br><table border='1px'>
			<tr style='background-color:skyblue'>
				<th>Stud_id</th>
				<th>Name</th>
				<th>USN</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Course</th>
			</tr>";
	if($count>0)
	{
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
				echo "<td>".$row['Stud_id']."</td>";
				echo "<td>".$row['Name']."</td>";
				echo "<td>".$row['USN']."</td>";
				echo "<td>".$row['Mobile']."</td>";
				echo "<td>".$row['Address']."</td>";
				echo "<td>".$row['Gender']."</td>";
				echo "<td>".$row['Course']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "<tr>";
		echo"<td colspan='7'><center>No record found here...</center></td>";
		echo "</tr>";
	}
 }
 
if(isset($_POST['edit']))
{
echo"<html>
	<body>
		<form method='post'><br>
		<input placeholder='Enter USN' name='usn2'/>
		<input placeholder='Edit name...' name='edit'/>
		<input type='submit' name='submit' value='confirm'/>
	</body>
</html>";


	if(isset($_POST['submit']))
	{	
		 $edit=$_POST['edit'];
		 $usn2=$_POST['usn2'];
		 $sql2="update student set name='$edit' where usn='$usn2'";
		 $result=mysqli_query($conn, $sql2);
		 
		 if($result==1)
			 echo "<br>Data edited successfully";
		 else
			 echo "<br>Data not edited successfully";
	}
}
?>

</center>