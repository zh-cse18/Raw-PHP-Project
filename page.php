<?php include 'inc/header.php';?>
<?php
     if (!isset($_GET['pageid']) || $_GET['pageid']== NULL){
         echo "<script>window.location = 'index.php';</script>";
        }
    else{
        $page_id = $_GET['pageid'];
        }
?>

    <main bg-color>
    <?php
        $query = "select* from tble_page where id =$page_id";
        $getDate = $db->select($query);
        if ($getDate){
            while ($result=$getDate->fetch_assoc()){
        ?>
        
        <h3><?php echo $result['page_name']?></p>
        <p><?php echo $result['page_body']?></p>
    
            <?php }}?>
       

    

          
      <!-- banner-start -->
        
    </main>

<?php include 'inc/footer.php';?>