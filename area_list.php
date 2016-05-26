<div class="row">

<!-- left list column -->
<div class="col-sm-8 bootcards-list" id="list" data-title="Contacts">
<div class="panel panel-default" style="margin-top:0px; height:100%">
<div class="panel-heading">List Area</div>
<div class="panel-body" style="padding:0px;">
    <div class="btn-group" role="group" aria-label="...">
      <div class="btn-group" role="group">
		<a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#addArea" id="btnAdd">
		<i class="fa fa-plus"></i> 
		<span>Add</span>
		</a>
<!--          <a class="btn btn-primary" href="#" onclick="bootcards.hideOffCanvasMenu()" >
            <i class="fa fa-user-plus fa-fw"></i> 
            <span>Add</span>
          </a>
-->      </div>
    </div>

<!--
	<table class="table" id="applicantList">
    <thead>
    <tr><th>Nama</th>
    <th>Alamat</th>
    </tr>
    </thead>
    <tbody
    </tbody>
    </table>
-->
	<div class="table-responsive">
    <table class="table table-hover" id="area_list">
      <thead>
        <tr class="info"><th>Name</th><th>Action</th></tr>
      </thead>
      <tbody>

      </tbody>
    </table>
   </div>
  <div class="panel-footer center-block">
    <div class="btn-group" role="group" aria-label="...">
      <div class="btn-group" role="group">
          <a class="btn btn-default" href="#" id="first" >
            <i class="fa fa-fast-backward fa-fw"></i> 
            <span>First</span>
          </a>
          <a class="btn btn-default" href="#" id="prev" >
            <i class="fa fa-backward fa-fw"></i> 
            <span>Prev</span>
          </a>
          <a class="btn btn-default" href="#" id="next" >
            <i class="fa fa-forward fa-fw"></i> 
            <span>Next</span>
          </a>
          <a class="btn btn-default" href="#" id="last" >
            <i class="fa fa-fast-forward fa-fw"></i> 
            <span>Last</span>
          </a>
          <a class="btn btn-default" href="#" >
            <span id="textpage"></span>
          </a>
      </div>
    </div>

</div>
</div>
</div>
</div>
</div>




<div class="modal fade" role="dialog" aria-hidden="true" id="addArea">
  <div class="modal-dialog">
	<div class="modal-content">
    <form class="form-horizontal" id="formArea">
    <div class="modal-header">
      <div class="btn-group pull-right">
        <button class="btn btn-danger" data-dismiss="modal">
          Cancel
        </button>
        <button class="btn btn-success save" data-dismiss="modal">
          Save
        </button>
      </div>
      <h3 class="modal-title pull-left">Add</h3>

    </div>

    <div class="modal-body">  
      <div class="form-group">
        <label class="col-xs-3 control-label">Name</label>
        <div class="col-xs-9">
          <input type="hidden" name="m_area_id" id="m_area_id" class="form-control" placeholder="ID">
          <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
<!--    <small>Built with Bootcards - Form Card</small>
-->  </div>
          
    </div>
  </div>
</div>

<script>
$(function()
{
		var curpage = 1;
		var totpage = 1;

		function loadArea(page)
		{
			if(typeof page === 'undefined')
				page = 1;
			
			var par = new Array();
			par["page"] = page;

			//q = $("#formSearch").serializeArray();

			//$.each(q, function(k,v){
			//	par[v.name] = v.value;
			//});

			par = $.extend({}, par);

			$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/area/get/'); ?>",
				   data: par, // serializes the form's elements.
				   success: function(data)
				   {
					   console.log(data);
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {
							$('#textpage').html("Page "+page+" of "+data.totpage);
							curpage = page;
							totpage = data.totpage;

						    $("#area_list > tbody").empty();
							$.each(data.data, function(k,v){
								var html = "<tr><td>"+v.NAME+"</td>";
									html += "<td><div class='btn-group'>";
									html += "<button class='btn btn-small btn-danger'><i class='fa fa-trash-o'></i></button>";
									html += "<button class='btn btn-small btn-info'";
									html += " onclick=\"$('#btnAdd').trigger('click');"; 
									html += "$('#m_area_id').val('"+v.m_area_id+"');";
									html += "$('#name').val('"+v.NAME+"');\">";
									html += "<i class='fa fa-edit'></i></button>";
									html += "</div>";
									html += "</td></tr>";
								$("#area_list").append(html);				   							
							});
					   }
				   }
				 });			
		}

	loadArea();

	$(".save").click(function(){
			$("#formArea").submit();		
	});
	
	$("#formArea").submit(function() {
		$.ajax({
			   type: "POST",
			   url: "<?php echo base_url('index.php/area/save'); ?>",
			   data: $("#formArea").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
//						alert("Data tersimpan");
						loadArea();
						$("#formArea").trigger("reset");
						
				   }
			   }
			 });
	
		return false; // avoid to execute the actual submit of the form.
	});		

	$("#next").click(function(){
		var next = curpage+1;
		if(next <= totpage) loadArea(next);			
	});

	$("#prev").click(function(){
		var prev = curpage-1;
		if(prev >= 1) loadArea(prev);			
	});
	
	$("#first").click(function(){
		var next = 1;
		loadArea(next);			
	});

	$("#last").click(function(){
		var next = totpage;
		loadArea(next);			
	});
});
</script>