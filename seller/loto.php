<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


	<style >
		*{
			box-sizing: border-box;
		}
		.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 30px;
  cursor: pointer;
  background-color: transparent;
  color: white;
  
  border: none;
  float: right;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 10px;
  width: 100%;
 background-color: #27AE60 ;
}
#main span{
	font-size:25px;
	padding-left: 10px;
	color: white;
     
}


@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
/*buttons*/
.active{
 background-color: white;
  color: #06F6CA;
  border: 1px solid #06F6CA;	
}
.btn-group button {
  background-color: #06F6CA   ; 
  border: 1px solid #06F6CA ; 
  color: white; 
  padding: 10px 24px; 
  cursor: pointer;
  float: left; 
}


.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; 
}


.btn-group button:hover {
  background-color: white;
  color: #06F6CA;
  border: 1px solid #06F6CA;
}
#btn1{
	width:20%;border-top-left-radius: 40px 40px;border-bottom-left-radius: 40px 40px;
}
#btn5{
	border-top-right-radius: 40px 40px;border-bottom-right-radius: 40px 40px;
}

/*ss*/
.contain{
        width: 100%;
        height: 100px;
        position: relative;
        
    }
    .box{
        width: 100%;
        height: 20px;            
        position: absolute;
        top: 0;
        left: 0;
       background-color: #7EE3FA ;
       border-radius: 20px;
    }
     .box1{
        width: 70%;
        height: 70px;            
        position: absolute;
        top: -58%;
        left: 15%;
         
    }
    .stack-top{
        z-index: 9;
        margin: 20px; }
  
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 70px; 
}
.column input{
	height: 70px;border-radius: 20px;border: 2px solid #7EE3FA ;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}



	</style>
	</head>
	<body>
		<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main" >
	<div class="container">
<a href=""><i class="fa fa-angle-left" aria-hidden="true" style="color:white;font-size: 30px "></i></a>
<span >Back</span>
<span style="color: black;
	">LOTO LAKAY</span>
  <button class="openbtn" onclick="openNav()"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
<i class="fa fa-comments-o" aria-hidden="true" style="float:right;color:white;font-size: 30px ;margin-right:10px"></i>


</div>
</div>
<!--navigation end-->
	<div class="container" style="margin-top:20px">
		
		<div class="btn-group" style="width:100%">
  <button id="btn1" style="" >Boriette</button>
  <button style="width:20%" id="btn2">Mariage</button>
  <button style="width:20%" id="btn3">Loto3</button>
  <button style="width:20%"id="btn4">Loto4</button>
    <button style="width:20%; " id="btn5">Loto5</button>
</div>
</div>

<div class="container" style="margin-top:50px">
 <div class="contain" id="cantain1">
        <div class="box"></div>
        <div class="box1 stack-top">
        	<div class="row1">
        		<div class="column">
 <input type="text" class="form-control " id="numero" placeholder="Numero" name="" >
  </div>
  
 
  <div class="column" >
  	 <input type="text" class="form-control " id="mise" placeholder="Mise" name="" >
   
  </div>
  <div class="column" >
  	  <button type="submit" onclick="addTable();" class="btn" style="width:80px;height:80px;border-radius: 100px;background-color: #06F6CA ;border: 2px solid white"><i class="fa fa-plus" aria-hidden="true" style="color: white;font-size:40px;"></i></button>
   
  </div>
</div>
        	
        </div>
    </div><!--contain-->

     <div class="contain" style="display: none" id="contain2">
        <div class="box"></div>
        <div class="box1 stack-top">
        	<div class="row1">
        		<div class="column">
              <input type="text" class="form-control " id="" placeholder="Numero" name="" >
            </div>
          <div class="column" >
  	          <input type="text" class="form-control " id="" placeholder="Mise" name="" >
          </div>
          <div class="column" >
  	        <button type="submit" class="btn" style="width:80px;height:80px;border-radius: 100px;background-color: #06F6CA ;border: 2px solid white"><i class="fa fa-plus" aria-hidden="true" style="color: white;font-size:40px;"></i></button>
          </div>
        </div>	
      </div>
    </div><!--contain-->

    <div class="contain" style="display: none" id="contain3">
      <div class="box"></div>
        <div class="box1 stack-top">
        	<div class="row1">
       		<div class="column">
            <input type="text" class="form-control " id="" placeholder="Numero" name=""> 
          </div>
          <div class="column" >
  	        <input type="text" class="form-control " id="" placeholder="Mise" name="" >
          </div>
          <div class="column" >
  	         <button type="submit" class="btn" style="width:80px;height:80px;border-radius: 100px;background-color: #06F6CA ;border: 2px solid white"><i class="fa fa-plus" aria-hidden="true" style="color: white;font-size:40px;"></i></button>
          </div>
        </div>
      </div>
    </div><!--contain-->

     <div class="contain" style="display: none" id="contain4">
        <div class="box"></div>
        <div class="box1 stack-top">
        	<div class="row1">
        		<div class="column">
 <input type="text" class="form-control " id="" placeholder="Numero" name="" >
  </div>
  
 
  <div class="column" >
  	 <input type="text" class="form-control " id="" placeholder="Mise" name="" >
   
  </div>
  <div class="column" >
  	  <button type="submit" class="btn" style="width:80px;height:80px;border-radius: 100px;background-color: #06F6CA ;border: 2px solid white"><i class="fa fa-plus" aria-hidden="true" style="color: white;font-size:40px;"></i></button>
   
  </div>
</div>
        	
        </div>
    </div><!--contain-->

     <div class="contain" style="display: none" id="contain5">
        <div class="box"></div>
        <div class="box1 stack-top">
        	<div class="row1">
        		<div class="column">
 <input type="text" class="form-control " id="numero" placeholder="Numero" name="" >
  </div>
  
 
  <div class="column" >
  	 <input type="text" class="form-control " id="mise" placeholder="Mise" name="" >
   
  </div>
  <div class="column" >
  	  <button type="submit" class="btn" style="width:80px;height:80px;border-radius: 100px;background-color: #06F6CA ;border: 2px solid white"><i class="fa fa-plus" aria-hidden="true" style="color: white;font-size:40px;"></i></button>
   
  </div>
</div>
        	
        </div>
    </div><!--contain-->
</div>

<!--result div-->
<div class="container" style="border-radius: 50px">
	<div style="background-color: #52BE80;padding: 10px;font-size: 20px;color: white">
		<div class="container">FICHE MIDI- 30-05-2020</div></div>

	<div style="background-color: #FCFEDD;padding: 15px;height:auto">
		<div class="container">
      <div class="row">
        <div class="col-sm-12">  
          <table class="table table-hover table-inverse">
            <thead>
              <tr>
                <th>Sr.</th>
                <th>Numerous</th>
                <th>Mise</th>
                <th>..</th>
              </tr>
            </thead>
            <tbody id="newTable">
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>  
        </div>
      </div>
    </div>
	</div>

    <div style="background-color: #82E0AA;padding: 10px;">
    	
    	<span>2Boules(s)</span>
    	<span style="float: right">Total : 200 HTG</span>

    </div>

    <div style="background-color: #E0FA28;padding: 10px;">
    	
    	<span>Bonus 5%</span>
    	<span style="float: right"> 10 HTG</span>

    </div>

    <div style="background-color: #F75D15;padding: 5px;color: white;font-size: 20px;text-align: center;">
    	Payer
    </div>

</div> 



		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>

		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="../assets/js/custom.js"></script>
 		<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
 }

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<script >
	$('#btn1').click(function(){
			
		$('#contain1').show();
		$('#contain2').hide();
		$('#contain3').hide();
		  $('#contain4').hide();
	   $('#contain5').hide();
	  $('#btn1').css('background-color','white');
	   $('#btn1').css('color','#06F6CA');
         $('#btn2').css('background-color','#06F6CA');
	   $('#btn2').css('color','white');
	    $('#btn3').css('background-color','#06F6CA');
	   $('#btn3').css('color','white');
	    $('#btn4').css('background-color','#06F6CA');
	   $('#btn4').css('color','white');
	    $('#btn5').css('background-color','#06F6CA');
	   $('#btn5').css('color','white');
});

	$('#btn2').click(function(){
			$("#contain2").show();
		$("#contain1").hide();
		$("#contain3").hide();
		  $('#contain4').hide();
	   $("#contain5").hide();
	   $('#btn2').css('background-color','white');
	   $('#btn2').css('color','#06F6CA');
         $('#btn1').css('background-color','#06F6CA');
	   $('#btn1').css('color','white');
	    $('#btn3').css('background-color','#06F6CA');
	   $('#btn3').css('color','white');
	    $('#btn4').css('background-color','#06F6CA');
	   $('#btn4').css('color','white');
	    $('#btn5').css('background-color','#06F6CA');
	   $('#btn5').css('color','white');
	    
});

	$('#btn3').click(function(){
		    $('#contain3').show();
		    $("#contain2").hide();
		$("#contain1").hide();
		  $('#contain4').hide();
	   $("#contain5").hide();
	     $('#btn3').css('background-color','white');
	   $('#btn3').css('color','#06F6CA');
         $('#btn1').css('background-color','#06F6CA');
	   $('#btn1').css('color','white');
	    $('#btn2').css('background-color','#06F6CA');
	   $('#btn2').css('color','white');
	    $('#btn4').css('background-color','#06F6CA');
	   $('#btn4').css('color','white');
	    $('#btn5').css('background-color','#06F6CA');
	   $('#btn5').css('color','white');
});

	$('#btn4').click(function(){
		    $('#contain4').show();
	   $("#contain5").hide();
         $("#contain3").hide();
		    $("#contain2").hide();
		$("#contain1").hide();
	 $('#btn4').css('background-color','white');
	   $('#btn4').css('color','#06F6CA');
         $('#btn1').css('background-color','#06F6CA');
	   $('#btn1').css('color','white');
	    $('#btn3').css('background-color','#06F6CA');
	   $('#btn3').css('color','white');
	    $('#btn2').css('background-color','#06F6CA');
	   $('#btn2').css('color','white');
	    $('#btn5').css('background-color','#06F6CA');
	   $('#btn5').css('color','white');
});

	$('#btn5').click(function(){
		    $('#contain5').show();
	   $("#contain4").hide();
         $("#contain3").hide();
		    $("#contain2").hide();
		$("#contain1").hide();
		 $('#btn5').css('background-color','white');
	   $('#btn5').css('color','#06F6CA');
         $('#btn1').css('background-color','#06F6CA');
	   $('#btn1').css('color','white');
	    $('#btn3').css('background-color','#06F6CA');
	   $('#btn3').css('color','white');
	    $('#btn4').css('background-color','#06F6CA');
	   $('#btn4').css('color','white');
	    $('#btn2').css('background-color','#06F6CA');
	   $('#btn2').css('color','white');
});
</script>
	</body>
</html>