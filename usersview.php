<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">


.tablewrap {
      
    margin: 20px; 
    padding: 20px;
    border: solid 5px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
   
    padding: 15px;
}


input[type=text] {
    width:60%;
    padding: 12px 20px;
    margin:  10px 0 ;
}
label {
         font-size :14px ;
         color : solid black;
         text-align: right;
         width: 140px;
      
}
     



</style>

}

</style>
</head>
<body>
<div class="menu">
   <?php include 'homepage.php';?>
</div>
<div
        style="margin-right: 50px; margin-left: 50px; border: solid 5px; background: grey;">
  
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "monis";
        $dbname = "m4schema";
        $email ="" ;
        // Create connection

        $con=mysqli_connect($servername, $username, $password, $dbname);
        // Check connection

        // Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM CP_TB_USER");
    
        echo "<table  id='myTable'   align='center'  border='1' bgcolor='#e0e0eb'  td.my-cell { padding:100px; }   >
        <caption><h3>Users List </h3></caption>
        <tr> 
          <th>FIRST NAME</th>
          <th>LAST NAME </th>
          <th>USER NAME </th>
          <th>GENDER</th>
          <th>EMAIL </th>
          <th>USER TYPE </th>
          <th>DELETE </th>
          <th>SEND EMAIL</th>
          </tr>" ;

          while($row = mysqli_fetch_array($result))
              {
              echo "<tr>";
              echo "<td >" . $row['FIRST_NAME'] . "</td>";
              echo "<td>" . $row['LAST_NAME'] . "</td>";
              echo "<td>" . $row['USER_NAME'] . "</td>";
              echo "<td>" . $row['GENDER'] . "</td>";
              echo "<td>" . $row['EMAIL'] . "</td>";
              echo "<td>" . $row['USER_TYPE'] . "</td>";

      ?>
              <td><button onclick="deleteRow(this)">DEL</button></td>
              <td style="text-align: center; vertical-align: middle;"  >
              <input type="checkbox" name="CHECKMAIL"  style = "width:20px;height:20px;padding:0px"/>&nbsp;</td>

              
      <?php



             // echo ((isset(. $row['EMAIL'] .)?implode(", ", . $row['EMAIL'] .):"");
              echo "</tr>";

              }
        
              echo "</table>";
      ?> 
              <br>
             <td>
              <button style= " width:150px;font-size:13pt; border:3px solid green ;float: right"; onclick="myPrintFunction()">Print this page</button>
              
              <button style="width:150px;font-size:13pt; border:3px solid blue ;float: right" " onclick="selectemail()">send bulk email</button>
                </td>

              <br>
               <br>
        
     </div>   
     </body>
   


            <form method="post" action="mailbulk.php">
                <div style="margin-right: 50px; margin-left: 50px;
                       border: solid 5px;
                       background: grey;">
                    <label> To : </label> 
                     <input name="email" type="text"   />
                    <br>
                    <label>Subject: </label>
                    <input name="subject" type="text" />
                    <br>
                    <label>Message:</label>
                    <input name="comment" type="textarea"rows="5" cols="80" >
                     <button style="width:100px;font-size:13pt;padding:2px; border:3px solid grey ;  onclick="myPrintFunction()">Submit</button>
              </div> 
             </form>
  <script>

        function deleteRow(btn) {
          var row = btn.parentNode.parentNode;
          row.parentNode.removeChild(row);
        }

        function myPrintFunction() {
            window.print();
        }

       
    </script>


        <?php
        mysqli_close($con);
        ?>
 </html>           
   