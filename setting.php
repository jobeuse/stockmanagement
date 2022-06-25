<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
}
?>
<?php include('conn.php')?>
<?php include('header.php')?>
<body>
  <?php include('sidenav.php')?>
	<div class="container-fluid"> 
		<div class="row mt-4 justify-content-center">
			<div class="col-lg-6 shadow-sm p-2">
				<p>Settings</p>
				<hr>
				<em>Set the scret keyword and you have to memorise your keyword</em>
					<?php
					if (isset($_POST['set'])) {
						$keyword=md5($_POST['keyword']);

						$select=mysqli_query($conn, "SELECT * FROM skeys WHERE keyname='$keyword'"); 
						$fetchs=mysqli_fetch_array($select); 
						if (mysqli_num_rows($select) >1) {
							echo "<div class='font-weight-bold text-danger'>error: only one key Used</div>";
								}else{
						if($keyword != $fetchs['keyname']){ 
						if ($keyword!='') {
							if (strlen($keyword) < 8) {
								echo "<div class='font-weight-bold text-danger'>error: keyword must contain atleast8 characters or more</div>";
								
							}else{
							$insert=mysqli_query($conn, "INSERT INTO skeys values('','$keyword')");
								if ($insert) {
									echo "<div class='alert alert-success'>keyword added now</div>";
								}else{
									echo "<div class='font-weight-bold text-danger'>error occured</div>";
								}
							}
							
						}else{

							echo "<div class='font-weight-bold text-danger'>Error:  empy space found</div>";
						}
					}else{
						echo "echo <div class='font-weight-bold text-danger'>keyword already exist</div>";
					}}
					}
					?>
				<form method="POST">
					<input type="text" name="keyword" class="form-control mt-2" placeholder="enter keyword">
					<button type="submit" name="set" class="btn btn-sm btn-outline-dark mt-3">create</button>
				</form>

			</div> 

			<div class="col-lg-3 ml-3 shadow-sm">

					<?php 
					$select=mysqli_query($conn, "SELECT * FROM skeys");
					$fetchs=mysqli_fetch_array($select); 
					

					?>
					<em>Encrypted keyword</em>
				<input type="text"  value="<?php echo$fetchs['keyname']?>" class="form-control" disabled>

				<form method="POST" class="mt-4">
					<button name="clear" type="submit" class="btn btn-block btn-outline-danger">CLear All Keys</button>
				</form>
				<?php
					if (isset($_POST['clear'])) { 
						$select=mysqli_query($conn, "DELETE  FROM skeys "); 
						if (!($select)) {
							echo "<div class='mt-3 font-weight-bold text-danger'>error: only one key Used</div>";
								}else{
									echo "<div class='mt-3 font-weight-bold alert alert-success'>Keys deleted all</div>";
								}}
				?>
			</div>
		</div>
	</div>
</body>
</html>