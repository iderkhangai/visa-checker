<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> User Management
            <small>Add / Edit User</small>
        </h1>
    </section>
    <section class="content">
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">General Informations</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" required value="<?php echo set_value('photo'); ?>" id="photo" name="photo">
                                    </div>

                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control " required value="<?php echo set_value('fname'); ?>" id="fname" name="fname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of birth</label>
                                        <input type="date" class="form-control " required value="<?php echo set_value('dob'); ?>" id="dob" name="dob">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Gender</label>
                                        <select class="form-control " id="gender" required name="gender">
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <select name="nationality" id="nationality" required class="form-control">
                                            <option value="">-- select one --</option>
                                            <option value="afghan">Afghan</option>
                                            <option value="albanian">Albanian</option>
                                            <option value="algerian">Algerian</option>
                                            <option value="american">American</option>
                                            <option value="andorran">Andorran</option>
                                            <option value="angolan">Angolan</option>
                                            <option value="antiguans">Antiguans</option>
                                            <option value="argentinean">Argentinean</option>
                                            <option value="armenian">Armenian</option>
                                            <option value="australian">Australian</option>
                                            <option value="austrian">Austrian</option>
                                            <option value="azerbaijani">Azerbaijani</option>
                                            <option value="bahamian">Bahamian</option>
                                            <option value="bahraini">Bahraini</option>
                                            <option value="bangladeshi">Bangladeshi</option>
                                            <option value="barbadian">Barbadian</option>
                                            <option value="barbudans">Barbudans</option>
                                            <option value="batswana">Batswana</option>
                                            <option value="belarusian">Belarusian</option>
                                            <option value="belgian">Belgian</option>
                                            <option value="belizean">Belizean</option>
                                            <option value="beninese">Beninese</option>
                                            <option value="bhutanese">Bhutanese</option>
                                            <option value="bolivian">Bolivian</option>
                                            <option value="bosnian">Bosnian</option>
                                            <option value="brazilian">Brazilian</option>
                                            <option value="british">British</option>
                                            <option value="bruneian">Bruneian</option>
                                            <option value="bulgarian">Bulgarian</option>
                                            <option value="burkinabe">Burkinabe</option>
                                            <option value="burmese">Burmese</option>
                                            <option value="burundian">Burundian</option>
                                            <option value="cambodian">Cambodian</option>
                                            <option value="cameroonian">Cameroonian</option>
                                            <option value="canadian">Canadian</option>
                                            <option value="cape verdean">Cape Verdean</option>
                                            <option value="central african">Central African</option>
                                            <option value="chadian">Chadian</option>
                                            <option value="chilean">Chilean</option>
                                            <option value="chinese">Chinese</option>
                                            <option value="colombian">Colombian</option>
                                            <option value="comoran">Comoran</option>
                                            <option value="congolese">Congolese</option>
                                            <option value="costa rican">Costa Rican</option>
                                            <option value="croatian">Croatian</option>
                                            <option value="cuban">Cuban</option>
                                            <option value="cypriot">Cypriot</option>
                                            <option value="czech">Czech</option>
                                            <option value="danish">Danish</option>
                                            <option value="djibouti">Djibouti</option>
                                            <option value="dominican">Dominican</option>
                                            <option value="dutch">Dutch</option>
                                            <option value="east timorese">East Timorese</option>
                                            <option value="ecuadorean">Ecuadorean</option>
                                            <option value="egyptian">Egyptian</option>
                                            <option value="emirian">Emirian</option>
                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                            <option value="eritrean">Eritrean</option>
                                            <option value="estonian">Estonian</option>
                                            <option value="ethiopian">Ethiopian</option>
                                            <option value="fijian">Fijian</option>
                                            <option value="filipino">Filipino</option>
                                            <option value="finnish">Finnish</option>
                                            <option value="french">French</option>
                                            <option value="gabonese">Gabonese</option>
                                            <option value="gambian">Gambian</option>
                                            <option value="georgian">Georgian</option>
                                            <option value="german">German</option>
                                            <option value="ghanaian">Ghanaian</option>
                                            <option value="greek">Greek</option>
                                            <option value="grenadian">Grenadian</option>
                                            <option value="guatemalan">Guatemalan</option>
                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                            <option value="guinean">Guinean</option>
                                            <option value="guyanese">Guyanese</option>
                                            <option value="haitian">Haitian</option>
                                            <option value="herzegovinian">Herzegovinian</option>
                                            <option value="honduran">Honduran</option>
                                            <option value="hungarian">Hungarian</option>
                                            <option value="icelander">Icelander</option>
                                            <option value="indian">Indian</option>
                                            <option value="indonesian">Indonesian</option>
                                            <option value="iranian">Iranian</option>
                                            <option value="iraqi">Iraqi</option>
                                            <option value="irish">Irish</option>
                                            <option value="israeli">Israeli</option>
                                            <option value="italian">Italian</option>
                                            <option value="ivorian">Ivorian</option>
                                            <option value="jamaican">Jamaican</option>
                                            <option value="japanese">Japanese</option>
                                            <option value="jordanian">Jordanian</option>
                                            <option value="kazakhstani">Kazakhstani</option>
                                            <option value="kenyan">Kenyan</option>
                                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                                            <option value="kuwaiti">Kuwaiti</option>
                                            <option value="kyrgyz">Kyrgyz</option>
                                            <option value="laotian">Laotian</option>
                                            <option value="latvian">Latvian</option>
                                            <option value="lebanese">Lebanese</option>
                                            <option value="liberian">Liberian</option>
                                            <option value="libyan">Libyan</option>
                                            <option value="liechtensteiner">Liechtensteiner</option>
                                            <option value="lithuanian">Lithuanian</option>
                                            <option value="luxembourger">Luxembourger</option>
                                            <option value="macedonian">Macedonian</option>
                                            <option value="malagasy">Malagasy</option>
                                            <option value="malawian">Malawian</option>
                                            <option value="malaysian">Malaysian</option>
                                            <option value="maldivan">Maldivan</option>
                                            <option value="malian">Malian</option>
                                            <option value="maltese">Maltese</option>
                                            <option value="marshallese">Marshallese</option>
                                            <option value="mauritanian">Mauritanian</option>
                                            <option value="mauritian">Mauritian</option>
                                            <option value="mexican">Mexican</option>
                                            <option value="micronesian">Micronesian</option>
                                            <option value="moldovan">Moldovan</option>
                                            <option value="monacan">Monacan</option>
                                            <option value="mongolian">Mongolian</option>
                                            <option value="moroccan">Moroccan</option>
                                            <option value="mosotho">Mosotho</option>
                                            <option value="motswana">Motswana</option>
                                            <option value="mozambican">Mozambican</option>
                                            <option value="namibian">Namibian</option>
                                            <option value="nauruan">Nauruan</option>
                                            <option value="nepalese">Nepalese</option>
                                            <option value="new zealander">New Zealander</option>
                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                            <option value="nicaraguan">Nicaraguan</option>
                                            <option value="nigerien">Nigerien</option>
                                            <option value="north korean">North Korean</option>
                                            <option value="northern irish">Northern Irish</option>
                                            <option value="norwegian">Norwegian</option>
                                            <option value="omani">Omani</option>
                                            <option value="pakistani">Pakistani</option>
                                            <option value="palauan">Palauan</option>
                                            <option value="panamanian">Panamanian</option>
                                            <option value="papua new guinean">Papua New Guinean</option>
                                            <option value="paraguayan">Paraguayan</option>
                                            <option value="peruvian">Peruvian</option>
                                            <option value="polish">Polish</option>
                                            <option value="portuguese">Portuguese</option>
                                            <option value="qatari">Qatari</option>
                                            <option value="romanian">Romanian</option>
                                            <option value="russian">Russian</option>
                                            <option value="rwandan">Rwandan</option>
                                            <option value="saint lucian">Saint Lucian</option>
                                            <option value="salvadoran">Salvadoran</option>
                                            <option value="samoan">Samoan</option>
                                            <option value="san marinese">San Marinese</option>
                                            <option value="sao tomean">Sao Tomean</option>
                                            <option value="saudi">Saudi</option>
                                            <option value="scottish">Scottish</option>
                                            <option value="senegalese">Senegalese</option>
                                            <option value="serbian">Serbian</option>
                                            <option value="seychellois">Seychellois</option>
                                            <option value="sierra leonean">Sierra Leonean</option>
                                            <option value="singaporean">Singaporean</option>
                                            <option value="slovakian">Slovakian</option>
                                            <option value="slovenian">Slovenian</option>
                                            <option value="solomon islander">Solomon Islander</option>
                                            <option value="somali">Somali</option>
                                            <option value="south african">South African</option>
                                            <option value="south korean">South Korean</option>
                                            <option value="spanish">Spanish</option>
                                            <option value="sri lankan">Sri Lankan</option>
                                            <option value="sudanese">Sudanese</option>
                                            <option value="surinamer">Surinamer</option>
                                            <option value="swazi">Swazi</option>
                                            <option value="swedish">Swedish</option>
                                            <option value="swiss">Swiss</option>
                                            <option value="syrian">Syrian</option>
                                            <option value="taiwanese">Taiwanese</option>
                                            <option value="tajik">Tajik</option>
                                            <option value="tanzanian">Tanzanian</option>
                                            <option value="thai">Thai</option>
                                            <option value="togolese">Togolese</option>
                                            <option value="tongan">Tongan</option>
                                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                            <option value="tunisian">Tunisian</option>
                                            <option value="turkish">Turkish</option>
                                            <option value="tuvaluan">Tuvaluan</option>
                                            <option value="ugandan">Ugandan</option>
                                            <option value="ukrainian">Ukrainian</option>
                                            <option value="uruguayan">Uruguayan</option>
                                            <option value="uzbekistani">Uzbekistani</option>
                                            <option value="venezuelan">Venezuelan</option>
                                            <option value="vietnamese">Vietnamese</option>
                                            <option value="welsh">Welsh</option>
                                            <option value="yemenite">Yemenite</option>
                                            <option value="zambian">Zambian</option>
                                            <option value="zimbabwean">Zimbabwean</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_no">Passport No</label>
                                        <input type="text" class="form-control " required value="<?php echo set_value('passport_no'); ?>" id="passport_no" name="passport_no">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_expiration_date">Passport expiration date</label>
                                        <input type="date" class="form-control " required value="<?php echo set_value('passport_expiration_date'); ?>" id="passport_expiration_date" name="passport_expiration_date">
                                    </div>
                                </div>


                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Visa Informations</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_no">Passport Number</label>
                                        <input type="text" class="form-control  digits" id="visa_no" value="<?php echo set_value('visa_no'); ?>" name="visa_no">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_issue">Date of issue</label>
                                        <input type="date" required class="form-control" id="date_of_issue" value="<?php echo set_value('date_of_issue'); ?>" name="date_of_issue">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_type">Visa type</label>
                                        <select class="form-control " required id="visa_type" name="visa_type">
                                            <option value="C-3-9">C-3-9</option>
                                            <option value="C-3-1">C-3-1</option>
                                            <option value="D-4-1">D-4-1</option>
                                            <option value="E-9-1">E-9-1</option>
                                            <option value="C-3-3">C-3-3</option>
                                            <option value="E-8-1">E-8-1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status</label>
                                        <select class="form-control " required id="visa_status" name="visa_status">
                                            <option value="Approved">Approved</option>
                                            <option value="Under Review">Under Review</option>
                                            <option value="Received">Received</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_entries">Number of entries</label>
                                        <select class="form-control " required id="no_entries" name="no_entries">
                                            <option value="Single-entry">Single-entry</option>
                                            <option value="Multiple-entry">Multiple</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="entry_purpose">Purpose of Entry</label>
                                        <select class="form-control " required id="entry_purpose" name="entry_purpose">
                                            <option value="Medical">Medical</option>
                                            <option value="Study">Study</option>
                                            <option value="Work">Work</option>
                                            <option value="Tourism">Tourism</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appno">Application Number</label>
                                        <input type="text" class="form-control digits" required id="appno" value="<?php echo set_value('appno'); ?>" name="appno">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="issued_by">Issuing Authority</label>
                                        <input type="text" class="form-control" id="issued_by" required value="<?php echo set_value('issued_by'); ?>" name="issued_by">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_period">Validity Period of Visa</label>
                                        <input type="date" class="form-control" id="visa_period" required value="<?php echo set_value('visa_period'); ?>" name="visa_period">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="period_of_stay">Period of Stay</label>
                                        <input type="text" class="form-control" id="visa_period" required value="<?php echo set_value('period_of_stay'); ?>" name="period_of_stay">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="remark">Remarks</label>
                                        <textarea type="text" class="form-control" id="remark" required value="<?php echo set_value('remark'); ?>" name="remark"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if ($error) {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <?php
                    $success = $this->session->flashdata('success');
                    if ($success) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-default" value="Reset" />
            </div>
        </form>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<!-- <script>
    $('#visa_period').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
</script> -->