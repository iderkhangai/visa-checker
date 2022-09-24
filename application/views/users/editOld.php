<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> User Management
            <small>Edit User Details</small>
        </h1>
    </section>
    <section class="content">
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form role="form" id="editUser" action="<?php echo base_url() ?>editUser" method="post" enctype="multipart/form-data">
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
                                        <!-- <input type="hidden" value="<?php echo $userInfo->photo; ?>" name="photo" id="photo" /> -->
                                        <img src="<?php echo base_url('assets/') . $userInfo->photo; ?>" width="80px" height="80px" class="img-round" />
                                        <!-- <input type="file" class="form-control" id="photo" name="photo"> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="hidden" value="<?php echo $userInfo->userId; ?>" name="userId" id="userId" />
                                        <input type="text" class="form-control " required value="<?php echo $userInfo->name ?>" id="fname" name="fname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of birth</label>
                                        <input type="date" class="form-control " required value="<?php echo $userInfo->dob; ?>" id="dob" name="dob">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Gender</label>
                                        <select class="form-control" id="gender" required name="gender">
                                            <!-- <option value="">Select gender</option> -->
                                            <option value="<?php echo $userInfo->gender ?>" <?php if ($userInfo->gender == 0) {
                                                                                                echo "selected=selected";
                                                                                            } ?>>Male</option>
                                            <option value="<?php echo $userInfo->gender ?>" <?php if ($userInfo->gender == 1) {
                                                                                                echo "selected=selected";
                                                                                            } ?>>Female</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <select class="form-control" name="nationality">
                                            <option value="" disabled>--Select--</option>
                                            <?php foreach ($countries as $a) { ?>
                                                <option value="<?= $a; ?>" <?php if ($userInfo->nationality == $a) {
                                                                                echo "selected=selected";
                                                                            } ?>> <?= $a; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_no">Passport No</label>
                                        <input type="text" class="form-control " required value="<?php echo $userInfo->passport_no; ?>" id="passport_no" name="passport_no">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_expiration_date">Passport expiration date</label>
                                        <input type="date" class="form-control " required value="<?php echo $userInfo->passport_expiration_date; ?>" id="passport_expiration_date" name="passport_expiration_date">
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
                                        <input type="text" class="form-control  digits" id="visa_no" value="<?php echo $userInfo->nationality; ?>" name="visa_no">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_issue">Date of issue</label>
                                        <input type="date" required class="form-control" id="date_of_issue" value="<?php echo $userInfo->date_of_issue; ?>" name="date_of_issue">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_type">Visa type</label>
                                        <select class="form-control " required id="visa_type" name="visa_type">
                                            <option value="C-3-9" <?php if ($userInfo->visa_type == 'C-3-9') {
                                                                        echo "selected=selected";
                                                                    } ?>>C-3-9</option>
                                            <option value="C-3-1" <?php if ($userInfo->visa_type == 'C-3-1') {
                                                                        echo "selected=selected";
                                                                    } ?>>C-3-1</option>
                                            <option value="D-4-1" <?php if ($userInfo->visa_type == 'D-4-1') {
                                                                        echo "selected=selected";
                                                                    } ?>>D-4-1</option>
                                            <option value="E-9-1" <?php if ($userInfo->visa_type == 'E-9-1') {
                                                                        echo "selected=selected";
                                                                    } ?>>E-9-1</option>
                                            <option value="C-3-3" <?php if ($userInfo->visa_type == 'C-3-3') {
                                                                        echo "selected=selected";
                                                                    } ?>>C-3-3</option>
                                            <option value="E-8-1" <?php if ($userInfo->visa_type == 'E-8-1') {
                                                                        echo "selected=selected";
                                                                    } ?>>E-8-1</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status</label>
                                        <select class="form-control " required id="visa_status" name="visa_status">
                                            <option value="Approved" <?php if ($userInfo->visa_status == 0) {
                                                                            echo "selected=selected";
                                                                        } ?>>Approved</option>
                                            <option value="Under Review" <?php if ($userInfo->visa_status == 0) {
                                                                                echo "selected=selected";
                                                                            } ?>>Under Review</option>
                                            <option value="Received" <?php if ($userInfo->visa_status == 0) {
                                                                            echo "selected=selected";
                                                                        } ?>>Received</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_entries">Number of entries</label>
                                        <select class="form-control " required id="no_entries" name="no_entries">
                                            <option value="Single-Entry" <?php if ($userInfo->no_entries == 'Single-Entry') {
                                                                                echo "selected=selected";
                                                                            } ?>>Single-Entry</option>
                                            <option value="Multiple" <?php if ($userInfo->no_entries == 'Multiple') {
                                                                            echo "selected=selected";
                                                                        } ?>>Multiple</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="entry_purpose">Purpose of Entry</label>
                                        <select class="form-control " required id="entry_purpose" name="entry_purpose">
                                            <option value="Medical" <?php if ($userInfo->entry_purpose == 'Medical') {
                                                                        echo "selected=selected";
                                                                    } ?>>Medical</option>
                                            <option value="Study" <?php if ($userInfo->entry_purpose == 'Study') {
                                                                        echo "selected=selected";
                                                                    } ?>>Study</option>
                                            <option value="Work" <?php if ($userInfo->entry_purpose == 'Work') {
                                                                        echo "selected=selected";
                                                                    } ?>>Work</option>
                                            <option value="Tourism" <?php if ($userInfo->entry_purpose == 'Tourism') {
                                                                        echo "selected=selected";
                                                                    } ?>>Tourism</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appno">Application Number</label>
                                        <input type="text" class="form-control digits" required id="appno" value="<?php echo $userInfo->appno; ?>" name="appno">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="issued_by">Issuing Authority</label>
                                        <input type="text" class="form-control" id="issued_by" required value="<?php echo $userInfo->issued_by; ?>" name="issued_by">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="visa_period">Validity Period of Visa</label>
                                        <input type="date" class="form-control" id="visa_period" required value="<?php echo $userInfo->visa_period; ?>" name="visa_period">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="period_of_stay">Period of Stay</label>
                                        <input type="text" class="form-control" id="visa_period" required value="<?php echo $userInfo->period_of_stay; ?>" name="period_of_stay">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="remark">Remarks</label>
                                        <textarea class="form-control" id="remark" required name="remark"><?php echo $userInfo->remark; ?></textarea>
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
                <input type="submit" class="btn btn-primary" value="Update" />
                <input type="reset" class="btn btn-default" value="Reset" />
            </div>
        </form>
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>