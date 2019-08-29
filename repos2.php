<!DOCTYPE html>
<html>
 <head>
  <title>Build your files structure</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Build your files structure</h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
     <h3 align="center"><u>Add Files</u></h3>
     <br />
     <form method="post" id="treeview_form">
      
      <div class="form-group">
       <label>Enter New Repositories</label>
       <input type="text" name="names" id="names" onchange='handleChange(event)' class="form-control">
      </div>

	  <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
	  
	  
	  
	

      
     </form>
    <form method="POST" id="Submit_form">
    <div class="form-group">
       <label>Select Repository</label>
       <select name="pid" id="pid" name ="" class="form-control">
       
       </select>
      </div>
	  <div class="form-group">
      <input type="submit" name="action" id="action" value="Next" class="btn btn-info" />
    
     </div>
    </form>

    </div>
    
     
	
   
   </div>
  </div>
  <script>
  var field="";
  function handleChange(event){

    field=event.target.value
  }


$(document).ready(function(){
 fill_parent_category();
 
 function fill_parent_category()
 {

  $.ajax({
   url:'get-repos.php',
   success:function(data){
    $('#pid').html(data);
     console.log(data);
   }
  });

 }

 $('#treeview_form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
   url:"http://localhost:8080/creatingRepo",
   method:"POST",
   data:{"rep":field},
   success:function(data){
    
    alert(field+" is created in github");
   }
  })

  $.ajax({
   url:"addRe.php",
   method:"POST",
   data:$(this).serialize(),
   success:function(data){
    fill_parent_category();
    alert(data);
   }
  })
 }); 


 $('#Submit_form').on('submit', function(event){
  event.preventDefault();
    var c=this['pid']['value'];
    var sendRepo = JSON.parse(c);
    console.log("############");
    console.log(typeof(sendRepo));
    
    console.log($(sendRepo).serialize());
    console.log("############");
    $.ajax({
       url:"http://localhost:8080/reposId",
       method:"POST",
       data:{'sendRepo1':sendRepo},
       success:function(data){
        alert(data);
       }
      })
     
      
      var e = document.getElementById("pid");
var strUser = e.options[e.selectedIndex].text;
   
$.ajax({
   url:"http://localhost:8080/repForJob",
   method:"POST",
   data:{"rep":strUser},
   success:function(data){
    
    alert("aaaa" );
   }
  })
  

 window.location.href = "index.php";

 });
});






</script>
 </body>
</html>



