<link rel="stylesheet" href="<?php echo base_url('asset/css/token-input.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/token-input-facebook.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-tokenfield.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-tokenfield.min.css'); ?>"/>
<div id="main" class="container bootcards-container">
<div id="loading"></div>
<!-- left list column -->
<div class="row">
<div class="col-sm-10 col-md-offset-1" id="form-detail" data-title="Contacts">
    <div class="panel panel-default" style="margin-top:0px;">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Inbox Approval</h3>
<!--            <div class="btn-group pull-right" id="btnJO">
                <button type="button" class="btn btn-danger" id="btnListJO" onClick="$('#content').load('<?php //echo base_url('index.php/approval/getPanel/'); ?>');">
                  Cancel
                </button>        
                <button type="button" class="btn btn-success" id="save1">
                  Save
                </button>        
            </div>                   
-->        </div>
        <div class="panel-body" style="padding:0px;">
        	<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#detail_inbox_app">Inbox Approval</a></li>
				</ul>
            <div class="tab-content">
            	<div id="detail_inbox_app" class="tab-pane fade in active">
<!--                    <div class="panel-heading" style="background-color:#FFF">
                        <span style="font-size:14px; font-weight:bold">Inbox</span>
                    </div>
-->					<div class="panel-body" style="padding:10px;">
						<form class="form-horizontal" role="form" id="formInbox" name="formInbox">
							<div class="form-group">
								<label for="subunit_id" class="control-label col-xs-4 col-md-2">Creator</label>
								<div class="col-xs-6 col-md-3">									
									<input type='text' class="form-control" name="creator_name" id="creator_name" placeholder="creator id"  value="0" disabled="disabled"/>
									<input type='hidden' class="form-control" name="creator" id="creator" placeholder="creator"  value="0"/>
								</div>								
							</div>
							<div class="form-group">
								<label for="subunit_id" class="control-label col-xs-4 col-md-2">Nomor JO</label>
								<div class="col-xs-6 col-md-3">
									<input type='hidden' class="form-control" name="inbox_app_id" id="inbox_app_id" placeholder="record id"  value=<?php echo $inbox_app_id; ?>/>
									<input type='text' class="form-control" name="record_id" id="record_id" placeholder="record id"  value="0" readonly="readonly"/>
									<input type='hidden' class="form-control" name="fj_job_order_id" id="fj_job_order_id" placeholder="fj_job_order_id"  value="0" readonly="readonly"/>
								</div>								
								<div class="col-xs-6 col-md-3">
									<a class="btn btn-sm btn-primary viewJO"><i class="fa fa fa-file-text-o"></i>Lihat JO</a>
								</div>								
							</div>
							<div class="form-group">
								<label for="subunit_id" class="control-label col-xs-4 col-md-2">Pesan</label>
								<div class="col-xs-12 col-md-8">
								  	<textarea id="message1" class="form-control" name="message1" rows="5"></textarea>
								</div>								
							</div>
							<div class="form-group">
								<label for="subunit_id" class="control-label col-xs-4 col-md-2"></label>
								<div class="col-xs-12 col-md-8">
								  	<textarea id="message" class="form-control" name="message" rows="5" placeholder="Ketik pesan anda disini.."></textarea>
								</div>								
							</div>
							<div class="form-group">
								<label for="subunit_id" class="control-label col-xs-4 col-md-2">Respon</label>
								<div class="col-xs-6 col-md-3">
									<?php echo $workflow_status; ?>
								</div>								
<!--								<div class="col-xs-6 col-md-3" id="loading">
									                        
								</div>								
-->							</div>
						</form>
					</div>
				</div>
			</div>
			</div>		
		</div>
        <div class="panel-footer" id="footer_jo">
            <div class="btn-group pull-right" id="btnJO1">
                <button type="button" class="btn btn-danger" onClick="$('#content').load('<?php echo base_url('index.php/approval/getPanel/'); ?>');">
                  Cancel
                </button>        
                <button type="button" class="btn btn-success" id="save">
                  Save
                </button>
            </div>                            
        </div>
    </div>
</div>
</div>
</div>

<script>

$(function()
{
	/*$(this).ajaxStart(function(){
		$(".load").show();
	});
	$(this).ajaxStop(function(){
		$(".load").hide();
	});*/

	var activeTab = $('.nav-tabs .active > a').attr('href');

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	//show selected tab / active
	  activeTab = $(e.target).attr('href');
	  loadTab();
	});	
	
	function setUpper()
	{
		$("input[type=text]").val(function(){
			return this.value.toUpperCase();	
		});
		$("textarea").val(function(){
			return this.value.toUpperCase();	
		});

	}
	$("#message").hide();
	function loadInbox()
	{
			var id = $("#inbox_app_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/approval/getDetailInbox/'); ?>/"+id,
						beforeSend: function () { $(".load").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $(".load").hide(); },      
  					   success: function(data)
					   { 
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
//								console.log(data.user);
									if(k=="CREATOR")
									{
										$("#creator").val(v);
										if(v==data.user) 
										{
											$("#m_workflow_status_id").attr("disabled",true);
											$("#message1").attr("readonly",true);
											$("#message").hide();
											$("#save").attr("disabled",true);
										}										
										else
										{
											$("#m_workflow_status_id").attr("disabled",false);
											$("#message").show();
											$("#message1").attr("readonly",true);
											$("#message").focus();
											$("#save").attr("disabled",false);
										}
									}
									if(k=="MESSAGE")
									{
										if(v!=null)	$("#message1").val(v+"\n");
									}
									else
									{
										$("#"+k.toLowerCase()).val(v);	
									}									
								});
						   }
					   }
				});				
			}
	}
	
	$("#formInbox").ajaxForm({
			type: 'POST',
			url: "<?php echo base_url("index.php/approval/approval_input_jo"); ?>",
			data: $(this).serialize(),
			beforeSend: function () { $(".load").show(); },
			// hides the loader after completion of request, whether successfull or failor.             
			complete: function () { $(".load").hide(); },      
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
//					$("#inbox_app_id").val(data.id);
					alert("Data berhasil disimpan");
					$('#content').load('<?php echo base_url('index.php/approval/getPanel'); ?>');
/*					$("#reset").trigger("click");
					$("#formInbox").trigger("reset");
					$("input[type=hidden]").val(0);					
					$("input[type=checkbox]").attr("checked",false);					
					$("input[type=radio]").attr("checked",false);
					$("#min_year").hide();
					$("#job_function_id").hide();
*/										
			   }
			   else
			   {
					alert(data.message);				   
			   }
			}
	});
	
	$("#save").click(function(){
			setUpper();
			$("#formInbox").submit();
	});	

	$(".viewJO").click(function(){
		//window.open("http://jsc.simfatic-solutions.com","mywindow");
		window.open('<?php echo base_url('index.php/approval/ViewJO/'); ?>/'+$("#fj_job_order_id").val(),'_blank');
	});	
	
	$("#save1").click(function(){
			setUpper();
			$("#formInbox").submit();
	});	
	
	loadTab();
	
	function loadTab(page)
	{
		if(typeof page === 'undefined')
		{
			page = 1;
		}
		if(activeTab=="#detail_inbox_app")
		{
			loadInbox(page);
		}
	}
	$("textarea").css('text-transform','uppercase');

});
</script>