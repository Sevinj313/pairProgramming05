<!DOCTYPE html>
<html>
<head>
	<title>slider</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script>
$(document).ready(function(){
    $(".triangle-right").click(function(){
        $("img")
            .slideUp(1500)
            .slideDown(1500);
    });
});
// $(document).ready(function(){
//     $("#flip").click(function(){
//         $("#panel")
//     });
// });
</script>
<style>

.carousel {
	margin:120px auto;
	width: 960px;
	height: 500px;
	background-color:#EFECDD;


}
.carousel-control{
	background-color: transparent;
	box-shadow: none;
}
	
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
  }
	/*.diamond {
	  margin-left: 450px;
	  width: 0;
	  height: 0;
	  border: 50px solid transparent;
	  border-bottom-color: white;
	  position: relative;
	  top: -50px;
}
.diamond:after {
  content: '';
  position: absolute;
  left: -50px;
  top: 50px;
  width: 0;
  height: 0;
  border: 50px solid transparent;
  border-top-color: white;
}
*/
.triangle-left {
	margin-top: 200px;
  border-top: 40px solid transparent;
  border-right: 30px solid white;
  border-bottom: 50px solid transparent;

}

.triangle-right {
margin-top: 200px;
  width: 0;
  height: 0;
  border-top: 40px solid transparent;
  border-left: 30px solid white;
  border-bottom: 50px solid transparent;
}
</style>
<body>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="images/1.jpg" alt="Chania">
			    </div>

			    <div class="item">
			      <img src="images/2.jpg" alt="Chania">
			    </div>

			    <div class="item">
			      <img src="images/3.jpg" alt="Flower">
			    </div>

			    
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			   <div class="triangle-right">
			</div>
			    <span class="sr-only">Previous</span>
			    <!-- <div class="diamond"></div> -->
			  </a>
			  
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <div class="triangle-left">
				</div>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
</body>
</html>
