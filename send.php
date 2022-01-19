<html>
<head>
<title>EDS Banking: Fund Transfer</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'nv.php';?>
  <div class="tpsp"></div>
<form method="POST">                                                
 <?php
$con = mysqli_connect('localhost','id18309018_user','3t]m2x]uXa^t$Zem','id18309018_cd');
$ids=$_GET['accnum'];
$showquery="select * from `bs` where id=($ids) ";
$showdata=mysqli_query($con,$showquery);
if (!$showdata) {
  printf("Error: %s\n", mysqli_error($con));
  exit();
}
$arrdata=mysqli_fetch_array($showdata);

?> 
                     
                    <center>
                     <h1>Fund Transfer</h1>
                     <div class="box">
                     <h3>Recipient</h3>
                        <label>Name:</label>
                        <input type="text"  name="name2" value=""><br><br>
                        <label>Email:</label>
                        <input type="text" name="email2" value=""><br><br>

                    <h3>Amount</h3>
                        <?php echo $arrdata['name']."<br><font size=\"2px\">".$arrdata['email']."</font><br><br>Current Balance: ₹".$arrdata['bal']; ?>

                        <br><br>
                        <input type="text"  name="name1" value="<?php echo $arrdata['name']; ?>" style="display: none;">
                        <input type="text" name="email1" value="<?php echo $arrdata['email']; ?>" style="display: none;">
                        <label>Amount: ₹</label>
                        <input type="text" name="bal1" style="margin:none;padding:none;border:none;border-bottom: 1px solid #aaa;font-size:15px;"><br><br>
                   <button  name="submit">Transfer</button><br><br>
                   </form> 
<?php
if(isset($_POST['submit']))
{
    $Sender_name=$_POST['name1'];
    $Sender_email=$_POST['email1'];
    $Sender=$_POST['bal1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_email=$_POST['email2'];
     
  

    $ids=$_GET['accnum'];
    $senderquery="select * from `bs` where id=$ids";
    $senderdata=mysqli_query($con,$senderquery);
  
    // if (!$senderdata) {
    //  printf("Error: %s\n", mysqli_error($con));
    // exit();
    // }

    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="select * from `bs` where email='$Receiver_email' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    // if (!$receiver_data) {
    // printf("Error: %s\n", mysqli_error($con));
    // exit();
    // }

    $receiver_arr=mysqli_fetch_array($receiver_data);

    $id_receiver=$receiver_arr['id'];

    if($arrdata['bal'] >= $Sender)
    {
      $decrease_sender=$arrdata['bal'] - $Sender;
      $increase_receiver=$receiver_arr['bal'] + $Sender;
       $query="UPDATE `bs` SET `id`=$ids,`bal`= $decrease_sender  where `id`=$ids ";
       $rec_query="UPDATE`bs` SET `id`=$id_receiver,`bal`= $increase_receiver where `id`=$id_receiver ";
       $res= mysqli_query($con,$query);
       $rec_res= mysqli_query($con,$rec_query);

       //echo "Sender: ".$Sender_name."<br>Receiver: ".$Receiver_name."<br>Amount: ".$Sender;
        $sql = "INSERT INTO rc (sdr, rcvr, amnt)
        VALUES ('$Sender_name', '$Receiver_name', '$Sender')";
        $rcd=mysqli_query($con,$sql);


       //$res_receiver=mysqli_query($con,$query_receiver);
       echo "<script>window.location.href='accounts.php';</script>";
     }
   }
  ?>
</center>
</body>
</html>