<div id="main" class="container bootcards-container">
<!-- left list column -->
<div class="row">
<div class="col-sm-12 col-md-offset" id="form-detail" data-title="Contacts">
    <div class="panel panel-default" style="margin-top:0px;">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Change Password</h3>
        </div>
        <div class="panel-body" style="padding:10px;">
					<form class="form-horizontal" role="form" id="formUser" name="formUser">
                		<div class="form-group">
							<label for="name" class="control-label col-xs-6 col-md-2">Cabang</label>
							<div class="col-xs-6 col-md-3">
	                    		<input type='text' disabled value="<?php echo $BRANCH; ?>" class="form-control" name="branch" id="branch" placeholder="Username"/>
							</div>
						</div>
                		<div class="form-group">
							<label for="name" class="control-label col-xs-6 col-md-2">Username</label>
							<div class="col-xs-6 col-md-3">
	                    		<input type='text' class="form-control" disabled value="<?php echo $NAME; ?>" name="name" id="name" placeholder="Username"/>
	                    		<input type='hidden' class="form-control" name="m_user_id" id="m_user_id" placeholder="id" value="<?php echo $M_USER_ID; ?>"/>
							</div>
						</div>
                		<div class="form-group">
							<label for="district" class="control-label col-xs-6 col-md-2">Password Lama</label>
							<div class="col-xs-6 col-md-3">
	                    		<input type='password' class="form-control" name="password_lama" id="password_lama" placeholder="Password"/>
	                    		<input type='hidden' class="form-control" name="password_hidden" id="password_hidden" value="<?php echo $PASSWORD; ?>" placeholder="Password"/>
							</div>

						</div>
                		<div class="form-group">
							<label for="district" class="control-label col-xs-6 col-md-2">Password Baru</label>
							<div class="col-xs-6 col-md-3">
	                    		<input type='password' class="form-control" name="password" id="password" placeholder="Password"/>
							</div>

						</div>
                		<div class="form-group">
							<label for="district" class="control-label col-xs-6 col-md-2">Confirm Password</label>
							<div class="col-xs-6 col-md-3">
	                    		<input type='password' class="form-control" name="confirm_password" id="confirm_password" placeholder="Password"/>
							</div>

						</div>
                		<div class="form-group">
							<div class="col-xs-6 col-md-2">
							</div>
							<div class="col-xs-6 col-md-3">
								<div class="btn-group">
									<button class="btn btn-primary" id="saveUser">Save</button>
									<button class="btn btn-danger" id="resetUser">Reset</button>
								</div>
							</div>
                        </div>
					</form>	

		</div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
$(function(){
	$("#saveUser").click(function(){
			
			if($("#password").val()!=$("#confirm_password").val())
			{
				alert("Konfirmasi Password Tidak Sama");
				return false;
			}

			if($("#password_lama").val()!=$("#password_hidden").val())
			{
				alert("Password Lama Tidak Sesuai");
				return false;
			}

			if($("#password_lama").val()=="")
			{
				alert("Password Lama Harus Diisi");
				return false;
			}

			if($("#confirm_password").val()=="")
			{
				alert("Confirm Password Harus Diisi");
				return false;
			}

			if($("#password").val()=="")
			{
				alert("Password Harus Diisi");
				return false;
			}


			$("#formUser").ajaxForm({
					type: 'POST',
					url: "<?php echo base_url("index.php/user/save"); ?>",
					data: $(this).serialize(),
					success: function(data)
					{
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {
							alert("Data Berhasil Disimpan");
							$("#content").load("<?php echo base_url('index.php/user/getChangePassword'); ?>");
					   }
						else
						{
							alert(data.message);	
						}
					}
			});
	});

	$("#resetUser").click(function(e){
		e.preventDefault();
		$("#formUser").trigger("reset");
		$("#formUser input[type=hidden]").val(0);
	});
});