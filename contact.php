<?php include 'inc/header.php'?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=="POST") {

        $full_name = $fm->validation($_POST['full_name']);
        $email = $fm->validation($_POST['email']);
        $mobile = $fm->validation($_POST['mobile']);
        $public_status = $fm->validation($_POST['public_status']);
        $message = $fm->validation($_POST['message']);

        $full_name = mysqli_real_escape_string($db->link, $full_name);
        $email = mysqli_real_escape_string($db->link, $email);
        $mobile = mysqli_real_escape_string($db->link, $full_name);
        $public_status = mysqli_real_escape_string($db->link, $public_status);
        $message = mysqli_real_escape_string($db->link, $message);


        $error = "";
        if(empty($full_name)){
            $error = "First name must not be Empty";
        }elseif(empty($email)) {
            $error = "Email Field must not be Empty";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = "Invalid Email Address";
        }elseif(empty($mobile)){
            $error = "Mobile Filed Must not be empty";
        }elseif(empty($public_status)){
            $error = "Choose a Selection field";
        }elseif(empty($message)){
            $error = "Message Field must not be empty";
        }else {
            $query = "INSERT INTO contact_tble (full_name,email,mobile,public_status,message) values ('$full_name','$email','$mobile','$public_status','$message')";
            $insertData = $db->insert($query);
            if ($insertData){
                $mgs = "<span class='success'>Data Inserted successfully!</span>";
            }else{
                $mgs = "<span class='error'>Data not Inserted!</span>";
            }
            
        }       

    }
?>
<main>
    <section class="testimonial py-5" id="testimonial">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 py-5 bg-primary text-white text-center ">
                    <div class=" ">
                        <div class="card-body">
                            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                            <h2 class="py-3">Registration</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 py-5 border">
                    <h4 class="pb-4">Please fill with your details</h4>
                    <?php 
                        if(isset($error)){
                            echo "<span style='color: red;'>$error</span>";
                        }
                        if(isset($mgs)){
                            echo "<span style='color: green;'>$mgs</span>";
                        }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="full_name" placeholder="Full Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="mobile" placeholder="Mobile No." class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="public_status" class="form-control">
                                    <option selected>Choose</option>
                                    <option> New Buyer</option>
                                    <option> Auction</option>
                                    <option> Complaint</option>
                                    <option> Feedback</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                                        <label class="form-check-label" for="invalidCheck2">
                                            <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-row">
                        <input type="submit" class="btn btn-danger" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'inc/footer.php'?>
