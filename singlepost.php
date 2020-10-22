
<?php include 'inc/header.php';?>

<div class="row">
	
    <div class="col-md-9">      
        <?php
            if (!isset($_GET['singlepostid']) || $_GET['singlepostid']== NULL){
                echo "<script>window.location = 'index.php';</script>";
                        //header("Location:catlist.php");
            }
            else{
                $page_id = $_GET['singlepostid'];       
                }
                $query = "select * from post_tble where id=$page_id ";
                $getData = $db->select($query);

                if($getData){
                    while ($result = $getData->fetch_assoc()){
                    ?>

                <div class="row">
                <div class="col-md-4">
                <h3> Title :<?php echo $result['title']?></h3>       
                <img class="img-fluid" src="admin/<?php echo $result['image'];?>"  height="200px"  alt="Image">                  
                </div>
                <div class="col-md-8">
                        <div class="my-text">
                        <?php echo $result['body']?>
                          </div>
                       </div>
                <?php }}; ?>
            </div>
            
    </div>


<!-- Start Sidebar -->
    <div class="col-md-3">

	    <!-- <div class="samesidebar clear">
		<h2>Latest Category</h2>				
		<ul>		 			 
			<?php
            $query = "select DISTINCT name from category_tble  ";
            $getDate = $db->select($query);
            if ($getDate){
                while ($result=$getDate->fetch_assoc()){
            ?>
				<li><a href="singlepost.php?singlepostid=<?php echo $result['id']?>"><?php echo $result['name'] ?></a></li>
						
				<?php }}?>
		</ul>
	    </div> -->
	    <div class="samesidebar clear">
		<h2>Popular articles</h2>
		<?php
        $query = "select* from post_tble order by id desc limit 10  ";
        $getDate = $db->select($query);
        if ($getDate){
            while ($result=$getDate->fetch_assoc()){
        ?>

			<div class="popular clear">
			 <a href="singlepost.php?singlepostid=<?php echo $result['id']?>"><h3><?php echo substr($result['title'],0,25)?></h3></a>
						
			</div>
			<?php }}?>				
	</div>	

    </div>    
         
      

<?php include 'inc/footer.php';?>