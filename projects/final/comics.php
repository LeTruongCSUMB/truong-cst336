<?php
session_start();
include 'functions.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Our Comics!</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
  </head>
  <body>
    
    <?php include 'navigation.php'?>
    
    <!--<h1 style="margin:20px; padding:10px;">Find a Comic</h1>-->
    <!--<div class="form-group">-->
    <!--<form method="post" action="comics.php" style="margin:20px; margin-top:15px; padding:20px;">-->
    <!--    Search:  <input type="text" name="search"></input> -->
    <!--    Comic type: <select name="comic-type">-->
    <!--                <option value=""></option><br/>-->
    <!--                  <?php //getOptions(); ?>-->
    <!--                </select> <br/><br>-->
    <!--    ORDER: -->
    <!--    <input type="radio"  name="order" value="newest-first"> Newest first-->
    <!--    <input type="radio"  name="order" value="oldest-first"> Oldest first-->
    <!--    <br><br>-->
    <!--    <input type="Submit" class="btn btn-primary"></input>-->
    <!--</form>-->
    <!--</div>-->
    
    
    
    <div class="container" style="margin:20px; padding:20px;">
		<form method="post" action="./comics.php">
			<table class="table table-bordered table-hover"
				style="align: center; border: 1px solid #dddddd">
				<thead>
					<tr>
						<th colspan="3"><h4>Find the Comics</h4></th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td style="width: 200px; text-align: center; vertical-align: middle;"><h5>Search</h5>
						<td colspan="2">
						<div class="input-group mb-3">
              <div class="input-group-prepend">
    						  <input class="custom-file-label" type="text" name="search" style="width:100%;" >Search Title</label>
						</div>
						</div>
					</tr>
					
					<tr>
						<td style="width:200px; text-align: center; vertical-align: middle;"><h5>Comic type</h5>
						<td colspan="2">
						  <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02" name="comic-type">
                  <?php getOptions(); ?>
                </select>
              </div>
					</tr>
					<tr>
						<td style="width: 200px; text-align: center; vertical-align: middle;"><h5>Order</h5>
						<td colspan="2">
							<div class="form-group"
								style="text-align: center; margin: 0 auto;">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-primary">  <input type="radio"  name="order" value="newest-first">
									Newest first
									</label> <label class="btn btn-primary"> <input type="radio"  name="order" value="oldest-first"> Oldest first
									</label>
								</div>
							</div>
					</tr>
					
					<tr>
						<td style="text-align: right;" colspan="3"><h5
								style="color: red;" id="passwordCheckMessage"></h5> <input
							class="btn btn-primary pull-right" type="submit" value="Find"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
    
    
    
    
    
    
    
    
    <div class="comics-container">
      <?php 
        $comics = searchForComics(); 
        displayComics($comics); 
      ?>
      <div style="clear:both"></div>
    </div>
    
  </body>
</html>