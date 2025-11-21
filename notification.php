<?php
include 'config.php';

session_start();

$user_id = $_SESSION['Customer_ID'];

if (!isset($user_id)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>NOTIFICATION</h3>
        <p><a href="home.php"></a></p>
    </div>

    

    

    <section class="products" style="padding: 20px; background-color: #f9f9f9;">

<h1 class="title" style="text-align: center; margin-bottom: 30px;">Notification</h1>

<div class="box-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">

    <?php
    $select_products = mysqli_query($conn, "SELECT * FROM `notification` ") or die('query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
    ?>
            <form action="" method="post" class="box" style="background-color: #F2F3F4  ; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); transition: all 0.3s;">
                
                <div class="name" style="font-size: 24px; font-weight: bold; margin-bottom: 10px;"><?php echo $fetch_products['notification_name']; ?></div>
                <div class="details" style="font-size: 18px;color: #D35400 ; margin-bottom: 20px;"><?php echo $fetch_products['details']; ?></div>

                <input type="hidden" name="product_name" value="<?php echo $fetch_products['notification_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['details']; ?>">
                <input type="hidden" name="notification_id" value="<?php echo $fetch_products['notification_id']; ?>">

               
            </form>
    <?php
        }
    } else {
        echo '<p class="empty" style="text-align: center;">No authors added yet!</p>';
    }
    ?>
</div>

</section>


   
        <?php include 'footer.php'; ?>
        <!-- custom js file link  -->
        <script src="js/script.js"></script>
   

</body>

</html>

