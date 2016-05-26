<div id="main" class="container bootcards-container">
<div class="row">

<!-- left list column -->
<div class="col-sm-12 bootcards-list" id="list" data-title="Contacts">
<div class="panel panel-default" style="margin-top:0px;">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">List Cabang</h3>
			<div class="col-xs-5">
			<form id="formSearch" role="form">
				<div class="form-group">
					<input class="form-control" type="text" name="name" id="search"  placeholder="Cari cabang...">
				</div>
			</form>
			</div>
			<div class="btn-group pull-right">
				<a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#addBranch" id="btnAdd">
				<i class="fa fa-plus"></i> 
				<span>Add</span>
				</a>
			</div>
		</div>
	<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped" id="branch_list">
      <thead>
        <tr class="info"><th>Name</th><th>Area</th><th>Aksi</th></tr>
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
</div>




<div class="modal fade" role="dialog" aria-hidden="true" id="addBranch">
  <div class="modal-dialog">
	<div class="modal-content">
    <form class="form-horizontal" id="formBranch">
    <div class="modal-header">
      <div class="btn-group pull-right">
        <button class="btn btn-danger" data-dismiss="modal" id="btnCancel">
          Cancel
        </button>
        <button class="btn btn-success save" data-dismiss="modal">
          Save
        </button>
      </div>
      <h3 class="modal-title pull-left">Cabang</h3>

    </div>

    <div class="modal-body"> 
      <div class="form-group">
        <label class="col-xs-3 control-label">Name</label>
        <div class="col-xs-9">
          <input type="hidden" name="m_branch_id" id="m_branch_id" class="form-control" placeholder="ID">
          <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-xs-3 control-label">Area</label>
        <div class="col-xs-9">
			<?php echo $area_id; ?>
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

		function loadBranch(page)
		{
			if(typeof page === 'undefined')
				page = 1;
			
			var par = new Array();
			par["page"] = page;

			q = $("#formSearch").serializeArray();

			$.each(q, function(k,v){
				par[v.name] = v.value;
			});

			par = $.extend({}, par);

			$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/branch/get/'); ?>",
				   data: par, // serializes the form's elements.
				   success: function(data)
				   {
					   //console.log(data);
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {
							$('#textpage').html("Page "+page+" of "+data.totpage);
							curpage = page;
							totpage = data.totpage;

						    $("#branch_list > tbody").empty();
							$.each(data.data, function(k,v){
								var html = "<tr><td>"+v.NAME+"</td>";
									html += "<td>"+v.AREA_ID+"</td>";
									html += "<td><div class='btn-group'>";
/*									html += "<button class='btn btn-small btn-danger'><i class='fa fa-trash-o'></i></button>";
*/									html += "<button class='btn btn-small btn-info'";
									html += " onclick=\"$('#btnAdd').trigger('click');"; 
									html += "$('#m_branch_id').val('"+v.M_BRANCH_ID+"');";
									html += "$('#name').val('"+v.NAME+"');";
									html += "$('#m_area_id').val('"+v.M_AREA_ID+"');\">";
									html += "<i class='fa fa-edit'></i></button>";
									html += "</div>";
									html += "</td></tr>";
								$("#branch_list").append(html);				   							
							});
					   }
				   }
				 });			
		}

	loadBranch();

	$(".save").click(function(){
			$("#formBranch").submit();		
	});
	
	$("#formBranch").submit(function() {
		$.ajax({
			   type: "POST",
			   url: "<?php echo base_url('index.php/branch/save'); ?>",
			   data: $("#formBranch").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						loadBranch();
						$("#m_branch_id").val(0);
						$("#formBranch").trigger("reset");
				   }
			   }
			 });
	
		return false; // avoid to execute the actual submit of the form.
	});		

	$("#next").click(function(){
		var next = curpage+1;
		if(next <= totpage) loadBranch(next);			
	});

	$("#prev").click(function(){
		var prev = curpage-1;
		if(prev >= 1) loadBranch(prev);			
	});
	
	$("#first").click(function(){
		var next = 1;
		loadBranch(next);			
	});

	$("#last").click(function(){
		var next = totpage;
		loadBranch(next);			
	});
	$("#btnCancel").click(function(){
		$("#m_branch_id").val(0);
		$("#formBranch").trigger("reset");
					
	});
	$("#search").keyup(function(){
			loadBranch(1, $("#formSearch").serializeArray());
	});
	
	
});
</script>