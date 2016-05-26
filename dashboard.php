<div id="main" class="container bootcards-container">
<div class="row">
<!-- left list column -->
<div class="col-sm-6 bootcards-list" id="list" data-title="Contacts">
<div class="panel panel-default bootcards-summary">

	<div class="panel-heading">
		<h3 class="panel-title">Summary</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-6 col-sm-4" id="notif-applicant">
				<a class="bootcards-summary-item" style="padding-top:35px;" data-title="Applicant" data-pjax="#main" href="" onclick="$('#content').load('<?php echo base_url('index.php/applicant/getPanel/'); ?>');">
					<i class="fa fa-3x fa-lg fa-users"></i>
					<h4>
					<strong>Kandidat</strong>
					<span class="label label-info"><?php echo $applicant; ?></span>					
					</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-4" id="notif-jo">
				<a class="bootcards-summary-item" style="padding-top:35px;" data-title="jo" data-pjax="#main" href="" onclick="$('#content').load('<?php echo base_url('index.php/jo/getPanel/'); ?>');">
					<i class="fa fa-3x fa-lg fa-files-o"></i>
					<h4>
					<strong>Job Order</strong>
					<span class="label label-info"><?php echo $jo; ?></span>					
					</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-4" id="notif-inbox-app">
				<a class="bootcards-summary-item" style="padding-top:35px;" data-title="jo" data-pjax="#main" href="" onclick="$('#content').load('<?php echo base_url('index.php/approval/getPanel/'); ?>');">
					<i class="fa fa-3x fa-lg fa-envelope"></i>
					<h4>
					<strong>Inbox App</strong>
					<?php if($inbox > 0) {  ?>
						<span class="label label-info"><?php echo $inbox; ?> </span>	
					<?php
						}
					?>				
					</h4>
				</a>
			</div>
		</div>
<!--		<div class="row">
			<div class="col-xs-6 col-sm-4" id="notif-inbox-app">
				<a class="bootcards-summary-item" style="padding-top:35px;" data-title="jo" data-pjax="#main" href="" onclick="$('#content').load('<?php //echo base_url('index.php/approval/getPanel/'); ?>');">
					<i class="fa fa-3x fa-lg fa-envelope"></i>
					<h4>
					<strong>Inbox App</strong>
					<?php //if($inbox > 0) {  ?>
						<span class="label label-info"><?php //echo $inbox; ?> </span>	
					<?php
						//}
					?>				
					</h4>
				</a>
			</div>
		</div>
-->	</div>

</div>
</div><!-- end of left list -->

<!-- right list column -->
<div class="col-sm-6 bootcards-list" id="list" data-title="Contacts">
<div class="panel panel-default bootcards-summary"  id="report-dashboard">
	<div class="panel-heading">
      <h3 class="panel-title">Dashboard</h3>              
    </div>  
    <table class="table table-condesed" id="tbl_dashboard" style="font-size:12px">
      <thead>        
        <tr class="info"><td>Region</td><td>Kota</td><td>Klien</td><td>Bidang</td><td>Sisa JO</td></tr>
      </thead>
      <tbody>
      </tbody>
    </table>
	<div class="panel-footer">
	  <div class="btn-group" role="group">
		  <a class="btn btn-default" href="#" id="first" >
			<i class="fa fa-fast-backward fa-fw"></i> 
			<span>First</span>
		  </a>
		  <a class="btn btn-default" href="#" id="prev" >
			<i class="fa fa-backward fa-fw"></i> 
			<span>Prev</span>
		  </a>
		  <a class="btn btn-default" id="next" href="#" >
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
</div><!-- end of right list -->

</div>
</div>


<script>
<?php
foreach($akses as $k=>$v)
{
?>
	if($("#<?=$v?>").is(":visible"))
	{
		$("#<?=$v?>").hide();
		if($("#<?=$v?>").is(":visible"))
			$("#<?=$v?>").prop("visibility","hidden");
	}					
<?php
}
?>
$(function()
{
	$("a").click(function(e){
		e.preventDefault();	
	});
		var curpage = 1;
		var totpage = 1;

		function loadDashboard(page)
		{
			if(typeof page === 'undefined')
				page = 1;
			
			var par = new Array();
			par["page"] = page;

			/*q = $("#formSearch").serializeArray();

			$.each(q, function(k,v){
				par[v.name] = v.value;
			});*/

			par = $.extend({}, par);

			$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/dashboard/get/'); ?>",
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
							
							var buff = "";
							var buffer = "";

						    $("#tbl_dashboard > tbody").empty();
							$.each(data.data, function(k,v){
								var area = "";							
								var branch = "";							
								if(v.AREA==buff) 
								{
									area = "";
									branch = "";
								}
								else
								{
									area = v.AREA;
									branch = v.BRANCH;
									buff = v.AREA;
								}

								var klien = "";							
								if(v.CLIENT==buffer) 
								{
									klien = "";
								}
								else
								{
									klien = v.CLIENT;
									buffer = v.CLIENT;
								}
							

								var html = "<tr><td>"+area+"</td>";
									html += "<td>"+branch+"</td>";
									html += "<td>"+klien+"</td>";
									html += "<td>"+v.RUMPUN+"</td>";
									html += "<td align='center'>"+v.SISA_JO+"</td></tr>";
								$("#tbl_dashboard").append(html);				   							
							});
					   }
				   }
				 });			
		}

	loadDashboard();
	$("#next").click(function(){
		var next = curpage+1;
		if(next <= totpage) loadDashboard(next);			
	});

	$("#prev").click(function(){
		var prev = curpage-1;
		if(prev >= 1) loadDashboard(prev);			
	});
	
	$("#first").click(function(){
		var next = 1;
		loadDashboard(next);			
	});

	$("#last").click(function(){
		var next = totpage;
		loadDashboard(next);			
	});

});
</script>