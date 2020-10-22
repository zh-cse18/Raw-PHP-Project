<?php include 'inc/header.php';?>

    <main bg-color>
          
      <!-- banner-start -->
        <?php
              $query = "select * from title_slogan";
              $getDate = $db->select($query);
              if ($getDate){
                 while ($result=$getDate->fetch_assoc()){

           ?>
        <div class="banner bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-details">
                            <h1><?php echo $result['site_slogan'];?>  </h1>
                            <p><?php echo $result['site_title'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php }}?>
        <!-- start-home-section -->
        

        <section class="my-deal">
            <div class="container-fluid">
                <div class="row">

                     <?php
                     $query = "select * from category_tble limit 4";
                     $getDate = $db->select($query);
                     if ($getDate){
                         while ($result=$getDate->fetch_assoc()){
                     ?>

                    <div class="col-md-3">
                        <div class="category">
                            <div class="category-title text-center">
                                <h3><?php echo $result['name'];?></h3>
                            </div>
                            <img src="admin/<?php echo  $result['cat_image'];?>" class="img-fluid" alt="image one">
                        </div>
                    </div>

                    <?php }}?>
                    <!-- <div class="col-md-3">
                        <div class="category">
                            <div class="category-title text-center">
                                <h3>BOOKS</h3>
                            </div>
                            <img src="assets/img/img2.jpg" class="img-fluid" alt="image one">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category">
                            <div class="category-title text-center">
                                <h3>MOVIES</h3>
                            </div>
                            <img src="assets/img/img3.jpg" class="img-fluid" alt="image one">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category">
                            <div class="category-title text-center">
                                <h3>GOODIES</h3>
                            </div>
                            <img src="assets/img/img4.jpg" class="img-fluid" alt="image one">
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        
        <!-- end-home-section -->

        <!-- start-my-details-section -->
        <section class="my-details">
            <div class="container-fluid">
            
                <?php
                     $query = "select * from detail_tble ORDER BY id DESC  limit 1 ";
                     $getDate = $db->select($query);
                     if ($getDate){
                         while ($result=$getDate->fetch_assoc()){
                     ?>

                    <div class="row">
                    <div class="col-md-4">
                        <img src="admin/<?php echo  $result['detail_image'];?>" class="img-fluid" alt="Left Image">
                    </div>
                    <div class="col-md-8">
                        <div class="my-text">
                        <?php echo $result['detail']?>
                          </div>
                       </div>
                    </div>
                <?php }}; ?>
            </div>
        </section>
        <!-- end-my-details-section -->
    </main>

<?php include 'inc/footer.php';?>