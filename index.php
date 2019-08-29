<!DOCTYPE html>
<html>
 <head>
  <title>Build your files structure</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Build your files structure</h2>
   <br /><br />
   <div class="row">
     <div class="col-md-6 card">
       <div class="card-body">
     <h3 align="center"><u>Add Files</u></h3>
     <br />
     <form method="post" id="treeview_form">
      <div class="form-group">
       <label>Select Parent</label>
       <select name="pid" id="pid" class="form-control">
       
       </select>
      </div>


	  <div class="form-group">
       <label>Select Type</label>
       <select name="type" id="type" class="form-control">
	   <option value="File">File</option>

       <option value="Folder" onclick="">Folder</option>
       </select>
      </div>




      <div class="form-group">
       <label>Enter Name</label>
       <input type="text" name="name" id="name" class="form-control">
      </div>

	  <div class="form-group">
	  <textarea row="50" cols="90" type="text" name="fileC" id="fileC" class="form-control"></textarea>
	  
	  </div>




      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>
     <form method="post" id="editYAML">
     <div class="form-group">
       <input type="submit" name="action" id="action" value="Edit YAML file" class="btn btn-info" />
      </div>
     </form>

    </div>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>Your File structure</u></h3>
     <br />
     <div id="treeview"></div>
	
     <form method="post" id="onSubmit">
     <div class="form-group">
       <input type="submit" name="action" id="action" value="Submit Repositories" class="btn btn-info" />
      </div>
     </form>
     <form method="post" id="buildJob">
     <div class="form-group">
       <input type="submit" name="action" id="action" value="Build Job" class="btn btn-info" />
      </div>
     </form>

    </div>
   </div>
  </div>
  </body>
</html>
<script>
var toRobin ="";


 $(document).ready(function(){
  fill_parent_category();

  fill_treeview();
  
 
  
  function fill_treeview()
  {console.log("Hari");
   $.ajax({
    url:"fetch.php",
    method:"GET",
    dataType:'Text',
    success:function(data){
      console.log("Robin");
        toRobin=data;
     $('#treeview').treeview({
      data:data
     });
     console.log(typeof(data));
    },
    error: function(xhr,status,error){
        alert(error);
    }

   })

   
  }
  

 
  


	function fill_parent_category()
  {
   $.ajax({
    url:'fill_parent_category.php',
    success:function(data){
     $('#pid').html(data);
     
    }
   });


   
   
  }

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   
   
   $.ajax({
    url:"add.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
     fill_treeview();
     fill_parent_category();
     $('#treeview_form')[0].reset();
     alert(data);
    }
   })
  }); 


  $('#onSubmit').on('submit', function(event){
   event.preventDefault();
   
    dataSend = toRobin;
    console.log(dataSend);
    console.log(typeof(dataSend));
    
    $.ajax({
    url:"http://localhost:8080/submitRepo",
    method:"POST",
    data:{"data":dataSend},
    success:function(data){
     
     alert(data);
    }
   })
   axios.post('http://localhost:8080/jenJob',{
     
    })
  //  window.location.href = "JenJob.php";
  });
  $('#buildJob').on('submit', function(event){
   event.preventDefault();
   axios.post('http://localhost:8080/jenJobBuild',{
     
    })
   
  });
  $('#editYAML').on('submit', function(event){
   event.preventDefault();
   window.location.href = "yaml.php";
   
  });


 });






</script>



