<?php
/**
 * Created by PhpStorm.
 * User: Moddy
 * Date: 17/01/2016
 * Time: 14:30
 */
 include("includes/connection.php");
?>
<?php $page="dashboard"; ?>
<!DOCTYPE html>
<html lang="en" class="app">
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Impse Ventures Ltd. Quality Assured Health Feeds for animals and poultry in Nakuru. Contact Us +254 722 577451</title>
    <?php  require"includes/header.php"; ?>
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="home">
<!-- =======Header ======= -->
		<?php require"includes/header_info.php"; ?>
<!-- ======= /Header ======= -->
<!-- ======= mainmenu-area section ======= -->
		<?php require"includes/menu.php"; ?>
<!-- ======= /mainmenu-area section ======= -->
<!-- ======= revolution slider section ======= -->
	<section class="rev_slider_wrapper me-fin-banner">
	<?php	
						include('session/DBConnection.php'); 
		    $results = mysql_query("SELECT * FROM slidehead ORDER BY upload_id DESC LIMIT 2");
            while($r = mysql_fetch_array($results))
            { 
            $id = $r['upload_id'];
             ?>
		<div id="slider1" class="rev_slider"  data-version="5.0">
		 		
			<ul>
				<li data-transition="fade">
					<?php echo '<img height="250" width="950" SRC="'. $r["image"] .'"/>';  ?>
					<div class="tp-caption sfb tp-resizeme banner-h1" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="0" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="500">
						 <br>Healthy Cows
                                                 <br>Animal Feeds
                                     
				    </div>
					<div class="tp-caption sfb tp-resizeme banner-border" 
				        data-x="left" data-hoffset="380" 
				        data-y="top" data-voffset="400" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="800">
						<span></span>
				    </div>
					<div class="tp-caption sfb tp-resizeme banner-text" 
				        data-x="left" data-hoffset="380" 
				        data-y="top" data-voffset="435" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1100">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br>sed do eiusmod tempor incididunt ut labore et dolore.</p>
				    </div>
					<div class="tp-caption sfl tp-resizeme " 
				        data-x="left" data-hoffset="380" 
				        data-y="top" data-voffset="510" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1400">
						<a class="banner-button" href="">Contact Us <i class="fa fa-arrow-circle-right"></i></a>
				    </div>
					<div class="tp-caption sfr tp-resizeme " 
				        data-x="left" data-hoffset="580" 
				        data-y="top" data-voffset="510" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1700">
						<a class="banner-button blue-bg" href="">View More <i class="fa fa-arrow-circle-right"></i></a>
				    </div>
				</li>
				<?php } ?>
			</ul>
			
		</div>
	</section>
<!-- ======= /revolution slider section ======= -->
<!-- ======= Testimonial & Company Values ======= -->
		<section class="testimonial_sec clear_fix">
			<div class="container" style="margin-top: -40px;">
				<div class="row">
					<div  class="col-lg-5 col-md-12 col-sm-12 col-xs-12 testimonial_container">
						<div class="sec-title">
							<h2>Impse Ventures</h2>
						</div>
						<div id="owl">
							<div>
								<div class="testimonial">									
									<img class="round_img" src="images/7.jpg" alt="images">
									<div class="float_right client_info">
										<p> Library 1Catalog</p>
										<span>Ms. Faith Kioko(CEO & Founder)</span>
										<ul>
											<li><a href=""></a></li>
											<li><a href=""></a></li>
											<li><a href=""></a></li>
											<li><a href=""></a></li>
											<li><a href=""></a></li>
										</ul>
									</div>
								</div>
								<p class="john_speach">An online library catalog is an electronic bibliographic database that describes the books, videotapes, periodicals, etc. carried by a particular library. The online library catalog evolved from a printed source, the library card catalog. Before the advent of online catalogs, library catalogs were pieces of furniture that contained numerous small drawers. </p>
								<img src="images/sign.jpg" alt="images">
							</div>
							
						</div> <!-- End owl -->
					</div>
					<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 company">
						<h2>Animal Feeds Category </h2>
						<div class="company-tab">
							<ul class="nav nav-pills nav-justified">
							    <li class="active"><a data-toggle="pill" href="#menu1">Kenyan</a></li>
							    <li><a data-toggle="pill" href="#menu2">Reference</a></li>
							    <li><a data-toggle="pill" href="#menu3">Feasibility</a></li>
                                                            <li><a data-toggle="pill" href="#menu4">magazines</a></li>
                                                            <li><a data-toggle="pill" href="#menu5">Circulation</a></li>
						  	</ul>
						  
							 <div class="tab-content">
							    <div id="menu1" class="tab-pane fade in active">
							      <h3>Kenyan</h3>
                                                              <p>It refers to Kenyan-related books and non-book materials (such as figurines, games, fashion and others).</p>
							    </div>
							    <div id="menu2" class="tab-pane fade">
							      <h3>Reference Books</h3>
                                                              <p>This is where you can find books such as encyclopedia, dictionary, etc.,</p>
							    </div>
							    <div id="menu3" class="tab-pane fade">
							      <h3>Feasibility Books</h3>
                                                              <p>It is the preliminary study to determine a project's viability.</p>
							    </div>
                                                             <div id="menu4" class="tab-pane fade">
							      <h3>Magazines & Journals</h3>
                                                              <p>Generally published on a regular schedule, containing a variety of articles.</p>
							    </div>
                                                             <div id="menu5" class="tab-pane fade">
							      <h3>Circulation Books</h3>
							      <p>It houses and takes charge of the general collection of the library. Books which can be borrowed by staff or students</p>
							      
							    </div>
							 </div>
						
							<ul class="nav nav-pills nav-justified">
							    <li class="active"><a data-toggle="pill" href="#menu6">ISBN</a></li>
							    <li><a data-toggle="pill" href="#menu7">Title</a></li>
							    <li><a data-toggle="pill" href="#menu8">Author</a></li>
                                                            <li><a data-toggle="pill" href="#menu9">Subject</a></li>
                                                            <li><a data-toggle="pill" href="#menu10">Year Published</a></li>
						  	</ul>
						  
							 <div class="tab-content">
							    <div id="menu6" class="tab-pane fade in active">
							      <h3>ISBN(Serial Number)</h3>
                                                              <p>Sequential number assigned to each record or volume as it is added to a database (such as a library catalog or index) and which indicates the chronological order of its acquisition. Compare with acquisition number</p>
							    </div>
							    <div id="menu7" class="tab-pane fade">
							      <h3>Book Title</h3>
                                                              <p>An identifying name given to a book, play, film, musical composition, or other work.</p>
							    </div>
							    <div id="menu8" class="tab-pane fade">
							      <h3>Book Author</h3>
                                                              <p>A person who writes a novel, poem, essay, etc.; the composer of a literary work, as distinguished from a compiler, translator, editor, or copyist.</p>
							    </div>
                                                             <div id="menu9" class="tab-pane fade">
							      <h3>Book Subject</h3>
                                                              <p>That which forms a basic matter of thought, discussion, investigation, etc.:</p>
							    </div>
                                                             <div id="menu10" class="tab-pane fade">
							      <h3>Year Published</h3>
                                                              <p>The date on which a book or periodical is or is planned to be published.</p>
							    </div>
							 </div>
						</div>
					</div>
				</div> <!-- End row -->
			</div> <!-- End Container -->
		</section> <!-- testimonial -->
<!-- ======= /Testimonial & Company Values ======= -->
<!--====Footer===-->
<?php require"includes/footer.php"; ?>
<!--==./Footer==-->
</body>
</html>

