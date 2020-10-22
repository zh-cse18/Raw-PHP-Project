<?php include 'inc/header.php'?>
<main>
	<div class="container">
		<div class="row pt-4">
			<div class="col-md-12 d-flex justify-content-center">
				<div class="zoomItOutBotton">
                    <button type="button" onclick="zoomin()">
                        Zoom In
                    </button>
                    <button type="button" onclick="zoomout()">
                        Zoom Out
                    </button>
                </div>
			</div>
            <div class="col-md-12">
                <!-- pagination -->
                <?php
                $per_page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $start_form = ($page-1)*$per_page
                ?>
                <!-- pagination -->
                <div class="comic-post">
                    <?php
                    $query = "select * from post_tble where tags='comic' limit $start_form, $per_page";
                    $getData = $db->select($query);

                    if($getData){
                        while ($result = $getData->fetch_assoc()){
                            ?>
                            <a href=""><img class="img-fluid" src="admin/<?php echo $result['image'];?>" alt="Image" id="zoomImg"></a>
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

                    echo "<span class='pagination'><a href='comic.php?page=1'>" .'First Page'. "</a>";
                    for ($i = 1; $i<$total_page; $i++){
                        echo "<a href='comic.php?page=".$i."'>".$i."</a>";
                    }
                    echo "<a href='comic.php?page=$total_page'>" .'Last Page'. "</a></span>";
                    ?>
                </div>
                <!-- pagination -->
            </div>
		</div>
	</div>
</main>
<script type="text/javascript">
    function zoomin() {
        var GFG = document.getElementById("zoomImg");
        var currWidth = GFG.clientWidth;
        GFG.style.width = (currWidth + 150) + "px";
        console.log(currWidth);
    }

    function zoomout() {
        var GFG = document.getElementById("zoomImg");
        var currWidth = GFG.clientWidth;
        GFG.style.width = (currWidth - 100) + "px";
    }
</script>
<?php include 'inc/footer.php'?>