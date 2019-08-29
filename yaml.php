<!DOCTYPE html>
<html>
 <head>
  <title>Edit YAML File</title>
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
   <h2 align="center">Edit YAML File</h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
     <h3 align="center"><u>Toggle</u></h3>
     <br />
     <form method="post" id="treeview_form">
      


	  <div class="form-group">
       <label>Preunit-test</label>
       <select name="pre" id="pre" class="form-control">
	   <option value="No">No</option>
       <option value="Yes">Yes</option>
       </select>
      </div>

      <div class="form-group">
       <label>Postunit-test</label>
       <select name="pos" id="pos" class="form-control">
	   <option value="No">No</option>
       <option value="Yes">Yes</option>
       </select>
      </div>

      <div class="form-group">
       <label>Dev</label>
       <select name="dev" id="dev" class="form-control">
	   <option value="No">No</option>
       <option value="Yes">Yes</option>
       </select>
      </div>


      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>
    </div>
  </div>
  </body>
</html>
<script>


 $(document).ready(function(){
  
  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   var pre = document.getElementById("pre");
var preT = this['pre']['value'];

var pos = document.getElementById("pos");
var posT = this['pos']['value'];

var dev = document.getElementById("dev");
var devT = this['dev']['value'];
var final={
    "pre":preT,
    "pos":posT,
    "dev":devT
}
axios.post('http://localhost:8080/editYAML',{
     final
    })

// axios.post('http://localhost:8080/try',{
     
//     })
window.location.href = "index.php";

  }); 
});
  






</script>



