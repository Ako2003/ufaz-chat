<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<?php include_once "main.php"; ?>
<body>
  <div class= "body">
    <div class="users">
      <div class="content">
        <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id != {$_SESSION['unique_id']}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
        <img id="profil_img"src="/php/images/<?php echo $row['img']; ?>" alt="image">
        <span id="info"><?php echo $row['fname']. " " .$row['lname']?></span>
        <a href="php/follow.php?follower_id=<?php echo $row['unique_id']; ?>" id="follow" onclick="follow">follow</a>
      </div>
      <section class="img">

      </section>
    </div>
  </div>
  <script src="javascript/follow.js"></script>
  <script src="javascript/page-images.js"></script>
</body>
</html>