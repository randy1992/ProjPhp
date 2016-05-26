<link rel="stylesheet" href="<?php echo base_url('asset/css/token-input.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/token-input-facebook.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-tokenfield.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-tokenfield.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-responsive.css'); ?>"/>
<div id="main" class="container bootcards-container">
<!-- left list column -->
<div class="row">
<div class="col-sm-12" id="form-detail" data-title="Contacts">
    <div class="panel panel-default" style="margin-top:0px;">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Detail Kandidat </h3>
            <h3 class="panel-title pull-left" style="padding-left:10px; font-style:italic; color:#F00" id="title_mandatory">(tanda * wajib diisi)</h3>
			<button type="button" class="btn btn-primary pull-right" id="btnlistkandidat" onClick="$('#content').load('<?php echo base_url('index.php/applicant/getPanel/'); ?>');">
			  List Kandidat
			</button>        
			<div class="btn-group pull-right" id="btnkandidat">
				<?php 
					if($form=="")
					{
				?>
                <button type="button" class="btn btn-primary" id="listkandidatbutton" onClick="$('#content').load('<?php echo base_url('index.php/applicant/getPanel/'); ?>');">
                  List Kandidat
                </button>        
				<?php
					}
				?>     
                <button type="button" class="btn btn-danger save" id="reset1" onClick="$('#content').load('<?php echo base_url('index.php/applicant/getDetail/0'); ?>');">
                  Reset
                </button> 
                <button type="button" class="btn btn-success save" id="save1-kandidat">
                  Save
                </button>     
            </div>                  
        </div>
        <div class="panel-body" style="padding:0px;">
        	<div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="dropdown">                
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Personal <b class="caret"></b></a>
                            <ul class="dropdown-menu">                
                                <li class="active"><a data-toggle="tab" href="#detail">Data Diri</a></li>
                                <li><a data-toggle="tab" href="#keluarga">Data Keluarga</a></li>
                                <li><a data-toggle="tab" href="#pendidikan">Pendidikan Formal</a></li>
                                <li><a data-toggle="tab" href="#kursus">Pelatihan/Kursus & Pengalaman Organisasi</a></li>
                                <li><a data-toggle="tab" href="#bahasa">Bahasa Asing & Keahlian Lain</a></li>
                                <li><a data-toggle="tab" href="#infolain">Informasi Lainnya & Alamat Dalam Keadaan Darurat</a></li>
                                <li><a data-toggle="tab" href="#pengalaman">Pengalaman Kerja</a></li>
<!--		                        <li><a data-toggle="tab" href="#psikotes">Psikotes</a></li>
-->                            </ul>
                        </li>
						<?php 
							if($form=="")
							{
						?>
                        <li class="dropdown" id="hasil-interview">                
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Interview <b class="caret"></b></a>
                            <ul class="dropdown-menu">                
                                <li><a data-toggle="tab" href="#interview">Hasil Interview</a></li>
                            </ul>
                        </li>
						<?php 
							if($tabs!="")
							{
						?>
                        <li class="tab" id="riwayat-applicant">                
                            <a data-toggle="tab"  href="#riwayat">Riwayat</a>
                        </li>
                        <li class="tab" id="kirim-jo">                
                            <a data-toggle="tab"  href="#kirim">Pengiriman</a>
                        </li>
						<?php
							}
							}
						?>
                    </ul>
                </div>
                <div id="form-tab" class="tab-content">
                <div class="tab-pane active" id="detail" data-id="0">
                            <div class="panel-heading" style="background-color:#FFF">
                                <span style="font-size:14px; font-weight:bold">DATA DIRI</span>
                            </div>
                            <div class="panel-body" style="padding:10px;">                                        
                                    <form class="form-horizontal" role="form" id="formApplicant" name="formApplicant">
                                        <div class="form-group">
                                            <label for="recso_id" class="control-label col-xs-3 col-md-3 <?php echo $vapplicant["recso_id"]["required"]; ?>">Bertemu Dengan</label>
                                            <div class="col-xs-3 col-md-3">
                                                <?php echo $recso_id; ?>
                                            </div>
                                           	<label for="recso_id" class="control-label col-xs-2">Cabang</label>
                                            <div class="col-xs-3">
                                                <?php echo $m_branch_id; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fj_source_media_id" class="control-label col-xs-3 <?php echo $vapplicant["fj_source_media_id"]["required"]; ?>">Sumber Informasi</label>
                                            <div class="col-xs-2">
                                                <?php echo $fj_source_media_id; ?>
                                            </div>
                                            <label for="remark_source_media" class="control-label col-xs-3 <?php echo $vapplicant["remark_source_media"]["required"]; ?>">Keterangan Sumber Informasi</label>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" id="remark_source_media" name="remark_source_media" placeholder="Keterangan Sumber Data">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_card_no" class="control-label col-xs-3 <?php echo $vapplicant["id_card_no"]["required"]; ?>">No. KTP</label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text" id="id_card_no" name="id_card_no" placeholder="No. KTP" autocomplete="off">
                                                <input class="form-control" type="hidden" id="fj_personal_id" name="fj_personal_id" value=<?php echo $fj_personal_id; ?> />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-xs-3 <?php echo $vapplicant["name"]["required"]; ?>">Nama</label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Nama" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender_id" class="control-label col-xs-3 <?php echo $vapplicant["gender_id"]["required"]; ?>">Jenis Kelamin</label>
                                            <div class="col-xs-4">
                                                <?php echo $gender_id; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birth_place" class="control-label col-xs-3 <?php echo $vapplicant["birth_place"]["required"]; ?>">Tempat Lahir</label>
                                            <div class="col-xs-3">
                                                <?php //echo $birth_place; ?>
                                                <input class="form-control" type="text" id="birth_place_name" name="birth_place_name" placeholder="Tempat Lahir" data-provide="typeahead" />
                                                <input class="form-control" type="hidden" id="birth_place_temp" placeholder="Tempat Lahir" />
                                                <input class="form-control" type="hidden" id="birth_place" name="birth_place" placeholder="Tempat Lahir" value=0 />
                                            </div>
                                            <label for="birth_place" class="control-label col-xs-2 <?php echo $vapplicant["birth_date"]["required"]; ?>">Tanggal Lahir</label>
                                            <div class="col-xs-3">
                                                <div class='input-group date ' id='birth_date'>
                                                    <input type='text' class="form-control" id="birth_date" name="birth_date"/>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="religion" class="control-label col-xs-3 <?php echo $vapplicant["religion_id"]["required"]; ?>">Agama</label>
                                            <div class="col-xs-4">
                                                <?php echo $religion_id; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="marital_status_id" class="control-label col-xs-3 <?php echo $vapplicant["marital_status_id"]["required"]; ?>">Status Perkawinan</label>
                                            <div class="col-xs-4">
                                                <?php echo $marital_status_id; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="control-label col-xs-3 <?php echo $vapplicant["email_address"]["required"]; ?>">Email</label>
                                            <div class="col-xs-9">
                                                <input class="form-control" type="text" id="email_address" name="email_address" placeholder="Email">
                                            </div>
                                        </div>
                                        <br />
                                        <span style="font-size:16px; font-weight:bold; margin-bottom:0px;">Alamat KTP</span>
                                        <hr style="margin-top:10px" />
                                        <div class="form-group">
                                            <label for="name" class="control-label col-xs-3 <?php echo $vapplicant["idcard_address"]["required"]; ?>">Alamat</label>
                                            <div class="col-xs-9">
                                                <textarea class="form-control" id="idcard_address" name="idcard_address" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-xs-3 <?php echo $vapplicant["idcard_sub_district_id"]["required"]; ?>">Kelurahan</label>
                                            <div class="col-xs-4">
                                                <?php //echo $sub_district_id; ?>
                                                <input type="text" class="form-control" id="idcard_sub_district_name" name="idcard_sub_district_name" placeholder="Kelurahan" data-provide="typeahead" />
                                                <input type="hidden" id="idcard_sub_district_id" name="idcard_sub_district_id" value="0" />
                                            </div>
                                            <label for="name" class="control-label col-xs-2 <?php echo $vapplicant["idcard_district_id"]["required"]; ?>">Kecamatan</label>
											<div class="col-xs-3">

                                                <input type="text" class="form-control" id="idcard_district_name" name="idcard_district_name" placeholder="Kecamatan" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="idcard_district_id" name="idcard_district_id" value="0" />
                                            </div>
                                         </div>


                                        <div class="form-group">
                                            <label for="city_id" class="control-label col-xs-3 <?php echo $vapplicant["idcard_city_id"]["required"]; ?>">Kota</label>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" id="idcard_city_name" name="idcard_city_name" placeholder="Kota" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="idcard_city_id" name="idcard_city_id" value="0" />
                                            </div>
                                            <label for="name" class="control-label col-xs-2 <?php echo $vapplicant["idcard_zipcode"]["required"]; ?>">Kode Pos</label>
                                            <div class="col-xs-3">
                                                <input class="form-control" type="text" id="idcard_zipcode" name="idcard_zipcode" placeholder="Kode Pos" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="province_id" class="control-label col-xs-3 <?php echo $vapplicant["idcard_state_id"]["required"]; ?>">Provinsi</label>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" id="idcard_state_name" name="idcard_state_name" placeholder="Provinsi" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="idcard_state_id" name="idcard_state_id" value="0" />
                                            </div>
                                        </div>
                                        <span style="font-size:16px; font-weight:bold; margin-bottom:0px;">Alamat Domisili</span>
                                        <hr style="margin-top:10px" />
                                        <div class="form-group">
                                            <div class="col-xs-5">
                                                <div class="input-group">
                                                  <span class="input-group-addon">
                                                      <input type="checkbox" id="sameaddress" name="sameaddress">
                                                  </span>
                                                      <input type="text" class="form-control" value="Alamat Sama" disabled="disabled" />
                                                </div><!-- /input-group -->
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label col-xs-3 <?php echo $vapplicant["address"]["required"]; ?>">Alamat</label>
                                            <div class="col-xs-9">
                                                <textarea class="form-control" id="address" name="address" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-xs-3 <?php echo $vapplicant["m_sub_district_id"]["required"]; ?>">Kelurahan</label>
                                            <div class="col-xs-4">
                                                <?php //echo $sub_district_id; ?>
                                                <input type="text" class="form-control" id="m_sub_district_name" name="m_sub_district_name" placeholder="Kelurahan" data-provide="typeahead" />
                                                <input type="hidden" id="m_sub_district_id" name="m_sub_district_id" value="0" />
                                            </div>
                                            <label for="name" class="control-label col-xs-2 <?php echo $vapplicant["m_district_id"]["required"]; ?>">Kecamatan</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="m_district_name" name="m_district_name" placeholder="Kecamatan" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="m_district_id" name="m_district_id" value="0" />
                                            </div>
                                         </div>
                                        <div class="form-group">
                                            <label for="city_id" class="control-label col-xs-3 <?php echo $vapplicant["m_city_id"]["required"]; ?>">Kota</label>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" id="m_city_name" name="m_city_name" placeholder="Kota" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="m_city_id" name="m_city_id" value="0" />
                                            </div>
                                            <label for="name" class="control-label col-xs-2 <?php echo $vapplicant["zipcode"]["required"]; ?>">Kode Pos</label>
                                            <div class="col-xs-3">
                                                <input class="form-control" type="text" id="zipcode" name="zipcode" placeholder="Kode Pos" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="province_id" class="control-label col-xs-3 <?php echo $vapplicant["m_state_id"]["required"]; ?>">Provinsi</label>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" id="m_state_name" name="m_state_name" placeholder="Provinsi" data-provide="typeahead" readonly="readonly" />
                                                <input type="hidden" id="m_state_id" name="m_state_id" value="0" />
                                            </div>
                                        </div>
										<br />
                                        <hr style="margin-top:10px" />
                                        <div class="form-group" id="hph">
                                            <label for="home_phone" class="control-label col-xs-3 <?php echo $vapplicant["home_phone"]["required"]; ?>">No. Telepon</label>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" id="home_phone" name="home_phone" placeholder="Rumah (pastikan nomor dapat dihubungi)">
                                            </div>
<!--                                            <div class="col-xs-2">
                                                <a href="#" id="plugin-methods-add">Add</a>
                                            </div>
-->                                         <div class="col-xs-4">
												<input class="form-control" type="text" id="handphone" name="handphone" placeholder="Handphone (pastikan nomor dapat dihubungi)">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bpjs" class="control-label col-xs-3 <?php echo $vapplicant["bpjs"]["required"]; ?>">No. BPJS</label>
                                            <div class="col-xs-3">
                                                <input class="form-control" type="text" id="bpjs" name="bpjs" placeholder="Nomor BPJS jika ada">
                                            </div>
                                            <label for="npwp" class="control-label col-xs-2 <?php echo $vapplicant["npwp"]["required"]; ?>">No. NPWP</label>
	                                        <div class="col-xs-3">
												<input class="form-control" type="text" id="npwp" name="npwp" placeholder="Nomor NPWP jika ada">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="height" class="control-label col-xs-3 <?php echo $vapplicant["blood_type_id"]["required"]; ?>">Gol. Darah</label>
                                            <div class="col-xs-3">
                                                <?php echo $blood_type_id; ?>
                                            </div>
                                            <label for="weight" class="control-label col-xs-2 <?php echo $vapplicant["skin_color_id"]["required"]; ?>">Warna Kulit</label>
                                            <div class="col-xs-3">
                                                <?php echo $skin_color_id; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="height" class="control-label col-xs-3 <?php echo $vapplicant["height"]["required"]; ?>">Tinggi Badan</label>
                                            <div class="col-xs-3">
                                                <div class="input-group">
                                                  <input class="form-control" type="text" id="height" name="height" placeholder="Tinggi(cm)">
                                                  <span class="input-group-addon" id="basic-addon1">Cm</span>
                                                </div>
                                            </div>
                                            <label for="weight" class="control-label col-xs-2 <?php echo $vapplicant["weight"]["required"]; ?>">Berat Badan</label>
                                            <div class="col-xs-3">
                                                <div class="input-group">
	                                              <input class="form-control" type="text" id="weight" name="weight" placeholder="Berat(kg)">
                                                  <span class="input-group-addon" id="basic-addon1">Kg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="province_id" class="control-label col-xs-3 <?php echo $vapplicant["file_photo"]["required"]; ?>">Pas Foto</label>
                                            <div class="col-xs-3">
												<img src="" id="file_photo_preview" width="85" height="100" />
                                                <input class="file" type="file" id="file_photo" name="file_photo">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="date" class="control-label col-xs-3 <?php echo $vapplicant["applicant_date"]["required"]; ?>">Tanggal</label>
                                            <div class="col-xs-3">
                                                <div class='input-group date' id='applicant_date'>
                                                    <input type='text' class="form-control" id="applicant_date" name="applicant_date" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                              </div>
                </div>
                
                <div class="tab-pane" id="keluarga" data-id="1">
                    <div class="panel-heading" style="background-color:#FFF">
                            <span style="font-size:14px; font-weight:bold">DATA KELUARGA</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">
					 	<form class="form-horizontal" role="form" id="formFamily" name="formFamily">                                                       
                        <div class="table">
                          <span style="font-size:16px; font-weight:bold; margin-bottom:0px;">Data Orang Tua dan Diri Sendiri</span>
                            <hr style="margin-top:10px" />
                            <input class="form-control" type="hidden" id="fj_family_id" name="fj_family_id" value="0">
                            <table class="table-condensed">
                                <thead>
                                    <tr class="active" align="center">
                                        <td><strong>Nama</strong></td>
                                        <td class="col-md-2"><strong>Tempat Lahir</strong></td>
                                        <td class="col-md-2"><strong>Tanggal Lahir</strong></td>
                                        <td class="col-md-2"><strong>Pendidikan</strong></td>
                                        <td class="col-md-2"><strong>Pekerjaan</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-md-3 <?php echo $vfamily["father_name"]["required"]; ?>">Bapak</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="father_name" name="father_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="father_place_birth_name" name="father_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="father_place_birth" name="father_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='father_dob' name='father_dob'>
                                                        <input type='text' class="form-control" id="father_dob" name="father_dob" placeholder="DD-MM-YYYY" />
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $father_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="father_occupation" name="father_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-xs-3 <?php echo $vfamily["mother_name"]["required"]; ?>">Ibu</label>
                                                <div class="col-xs-9">
                                                    <input type="text" class="form-control" id="mother_name" name="mother_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="mother_place_birth_name" name="mother_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="mother_place_birth" name="mother_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='mother_dob' name='mother_dob'>
                                                        <input type='text' class="form-control" id="mother_dob" name="mother_dob" placeholder="DD-MM-YYYY" />
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $mother_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
									<tr>
                                        <td colspan="5">
											<label class="control-label col-md-2 <?php echo $vfamily["family_order"]["required"]; ?>">Anak ke</label>
                                            <div class="col-md-1">
												<input type="text" class="form-control" id="family_order" name="family_order">
											</div>
                                            <div class="col-md-9">
	                                            <label class="control-label col-md-1">Dari</label>
                                                <div class="col-md-2"><input type="text" class="form-control" id="number_of_siblings" name="number_of_siblings" value="1" /></div>
                                                <label class="control-label col-md-1">Bersaudara</label>
                                            </div>
                                        </td>
									</tr>
                                </tbody>
                            </table>
						</div>
						<br  />
						<hr style="margin-top:10px" />
                        <div class="table">
                          <span style="font-size:16px; font-weight:bold; margin-bottom:0px;">Data Keluarga (bila sudah menikah)</span>
                            <hr style="margin-top:10px" />
                            <table class="table-condensed">
                                <thead>
                                    <tr class="active" align="center">
                                        <td><strong>Nama</strong></td>
                                        <td><strong>Tempat Lahir</strong></td>
                                        <td class="col-md-2"><strong>Tanggal Lahir</strong></td>
                                        <td><strong>Pendidikan</strong></td>
                                        <td><strong>Pekerjaan</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-xs-4">Pasangan</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="spouse_name" name="spouse_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="spouse_place_birth_name" name="spouse_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="spouse_place_birth" name="spouse_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='spouse_dob' name='spouse_dob'>
                                                        <input type='text' class="form-control" id="spouse_dob" name="spouse_dob" placeholder="DD-MM-YYYY" />
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $spouse_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="spouse_occupation" name="spouse_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-xs-4">Anak 1</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="child_1_name" name="child_1_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="child_1_place_birth_name" name="child_1_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="child_1_place_birth" name="child_1_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='child_1_dob' name='child_1_dob'>
                                                        <input type='text' class="form-control" id="child_1_dob" name="child_1_dob" placeholder="DD-MM-YYYY" />
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $child_1_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="child_1_occupation" name="child_1_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-xs-4">Anak 2</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="child_2_name" name="child_2_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="child_2_place_birth_name" name="child_2_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="child_2_place_birth" name="child_2_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='child_2_dob' name='child_2_dob'>
                                                        <input type='text' class="form-control" id="child_2_dob" name="child_2_dob" placeholder="DD-MM-YYYY"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $child_2_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="child_2_occupation" name="child_2_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
											<div class="form-group">
                                                <label class="control-label col-xs-4">Anak 3</label>
                                                <div class="col-xs-8">
                                                    <input type="text" class="form-control" id="child_3_name" name="child_3_name">
                                                </div>
                                             </div>
                                        </td>
                                        <td>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" id="child_3_place_birth_name" name="child_3_place_birth_name" data-provide="typeahead"/>
                                                    <input type="hidden" class="form-control" id="child_3_place_birth" name="child_3_place_birth" />
                                                </div>
											</div>										
										</td>
                                        <td>											
											<div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class='input-group date' id='child_3_dob' name='child_3_dob'>
                                                        <input type='text' class="form-control" id="child_3_dob" name="child_3_dob" placeholder="DD-MM-YYYY"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>                                                    
											</div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
													<?php echo $child_3_education; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>												
											<div class="form-group">
                                                <div class="col-xs-12">
	                                                <input type="text" class="form-control" id="child_3_occupation" name="child_3_occupation" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    	</div>											
                       </form>
					</div>
                </div>
                
                
                <div class="tab-pane" id="pendidikan" data-id="2">
                    <div class="panel-heading" style="background-color:#FFF">
                            <span style="font-size:14px; font-weight:bold">PENDIDIKAN FORMAL</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">                                        
                        <div class="table-responsive">
                        	<form class="form-horizontal" role="form" id="formEducation" name="formEducation">
                            <input class="form-control" type="hidden" id="fj_education_id" name="fj_education_id" value="0">
                            <table class="table">
                                <thead>
                                    <tr class="active">
                                        <td><div align="center"><strong>Tingkat Pendidikan</strong></div></td>
                                        <td><div align="center"><strong>Lembaga</strong></div></td>
                                        <td><div align="center"><strong>Jurusan</strong></div></td>
                                        <td><div align="center"><strong>Tahun Lulus</strong></div></td>
                                        <td><div align="center"><strong>IPK</strong></div></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Sekolah Menengah Atas</th>
                                        <td><input type="text" class="form-control" id="highschool_institution" name="highschool_institution" /></td>
                                        <td><input type="text" class="form-control" id="highschool_major" name="highschool_major" /></td>
                                        <td><input type="text" class="form-control" id="highschool_graduated" name="highschool_graduated" /></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th>Diploma (1/2/3)</th>
                                        <td><input type="text" class="form-control" id="diploma_institution" name="diploma_institution" /></td>
                                        <td><input type="text" class="form-control" id="diploma_major" name="diploma_major" /></td>
                                        <td><input type="text" class="form-control" id="diploma_graduated" name="diploma_graduated" /></td>
                                        <td><input type="text" class="form-control" id="diploma_gpa" name="diploma_gpa" /></td>
                                    </tr>
                                    <tr>
                                        <th>Sarjana (S1)</th>
                                        <td><input type="text" class="form-control" id="s1_institution" name="s1_institution" /></td>
                                        <td><input type="text" class="form-control" id="s1_major" name="s1_major" /></td>
                                        <td><input type="text" class="form-control" id="s1_graduated" name="s1_graduated" /></td>
                                        <td><input type="text" class="form-control" id="s1_gpa" name="s1_gpa" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>												
                    </div>

                </div>
                

                <div class="tab-pane" id="kursus" data-id="3">
                    <div class="panel-heading" style="background-color:#CCC">
                            <span style="font-size:14px; font-weight:bold">PELATIHAN DAN KURSUS</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">   
                        <form class="form-horizontal" role="form" id="formCourse" name="formCourse">
                            <div class="form-group">
                                <label for="institution" class="control-label col-md-2">Lembaga</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="institution" name="institution" placeholder="Lembaga">
                                    <input class="form-control" type="hidden" id="fj_courses_id" name="fj_courses_id" placeholder="ID">
                                    <input class="form-control" type="hidden" id="act" name="act" placeholder="Act">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="course_from" class="control-label col-md-2">Dari</label>
                                <div class="col-md-2">
									<?php echo $course_from_month; ?>
                                </div>
                                <div class="col-md-2">
									 <input class="form-control" type="text" id="course_from_year" name="course_from_year" maxlength="4" placeholder="Tahun" />
								</div>

                                <label for="course_to" class="control-label col-md-1">Sampai</label>
                                <div class="col-md-2">
									<?php echo $course_to_month; ?>
                                </div>
                                <div class="col-md-2">
									 <input class="form-control" type="text" id="course_to_year" name="course_to_year" maxlength="4" placeholder="Tahun" />
								</div>
							</div>                                  
                                                                                         
                            <div class="form-group">
                                <label for="course" class="control-label col-xs-2">Pelatihan & Kursus</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" id="course" name="course" placeholder="Pelatihan & Kursus">
                                </div>

                            </div>
	                    </form>	
							<div class="row">
                                <div class="form-group">
                                    <div class="col-xs-3 pull-right">
		                                <div class="btn-group">
        	                                <a class="btn btn-primary" id="add_course">Add to List</a>
            	                            <a class="btn btn-danger" id="cancel_course">Reset</a>
										</div>
                                    </div>
                                </div>
							</div>							
							<br  />
                            <div class="table">
								<div class="panel-heading" style="background-color:#FFFFFF;">
									<span style="font-size:14px; font-weight:bold">List Kursus</span>
								</div>
                                <table class="table table-hover table-bordered" id="tbl_kursus" style="font-size:12px;">
								  <thead>
									<tr class="info" align="center">
										<th>Lembaga</th>
										<th>Dari</th>
										<th>Sampai</th>
										<th>Pelatihan & Kursus</th>
										<th class="col-md-2">Hapus/Ubah</th>
									</tr>
								  </thead>
								  <tbody>								  
								  </tbody>
								</table>
                            </div>                        
                    </div>
					<br  />					
                    <div class="panel-heading" style="background-color:#CCC">
                            <span style="font-size:14px; font-weight:bold">PENGALAMAN ORGANISASI</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">   
                        <form class="form-horizontal" role="form" id="formOrganization" name="formOrganization">
                            <div class="form-group">
                                <label for="organization" class="control-label col-md-2">Nama Organisasi</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="organization" name="organization" placeholder="Nama Organisasi">
									<input class="form-control" type="hidden" id="fj_organization_id" name="fj_organization_id" placeholder="ID">
                                    <input class="form-control" type="hidden" id="act_org" name="act_org" placeholder="Act">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="organization_from" class="control-label col-md-2">Dari</label>
                                <div class="col-md-2">
									<?php echo $organization_from_month; ?>
                                </div>
                                <div class="col-md-2">
									 <input class="form-control" type="text" id="organization_from_year" name="organization_from_year" maxlength="4" placeholder="Tahun" />
								</div>

                                <label for="organization_to" class="control-label col-md-1">Sampai</label>
                                <div class="col-md-2">
									<?php echo $organization_to_month; ?>
                                </div>
                                <div class="col-md-2">
									 <input class="form-control" type="text" id="organization_to_year" name="organization_to_year" maxlength="4" placeholder="Tahun" />
								</div>
							</div>                                 
							<div class="form-group">
                                <label for="position" class="control-label col-xs-2">Posisi</label>
                                <div class="col-xs-9">
                                    <input class="form-control" type="text" id="position" name="position" placeholder="Posisi">
                                </div>
                            </div>                                  
						</form>
							<div class="row">
                                <div class="form-group">
                                    <div class="col-xs-3 pull-right">
		                                <div class="btn-group">
        	                                <button class="btn btn-primary" id="add_org">Add to List</button>
            	                            <button class="btn btn-danger" id="cancel_org">Reset</button>
										</div>
                                    </div>
                                </div>
							</div>
							<br  />							
							<div class="table-responsive">
								<div class="panel-heading" style="background-color:#FFFFFF;">
									<span style="font-size:14px; font-weight:bold;">List Organisasi</span>
								</div>
                                <table class="table table-bordered" id="tbl_organisasi" style="font-size:12px;">
                                  <thead>
                                    <tr class="info">
										<th>Nama Organisasi</th>
										<th>Dari</th>
										<th>Sampai</th>
										<th>Posisi</th>
										<th class="col-md-2">Hapus/Ubah</th>
									</tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                            </div>							                                          
                    </div>
                </div>
                <div class="tab-pane" id="bahasa">
                    <div class="panel-heading" style="background-color:#CCC">
                            <span style="font-size:14px; font-weight:bold;">BAHASA ASING</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">
                        <form class="form-horizontal" role="form" id="formLanguage" name="formLanguage">
                            <div class="form-group">
                                <label for="language" class="control-label col-xs-2">Bahasa Asing</label>
                                <div class="col-xs-4">
                                    <input class="form-control" type="hidden" id="fj_language_id" name="fj_language_id" placeholder="ID">
                                    <input class="form-control" type="hidden" id="act_language" name="act_language" placeholder="Act">
	                                <?php echo $language_id; ?>
                                </div>
                            </div>                                  
                            <div class="form-group">
                                <label for="written" class="control-label col-xs-2">Level</label>
                                <div class="col-xs-4">
	                                <?php echo $language_level_id; ?>
                                </div>
								<div class="col-xs-3 pull-left">
									<div class="btn-group">
										<a class="btn btn-primary" id="add_language">Add to List</a>
										<a class="btn btn-danger" id="cancel_language">Reset</a>
									</div>
								</div>
                            </div>
						</form>
							<br  />						
							<div class="table-responsive">
								<div class="panel-heading" style="background-color:#FFFFFF;">
									<span style="font-size:14px; font-weight:bold">List Bahasa Asing</span>
								</div>
                                <table class="table table-hover table-bordered" id="tbl_bahasa" style="font-size:12px;">
                                  <thead>
                                    <tr class="info">
										<th>Bahasa Asing</th>
										<th>Level</th>
										<th class="col-md-2">Hapus/Ubah</th>
									</tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                            </div>							                                                                  						
                    </div>
					<br  />
					<hr  />
					<div class="panel-heading" style="background-color:#CCC">
                            <span style="font-size:14px; font-weight:bold">KEAHLIAN LAIN</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">
                    	<form class="form-horizontal" role="form" id="formSkill" name="formSkill">
                          <input class="form-control" type="hidden" id="fj_skill_id" name="fj_skill_id" placeholder="ID" value="0">
                             <div class="table-responsive">
								<table class="table table-bordered">
								  <thead>
									<tr class="active" align="center">
										<td><strong>Keahlian Lain</strong></td>
										<td><strong>Kurang</strong></td>
										<td><strong>Cukup</strong></td>
										<td><strong>Baik</strong></td>
									</tr>
								  </thead>
								  <tbody>
									<tr align="center">
										<td>Pajak</td>
										<td><input type="radio" name="skill_1" id="skill_1" value="kurang" class="skill_1_kurang" /></td>
										<td><input type="radio" name="skill_1" id="skill_1" value="cukup" class="skill_1_cukup" /></td>
										<td><input type="radio" name="skill_1" id="skill_1" value="baik" class="skill_1_baik" /></td>
									</tr>
									<tr align="center">
										<td>Excel</td>
										<td><input type="radio" name="skill_2" id="skill_2" value="kurang" class="skill_2_kurang" /></td>
										<td><input type="radio" name="skill_2" id="skill_2" value="cukup" class="skill_2_cukup" /></td>
										<td><input type="radio" name="skill_2" id="skill_2" value="baik" class="skill_2_baik" /></td>
									</tr>
									<tr align="center">
										<td>Akuntansi</td>
										<td><input type="radio" name="skill_3" id="skill_3" value="kurang" class="skill_3_kurang"/></td>
										<td><input type="radio" name="skill_3" id="skill_3" value="cukup" class="skill_3_cukup" /></td>
										<td><input type="radio" name="skill_3" id="skill_3" value="baik" class="skill_3_baik" /></td>
									</tr>
									<tr align="center">
										<td>Photoshop</td>
										<td><input type="radio" name="skill_4" id="skill_4" value="kurang" class="skill_4_kurang" /></td>
										<td><input type="radio" name="skill_4" id="skill_4" value="cukup" class="skill_4_cukup" /></td>
										<td><input type="radio" name="skill_4" id="skill_4" value="baik" class="skill_4_baik" /></td>
									</tr>
								  </tbody>
								</table>
                            </div>                        
				    	</form>
					</div>
                </div>
				
				
						
                <div class="tab-pane" id="infolain">
                    <div class="panel-heading" style="background-color:#CCC">
                         <span style="font-size:14px; font-weight:bold">INFORMASI LAINNYA</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">                                        
						<form class="form-horizontal" role="form" id="formOthers" name="formOthers">
							<div class="form-group">
								<label for="salary" class="control-label col-xs-3">Gaji yang diharapkan</label>
								<div class="col-xs-4">
									<input class="form-control" type="hidden" id="fj_others_id" name="fj_others_id" value="0">
									<input class="form-control" type="text" id="expected_salary_name" name="expected_salary_name" placeholder="Gaji yang diharapkan" value="0">
<!--									  data-a-sign="Rp " data-a-dec="," data-a-sep="."-->
									<input class="form-control" type="hidden" id="expected_salary" name="expected_salary" value="0">
								</div>
								<label for="salary" class="control-label col-xs-4" style="text-align:left; color:#FF0000; font-weight:bold;">Tuliskan nominal tanpa titik(.) dan/atau koma(,)</label>
							</div>
							<div class="form-group">
								<label for="height" class="control-label col-xs-3">Kesiapan Bekerja</label>
								<div class="col-xs-4">
									<?php echo $available_id; ?>
								</div>
								<div class="col-xs-4">
									<div class='input-group date' id='available_date'>
										<input type='text' class="form-control" name="available_date" id="available_date"/>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>

							<!--<span style="font-size:16px; font-weight:bold; margin-bottom:0px;">Additional Information</span>-->
							<hr style="margin-top:10px" />
							
							<div class="form-group">
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="shift" name="shift"/>
									  </span>
										  <input type="text" class="form-control" value="Bersedia Kerja Shift" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="motorcycle" name="motorcycle">
									  </span>
										  <input type="text" class="form-control" value="Memiliki Motor" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="overtime" name="overtime">
									  </span>
										  <input type="text" class="form-control" value="Bersedia Kerja Lembur" disabled="disabled" />
									</div><!-- /input-group -->
								 </div>
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="car" name="car">
									  </span>
										  <input type="text" class="form-control" value="Memiliki Mobil" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="certificate" name="certificate">
									  </span>
										  <input type="text" class="form-control" value="Bersedia Peminjaman Ijazah" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="sim_a" name="sim_a">
									  </span>
										  <input type="text" class="form-control" value="Memiliki SIM A" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="oversea" name="oversea">
									  </span>
										  <input type="text" class="form-control" value="Bersedia Kerja Di Luar Kota" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="sim_b" name="sim_b">
									  </span>
										  <input type="text" class="form-control" value="Memiliki SIM B" disabled="disabled" />
									</div><!-- /input-group -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<label for="salary" class="control-label col-xs-5">Jika ya, dimana</label>								
									<div class="col-xs-7">
<!--                                        <select class="form-control js-example-basic-multiple js-states" id="oversea_city" name="oversea_city[]" multiple="multiple" style="width:100%;">
										<?php
/*											foreach($oversea_id as $k=>$v)
											{
												echo "<option value=\"".$v["id"]."\">".$v["name"]."</option>";		
											}
*/										?>
                                        </select>
-->
                                        <input type="text" class="form-control" id="oversea_city" name="oversea_city" />
									</div>
								</div>	
								<div class="col-xs-6">
									<div class="input-group">
									  <span class="input-group-addon">
										  <input type="checkbox" id="sim_c" name="sim_c">
									  </span>
										  <input type="text" class="form-control" value="Memiliki SIM C" disabled="disabled" />
									</div>
								</div>
							</div>
						</form>
					</div>				  
                    <div class="panel-heading" style="background-color:#CCC">
                            <span style="font-size:14px; font-weight:bold">ALAMAT DALAM KEADAAN DARURAT</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">
						<label for="salary" class="control-label col-xs-10">*Saudara yang tidak tinggal serumah</label>
						<hr  />								
                        <div class="table-condensed">
	                        <form class="form-horizontal" role="form" id="formEmergency" name="formEmergency">
                            <input class="form-control" type="hidden" id="fj_emergency_id" name="fj_emergency_id" value="0">
                            <table class="table-condensed" align="center">
                                <thead>
                                    <tr class="active">
                                        <td><div align="center"><strong>Nama</strong></div></td>
                                        <td><div align="center"><strong>Alamat</strong></div></td>
                                        <td><div align="center"><strong>Hubungan</strong></div></td>
                                        <td><div align="center"><strong>Telepon</strong></div></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td valign="top"><input class="form-control" type="text" id="emergency_name" name="emergency_name" placeholder="Nama"></td>
                                      <td valign="top"><input name="emergency_address" type="text" class="form-control" id="emergency_address" value="" placeholder="Alamat" /></td>
                                        <td valign="top"><input class="form-control" type="text" id="emergency_relation" name="emergency_relation" placeholder="Hubungan"></td>
                                        <td valign="top"><input class="form-control" type="text" id="emergency_number" name="emergency_number" placeholder="Telepon"></td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><input class="form-control" type="text" id="emergency_name_2" name="emergency_name_2" placeholder="Nama"></td>
                                      <td valign="top"><input name="emergency_address_2" type="text" class="form-control" id="emergency_address_2" value="" placeholder="Alamat" /></td>
                                        <td valign="top"><input class="form-control" type="text" id="emergency_relation_2" name="emergency_relation_2" placeholder="Hubungan"></td>
                                        <td valign="top"><input class="form-control" type="text" id="emergency_number_2" name="emergency_number_2" placeholder="Telepon"></td>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>																	
                    </div>
                </div>

                <div class="tab-pane" id="pengalaman">
                    <div class="panel-heading" style="background-color:#FFF">
                    	<span style="font-size:14px; font-weight:bold">PENGALAMAN KERJA</span>
                   	</div>
                    <div class="panel-body" style="padding:10px;">   
                        <form class="form-horizontal" role="form" id="formExperience" name="formExperience">
                            <div class="form-group">
                                <label for="company_name" class="control-label col-xs-2">Nama Perusahaan</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="hidden" id="fj_job_experience_id" name="fj_job_experience_id" placeholder="Id">
                                    <input class="form-control" type="hidden" id="act_exp" name="act_exp" placeholder="Act">
                                    <input class="form-control" type="text" id="company_name" name="company_name" placeholder="Nama Perusahaan">
                                </div>
                            </div>                                  
							<div class="form-group">
                                <label for="position" class="control-label col-xs-2">Jabatan</label>
                                <div class="col-xs-8">
                                	<input class="form-control" type="text" id="experience_position" name="experience_position" placeholder="Jabatan / Posisi">
                                </div>
                            </div>							
                            <div class="form-group">
                                <label for="work_from_date" class="control-label col-xs-2">Dari</label>
                                <div class="col-xs-3">
									<div class='input-group date' id='experience_from_date'>
										<input type='text' class="form-control" id="experience_from_date" name="experience_from_date" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
                                </div>
                                <label for="work_to_date" class="control-label col-xs-2">Sampai</label>
                                <div class="col-xs-3">
									<div class='input-group date' id='experience_to_date'>
										<input type='text' class="form-control" id="experience_to_date" name="experience_to_date" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="main_business" class="control-label col-xs-2">Fungsi Kerja</label>
                                <div class="col-xs-4">
	                                <?php echo $job_function_id; ?>
                                </div>
                            </div>                                  
							<div class="form-group">
                                <label for="job_duties" class="control-label col-xs-2">Nama Atasan</label>
                                <div class="col-xs-8">
                                	<input class="form-control" type="text" id="boss_name" name="boss_name" placeholder="Nama Atasan">
                                </div>
                            </div>							
							<div class="form-group">
                                <label for="reason_for_leaving" class="control-label col-xs-2">Jabatan</label>
                                <div class="col-xs-8">
                                	<input class="form-control" type="text" id="boss_position" name="boss_position" placeholder="Jabatan Atasan">
                                </div>
                            </div>							
							<div class="form-group">
                                <label for="last_salary" class="control-label col-xs-2">No Telepon</label>
                                <div class="col-xs-8">
                                	<input class="form-control" type="text" id="boss_phone_number" name="boss_phone_number" placeholder="No Telepon Atasan">
                                </div>
                            </div>							
	                    </form>	
							<div class="row">
                                <div class="form-group">
                                    <div class="col-xs-3 pull-right">
		                                <div class="btn-group">
        	                                <button class="btn btn-primary" id="add_experience">Add to List</button>
            	                            <button class="btn btn-danger" id="cancel_experience">Reset</button>
										</div>
                                    </div>
                                </div>
							</div>							
							<br  />
                            <div class="table-responsive">
								<div class="panel-heading" style="background-color:#FFFFFF;">
									<span style="font-size:14px; font-weight:bold;">List Pengalaman Kerja</span>
								</div>
								<table class="table table-bordered" id="tbl_pengalaman" style="font-size:12px;">
								  <thead>
									<tr class="info" align="center">
										<th>Nama Perusahaan</th>
										<th>Jabatan</th>
										<th>Dari</th>
										<th>Sampai</th>
										<th>Fungsi Kerja</th>
										<th>Nama Atasan</th>
										<th>Jabatan Atasan</th>
										<th>No Tlp Atasan</th>
										<th class="col-md-2">Hapus/Ubah</th>
									</tr>
								  </thead>
								  <tbody>
								  
								  </tbody>
								</table>
                            </div>                        
                    </div>
                </div>	
                <div class="tab-pane" id="psikotes">
                    <div class="panel-heading" style="background-color:#CCC">
                    	<span style="font-size:14px; font-weight:bold">Psikotes</span>
                   	</div>
                    <div class="panel-body" style="padding:10px;">   
                        <form class="form-horizontal" role="form" id="formPsikotes" name="formPsikotes">
                            <div class="form-group">
                                <label for="company_name" class="control-label col-xs-2">Tgl Psikotes</label>
                                <div class="col-xs-3">
                                    <input class="form-control" type="hidden" id="fj_psychotest_id" name="fj_psychotest_id" placeholder="Id" value="0">
									<div class='input-group date' id='psychotest_date'>
										<input type='text' class="form-control" id="psychotest_date" name="psychotest_date" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
                                </div>
                            </div>                                  
	                    </form>							                       
                    </div>
                </div> <!-- END OF DATA PSIKOTES -->					
                <div class="tab-pane" id="interview">
                    <div class="panel-heading" style="background-color:#FFF">
                            <span style="font-size:14px; font-weight:bold">HASIL INTERVIEW</span>
                    </div>
                    <div class="panel-body" style="padding:10px;">   
                        <form class="form-horizontal" role="form" id="formInterview" name="formInterview">
							<div class="form-group">
                              <label for="aspect_1" class="control-label col-xs-2">Tanggal Interview</label>
                                <div class="col-xs-3">
									<div class='input-group date' id='interview_date'>
										<input type='text' class="form-control" id="interview_date" name="interview_date" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
                                </div>
							</div>
                           	<div class="form-group">
                                <label for="aspect_1" class="control-label col-xs-2">Nama Interviewer</label>
                                <div class="col-xs-3">
                                    <input class="form-control" type="hidden" id="fj_interview_result_id" name="fj_interview_result_id" value="0">
                                    <input class="form-control" type="text" id="interviewer" name="interviewer" placeholder="Nama Interviewer">
                                </div>
                            </div>                                  
                             <div class="table-responsive">
								<table class="table table-bordered">
								  <thead>
									<tr class="info" align="center">
										<td><strong>Aspek</strong></td>
										<td><strong>Kurang</strong></td>
										<td><strong>Agak Kurang</strong></td>
										<td><strong>Cukup</strong></td>
										<td><strong>Cukup Baik</strong></td>
										<td><strong>Baik</strong></td>
									</tr>
								  </thead>
								  <tbody>
									<tr align="center">
										<td>Inisiatif</td>
										<td><input type="radio" name="result1" id="result1" value="1" class="result1_1" /></td>
										<td><input type="radio" name="result1" id="result1" value="2" class="result1_2"/></td>
										<td><input type="radio" name="result1" id="result1" value="3" class="result1_3"/></td>
										<td><input type="radio" name="result1" id="result1" value="4" class="result1_4"/></td>
										<td><input type="radio" name="result1" id="result1" value="5" class="result1_5"/></td>
									</tr>
									<tr align="center">
										<td>Motivasi Kerja</td>
										<td><input type="radio" name="result2" id="result2" value="1" class="result2_1" /></td>
										<td><input type="radio" name="result2" id="result2" value="2" class="result2_2" /></td>
										<td><input type="radio" name="result2" id="result2" value="3" class="result2_3" /></td>
										<td><input type="radio" name="result2" id="result2" value="4" class="result2_4" /></td>
										<td><input type="radio" name="result2" id="result2" value="5" class="result2_5" /></td>
									</tr>
									<tr align="center">
										<td>Kepercayaan Diri</td>
										<td><input type="radio" name="result3" id="result3" value="1" class="result3_1" /></td>
										<td><input type="radio" name="result3" id="result3" value="2" class="result3_2" /></td>
										<td><input type="radio" name="result3" id="result3" value="3" class="result3_3" /></td>
										<td><input type="radio" name="result3" id="result3" value="4" class="result3_4" /></td>
										<td><input type="radio" name="result3" id="result3" value="5" class="result3_5" /></td>
									</tr>
									<tr align="center">
										<td>Komunikasi</td>
										<td><input type="radio" name="result4" id="result4" value="1" class="result4_1" /></td>
										<td><input type="radio" name="result4" id="result4" value="2" class="result4_2" /></td>
										<td><input type="radio" name="result4" id="result4" value="3" class="result4_3" /></td>
										<td><input type="radio" name="result4" id="result4" value="4" class="result4_4" /></td>
										<td><input type="radio" name="result4" id="result4" value="5" class="result4_5" /></td>
									</tr>
									<tr align="center">
										<td>Kematangan Emosi</td>
										<td><input type="radio" name="result5" id="result5" value="1" class="result5_1" /></td>
										<td><input type="radio" name="result5" id="result5" value="2" class="result5_2" /></td>
										<td><input type="radio" name="result5" id="result5" value="3" class="result5_3" /></td>
										<td><input type="radio" name="result5" id="result5" value="4" class="result5_4" /></td>
										<td><input type="radio" name="result5" id="result5" value="5" class="result5_5" /></td>
									</tr>
									<tr align="center">
										<td>Penampilan</td>
										<td><input type="radio" name="result6" id="result6" value="1" class="result6_1" /></td>
										<td><input type="radio" name="result6" id="result6" value="2" class="result6_2" /></td>
										<td><input type="radio" name="result6" id="result6" value="3" class="result6_3" /></td>
										<td><input type="radio" name="result6" id="result6" value="4" class="result6_4" /></td>
										<td><input type="radio" name="result6" id="result6" value="5" class="result6_5" /></td>
									</tr>
									<tr align="center">
										<td>Negosiasi</td>
										<td><input type="radio" name="result7" id="result7" value="1" class="result7_1" /></td>
										<td><input type="radio" name="result7" id="result7" value="2" class="result7_2" /></td>
										<td><input type="radio" name="result7" id="result7" value="3" class="result7_3" /></td>
										<td><input type="radio" name="result7" id="result7" value="4" class="result7_4" /></td>
										<td><input type="radio" name="result7" id="result7" value="5" class="result7_5" /></td>
									</tr>
									<tr align="center">
										<td>Orientasi Pelayanan</td>
										<td><input type="radio" name="result8" id="result8" value="1" class="result8_1" /></td>
										<td><input type="radio" name="result8" id="result8" value="2" class="result8_2" /></td>
										<td><input type="radio" name="result8" id="result8" value="3" class="result8_3" /></td>
										<td><input type="radio" name="result8" id="result8" value="4" class="result8_4" /></td>
										<td><input type="radio" name="result8" id="result8" value="5" class="result8_5" /></td>
									</tr>
									<tr align="center">
										<td>Leadership</td>
										<td><input type="radio" name="result9" id="result9" value="1" class="result9_1" /></td>
										<td><input type="radio" name="result9" id="result9" value="2" class="result9_2" /></td>
										<td><input type="radio" name="result9" id="result9" value="3" class="result9_3" /></td>
										<td><input type="radio" name="result9" id="result9" value="4" class="result9_4" /></td>
										<td><input type="radio" name="result9" id="result9" value="5" class="result9_5" /></td>
									</tr>
									<tr align="center">
										<td>Bahasa Inggris</td>
										<td><input type="radio" name="result10" id="result10" value="1" class="result10_1" /></td>
										<td><input type="radio" name="result10" id="result10" value="2" class="result10_2" /></td>
										<td><input type="radio" name="result10" id="result10" value="3" class="result10_3" /></td>
										<td><input type="radio" name="result10" id="result10" value="4" class="result10_4" /></td>
										<td><input type="radio" name="result10" id="result10" value="5" class="result10_5" /></td>
									</tr>
									<tr align="center">
										<td>Dialek Aksen</td>
										<td><input type="radio" name="result11" id="result11" value="1" class="result11_1" /></td>
										<td><input type="radio" name="result11" id="result11" value="2" class="result11_2" /></td>
										<td><input type="radio" name="result11" id="result11" value="3" class="result11_3" /></td>
										<td><input type="radio" name="result11" id="result11" value="4" class="result11_4" /></td>
										<td><input type="radio" name="result11" id="result11" value="5" class="result11_5" /></td>
									</tr>
									<tr align="center">
										<td>Menangani Pelanggan</td>
										<td><input type="radio" name="result12" id="result12" value="1" class="result12_1" /></td>
										<td><input type="radio" name="result12" id="result12" value="2" class="result12_2" /></td>
										<td><input type="radio" name="result12" id="result12" value="3" class="result12_3" /></td>

										<td><input type="radio" name="result12" id="result12" value="4" class="result12_4" /></td>
										<td><input type="radio" name="result12" id="result12" value="5" class="result12_5" /></td>
									</tr>
								  </tbody>
								</table>
                            </div>                        
                            <div class="form-group">
                                <label for="aspect_1" class="control-label col-xs-2">Hasil Interview</label>
                                <div class="col-xs-10">
								    <textarea class="form-control" id="interview_result" name="interview_result" placeholder="Hasil Interview"></textarea>
                                </div>
                            </div>                                  
                            <div class="form-group">
                                <label for="aspect_1" class="control-label col-xs-2">Minat</label>
                                <div class="col-xs-10">
									<div class="col-xs-7">
                                        <select class="form-control js-example-basic-multiple js-states" id="passion" name="passion[]" multiple="multiple" style="width:100%;">
										<?php
											foreach($passion as $k=>$v)
											{
												echo "<option value=\"".$v["id"]."\">".$v["name"]."</option>";		
											}
										?>
                                        </select>
									</div>
<!--                                    <input class="form-control" type="text" id="passion" name="passion" placeholder="Minat">-->
                                </div>
                            </div>                                  
                            <div class="form-group">
                                <label for="aspect_1" class="control-label col-xs-2">Rekomendasi</label>
                                <div class="col-xs-10">
									<div class="col-xs-7">
										<select class="form-control js-example-basic-multiple js-states" id="recommendation" name="recommendation[]" multiple="multiple" style="width:100%;">
										<?php
											foreach($passion as $k=>$v)
											{
												echo "<option value=\"".$v["id"]."\">".$v["name"]."</option>";		
											}
										?>
										</select>
									</div>	

                                  <!-- <input class="form-control" type="text" id="recommendation" name="recommendation" placeholder="Rekomendasi">-->
                                </div>
                            </div>                                  
	                    </form>	
                    </div>
                </div>
             	<div id="riwayat" class="tab-pane fade">
					<div class="panel panel-default" style="margin-top:0px;">
						<div class="panel-heading" style="background-color:#FFF">
							<span style="font-size:14px; font-weight:bold">Riwayat Pengiriman</span>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered" id="historyList" style="font-size:12px;">
								<thead>
									<tr class="info">
										<td align="center"><strong>Nomor JO</strong></td>
										<td align="center"><strong>Perusahaan</strong></td>
										<td align="center"><strong>Posisi</strong></td>
										<td align="center"><strong>Nama User</strong></td>
										<td align="center"><strong>Cabang</strong></td>
										<td align="center"><strong>Tanggal Kirim</strong></td>
										<td align="center"><strong>Pengirim</strong></td>
										<td align="center"><strong>Interview 1</strong></td>
										<td align="center"><strong>Interview 2</strong></td>
										<td align="center"><strong>MCU</strong></td>
										<td align="center"><strong>Training</strong></td>
										<td align="center" class="danger"><strong>Status</strong></td>
										<td align="center"><strong>Hired</strong></td>
										<td align="center"><strong>Alasan</strong></td>
									</tr>
								</thead>
								<tbody>
									<td colspan="14" align="center"><strong>Belum ada riwayat</strong></td>
									<!-- list riwayat -->
								</tbody>
							</table>
						</div>
					</div>
			 	</div>	
             	<div id="kirim" class="tab-pane fade">
                    <div class="panel-heading" style="background-color:#FFF">
                        <span style="font-size:14px; font-weight:bold">Pengiriman ke JO</span>
                    </div>
					<div class="panel-body" style="padding:10px;">
						<form class="form-horizontal" role="form" id="formKirim" name="formKirim">
							<div class="form-group">
								<label for="name" class="control-label col-xs-6 col-md-2">Perusahaan</label>
								<div class="col-xs-6 col-md-3">
									<input type='hidden' class="form-control" name="job_order_status_id" id="job_order_status_id" placeholder="Perusahaan" value="72606"/>
									<input type='text' class="form-control" name="m_client_name" id="m_client_name" placeholder="Perusahaan" data-provide="typeahead"/>
									<input type='hidden' class="form-control" name="m_client_id" id="m_client_id" placeholder="Perusahaan"  value="0"/>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-xs-6 col-md-2">Cabang</label>
								<div class="col-xs-6 col-md-3">
									<?php echo $branch_id; ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-xs-6 col-md-2">Lokasi Kerja</label>
								<div class="col-xs-6 col-md-3">
									<input type='text' class="form-control" name="work_place" id="work_place" placeholder="Lokasi Kerja"/>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-xs-6 col-md-2">Posisi</label>
								<div class="col-xs-6 col-md-3">
									<input type='text' class="form-control" name="posisi" id="posisi" placeholder="Posisi"/>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-xs-6 col-md-2">Nomor JO</label>
								<div class="col-xs-6 col-md-3">
									<input type='text' class="form-control" name="jo_no" id="jo_no" placeholder="Nomor JO" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6 col-md-3">
									<div class="btn-group pull-right">
										<a class="btn btn-primary" href="#" id="btnFilter">
                            				<span>Filter JO</span>
										</a>
										<a class="btn btn-danger" href="#" id="btnReset">
                            				<span>Reset</span>
										</a>
									</div>
								</div>
							</div>
						</form>	
						<div class="panel panel-default clear-fix"  id="filterResult">
									<input type='hidden' class="form-control" name="applicant_jo_no" id="applicant_jo_no" placeholder="nomor JO" value=0 />
									<input type='hidden' class="form-control" name="act_jo" id="act_jo" placeholder="act"/>
									<input type='hidden' class="form-control" name="fj_job_order_id" id="fj_job_order_id" placeholder="id" value="0"/>
									<input type='hidden' class="form-control" name="status_tracking_id" id="status_tracking_id" placeholder="id" value="0"/>
								<div class="table-responsive">
									<table class="table table-bordered" id="tbl_jo" style="font-size:12px">
										<thead>
											<tr class="info"><th>Nomor JO</th><th>Cabang</th><th>Perusahaan</th><th>Posisi</th><th>Lokasi Kerja</th><th>&nbsp;</th></tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>					
					</div>
			 	</div>	

             </div>
        </div>

		<div class="panel-footer center-block" id="footer_paging">
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
        <div class="panel-footer" id="footerApplicant">
			<div class="btn-group pull-left _tabs_navigation" data-toggle="buttons-radio" id="btnNavigation">
				<a class="btn btn btn-info" href="#" id="btnPrev">
					<i class="fa fa-backward fa-fw"></i> 
					<span>Prev</span>
				</a>
				<a class="btn btn btn-info" href="#" id="btnNext">
					<i class="fa fa-forward fa-fw"></i> 
					<span>Next</span>
				</a>
			</div>
            <h3 class="panel-title pull-left" style="padding-left:10px; font-style:italic; color:#F00" id="title_mandatory1">(tanda * wajib diisi)</h3>
            <div class="btn-group pull-right" id="btnkandidat1">
				<?php
					if($form=="")
					{
				?>
                <button type="button" class="btn btn-primary" onClick="$('#content').load('<?php echo base_url('index.php/applicant/getPanel/'); ?>');">
                  List Kandidat
                </button>        
				<?php
					}
				?>        
                
                <button type="button" class="btn btn-danger" id="reset" onClick="$('#content').load('<?php echo base_url('index.php/applicant/getDetail/0'); ?>');">
                  Reset
                </button>
                <button type="button" class="btn btn-success" id="save-kandidat">
                  Save
                </button>    
             </div>                    
        </div>
    </div>
</div>
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
	var activeTab = $('.nav-tabs .active > a').attr('href');

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	//show selected tab / active
	  activeTab = $(e.target).attr('href');
	  loadTab();
	});	

	$('.nav-tabs > .dropdown > .dropdown-menu ').click(function(){
		$('.nav li').removeClass('active');
	});	

	var finish = 0;
	var timeout;
	

    $('#m_sub_district_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }
            timeout = setTimeout(function() {
				 return $.get('<?php echo base_url('index.php/applicant/getSubDistrict/'); ?>/'+query, function (data) {
					   data = jQuery.parseJSON(data);
					   return process(data.s);
            	 });
            }, 500); 
        },
		minLength : 3,
		delay : 3,
		autoSelect : true,
		items : 50,
		matcher : function(items){
				qu = this.query;
				console.log("run");
				it = items.name;
				qu = qu.split(" ");
				if(qu.length>1)
				{
					var i = 0;
					$.each(qu, function(k,v){
							var re = new RegExp(v, "i");
							if(it.search(re)>-1)
							{
								i = 1;				
							}
							else
							{
								i = 0;	
							}
					});
					if(i==1)
						return true;
					else
						return false;
				}
				else
				{
					var re = new RegExp(qu[0], "i");
					if(it.search(re)>-1)
					{
						return true;
					}	
					else
					{
						return false;	
					}
				}
		},
		updater : function(items){
			var current = items;
			$('#m_sub_district_id').val(current.id);
			$.get('<?php echo base_url('index.php/applicant/getAddress/'); ?>/'+current.m_district_id, function (resp) {
			   resp = jQuery.parseJSON(resp);
			   $('#m_district_id').val(resp.m_district_id);
			   $('#m_district_name').val(resp.m_district_name);
			   $('#m_city_name').val(resp.m_city_name);
			   $('#m_city_id').val(resp.m_city_id);
			   $('#m_province_name').val(resp.m_province_name);
			   $('#m_state_id').val(resp.m_state_id);
			   $('#m_state_name').val(resp.m_state_name);
			});
			return items;
		}
    });
	
/*	$('#m_sub_district_name').change(function() {
		var current = $('#m_sub_district_name').typeahead("getActive");
		$('#m_sub_district_id').val(current.id);
		$.get('<?php echo base_url('index.php/applicant/getAddress/'); ?>/'+current.m_district_id, function (resp) {
		   resp = jQuery.parseJSON(resp);
		   $('#m_district_id').val(resp.m_district_id);
		   $('#m_district_name').val(resp.m_district_name);
		   $('#m_city_name').val(resp.m_city_name);
		   $('#m_city_id').val(resp.m_city_id);
		   $('#m_province_name').val(resp.m_province_name);
		   $('#m_state_id').val(resp.m_state_id);
		   $('#m_state_name').val(resp.m_state_name);
		});
    });
*/
    $('#birth_place_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3
    });

	$('#birth_place_name').change(function() {
		var current = $('#birth_place_name').typeahead("getActive");
		try{
			$('#birth_place').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
		}
    });
	
	
	$('#birth_place_name').blur(function(){
			$('#birth_place_name').trigger("change");
	});
	
	 $('#father_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#father_place_birth_name').change(function() {
		var current = $('#father_place_birth_name').typeahead("getActive");
		try{
			$('#father_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#father_place_birth_name').val("");
			$('#father_place_birth').val(0);
		}
    });

	$('#father_place_birth_name').focusout(function() {
		if($('#father_place_birth_name').val()==""){
			$('#father_place_birth').val(0);
		}
    });	

	 $('#mother_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#mother_place_birth_name').change(function() {
		var current = $('#mother_place_birth_name').typeahead("getActive");
		try{
			$('#mother_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#mother_place_birth_name').val("");
			$('#mother_place_birth').val(0);
		}
    });

	$('#mother_place_birth_name').focusout(function() {
		if($('#mother_place_birth_name').val()==""){
			$('#mother_place_birth').val(0);
		}
    });	
	
	$('#spouse_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#spouse_place_birth_name').change(function() {
		var current = $('#spouse_place_birth_name').typeahead("getActive");
		try{
			$('#spouse_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#spouse_place_birth_name').val("");
			$('#spouse_place_birth').val(0);
		}
    });

	$('#spouse_place_birth_name').focusout(function() {
		if($('#spouse_place_birth_name').val()==""){
			$('#spouse_place_birth').val(0);
		}
    });	
	
	$('#child_1_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#child_1_place_birth_name').change(function() {
		var current = $('#child_1_place_birth_name').typeahead("getActive");
		try{
			$('#child_1_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#child_1_place_birth_name').val("");
			$('#child_1_place_birth').val(0);
		}
    });

	$('#child_1_place_birth_name').focusout(function() {
		if($('#child_1_place_birth_name').val()==""){
			$('#child_1_place_birth').val(0);
		}
    });	
	
	$('#child_2_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#child_2_place_birth_name').change(function() {
		var current = $('#child_2_place_birth_name').typeahead("getActive");
		try{
			$('#child_2_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#child_2_place_birth_name').val("");
			$('#child_2_place_birth').val(0);
		}
    });

	$('#child_2_place_birth_name').focusout(function() {
		if($('#child_2_place_birth_name').val()==""){
			$('#child_2_place_birth').val(0);
		}
    });	
	
	$('#child_3_place_birth_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				return $.get('<?php echo base_url('index.php/applicant/getCity/'); ?>/'+query, function (data) {
				   data = jQuery.parseJSON(data);
				   return process(data.s);
				});
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true
    });

	$('#child_3_place_birth_name').change(function() {
		var current = $('#child_3_place_birth_name').typeahead("getActive");
		try{
			$('#child_3_place_birth').val(current.id);
		}catch(e){
			alert("Pilih Tempat Lahir dari List yang Ada");
			$('#child_3_place_birth_name').val("");
			$('#child_3_place_birth').val(0);
		}
    });

	$('#child_3_place_birth_name').focusout(function() {
		if($('#child_3_place_birth_name').val()==""){
			$('#child_3_place_birth').val(0);
		}
    });	


    $('#idcard_sub_district_name').typeahead({
        source: function (query, process) {
            if (timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
				 return $.get('<?php echo base_url('index.php/applicant/getSubDistrict/'); ?>/'+query, function (data) {
					   data = jQuery.parseJSON(data);
					   return process(data.s);
            	 });
            }, 500);
        },
		autoSelect : true,
		minLength : 3,
		delay : 3,
		autoSelect : true,
		items : 50,
		matcher : function(items){
				qu = this.query;
				console.log("run");
				it = items.name;
				qu = qu.split(" ");
				if(qu.length>1)
				{
					var i = 0;
					$.each(qu, function(k,v){
							var re = new RegExp(v, "i");
							if(it.search(re)>-1)
							{
								i = 1;				
							}
							else
							{
								i = 0;	
							}
					});
					if(i==1)
						return true;
					else
						return false;
				}
				else
				{
					var re = new RegExp(qu[0], "i");
					if(it.search(re)>-1)
					{
						return true;
					}	
					else
					{
						return false;	
					}
				}
		},
		updater : function(items){
			var current = items;
			$('#idcard_sub_district_id').val(current.id);
			$.get('<?php echo base_url('index.php/applicant/getAddress/'); ?>/'+current.m_district_id, function (resp) {
			   resp = jQuery.parseJSON(resp);
			   $('#idcard_district_id').val(resp.m_district_id);
			   $('#idcard_district_name').val(resp.m_district_name);
			   $('#idcard_city_name').val(resp.m_city_name);
			   $('#idcard_city_id').val(resp.m_city_id);
			   $('#idcard_province_name').val(resp.m_province_name);
			   $('#idcard_state_id').val(resp.m_state_id);
			   $('#idcard_state_name').val(resp.m_state_name);
			});
			return items;
		}
    });
	$("#weight").ForceNumericOnly();
	$("#height").ForceNumericOnly();

	$('#s1_gpa').mask('0.00',{
		onChange : function(cep){
			if($('s1_gpa').val()>4)
				$('#s1_gpa').val('4.00');			
		}
	});

	$('#diploma_gpa').mask('0.00',{
		onChange : function(cep){
			if($('diploma_gpa').val()>4)
				$('#diploma_gpa').val('4.00');			
		}
	});


/*	$('#idcard_sub_district_name').change(function() {
		var current = $('#idcard_sub_district_name').typeahead("getActive");
		$('#idcard_sub_district_id').val(current.id);
		$.get('<?php echo base_url('index.php/applicant/getAddress/'); ?>/'+current.m_district_id, function (resp) {
		   resp = jQuery.parseJSON(resp);
		   $('#idcard_district_id').val(resp.m_district_id);
		   $('#idcard_district_name').val(resp.m_district_name);
		   $('#idcard_city_name').val(resp.m_city_name);
		   $('#idcard_city_id').val(resp.m_city_id);
		   $('#idcard_province_name').val(resp.m_province_name);
		   $('#idcard_state_id').val(resp.m_state_id);
		   $('#idcard_state_name').val(resp.m_state_name);
		});
    });
*/		
	$('#expected_salary_name').autoNumeric('init',{aSep: '.', aDec: ',', aSign: 'Rp ',aPad: false, lZero : 'deny', wEmpty : 'sign'});	
	$("#expected_salary_name").keyup(function () {
       	$("#expected_salary").val($("#expected_salary_name").autoNumeric("get"));
    });	

	$("#expected_salary_name").keydown(function() {
       	if($("#expected_salary_name").val()=='0')
			$("#expected_salary_name").val('');
    });			
	
	$("input[type=text]").css('text-transform','uppercase');	
	
	$("textarea").css('text-transform','uppercase');
	$('#oversea_city').tokenfield({
	  autocomplete: {
		source: "<?php echo base_url('index.php/applicant/getOversea/auto'); ?>",
		delay: 500,
		minLength : 3
	  },
	  createTokensOnBlur : true
	});


	$("input").prop("autocomplete","off");
	
	function loadApplicant()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/applicant/getApplicant/'); ?>/"+id,
						beforeSend: function () { $("#loading").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $("#loading").hide(); },      
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									if(k!="FILE_PHOTO" && v!=null)
									{
										if(k.search("_DATE")>-1) 
										{
											v = view_date(v, 1);	// 1 = ubah ke format dd-mm-yyyy
											$("#"+k.toLowerCase()+"[type=text]").val(v);
										}
										else
										if(k.search("PHONE")>-1 || k.search("OVERSEA_CITY")>-1) 
										{
											$("#"+k.toLowerCase()).tokenfield('setTokens', v);
										}
										else
										if(k=="JO_NO") 
										{
											$("#applicant_jo_no").val(v);
											$("#history_jo").html("Nomor JO: "+v);
										}
										else
										{
											$("#"+k.toLowerCase()).val(v);
										}
									}
									else
									if(k=="FILE_PHOTO")
									{
										if(v==null || v=="")
										{
											$("#file_photo_preview").css("display","none");										
										}
										else
										{
											$("#file_photo_preview").attr("src","<?php echo base_url('asset/uploads/'); ?>/"+v);
										}
									}
																										
								});
						   }
					   }
				});				
			}
			else
			{
				$("#file_photo_preview").css("display","none");	
			}
	}
	
	function loadEducation()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/education/getEducation/'); ?>/"+id,
						beforeSend: function () { $("#loading").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $("#loading").hide(); },      
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									$("#"+k.toLowerCase()).val(v);
																		
								});
						   }
					   }
				});				
			}
	}

	function loadFamily()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/family/getFamily/'); ?>/"+id,
						beforeSend: function () { $("#loading").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $("#loading").hide(); },      
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
										if(k.search("_DOB")>-1) 
										{
											v = view_date(v, 1);	// 1 = ubah ke format dd-mm-yyyy
											$("#"+k.toLowerCase()+"[type=text]").val(v);
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

	function loadOthers()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/others/getOthers/'); ?>/"+id,
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									if(v)
									{
										if($("#"+k.toLowerCase()).is(":checkbox"))
										{
											if(v=="Y")
											{
												$("#"+k.toLowerCase()).prop("checked",true);										
											}
										}
										else
										if(k.search("_DATE")>-1) 
										{
											v = view_date(v, 1);	// 1 = ubah ke format dd-mm-yyyy
											$("#"+k.toLowerCase()+"[type=text]").val(v);
										}
										else
										if(k=="EXPECTED_SALARY") 
										{
											$("#expected_salary").val(v);
											$("#expected_salary_name").autoNumeric('set', v);
										}
										else
										if(k=="AVAILABLE_ID") 
										{
											$("#available_id").val(v);
											if(v==26)
											{
												$("#available_date").show();
											}
											else
											{
												$("#available_date").hide();
											}
										}
										else
										{
											if(k=="OVERSEA_CITY")
											{
												$("#"+k.toLowerCase()).tokenfield('setTokens', v);
												//console.log(v);											
											}
											else
											{
												$("#"+k.toLowerCase()).val(v);
											}
										}
									}
								});
						   }
					   }
				});				
			}
	}

	function loadInterview()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/interview/getInterviewResult/'); ?>/"+id,
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									if($("#"+k.toLowerCase()).is(":radio"))
									{
										if(v!=0 || v!="")
										$('.'+k+'_'+v).prop('checked', true);
									}
									else
									if(k=="PASSION" || k=="RECOMMENDATION")
									{
										if(v!="" && v!=null)
										{
											v = v.split(",");
											$("#"+k.toLowerCase()).select2("val",v);
										}
										//console.log(v);											
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

	function loadSkill()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/skill/getSkill/'); ?>/"+id,
						beforeSend: function () { $("#loading").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $("#loading").hide(); },      
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									if($("#"+k.toLowerCase()).is(":radio"))
									{
										if(v!=0 || v!="")
										$('.'+k+'_'+v).prop('checked', true);
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


	function loadEmergency()
	{
			var id = $("#fj_personal_id").val();
			if(id != 0)
			{
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/emergency/getEmergency/'); ?>/"+id,
						beforeSend: function () { $("#loading").show(); },
						// hides the loader after completion of request, whether successfull or failor.             
						complete: function () { $("#loading").hide(); },      
					   success: function(data)
					   {
						   
						   data = jQuery.parseJSON(data);
						   if(data.success) 
						   {	
								$.each(data.data, function(k,v){
									if(k.search("_NUMBER")>-1) 
									{
										$("#"+k.toLowerCase()).tokenfield('setTokens', v);
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

	function loadPsikotes()
	{
		var id = $("#fj_personal_id").val();
		$.ajax({
			   type: "GET",
			   url: "<?php echo base_url('index.php/psychotest/getPsychotest/'); ?>/"+id,
			   success: function(data)
			   {							   
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						$.each(data.data, function(k,v){
							if(k.search("_DATE")>-1) 
							{
								v = view_date(v, 1);	// 1 = ubah ke format dd-mm-yyyy
								$("#"+k.toLowerCase()+"[type=text]").val(v);
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

	loadApplicant();
	loadEducation();
	loadFamily();
	loadOthers();
	loadSkill();
	loadEmergency();
	loadPsikotes();
	


/*    var tabIndex;
    var tabs = $('a[data-toggle="tab"]');
    tabs.on('shown', function(e) {
        tabIndex = $(e.target).closest('li').index();
		console.log(tabIndex);
    }).eq(0).trigger('shown');

    $('._tabs_navigation').on('click', 'a', function() {
		
        var index = tabIndex + ($(this).index() ? 1 : -1);
        if (index >= 0 && index < tabs.length) {
            tabs.eq(index).tab('show');
			console.log(index);
        }
        return false;
    });
*/

$('#btnNext').click(function(){
//		setUpper();
//		$("#formApplicant").submit();
  	$('.nav-tabs > .dropdown > .dropdown-menu > .active').next('li').find('a').trigger('click');
});

$('#btnPrev').click(function(){
  	$('.nav-tabs > .dropdown > .dropdown-menu > .active').prev('li').find('a').trigger('click');
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

	function saveFamily(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/family/save"); ?>",
			data: $("#formFamily").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_family_id").val(data.id);
			//		console.log($("#fj_family_id").val());
			   }
			   else
			   {
					alert(data.message);
					$('a[href="#keluarga"]').trigger('click');   
			   }
			}
		});
	}

	function saveEducation(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/education/save"); ?>",
			data: $("#formEducation").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_education_id").val(data.id);
			//		console.log($("#fj_education_id").val());
			   }
			}
		});
	}

	function saveEmergency(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/emergency/save"); ?>",
			data: $("#formEmergency").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {

					$("#fj_emergency_id").val(data.id);
				//	console.log($("#fj_emergency_id").val());
			   }
			}
		});
	}
	
	function saveInterview(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/interview/save"); ?>",
			data: $("#formInterview").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_interview_result_id").val(data.id);
				//	console.log($("#fj_interview_result_id").val());
			   }
			}
		});
	}

	function saveOthers(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/others/save"); ?>",
			data: $("#formOthers").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_others_id").val(data.id);
			//		console.log($("#fj_others_id").val());
			   }
			}
		});
	}

	function saveSkill(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/skill/save"); ?>",
			data: $("#formSkill").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_skill_id").val(data.id);
			//		console.log($("#fj_others_id").val());
			   }
			}
		});
	}

	function savePsikotes(id)
	{
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url("index.php/psychotest/save"); ?>",
			data: $("#formPsikotes").serialize() + "&fj_personal_id="+id,
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
					$("#fj_psychotest_id").val(data.id);

			//		console.log($("#fj_family_id").val());
			   }
			   else
			   {
					alert(data.message);
			   }
			}
		});
	}

	$("#formApplicant").ajaxForm({
			type: 'POST',
			url: "<?php echo base_url("index.php/applicant/save"); ?>",
			data: $(this).serialize(),
			error: function(data)
			{
			   	data = jQuery.parseJSON(data);
				alert(data.message);
			},
			success: function(data)
			{
			   data = jQuery.parseJSON(data);
			   if(data.success) 
			   {
			   		
//				  	$('.nav-tabs > .dropdown > .dropdown-menu > .active').next('li').find('a').trigger('click');
					$("#fj_personal_id").val(data.id);
					alert("Data Applicant Berhasil Disimpan"+"\n"+data.message);
					
//					console.log($("#fj_personal_id").val());
				//	return data.id;
					saveFamily(data.id);
					saveEducation(data.id);
					saveEmergency(data.id);
					saveOthers(data.id);
					saveInterview(data.id);		
					saveSkill(data.id);		
					AddCourses(data.id);
					AddOrganization(data.id);
					AddLanguage(data.id);
					AddExperience(data.id);
					savePsikotes(data.id); //save tanggal psikotes default hari ini
					if(finish==1)
					{
						if($("#listkandidatbutton").length)
						{
							$('#content').load('<?php echo base_url('index.php/applicant/getDetail/0'); ?>');
							finish = 0;
						}
						else
						{
						    $("#formApplicant").trigger("reset");
						    $("#formFamily").trigger("reset");
 							$("#formEducation").trigger("reset");
						    $("#formCourse").trigger("reset");
						    $("#formOrganization").trigger("reset");
						    $("#formLanguage").trigger("reset");
						    $("#formSkill").trigger("reset");
						    $("#formOthers").trigger("reset");
						    $("#formEmergency").trigger("reset");
						    $("#formExperience").trigger("reset");
						    $("#formInterview").trigger("reset");
						    $("#formPsikotes").trigger("reset");
							$("input[type=hidden]").val(0);
							$('a[href="#detail"]').trigger('click'); 
//							$('#home_phone').tokenfield('setTokens', '', false, false);
/*							$('#home_phone').remove(); 
							$('#handphone').tokenfield('destroy'); 
							$('#emergency_number').tokenfield('destroy'); 
							$('#emergency_number2').tokenfield('destroy'); 
*/							$("#tbl_kursus > tbody").empty();							
							$("#tbl_organisasi > tbody").empty();							
							$("#tbl_bahasa > tbody").empty();							
							$("#tbl_pengalaman > tbody").empty();							
							finish = 0;
//							window.location = location.href + '?upd=' + 123456;
//							window.location.reload(true);
//							console.log("ok");
//							$('#content').load('<?php echo base_url('index.php/applicant/getPanel'); ?>');
						}						
					}
			   }
/*				else
				{
					alert(data.message+"\n"+data.upload_message);	
				}
*/			}
	});


	$("#save-kandidat").click(function(){
/*			$.when($("#formApplicant").submit()).then(function(rs){
			console.log(rs.find('input[id="fj_personal_id"]').val());
			//saveFamily($("#fj_personal_id").val());
		saveEducation(rs.id);
			saveEmergency(rs.id);
			saveOthers(rs.id);
			saveInterview(rs.id);		
			saveSkill(rs.id);		
		});	 */				
			setUpper();

			$("#formApplicant").submit();
	});

	$("#save1-kandidat").click(function(){
			setUpper();

			$("#formApplicant").submit();
	});


	$("#finish").click(function(e){
		var konfirmasi = "Mohon pastikan anda sudah mengisi data dengan lengkap terutama : <br />1. Pengalaman Kerja <br />2. Bahasa dan Keahlian <br />3. Pengalaman Organisasi <br />4. Pelatihan dan Kursus"
		bootbox.confirm(konfirmasi, function(result) {
			if (result == true) {
				finish = 1;
				$("#save1-kandidat").trigger("click");
	//				$("#reset").trigger("click");
						//alert("Data Applicant Berhasil Disimpan");
				//});				
			}
		});	
	});	
	
	$("#reset").click(function(){
		
		
		/*$("#formApplicant").get(0).reset();
		$("#formFamily").get(0).reset();
		$("#formEducation").get(0).reset();
		$("#formCourse").get(0).reset();
		$("#formOrganization").get(0).reset();
		$("#formLanguage").get(0).reset();
		$("#formSkill").get(0).reset();
		$("#formOthers").get(0).reset();
		$("#formEmergency").get(0).reset();
		$("#formInterview").get(0).reset();*/
	});

	$("#reset1").click(function(){
		/*$("#formApplicant").get(0).reset();
		$("#formFamily").get(0).reset();
		$("#formEducation").get(0).reset();
		$("#formCourse").get(0).reset();
		$("#formOrganization").get(0).reset();
		$("#formLanguage").get(0).reset();
		$("#formSkill").get(0).reset();
		$("#formOthers").get(0).reset();
		$("#formEmergency").get(0).reset();
		$("#formInterview").get(0).reset();*/
	});
	
	//kursus dan pelatihan
	function loadCourses()
	{
			var id = $("#fj_personal_id").val();
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/course/getList/'); ?>/"+id,
							beforeSend: function () { $("#loading").show(); },
							// hides the loader after completion of request, whether successfull or failor.             
							complete: function () { $("#loading").hide(); },      
						   success: function(data)
						   {
							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {
									$("#tbl_kursus > tbody").empty();
									$.each(data.data, function(k,v){
										var html = "<tr><td><input type=hidden value='"+v.FJ_COURSES_ID+"'>"+v.INSTITUTION+"</td>";
											html += "<td>"+v.COURSE_FROM_MONTH+" "+v.COURSE_FROM_YEAR+"</td>";
											html += "<td>"+v.COURSE_TO_MONTH+" "+v.COURSE_TO_YEAR+"</td>";
											html += "<td>"+v.COURSE+"</td>";
											html += "<td><div class='btn-group'>";
											html += "<button class='btn btn-small btn-danger' id=\"deleteCourse\" onclick=\"$('#act').val('delete'); $('#fj_courses_id').val("+v.FJ_COURSES_ID+").trigger('change');\"><i class='fa fa-trash-o'></i></button>";
											html += "<button class='btn btn-small btn-info' id=\"editCourse\" onclick=\"$('#act').val('edit'); $('#fj_courses_id').val("+v.FJ_COURSES_ID+").trigger('change');\"><i class='fa fa-edit'></i></button>";
											html += "</div>";
											html += "</td></tr>";
										$("#tbl_kursus").append(html);				   							
									});
							   }
						   }
						 });										
		
	}

	$("#fj_courses_id").change(function(){
			var act = $("#act").val();
			var id = $(this).val();
			
			if(act=="edit")
			{
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/course/get/'); ?>/"+id,
						   success: function(data)
						   {
							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {	
									$.each(data.data, function(k,v){
											$("#"+k.toLowerCase()).val(v);	
									});
							   }
						   }
						 });	
			}
			else
			if(act=="delete")
			{
				var result = window.confirm('data akan dihapus?');
    	        if (result == true) {
					$.when(deleteRow("<?php echo base_url('index.php/course/delete/'); ?>", id)).done(function(rs){
						if(rs)
						{
							//alert("Data Dihapus");
							loadCourses();
					    	$(":input","#formCourse").val("")	 		
						}
					});
	        	}
 			}
	});

	loadCourses();

	$("#add_course").click(function(){
	//	AddCourses($("#fj_personal_id").val());	
		setUpper();
		if ($("#fj_personal_id").val()==0)
		{
			$.when($("#save-kandidat").trigger("click")).done(function(rs){
				//AddCourses($("#fj_personal_id").val());
			});					
		}
		else
		{
			AddCourses($("#fj_personal_id").val());
			$("#formCourse").trigger("reset");	 		
		}
	});

	$("#cancel_course").click(function(){
		   $(":input","#formCourse").val("");	 		
			$("#formCourse").trigger("reset");	 		
	});


	function AddCourses(id)
	{
		if($("#institution").val()!="")
		{
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url("index.php/course/save"); ?>",
				data: $("#formCourse").serialize() + "&fj_personal_id="+id,
				success: function(data)
				{
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						$("#formCourse").trigger("reset");
						loadCourses();
				   }
				}
			});
		}
	}


	//pengalaman organisasi
	function loadOrganization()
	{
			var id = $("#fj_personal_id").val();
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/organization/getList/'); ?>/"+id,
							beforeSend: function () { $("#loading").show(); },
							// hides the loader after completion of request, whether successfull or failor.             
							complete: function () { $("#loading").hide(); },      
						   success: function(data)
						   {							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {
									$("#tbl_organisasi > tbody").empty();
									$.each(data.data, function(k,v){
										var html = "<tr><td><input type=hidden value='"+v.FJ_ORGANIZATION_ID+"'>"+v.ORGANIZATION+"</td>";
											html += "<td>"+v.ORGANIZATION_FROM_MONTH+" "+v.ORGANIZATION_FROM_YEAR+"</td>";
											html += "<td>"+v.ORGANIZATION_TO_MONTH+" "+v.ORGANIZATION_TO_YEAR+"</td>";
											html += "<td>"+v.POSITION+"</td>";
											html += "<td><div class='btn-group'>";
											html += "<button class='btn btn-small btn-danger' id=\"deleteOrganization\" onclick=\"$('#act').val('delete'); $('#fj_organization_id').val("+v.FJ_ORGANIZATION_ID+").trigger('change');\"><i class='fa fa-trash-o'></i></button>";
											html += "<button class='btn btn-small btn-info' id=\"editOrganization\" onclick=\"$('#act').val('edit'); $('#fj_organization_id').val("+v.FJ_ORGANIZATION_ID+").trigger('change');\"><i class='fa fa-edit'></i></button>";
											html += "</div>";
											html += "</td></tr>";
										$("#tbl_organisasi").append(html);				   							
									});
							   }
						   }
						 });										
		
	}

	$("#fj_organization_id").change(function(){
			var act = $("#act").val();
			var id = $(this).val();
			
			if(act=="edit")
			{
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/organization/get/'); ?>/"+id,
						   success: function(data)
						   {
							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {	
									$.each(data.data, function(k,v){
										$("#"+k.toLowerCase()).val(v);																			
									});
							   }
						   }
						 });	
			}
			else
			if(act=="delete")
			{
				var result = window.confirm('data akan dihapus?');
    	        if (result == true) {
					$.when(deleteRow("<?php echo base_url('index.php/organization/delete/'); ?>", id)).done(function(rs){
						if(rs)
						{
							//alert("Data Dihapus");
							loadOrganization();
					    	$("#formOrganization").trigger("reset");	 		
						}
					});
	        	}
 			}
	});

	loadOrganization();

	$("#add_org").click(function(){
		setUpper();
		if ($("#fj_personal_id").val()==0)
		{
			$.when($("#save-kandidat").trigger("click")).done(function(rs){
//			AddOrganization($("#fj_personal_id").val());			
			});					
		}
		else
		{
			AddOrganization($("#fj_personal_id").val());
			$(":input","#formOrganization").val("");	 		
	    	$("#formOrganization").trigger("reset");	 		
		}
	});

	$("#cancel_org").click(function(){
		   $(":input","#formOrganization").val("");	 		
    	   $("#formOrganization").trigger("reset");	 		
	});


	function AddOrganization(id)
	{
		if($("#organization").val()!="")
		{
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url("index.php/organization/save"); ?>",
				data: $("#formOrganization").serialize() + "&fj_personal_id="+id,
				success: function(data)
				{
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						loadOrganization();
						$("#formOrganization").trigger("reset");				   }
				}
			});
		}
	}

	//bahasa asing
	function loadLanguage()
	{
		var id = $("#fj_personal_id").val();
		$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/language/getList/'); ?>/"+id,
					beforeSend: function () { $("#loading").show(); },
					// hides the loader after completion of request, whether successfull or failor.             
					complete: function () { $("#loading").hide(); },      
				   success: function(data)
				   {							   
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {
							$("#tbl_bahasa > tbody").empty();
							$.each(data.data, function(k,v){
								var html = "<tr><td><input type=hidden value='"+v.FJ_LANGUAGE_ID+"'>"+v.LANGUAGE_ID+"</td>";
									html += "<td>"+v.LANGUAGE_LEVEL_ID+"</td>";
									html += "<td><div class='btn-group'>";
									html += "<button class='btn btn-small btn-danger' id=\"deleteLanguage\" onclick=\"$('#act_language').val('delete'); $('#fj_language_id').val("+v.FJ_LANGUAGE_ID+").trigger('change');\"><i class='fa fa-trash-o'></i></button>";
									html += "<button class='btn btn-small btn-info' id=\"editLanguage\" onclick=\"$('#act_language').val('edit'); $('#fj_language_id').val("+v.FJ_LANGUAGE_ID+").trigger('change');\"><i class='fa fa-edit'></i></button>";
									html += "</div>";
									html += "</td></tr>";
								$("#tbl_bahasa").append(html);				   							
							});
					   }
				   }
				 });			
	}

	$("#fj_language_id").change(function(){
			var act = $("#act_language").val();
			var id = $(this).val();	
			if(act=="edit")
			{
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/language/get/'); ?>/"+id,
						   success: function(data)
						   {
							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {	
									$.each(data.data, function(k,v){
										$("#"+k.toLowerCase()).val(v);
																			
									});
							   }
						   }
						 });	
			}
			else
			if(act=="delete")
			{
				var result = window.confirm('data akan dihapus?');
    	        if (result == true) {
					$.when(deleteRow("<?php echo base_url('index.php/language/delete/'); ?>", id)).done(function(rs){
						if(rs)
						{
							//alert("Data Dihapus");
							loadLanguage();
					    	$("#formLanguage").trigger("reset");	 		
						}
					});
	        	}
 			}
	});

	loadLanguage();

	$("#add_language").click(function(){
		setUpper();
		if ($("#fj_personal_id").val()==0)
		{
			$.when($("#save-kandidat").trigger("click")).done(function(rs){
			//AddLanguage($("#fj_personal_id").val());			
			});					
		}
		else
		{
			AddLanguage($("#fj_personal_id").val());
			$(":input","#formLanguage").val("")	 		
		}
	});

	$("#cancel_language").click(function(){
		   $(":input","#formLanguage").val("")	 		
	});


	function AddLanguage(id)
	{
		if($("#language_id").val()!=0)
		{
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url("index.php/language/save"); ?>",
				data: $("#formLanguage").serialize() + "&fj_personal_id="+id,
				success: function(data)
				{
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						loadLanguage();
						$(":input","#formLanguage").val("")	 		
				   }
				}
			});
		}
	}

	//pengalaman kerja
	function loadExperience()
	{
		var id = $("#fj_personal_id").val();
		$.ajax({
			   type: "GET",
			   url: "<?php echo base_url('index.php/experience/getList/'); ?>/"+id,
				beforeSend: function () { $("#loading").show(); },
				// hides the loader after completion of request, whether successfull or failor.             
				complete: function () { $("#loading").hide(); },      
			   success: function(data)
			   {							   
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						$("#tbl_pengalaman > tbody").empty();
						$.each(data.data, function(k,v){
							if(v.EXPERIENCE_FROM_DATE!=0) var exp_from = view_date(v.EXPERIENCE_FROM_DATE,1);
							else var exp_from = "-";

							if(v.EXPERIENCE_TO_DATE!=0) var exp_to = view_date(v.EXPERIENCE_TO_DATE,1);
							else var exp_to = "-";
							
							var html = "<tr><td><input type=hidden value='"+v.FJ_JOB_EXPERIENCE_ID+"'>"+v.COMPANY_NAME+"</td>";
								html += "<td>"+v.EXPERIENCE_POSITION+"</td>";
								html += "<td>"+exp_from+"</td>";
								html += "<td>"+exp_to+"</td>";
								html += "<td>"+v.JOB_FUNCTION_ID+"</td>";
								html += "<td>"+v.BOSS_NAME+"</td>";
								html += "<td>"+v.BOSS_POSITION+"</td>";
								html += "<td>"+v.BOSS_PHONE_NUMBER+"</td>";
								html += "<td><div class='btn-group'>";
								html += "<button class='btn btn-small btn-danger' id=\"deleteExperience\" onclick=\"$('#act_exp').val('delete'); $('#fj_job_experience_id').val("+v.FJ_JOB_EXPERIENCE_ID+").trigger('change');\"><i class='fa fa-trash-o'></i></button>";
								html += "<button class='btn btn-small btn-info' id=\"editExperience\" onclick=\"$('#act_exp').val('edit'); $('#fj_job_experience_id').val("+v.FJ_JOB_EXPERIENCE_ID+").trigger('change');\"><i class='fa fa-edit'></i></button>";
								html += "</div>";
								html += "</td></tr>";
							$("#tbl_pengalaman").append(html);				   							
						});
				   }
			   }
			 });			
	}

	$("#fj_job_experience_id").change(function(){
			var act = $("#act_exp").val();
			var id = $(this).val();
			
			if(act=="edit")
			{
			$.ajax({
						   type: "GET",
						   url: "<?php echo base_url('index.php/experience/get/'); ?>/"+id,
						   success: function(data)
						   {
							   
							   data = jQuery.parseJSON(data);
							   if(data.success) 
							   {	
									$.each(data.data, function(k,v){
										if(k.search("DATE")>-1) 
										{
											v = view_date(v, 1);	// 1 = ubah ke format dd-mm-yyyy
											$("#"+k.toLowerCase()+"[type=text]").val(v);
										}
										else
										{
											$("#"+k.toLowerCase()).val(v);							
										}
//										$("#"+k.toLowerCase()).val(v);
																			
									});
							   }
						   }
						 });	
			}
			else
			if(act=="delete")
			{
				var result = window.confirm('data akan dihapus?');
    	        if (result == true) {
					$.when(deleteRow("<?php echo base_url('index.php/experience/delete/'); ?>", id)).done(function(rs){
						if(rs)
						{
							//alert("Data Dihapus");
							loadExperience();
					    	$("#formExperience").trigger("reset");	 		
						}
					});
	        	}
 			}
	});


	loadExperience();

	$("#add_experience").click(function(){
		setUpper();
		if ($("#fj_personal_id").val()==0)
		{
			$.when($("#save-kandidat").trigger("click")).done(function(rs){
//			AddExperience($("#fj_personal_id").val());			
			});					
		}
		else
		{
			AddExperience($("#fj_personal_id").val());
 		    $("#formExperience").trigger("reset");
			$("#fj_job_experience_id").val(0);
			$('#act_exp').val('');	 		
		}
	});

	$("#cancel_experience").click(function(){
 		    $("#formExperience").trigger("reset");
			$("#fj_job_experience_id").val(0);
			$('#act_exp').val('');	 		
	});


	function AddExperience(id)
	{
		if($("#company_name").val()!="")
		{
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url("index.php/experience/save"); ?>",
				data: $("#formExperience").serialize() + "&fj_personal_id="+id,
				success: function(data)
				{
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						loadExperience();
			 		    $("#formExperience").trigger("reset");
						$("#fj_job_experience_id").val(0);
						$('#act_exp').val('');	 		
				   }
				}
			});
		}
	}


	$(".a-prevent").click(function(e) { e.preventDefault(); });
    $('#birth_date').datetimepicker({
				format : "DD-MM-YYYY",
				defaultDate : "1990/02/20",
				minDate : "1900/01/01"	
	});
    $('#father_dob').datetimepicker({
				format : "DD-MM-YYYY",
				defaultDate : "1900/01/01"	
	});
    $('#mother_dob').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "1900/01/01"	
	});
    $('#spouse_dob').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "1900/01/01"	
	});
    $('#child_1_dob').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "1900/01/01"	
	});
    $('#child_2_dob').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "1900/01/01"	
	});
    $('#child_3_dob').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "1900/01/01"	
	});
	
    $('#applicant_date').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : new Date()
	});

    $('#psychotest_date').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : new Date()
	});

    $('#interview_date').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : new Date()
	});

    $('#experience_from_date').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "2015/01/01"	
	});

    $('#experience_to_date').datetimepicker({
				format : "DD-MM-YYYY",	
				defaultDate : "2015/01/01"	
	});

    $('#course_from').datetimepicker({
				format : "MMM-YYYY"	
	});

    $('#course_to').datetimepicker({
				format : "MMM-YYYY"	
	});

    $('#available_date').hide();
	
	$("#available_id").on("change", function(me){
				if($(this).val()=='26') $("#available_date").show();
				else $("#available_date").hide();
	});

    $('#available_date').datetimepicker({
				format : "DD-MM-YYYY"
	});

				
	$("#sameaddress").on("click", function()
	{
		if($("#sameaddress").is(":checked")) 
		{
			$("#address").val($("#idcard_address").val());
			$("#m_district_name").val($("#idcard_district_name").val());
			$("#m_sub_district_name").val($("#idcard_sub_district_name").val());
			$("#m_city_name").val($("#idcard_city_name").val());
			$("#zipcode").val($("#idcard_zipcode").val());
			$("#m_state_name").val($("#idcard_state_name").val());
			$("#m_district_id").val($("#idcard_district_id").val());
			$("#m_sub_district_id").val($("#idcard_sub_district_id").val());
			$("#m_city_id").val($("#idcard_city_id").val());
			$("#m_state_id").val($("#idcard_state_id").val());
			
			$("#address").attr("readonly",true);
			$("#district_name").attr("disabled",true);
			$("#sub_district_name").attr("disabled",true);
			$("#city_name").attr("disabled",true);
			$("#zipcode").attr("readonly",true);
			$("#state_name").attr("disabled",true);

		}
		else
		{
			$("#address").val('');
			$("#m_district_name").val('');
			$("#m_sub_district_name").val('');
			$("#m_city_name").val('');
			$("#zipcode").val('');
			$("#m_state_name").val('');
			$("#m_district_id").val('');
			$("#m_sub_district_id").val('');
			$("#m_city_id").val('');
			$("#m_state_id").val('');

			$("#address").attr("readonly",false);
			$("#district_name").attr("disabled",false);
			$("#sub_district_name").attr("disabled",false);
			$("#city_id").attr("disabled",false);
			$("#zipcode").attr("readonly",false);
			$("#state_name").attr("disabled",false);

		}
	});

	
	$('#home_phone').tokenfield({
		createTokensOnBlur : true,
		inputType : "number"	
	});
	$('#handphone').tokenfield({
		createTokensOnBlur : true,
		inputType : "number"	
	});
	$('#emergency_number').tokenfield({
		createTokensOnBlur : true,
		inputType : "number"	
	});
	$('#emergency_number_2').tokenfield({
		createTokensOnBlur : true,
		inputType : "number"	
	});


/*	$('#hph').focusout(function(){
		var hmp = $('#home_phone').tokenfield('getTokens');
		var hmpcur = $('#home_phone').val();
		console.log(hmp+' '+hmpcur);
		$('#home_phone').tokenfield('createToken', hmpcur);		
		if(hmp!==hmpcur || hmp=="")
		{
			$('#home_phone').tokenfield('createToken', hmpcur);		
		}
		
		$('#home_phone').on("keypress",function(e,pr){
			console.log("ok");
		});
		$('#home_phone').trigger("keypress", [73]);
	});
*/
//    $("#oversea_id").tokenInput("<?php //echo base_url("index.php/applicant/getOversea"); ?>");

//	$("#oversea_city").select2();
    $("#passion").select2();
    $("#recommendation").select2();
//    $("#passion").tokenInput("<?php echo base_url("index.php/applicant/getJobFunction"); ?>");
//    $("#recommendation").tokenInput("<?php echo base_url("index.php/applicant/getJobFunction"); ?>");

	$("#shift").on("click", function()
	{
		if($("#shift").is(":checked",true)) 
		{
			$("#shift").val('Y');			
		}
	});
	
	
	$("#overtime").on("click", function()
	{
		if($("#overtime").is(":checked")) 
		{
			$("#overtime").val('Y');			
		}
	});
	$("#oversea").on("click", function()
	{
		if($("#oversea").is(":checked")) 
		{
			$("#oversea").val('Y');			
		}
	});
	$("#motorcycle").on("click", function()
	{
		if($("#motorcycle").is(":checked")) 
		{
			$("#motorcycle").val('Y');			
		}
	});
	$("#car").on("click", function()
	{
		if($("#car").is(":checked")) 
		{
			$("#car").val('Y');			
		}
	});
	$("#sim_a").on("click", function()
	{
		if($("#sim_a").is(":checked")) 
		{
			$("#sim_a").val('Y');			
		}
	});
	$("#sim_b").on("click", function()
	{
		if($("#sim_b").is(":checked")) 
		{
			$("#sim_b").val('Y');			
		}
	});
	$("#sim_c").on("click", function()
	{
		if($("#sim_c").is(":checked")) 
		{
			$("#sim_c").val('Y');			
		}
	});
	$("#certificate").on("click", function()
	{
		if($("#certificate").is(":checked")) 
		{
			$("#certificate").val('Y');			
		}
	});		

/*	$("#id_card_no").on('keyup',function() {
		var inp = $(this);
		if(inp.val().length>5)
		{
			delay(function(){
				$.ajax({
					   type: "GET",
					   url: "<?php //echo base_url('index.php/applicant/getPersonal/'); ?>/"+inp.val(),
					   success: function(data)
					   {
						   data = jQuery.parseJSON(data);
						   if(data.success)
						   {
						   		alert("data sudah ada");
								$("#fj_personal_id").val(data.fj_personal_id).trigger("change");
								loadApplicant();
								loadEducation();
								loadFamily();
								loadOthers();
								loadInterview();
								loadSkill();
								loadEmergency();
							
						   }
					   }
				});			
			}, 1000);
		}
	});		*/

	$('#m_client_name').typeahead({
		source: function (query, process) {
			return $.get('<?php echo base_url('index.php/tracking/getClient/'); ?>/'+query, function (data) {
			   data = jQuery.parseJSON(data);
			   return process(data.s);
			});
		},
		autoSelect : true
	});


	$('#m_client_name').change(function() {
		var client = $('#m_client_name').val();
		var current = $('#m_client_name').typeahead("getActive");
		if (client!='')
		{
			$('#m_client_id').val(current.id);
		}
		else
		{
			$('#m_client_id').val(0);
		}

    });	
	
	var curpage = 1;
	var totpage = 1;

	$("#filterResult").hide();
	$("#btnFilter").click(function(){
			$("#filterResult").show();
			loadJO(1, $("#formKirim").serializeArray());
			$("#footer_paging").show();
			
	});

	$("#btnReset").click(function(){
		$("#filterResult").hide();
		$("#formKirim").trigger("reset");
		$("#tbl_jo > tbody").empty();
		$("#footer_paging").hide();
	});

	function loadJO(page)
	{
		if(typeof page === 'undefined')
		{
			page = 1;
			curpage = 1;
			totpage = 1;
		}
			
		var par = new Array();
		par["page"] = page;
		
		q = $("#formKirim").serializeArray();

		$.each(q, function(k,v){
			par[v.name] = v.value;
		});

		par = $.extend({}, par);

		$.ajax({
			   type: "GET",
			   url: "<?php echo base_url('index.php/tracking/getFilter/'); ?>",
			   data: par, // serializes the form's elements.
			   success: function(data)
			   {
				   data = jQuery.parseJSON(data);
				   if(data.success) 
				   {
						$("#tbl_jo > tbody").empty();
						if(data.totpage==0) 
						{
							$("#tbl_jo > tbody").html("<tr><td colspan='6' style='font-size:14px; color:red; font-weight:bold; text-align:center;'>Tidak ada Data</td></tr>");
						}

						$('#textpage').html("Page "+page+" of "+data.totpage);
						curpage = page;
						totpage = data.totpage;
						$.each(data.data, function(k,v){
							var html = "<tr><td>"+v.JO_NO+"</td>";
								html += "<td>"+(v.BRANCH).toUpperCase()+"</td>";
								html += "<td>"+(v.CLIENT).toUpperCase()+"</td>";
								html += "<td>"+v.POSISI+"</td>";
								html += "<td>"+v.WORK_PLACE+"</td>";
								html += "<td><div class='btn-group'>";
								html += "<button class='btn btn-small btn-success' id=\"sendJO_"+v.FJ_JOB_ORDER_ID+"\" onclick=\"$('#act_jo').val('send'); $('#fj_job_order_id').val("+v.FJ_JOB_ORDER_ID+").trigger('change'); $(this).attr('disabled','true'); $(this).html('Mengirim...'); \"><i class='fa fa-arrow-right'></i>Kirim</button>";
								html += "</div>";
								html += "</td></tr>";
							$("#tbl_jo").append(html);	
							$("#footer_pagging").show();	
										   							
						});
											
				   }
			   }
			 });			
	}
	//loadJO();

	$("#fj_job_order_id").change(function(){
			var act = $("#act_jo").val();
			var fj_personal_id = $("#fj_personal_id").val();
			var id = $(this).val();	
			var nomor_jo = $("#applicant_jo_no").val();
			var status = $("#status_tracking_id").val();
			if(nomor_jo=="0" || nomor_jo==0)
			{
				if(act=="send")
				{
					bootbox.dialog({
					  closeButton: false,
					  message: "Kirim Kandidat ke JO ini?",
					  title: null,
					  buttons: {
						success: {
						  label: "Cancel",
						  className: "btn-default",
						  callback: function() {
						  	$("#sendJO_"+$("#fj_job_order_id").val()).attr('disabled',false);
						  	$("#sendJO_"+$("#fj_job_order_id").val()).html("<i class='fa fa-arrow-right'></i>Kirim");
						  }
						},
						main: {
						  label: "OK",
						  className: "btn-primary btnSend",
						  callback: function() {
						  	$(".btnSend").attr("disabled",true);
							$.ajax({
								   type: "GET",
								   url: "<?php echo base_url('index.php/tracking/sendJO/'); ?>",
								   data: "fj_personal_id="+fj_personal_id + "&fj_job_order_id="+id,
								   beforeSend: function () { $("#loading").show(); },
									// hides the loader after completion of request, whether successfull or failor.             
								   complete: function () { $("#loading").hide(); },      
								   success: function(data)
								   {
									   data = jQuery.parseJSON(data);
									   if(data.success) 
									   {	
											//SaveTracking();
//											alert("Kirim JO berhasil");
											bootbox.alert("Kirim Kandidat berhasil", function() {
												$("#btnReset").trigger("click");
												$("#act_jo").val("");
												$("#fj_job_order_id").val("");		
											});
									   }
								   }
								 });	
						  }
						}
					  }
					});
/*					bootbox.confirm("Kirim Kandidat ke JO ini ?", function(result) {
						if (result == true) {
							$.ajax({
								   type: "GET",
								   url: "<?php echo base_url('index.php/tracking/sendJO/'); ?>",
								   data: "fj_personal_id="+fj_personal_id + "&fj_job_order_id="+id,
								   beforeSend: function () { $("#loading").show(); },
									// hides the loader after completion of request, whether successfull or failor.             
								   complete: function () { $("#loading").hide(); },      
								   success: function(data)
								   {
									   data = jQuery.parseJSON(data);
									   if(data.success) 
									   {	
											SaveTracking();
//											alert("Kirim JO berhasil");
											bootbox.alert("Kirim Kandidat berhasil", function() {
												$("#btnReset").trigger("click");
												$("#act_jo").val("");
												$("#fj_job_order_id").val("");		
											});
									   }
								   }
								 });	
						}				 		
					});
*/				}
			}
			else
			{
				if(status==72598) 
				{
					bootbox.dialog({
					  message: "<p align=center>Kandidat sudah Hired di JO nomor "+nomor_jo+"</p>",
					  title: "<font color=red>Perhatian!</font>",
					  buttons: {
						main: {
						  label: "OK",
						  className: "btn-primary",
						  callback: function() {
							$("#sendJO_"+$("#fj_job_order_id").val()).attr('disabled',false);
							$("#sendJO_"+$("#fj_job_order_id").val()).html("<i class='fa fa-arrow-right'></i>Kirim");
							$("#btnReset").trigger("click");
							$("#act_jo").val("");
							$("#fj_job_order_id").val("");		
						  }
						}
					  }
					});
/*					bootbox.alert("Kandidat sudah Hired di JO nomor "+nomor_jo, function() {
						$("#sendJO").attr('disabled',false);
						$("#sendJO").html("<i class='fa fa-arrow-right'></i>Kirim");
						$("#btnReset").trigger("click");
						$("#act_jo").val("");
						$("#fj_job_order_id").val("");		
					});
*///					bootbox.alert("Kandidat sudah Hired di JO nomor "+nomor_jo); 
				}
				else
				if(status==72600) 
				{
					bootbox.dialog({
					  message: "<p align=center>Kandidat Refuse di JO nomor "+nomor_jo+"</p>",
					  title: "<font color=red>Perhatian!</font>",
					  buttons: {
						main: {
						  label: "OK",
						  className: "btn-primary",
						  callback: function() {
							$("#sendJO_"+$("#fj_job_order_id").val()).attr('disabled',false);
							$("#sendJO_"+$("#fj_job_order_id").val()).html("<i class='fa fa-arrow-right'></i>Kirim");
							$("#btnReset").trigger("click");
							$("#act_jo").val("");
							$("#fj_job_order_id").val("");		
						  }
						}
					  }
					});
//					bootbox.alert("Kandidat sudah Hired di JO nomor "+nomor_jo); 
				}
				else 
				{
					bootbox.dialog({
					  message: "<p align=center>Kandidat sedang di proses di JO nomor "+nomor_jo+"</p>",
					  title: "<font color=red>Perhatian!</font>",
					  buttons: {
						main: {
						  label: "OK",
						  className: "btn-primary",
						  callback: function() {
							$("#sendJO_"+$("#fj_job_order_id").val()).attr('disabled',false);
							$("#sendJO_"+$("#fj_job_order_id").val()).html("<i class='fa fa-arrow-right'></i>Kirim");
							$("#btnReset").trigger("click");
							$("#act_jo").val("");
							$("#fj_job_order_id").val("");		
						  }
						}
					  }
					});
					//bootbox.alert("Kandidat ini sedang diproses di JO nomor "+nomor_jo);
				}
			}
	});

	function SaveTracking()
	{
			var fj_personal_id = $("#fj_personal_id").val();
			var fj_job_order_id = $("#fj_job_order_id").val();
			$.ajax({
				type: 'GET',
			   	url: "<?php echo base_url('index.php/tracking/save_tracking/'); ?>",
			   	data: "fj_personal_id="+fj_personal_id + "&fj_job_order_id="+fj_job_order_id,
				success: function(data)
				{
				   data = jQuery.parseJSON(data);
				}
			});
	}
		
	$('#footer_paging').hide();

		function loadHistory(page)
		{
			var id = $("#fj_personal_id").val();
			if(typeof page === 'undefined')
			{
				page = 1;
				curpage = 1;
				totpage = 1;
			}
			
			var par = new Array();
			par["page"] = page;

/*			q = $("#formSearch").serializeArray();

			$.each(q, function(k,v){
				par[v.name] = v.value;
			});

*/			par = $.extend({}, par);
			$.ajax({
				   type: "GET",
				   url: "<?php echo base_url('index.php/tracking/getApplicantHistory/'); ?>/"+id,
				   data: par, // serializes the form's elements.
				   success: function(data)
				   {
				   
						$.ajax({
							   type: "GET",
							   url: "<?php echo base_url('index.php/tracking/getFromHistory/'); ?>/"+id,
							   data: par, // serializes the form's elements.
							   success: function(data)
							   {
								   
								   data = jQuery.parseJSON(data);
								   if(data.success) 
								   {
										//$("#historyList > tbody").empty();
										$('#textpage').html("Page "+page+" of "+data.totpage);
										curpage = page;
										totpage = data.totpage;
											$.each(data.data, function(k,v){
												if(v.INTERVIEW_1_DATE!=null) 
												{
													var INTERVIEW_1_DATE = view_date(v.INTERVIEW_1_DATE,2);
												}
												else 
												{
													var INTERVIEW_1_DATE="-";	
												}				
												if(v.INTERVIEW_2_DATE!=null) 
												{
													var INTERVIEW_2_DATE = view_date(v.INTERVIEW_2_DATE,2);
												}
												else 
												{
													var INTERVIEW_2_DATE="-";	
												}				
												if(v.MCU_DATE!=null) 
												{
													var MCU_DATE = view_date(v.MCU_DATE,2);
												}
												else 
												{
													var MCU_DATE="-";	
												}				
												if(v.TRAINING_DATE!=null) 
												{
													var TRAINING_DATE = view_date(v.TRAINING_DATE,2);
												}
												else 
												{
													var TRAINING_DATE="-";	
												}				
												if(v.HIRED_DATE!=null) 
												{
													var HIRED_DATE = view_date(v.HIRED_DATE,2);
												}
												else 
												{
													var HIRED_DATE="-";	
												}				
												var reasons = "";
												if(v.STATUS=='Hired')
												{
													reasons="-";
												}	
												else
												if(v.STATUS=='Reject')
												{	
													if(v.REJECT_REASONS!=null) reasons=v.REJECT_REASONS;
													else reasons="-";
												}	
												else
												if(v.STATUS=='Refuse')
												{
													if(v.REFUSE_REASONS!=null) reasons=v.REFUSE_REASONS;
													else reasons="-";
												}	
												else
												{
													if(v.NOTE!=null) reasons=v.NOTE;
													else reasons="-";
												}
												var html = "<tr>";
													html += "<td>"+v.JO_NO+"</td>";
													html += "<td>"+v.CLIENT+"</td>";
													html += "<td>"+v.POSISI+"</td>";
													html += "<td>"+v.USER+"</td>";
													html += "<td>"+v.BRANCH+"</td>";
													html += "<td>"+view_date(v.SEND_JO,2)+"</td>";
													html += "<td>"+v.SENDER+"</td>";
													html += "<td>"+INTERVIEW_1_DATE+"</td>";
													html += "<td>"+INTERVIEW_2_DATE+"</td>";
													html += "<td>"+MCU_DATE+"</td>";
													html += "<td>"+TRAINING_DATE+"</td>";
													html += "<td>"+v.STATUS+"</td>";
													html += "<td>"+HIRED_DATE+"</td>";
													html += "<td>"+reasons+"</td>";
													html += "</tr>";
												$("#footer_pagging").show();	
												$("#historyList").append($(html).dblclick(function() { $("#content").load("<?php echo base_url('index.php/jo/getDetail/'); ?>/"+v.FJ_JOB_ORDER_ID); }));
										});
								   }
							   }
							 });			
				   
					// mengambil data dari tracking   
					   data = jQuery.parseJSON(data);
					   if(data.success) 
					   {
						    $("#historyList > tbody").empty();
							$('#textpage').html("Page "+page+" of "+data.totpage);
							curpage = page;
							totpage = data.totpage;
								$.each(data.data, function(k,v){
									if(v.INTERVIEW_1_DATE!=null) 
									{
										var INTERVIEW_1_DATE = view_date(v.INTERVIEW_1_DATE,2);
									}
									else 
									{
										var INTERVIEW_1_DATE="-";	
									}				
									if(v.INTERVIEW_2_DATE!=null) 
									{
										var INTERVIEW_2_DATE = view_date(v.INTERVIEW_2_DATE,2);
									}
									else 
									{
										var INTERVIEW_2_DATE="-";	
									}				
									if(v.MCU_DATE!=null) 
									{
										var MCU_DATE = view_date(v.MCU_DATE,2);
									}
									else 
									{
										var MCU_DATE="-";	
									}				
									if(v.TRAINING_DATE!=null) 
									{
										var TRAINING_DATE = view_date(v.TRAINING_DATE,2);
									}
									else 
									{
										var TRAINING_DATE="-";	
									}				
									if(v.HIRED_DATE!=null) 
									{
										var HIRED_DATE = view_date(v.HIRED_DATE,2);
									}
									else 
									{
										var HIRED_DATE="-";	
									}				
									var html = "<tr>";
										html += "<td>"+v.JO_NO+"</td>";
										html += "<td>"+v.CLIENT+"</td>";
										html += "<td>"+v.POSISI+"</td>";
										html += "<td>"+v.USER+"</td>";
										html += "<td>"+v.BRANCH+"</td>";
										html += "<td>"+view_date(v.SEND_JO,2)+"</td>";
										html += "<td>"+v.SENDER+"</td>";
										html += "<td>"+INTERVIEW_1_DATE+"</td>";
										html += "<td>"+INTERVIEW_2_DATE+"</td>";
										html += "<td>"+MCU_DATE+"</td>";
										html += "<td>"+TRAINING_DATE+"</td>";
										html += "<td>"+v.STATUS+"</td>";
										html += "<td>"+HIRED_DATE+"</td>";
										html += "<td>-</td>";
										html += "</tr>";
									$("#footer_pagging").show();	
									$("#historyList").append($(html).dblclick(function() { $("#content").load("<?php echo base_url('index.php/jo/getDetail/'); ?>/"+v.FJ_JOB_ORDER_ID); }));
							});
					   }
				   }
				 });			
		}


	loadTab();
	
	function loadTab(page)
	{
		if(typeof page === 'undefined')
		{
			page = 1;
		}
		if(activeTab=="#riwayat")
		{
			loadHistory(page);	
//			$("#historyList").empty();
			$('#footer_paging').hide();
			$('#footerApplicant').hide();
			$('#title_mandatory').hide();
			$('#btnkandidat').hide();
			$('#btnlistkandidat').show();
		}
		else
		if(activeTab=="#kirim")
		{
			$('#footer_paging').hide();
			$('#footerApplicant').hide();
			$('#title_mandatory').hide();
			$('#btnkandidat').hide();
			$('#btnlistkandidat').show();
		}
		else
		if(activeTab=="#pengalaman")
		{
			$('#btnNavigation').show();
			$('#btnkandidat').show();
			$('#btnkandidat1').show();
			$('#btnNext').attr("disabled",true);
			$('#footer_paging').hide();
			$('#btnlistkandidat').hide();
		}
		else
		if(activeTab=="#interview")
		{
			$('#btnNavigation').hide();
			$('#title_mandatory').hide();
			$('#title_mandatory1').hide();
			$('#btnkandidat').show();
			$('#btnkandidat1').show();
			$('#footerApplicant').show();
			$('#btnlistkandidat').hide();
			$('#footer_paging').hide();
			loadInterview();
		}
		else
		{
//			loadApplicant(page);				
			$('#btnNavigation').show();
			$('#title_mandatory').show();
//			$('#btnkandidat').hide();
//			$('#btnkandidat1').hide();
			$('#btnlistkandidat').hide();
			$('#footerApplicant').show();
			$('#footer_paging').hide();
			$('#btnNext').attr("disabled",false);
		}
	}
	$("#next").click(function(){
		var next = curpage+1;
		if(next <= totpage) 
		{
			if(activeTab=="#riwayat") loadHistory(next);			
			else loadJO(next);
		}
	});

	$("#prev").click(function(){
		var prev = curpage-1;
		if(prev >= 1)
		{
			if(activeTab=="#riwayat") loadHistory(prev);			
			else loadJO(prev);
		}
	});
	
	$("#first").click(function(){
		var next = 1;
		if(activeTab=="#riwayat") loadHistory(next);			
		else loadJO(next);
	});

	$("#last").click(function(){
		var next = totpage;
		if(activeTab=="#riwayat") loadHistory(next);			
		else loadJO(next);
	});
	
	$("a").click(function(e){
			e.preventDefault();
	});	

	$("#id_card_no").on('keyup',function() {
		var inp = $(this);
		if(inp.val().length>5)
		{
			delay(function(){
				$.ajax({
					   type: "GET",
					   url: "<?php echo base_url('index.php/applicant/getPersonal/'); ?>/"+inp.val(),
					   success: function(data)
					   {
						   data = jQuery.parseJSON(data);
						   if(data.success)
						   {
						   		//alert("Data sudah ada");
								bootbox.dialog({
								  message: "<h4 align=center>Data sudah ada!</h4>",
								  closeButton:false,
								  buttons: {
									success: {
									  label: "OK",
									  className: "btn-success",
									  callback: function() {
											$("#fj_personal_id").val(data.fj_personal_id).trigger("change");
											loadApplicant();
											loadEducation();
											loadFamily();
											loadOthers();
											loadInterview();
											loadSkill();
											loadEmergency();
											loadCourses();
											loadOrganization();
											loadLanguage();
											loadExperience();
											loadPsikotes();
									  		}
										}
								  	}
								});
						   }
					   }
				});			
			}, 1000);
		}
	});	
	
	


});
</script>

