<body>
<?php
	function buildMenu($m,$parent=0)
	{
		$html = "";
		foreach($m as $v)
		{
			if($v->PARENT_ID==$parent)
			{
				$child = buildMenu($m,$v->M_MENU_ID);	
				if($child)
				{
					if($v->PARENT_ID==0) $html .= "<li class=\"dropdown\">";
					else $html .= "<li>";
					$html .= "<a id=".$v->M_MENU_ID." href=\"#\" class=\"dropdown-toggle navbar-link\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".$v->NAME."<span class=\"caret\"></span></a>
							 <ul class=\"dropdown-menu\" role=\"menu\">";
					$html .= $child;
					$html .= "</ul>";
				}
				else
				{
					$html .= "<li><a href=\"#\" id=".$v->M_MENU_ID." onclick=\"$('#content').load('".base_url('index.php'.$v->URL)."')\">".$v->NAME."</a></li>";
				}
/*				if($child)
				{
					if($v->PARENT_ID==0) 
					{
						$html .= "<li class=\"dropdown\">";
						$html .= "<a href=\"#\" class=\"dropdown-toggle navbar-link\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".$v->NAME."<span class=\"caret\"></span></a>
							 <ul class=\"dropdown-menu\" role=\"menu\">";
					}
					else
					if($v->PARENT_ID!=0 && $child) 
					{
						$html .= "<li class=\"dropdown-submenu\">";
						$html .= "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".$v->NAME."</a>
							 <ul class=\"dropdown-menu\" role=\"menu\">";
					}					
					else 
					{
						$html .= "<li>";
						$html .= "<a href=\"#\" class=\"dropdown-toggle navbar-link\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">".$v->NAME."<span class=\"caret\"></span></a>
							 <ul class=\"dropdown-menu\" role=\"menu\">";
					}
					$html .= $child;
					$html .= "</ul>";
				}
				else
				if($child && $v->PARENT_ID!=0)
				{
					$html .= "<li class=\"dropdown-submenu\"><a href=\"#\" onclick=\"$('#content').load('".base_url('index.php'.$v->URL)."')\">".$v->NAME."</a></li>";					
				}
				else
				{
					$html .= "<li><a href=\"#\" onclick=\"$('#content').load('".base_url('index.php'.$v->URL)."')\">".$v->NAME."</a></li>";
				}
*/					
			}
		}
		return $html;
	}
	
?>


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="padding:10px;">
        <img alt="Brand" src="<?php echo base_url("asset/img/logo.png"); ?>" style="width:80px; height:30px">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--		<li><a href="#" onClick="$('#content').load('<?php echo base_url('index.php/dashboard/getPanel'); ?>');" id="dashboard">Dashboard</a></li>-->
		<?php echo buildMenu($menu); ?>
   		<li><a href="#" onClick="window.location = '<?php echo base_url('index.php/login/out'); ?>';">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text"><?php echo $full_name; ?></p></li>
      </ul>
    </div>
  </div>
  
</div>
<script>
$(function(){
		$.ajaxPrefilter('script', function(options) {
			options.cache = true;
		});			
		var task = function(){
				clearTimeout(timeOutId, 2000);	
				$.ajax({
							url: "<?php echo base_url('index.php/main/cek_session/'); ?>",
							method : "GET",
							success : function(response){
								var d = jQuery.parseJSON(response);
								if(d.total==0)
								{
									window.location.href="<?php echo base_url('index.php/login/out/'); ?>";
								}
								
								timeOutId = setTimeout(task, 2000);						
							},
							error : function(response){
								console.log(response);
								timeOutId = setTimeout(task, 2000);						
							}
			
				});
		 };
		 // Wait 500ms before calling our function. If the user presses another key 
		 // during that 500ms, it will be cancelled and we'll wait another 500ms.
	
		var timeOutId = 0;
	//	task();
		//OR use BELOW line to wait 10 secs before first call
		//timeOutId = setTimeout(task, 2000); 	


		function loadInboxNotif(page)
		{
			if(typeof page === 'undefined')
				page = 1;
			
			var par = new Array();
			par["page"] = page;

			par = $.extend({}, par);

			$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/approval/get/'); ?>",
				   data: par, // serializes the form's elements.
				   success: function(data)
				   {
					   
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {	
					   		var inbox = "";
					   		if(data.total>0) inbox = " <span class=\"label label-primary label-as-badge\" style=\"font-size:12px\">"+data.total+"</span>";
							else inbox = ""; 
							$("#26").html("Inbox Approval "+inbox+"");
					   }
				   }
				 });			
		}

	loadInboxNotif();
});
</script>

