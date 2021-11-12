<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/k1.jpg" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/k2.jpg" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/k3.jpg" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2>About Us</h2>
		          <h4> <p>Handicraft is a type of craft where people make things using only their hands or basic tools. The items are usually decorative and have a particular use. Usually the term refers to traditional methods of making things.</p>
		           <p>The items often have cultural or religious value. Things made by mass production or machines are not handicraft goods.In Bangladesh we can see many handicrafters living there live only by making handicrafts objects. Also, handicraft things are different from "arts and crafts" because they are meant to be used for something. Handicraft items are generally contrasted with mass production . It stimulates a person's creativity through art . Not only that,it enhances a person's thinking power . It has been protecting our culture in many ways and will further help preserve culture in the future through practice.</p>
		           	<p>Handicrafts are an integral part of the lives of Gujarati people. One can see the reflection of Gujarat's diversity through its art and crafts collection. Each and every district of Gujarat specialises in a different art form. Handicrafts of Gujarat are a beautiful amalgamation of stitches, colours, patterns and embroidery. From colourful tie-dye to sophisticated wooden antiques, there is no dearth of opulent handicrafts options in Gujarat. People who are having a keen interest in Handicrafts should take a tour to the Gujarat.</p>

<p>mbroideries amongst the art and craft section of Gujarat stand apart. Embroidery type like 'Patola', 'Rabari', 'Mutwa' and 'soof' are the pride of Gujarat. Each and every item is made to perfection by the renowned artisans and craftsmen of Gujarat. Traditional artisans in tribal areas dye, weave, embroider and print some of the Gujarat's finest textiles. Warli Painting, Rabari Embroidery, Pithora Paintings, and Rogan Painting are the exquisite works made by the tribes of Gujarat.</p>

<p>Gujarat is famous for its classy thread work. 'Zari' industry based in Surat and 'Kathi' embroidery of Kutch are the best examples of thread works. Bandhani or Bandhej is another famous speciality of Gujarat. This basic tie-dye work is available in various textiles like cotton, georgette, and chiffon. Bandhani have found maximum application in sarees, salwars, kurtas, and other forms of dress materials.</p>

<p>Nothing can beat the quality of leather that one can find in Gujarat. Items made of leather that are famous in Gujarat are footwear, purses, batwas, mirror frames and many other articles. The designs carved meticulously on various handcrafted items bear a powerful imprint of the old tradition.</p>

<p>There's something special about handicrafts of Gujarat, they are expressive, unique and beautiful. Listed below are some beautiful art and crafts forms of Gujarat that have flourished far and wide up to the western quarters.</p></h4>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>