<!DOCTYPE html>
<html>
  <head>
    <title>PHP Mysql REST API CRUD Operations</title>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
 </head>
 <body>
  <div class="container"><br/>
   <h1 style="background:yellow;padding: 20px;" align="center">TodoApp in PHP</h1><br/>
   <div align="right" style="margin-bottom:5px;">
   <button type="button" name="add_button" data-toggle="modal" data-target="#apicrudModal" id="add_button" class="btn btn-success ">Add</button>
  </div>
   <div class="table-responsive data">
   </div>
  </div>
  <div id="apicrudModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Data</h4>
    </div>
    <div class="modal-body">
        <form id="api_crud_form">
          <div class="form-group">
            <label>Enter Task Name</label>
            <input type="text" name="taskname" id="taskname" class="form-control" />
          </div>
          <div class="form-group">
            <label>Enter Task Description</label>
            <input type="text" name="taskinfo" id="taskinfo" class="form-control" />
          </div>
          <div class="form-group">
            <label>Enter Priority in Range(0-10)</label>
            <input type="number" min="0" max="10" name="priority" id="priority" class="form-control" />
          </div>
        </form>
    </div>
    <div class="modal-footer">
        <input type="button" name="button_action" id="button_action" class="btn btn-info" value="Add Task"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  </div>
  </div>
  <div id="editmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
    </div>
    <div class="modal-body">
        <form id="editdata">
          <div class="form-group">
              <label>Edit Priority in Range(0-10)</label>
              <input type="number" min="0" max="10" name="priority" id="priority1" class="form-control" />
          </div>
        </form>
    </div>
    <div class="modal-footer">
      <input type="button" name="button_act" id="button_act" class="btn btn-info" value="Update Task"/>
    </div>
  </div>
  </div>
  </div>
</body>
</html>

