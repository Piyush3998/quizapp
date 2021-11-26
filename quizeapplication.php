<?php
    $hostname="localhost";
	$dbname="project";
	$username="root";
	$passwors="";
	
	$conn=mysqli_connect("$hostname","$username","","$dbname");
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect the database...".mysqli_connect_error;
	}
    $result=mysqli_query($conn,"select * from onlinequize");

    echo "<center>";
    echo"<h2>Creating Online Quize Application In PHP</h2>";
    echo"<h3>Using mysqli Method</h3>";
    echo"<hr/>";
	
	  if(mysqli_num_rows($result)>0)
	  {
	           echo"<table>";
			   while($row=mysqli_fetch_array($result))
			   {
				   echo"<tr>";
				   echo"<td>".$row['Qid'].")".$row['Question']."</td>";
				   echo"</tr>";
				   echo"<tr>";
				   echo"<td><input type='radio' id='Option1' name=".$row['Qid']." class='radoptions' value=".$row['Option1']." />".$row['Option1']."";
				   echo"<input type='radio' id='Option2' name=".$row['Qid']." class='radoptions' value=".$row['Option2']." />".$row['Option2']."";
				   echo"<input type='radio' id='Option3' name=".$row['Qid']." class='radoptions' value=".$row['Option3']." />".$row['Option3']."";
				   echo"<input type='radio' id='Option4' name=".$row['Qid']." class='radoptions' value=".$row['Option4']." />".$row['Option4']."";
				   echo"</td>";
				   echo"</tr>";
				   echo "<tr>";
				   echo"<td><span id='span1' class='radoptions' style='color:green; display:none;'><hr/><b>Correct ans is : ".$row['CorrAns']."<b><hr/></span></td>";
				   echo"</tr>";
			    }  
			   
				echo"</table>";
	  }
	  
	  
	  mysqli_close($conn);	
			
?>				
	<button id="but1" type="button" onclick="displayans();">submit</button>		
	<label id="Labmsg"><label>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				   
	<script>
	    $(document).ready(function()
		{
			$("#but1").click(function()
			{
				$(".radoptions").show();
				$(".radoptions").attr("disabled",true);
				$("#but1").attr("disabled",true);
			});
		});
            function displayans()	
			{
 				document.getElementById("Labmsg").innerHTML="";
				var results=document.getElementsByTagName('input');
				for(i=0;i<results.length;i++)
				{
					if(results[i].type=="radio")
					{	
						if(results[i].checked)
						{
							document.getElementById("Labmsg").innerHTML
					        +="Q"+results[i].name+")"+"Your Selected Answer is :"+results[i].value+"<br/>";
			            }
					}
				}
			}
			
    </script>					   
				   