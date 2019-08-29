<!DOCTYPE html>
<html>
 <head>
  <title>Build your files structure</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Edit YAML file</h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
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
	   <option value"File">File</option>

       <option value"Folder" onclick="">Folder</option>
       </select>
      </div>




      <div class="form-group">
       <label>Enter Subfoldes/files</label>
       <input type="text" name="name" id="name" class="form-control">
      </div>

	  <div class="form-group">
	  <textarea row="50" cols"90" type="text" name="fileC" id="fileC" class="form-control"></textarea>
	  
	  </div>




      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>Your File structure</u></h3>
     <br />
     <div id="treeview"></div>

     <form method="post" id="submit_form">
     <div>
     <input type="submit" name="action" id="action" value="Submit Repositories" class="btn btn-info">
     </div>
     </form>
    </div>
   </div>
  </div>
  </body>
</html>
<script>


 $(document).ready(function(){
  
 
  
	

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
  
  }); 

  

  $('#submit_form').on('submit', function(event){
   event.preventDefault();
  






</script>



