<html>
<head>
<title>EDS Banking: Transaction History</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'nv.php';?>
  <div class="tpsp"></div>
                 <center><h1>Transaction History</h1></center>
                 
               
                    <table cellpadding="0" cellspacing="0">
                      <tr>
               <td>Sender</td>
               <td>Reciever</td>
               <td>Amount</td>
               </tr>
          <?php
          $con = mysqli_connect('localhost','id18309018_user','3t]m2x]uXa^t$Zem','id18309018_cd');
          $selectquery = "select * from rc order by sno desc";
          $query = mysqli_query($con,$selectquery);
          $numofrows = mysqli_num_rows($query);

           while($res = mysqli_fetch_array($query))
          {
            ?>
               <tr>
               <td><?php echo $res['sdr']; ?></td>
               <td><?php echo $res['rcvr']; ?></td>
               <td>₹<?php echo $res['amnt']; ?></td>
               </tr>
             <?php
          }
           ?>
</table><br><br>
</body>
</html>