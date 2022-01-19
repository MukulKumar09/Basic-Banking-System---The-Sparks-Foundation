<html>
<head>
<title>EDS Banking: All Customers</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'nv.php';?>
  <div class="tpsp"></div>
                 <center><h1>Accounts</h1></center>
                 
                    <table cellpadding="0" cellspacing="0">
                      <tr>
               <td>ID</td>
               <td>NAME</td>
               <td>EMAIL</td>
               <td>BALANCE</td>
              <td></td>
               </tr>
          <?php
          $con = mysqli_connect('localhost','id18309018_user','3t]m2x]uXa^t$Zem','id18309018_cd');
          $selectquery = " select * from bs";
          $query = mysqli_query($con,$selectquery);
          $numofrows = mysqli_num_rows($query);

           while($res = mysqli_fetch_array($query))
          {
            ?>
               <tr>
               <td><?php  echo $res['id']; ?></td>
               <td><?php echo $res['name']; ?></td>
               <td><?php echo $res['email']; ?></td>
               <td>₹<?php echo $res['bal']; ?></td>
              <td><button onclick="window.location.href='send.php?accnum=<?php  echo $res['id']; ?>'" >Transfer Money</button></td>
               </tr>
             <?php
          }
           ?>
</table><br><br>
</body>
</html>


    



















