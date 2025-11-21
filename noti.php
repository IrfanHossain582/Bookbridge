<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row justify-content-end">
      <div class="col-auto">
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary" style="background-color: orange;" data-bs-toggle="modal" data-bs-target="#notificationModal">
          Show Notifications
        </button>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="box-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
            <?php
            include 'config.php';
            $select_products = mysqli_query($conn, "SELECT * FROM `notification` ORDER BY notification_id DESC LIMIT 2") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
                    <form action="" method="post" class="box" style="background-color: #F2F3F4; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); transition: all 0.3s;">
                        <div class="name" style="font-size: 24px; font-weight: bold; margin-bottom: 10px;"><?php echo $fetch_products['notification_name']; ?></div>
                        <div class="details" style="font-size: 18px;color: #D35400; margin-bottom: 20px;"><?php echo $fetch_products['details']; ?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['notification_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['details']; ?>">
                        <input type="hidden" name="notification_id" value="<?php echo $fetch_products['notification_id']; ?>">
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty" style="text-align: center;">No notifications found.</p>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
