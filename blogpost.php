<?php include 'inc/header.php';?>

<div class="row">

	
	<div class="col-md-9">
        <!-- pagination -->
        <?php
        $per_page = 3;
         if(isset($_GET['page'])){
        	$page = $_GET['page'];
         }else{
            $page = 1;
         }

        $start_form = ($page-1)*$per_page
        ?>
         <!-- pagination -->
               
		<div class="row">
        	<?php
            $query = "select * from post_tble  limit $start_form, $per_page";
            $getData = $db->select($query);

            if($getData){
                while ($result = $getData->fetch_assoc()){
                    ?>
					<div class="col-md-4">
					<div class="row">
                    	<a href="singlepost.php?singlepostid=<?php echo $result['id']?>" ><img class="img-fluid" src="admin/<?php echo $result['image'];?>"  height="200px"  alt="Image"></a>
					</div>
					</div>
                            <?php
                        }
                    }
                    ?>
		</div>
		
                
                <!-- pagination -->
    <div class="page-area">
        <?php

        $query  = "SELECT * FROM post_tble";
        $result = $db->select($query);
        $total_rows = mysqli_num_rows($result);
        $total_page = ceil($total_rows/$per_page)-1;

        echo "<span class='pagination'><a href='blogpost.php?page=1'>" .'First Page'. "</a>";
        for ($i = 1; $i<$total_page; $i++){
			echo "<a href='blogpost.php?page=".$i."'>".$i."</a>";
			$start_form=$i*$per_page;
        }
            echo "<a href=''>" .'Last Page'. "</a></span>";
        ?>
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
				<li><a href="blogcategorypost.php"><?php echo $result['name'] ?></a></li>
						
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

	</div>          

<?php include 'inc/footer.php';?>