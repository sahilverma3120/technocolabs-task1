es (123 sloc)  5.84 KB
 
<?php include('partials/header.php');?>
	
	<!-- Banner Section -->
    <section class="banner-section">
		<div class="pattern-layer" style="background-image: url(../images/background/1.png)"></div>
		<div class="auto-container">

			<!-- Content Boxed -->
			<div class="content-boxed">
				<div class="inner-column">
					<h1>Update Admin</h1>
					<div class="buttons-box">
						<!--Button to add admin-->
						<a href="add-admin.php" class="theme-btn btn-style-one"><span class="txt">Add admin <i class="fa fa-angle-right"></i></span></a>
						<!-- <a href="course.html" class="theme-btn btn-style-two"><span class="txt">All Courses <i class="fa fa-angle-right"></i></span></a> -->
					</div>
				</div>
			</div>
			
			<!-- Image Boxed -->
			<div class="image titlt" data-tilt="" data-tilt-max="4">
				<a href="../images/resource/banner.png" data-fancybox="banner" data-caption="" class=""><img src="../images/resource/banner.png" alt=""></a>
			</div>
			
		</div>
	</section>
	<!-- End Banner Section -->
	
	<!-- Admin Section -->
	<section class="news-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Title Column -->
				<div class="title-column col-lg-4 col-md-12 col-sm-12">
					<!-- Sec Title -->
						<div class="sec-title">
							<h2>Please fill all the fields</h2>
							<div class="text">
								<?php
                                    // Get the ID of selected admin
                                    $id = $_GET['id'];
                                    // Create sql query to get the details
                                    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
                                    // Ececute the query
                                    $exeque = mysqli_query($connection, $sql);
                                    // Check whether the query is execute or not
                                    if ($exeque == TRUE) {
                                        // Check whether the data is available or not
                                        $count = mysqli_num_rows($exeque);
                                        // Check whether we have admin data or not
                                        if ($count == 1) {
                                            // Get the detail
                                            echo "<div style='color:darkgreen;'>Admin available</div>";
											$row = mysqli_fetch_assoc($exeque);
											$id = $row['id'];
											$fullname = $row['full_name'];
											$username = $row['username'];
                                        } else {
                                            // Redirect to manage admin page
											echo "<div style='color:darkred;'>Admin not available</div>";
                                            header('location:'.SITEURL.'admin/manage-admin.php');
                                        }
                                    }
								?>
                            </div>
						</div>
				</div>
				
				<!-- News Column -->
				<div class="news-block col-lg-8 col-md-12 col-sm-12">
					<div class="inner-box">
                        <form action="" method="POST">
                            <div class="form-group" style="display: none;">
                                <label for="name1">ID</label>
                                <input type="text" name="id" class="form-control" id="id1"  value="<?php echo $id;?>">
                            </div>
                            <div class="form-group">
                                <label for="name1">Full Name</label>
                                <input type="text" name="fullname" class="form-control" id="name1"  value="<?php echo $fullname;?>">
                            </div>
                            <div class="form-group">
                                <label for="username1">Username</label>
                                <input type="text" name="username" class="form-control" id="username1" value="<?php echo $username;?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-sm btn-style-two"><span class="txt">Update Admin</span></button>
                        </form>
					</div>
				</div>

<?php
	if (isset($_POST['submit'])) {
		// echo "Button clicked";
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		// Create SQL query to update to update admin
		$sql = "UPDATE tbl_admin SET full_name = '$fullname', username = '$username' WHERE id = '$id'";
		// Execute the query
		$exeque = mysqli_query($connection, $sql);
		// Check whether the query executed successfully or not
		if ($exeque == TRUE) {
			// QUERY executed and admin updated
			$_SESSION['update'] = "<div style='color:green;'>Admin updated successfully</div>";
			header('location:'.SITEURL.'admin/manage-admin.php');
		} else {
			// Failed to update admin
			$_SESSION['update'] = "<div style='color:red;'>Failed to delete admin</div>";
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
	}
?>
				
			</div>
		</div>
	</section>
	<!-- Admin Section -->
	
	<!-- Call To Action Section Two -->
	<section class="call-to-action-section-two" style="background-image: url(../images/background/3.png)">
		<div class="auto-container">
			<div class="content">
				<h2>Ready to get started?</h2>
				<div class="text">Replenish him third creature and meat blessed void a fruit gathered you’re, they’re two <br> waters own morning gathered greater shall had behold had seed.</div>
				<div class="buttons-box">
					<a href="course.html" class="theme-btn btn-style-one"><span class="txt">Get Stared <i class="fa fa-angle-right"></i></span></a>
					<a href="course.html" class="theme-btn btn-style-two"><span class="txt">All Courses <i class="fa fa-angle-right"></i></span></a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Call To Action Section Two -->
	
<?php include('partials/footer.php');?>
