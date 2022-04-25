<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: page.php");
  }
?>

<?php include_once "main.php"; ?>
<body>
  <div class="acc_page">
    <header class="my-acc">
    <?php
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
      if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
      }
    ?>
      <img id="acc_img"src="/php/images/<?php echo $row['img']; ?>" alt="image">
      <span id="nick_name"><?php echo $row['fname']. " " .$row['lname']?></span>
    </header>
      <section class="acc_images">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <input name="image_uploads" id="image_uploads" class="upload_file" type="file" accept="image/x-png,image/jpeg,image/jpg">
        <input type="submit" name="submit" value="Share" class="share">
      </form>
    </section>
      <section class="images"></section>
  </div>

  <script src="javascript/share.js"></script>
</body>
</html>