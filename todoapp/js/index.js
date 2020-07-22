var id;
var output="";
$(document).ready(function(){
 fetch_data();
 $("#button_action").click(function()
 { 	
 	var task=$("#taskname").val();
 	var taskinfo=$("#taskinfo").val();
 	var priority=$("#priority").val();
 	if(task=='')
 	{
 		alert("Please enter task");
 		return;
 	}
 	else if(taskinfo=='')
 	{
 		alert("Please enter Task Description");
 		return ;
 	}
 	else if(priority=='')
 	{
 		alert("Please enter Task Priority");
 		return ;
 	}
 	else if(priority>10)
 	{
 		alert("Please enter range in valid range");
 		return ;
 	}
 	$.ajax({
   url:"task/add.php",
   data:{name:task,description:taskinfo,priority:priority},
   method:'POST',
   success:function(data)
   {
    		alert(data.message);
        fetch_data();
   }});
 	$('#api_crud_form')[0].reset();
 });
$("#button_act").click(function()
 {      
      var priority=$("#priority1").val();
      if(priority=='')
      {
        alert("Please enter Task Priority");
        return ;
      }
      else if(priority>10)
      {
          alert("Please enter range in valid range");
        return ;
      }
      else
      {
        $.ajax({
            url:"task/update.php",
            data:{id:id,edit:priority},
            method:'PUT',
            success:function(data)
            {
                $('#editdata')[0].reset();
                $('#editmodal').modal('hide');
                 alert(data.message);
                 fetch_data();
            }
            });
      }
    });
});
function del(id)
{
  $.ajax({
   url:"task/delete.php",
   data:{del:id},
   method:'DELETE',
   success:function(data)
   {
    alert(data.message);
    fetch_data();
   }
  });

}
function ed(id)
{
  this.id=id;
}
 function fetch_data()
 {
  $.ajax({
   url:"task/read.php",
   method:'get',
   success:function(data)
   {
    output="";
    if(data.records==undefined)
    {
        output+="<h3 class='text-center text-success'>No Tasks Found</h3>";
        $(".data").html(output);
    }
    else
    {
      console.log(data);
      output+="<table class='table table-bordered table-striped'><thead><tr><th>ID</th><th>Task</th><th>Description</th><th>Priority</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
      for(var i=0;i<data.records.length;i++)
      {
        output+="<tr><td>"+data.records[i].id+"</td><td>"+data.records[i].name+"</td><td>"+data.records[i].description+"</td><td>"+data.records[i].priority+"</td><td><button type='button' name='edit' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#editmodal' onclick='ed("+data.records[i].id+")'>Edit</button></td><td><button id='"+data.records[i].id+"' type='button' name='delete' class='btn btn-danger btn-xs' onclick='del(this.id)'>Delete</button></td></tr>";
      }
      output+="</tbody></table>";
      $(".data").html(output);
    }
   }
  });
 }