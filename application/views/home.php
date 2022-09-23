  <!-- Navbar -->
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <body style="background: #e2e3dd;">
      <div class="container" style="background: white;height: 100%; width: 50%;">
          <!-- Content Header (Page header) -->
          <section class="content-header" style="margin-top:50px">
              <h1>
                  <i class="fa fa-users"></i> Search
                  <small>Check application status</small>
              </h1>
          </section>
          <section class="content">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-primary">
                          <!-- form start -->
                          <?php $this->load->helper("form"); ?>
                          <form role="form" action="<?php echo base_url() ?>home/search" method="post" role="form">
                              <div class="box-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fname">Full Name</label>
                                              <input type="text" required class="form-control" id="fname" name="fname">
                                          </div>
                                      </div>
                                      <!-- <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="dob">Date of birth</label>
                                          <input type="date" class="form-control " value="" id="dob" name="dob">
                                      </div>
                                  </div> -->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="dob">Date of birth</label>
                                              <input type="date" required class="form-control " value="" id="dob" name="dob">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="passport_no">Passport No</label>
                                              <input type="text" required class="form-control " value="" id="passport_no" name="passport_no">
                                          </div>
                                      </div>

                                  </div>
                              </div>
                      </div><!-- /.box-body -->

                      <div class="box-footer">
                          <input type="submit" class="btn btn-primary" value="Search" />
                          <input type="reset" class="btn btn-default" value="Reset" />
                      </div>
                      </form>
                  </div>

                  <div class="col-md-12" style="padding-top: 30px;">
                      <section class="content-header">
                          <h1>
                              Search Result
                              <small>Status</small>
                          </h1>
                      </section>

                      <br>
                      <section>
                          <?php
                            if (!empty($result)) {
                                foreach ($result as $row) {
                            ?>
                                  <table class="box box-success table table-striped">
                                      <tbody>
                                          <tr>
                                              <td>Application Number</td>
                                              <td><?php echo $row->appno ?></td>
                                          </tr>
                                          <tr>
                                              <td>Purpose of Entry</td>
                                              <td><?php echo $row->entry_purpose ?></td>
                                          </tr>
                                          <tr>
                                              <td>Date of Application</td>
                                              <td><?php echo $row->mobile ?></td>
                                          </tr>
                                          <tr>
                                              <td>Application Status</td>
                                              <?php if (strtoupper($row->visa_status) === 'APPROVED') : ?>
                                                  <td>
                                                      <label for="" class="label label-success"><?php echo strtoupper($row->visa_status) ?></label>
                                                  </td>
                                              <?php elseif (strtoupper($row->visa_status) === 'UNDER REVIEW') : ?>
                                                  <td>
                                                      <label for="" class="label label-warning"><?php echo strtoupper($row->visa_status) ?></label>
                                                  </td>
                                              <?php elseif (strtoupper($row->visa_status) === 'RECEIVED') : ?>
                                                  <td>
                                                      <label for="" class="label label-danger"><?php echo strtoupper($row->visa_status) ?></label>
                                                  </td>
                                              <?php else : ?>
                                                  <td>-</td>
                                              <?php endif; ?>
                                          </tr>

                                          <tr>
                                              <td>Types of Visa </td>
                                              <td><?php echo $row->visa_type ?></td>
                                          </tr>

                                          <tr>
                                              <td>Status of Stay</td>
                                              <td><?php echo $row->no_entries ?></td>
                                          </tr>

                                          <tr>
                                              <td>Expiry date</td>
                                              <td><?php echo $row->passport_expiration_date ?></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <?php if (strtoupper($row->visa_status) === 'APPROVED') : ?>
                                      <td>
                                          <a class="btn btn-primary" href="<?php echo base_url() . 'home/print/' . $row->userId; ?>">Print Certificate</a>
                                      </td>
                                  <?php else : ?>
                                      <td>-</td>
                                  <?php endif; ?>

                          <?php
                                }
                            } else {
                                echo 'No result found';
                            }
                            ?>
                      </section>
                  </div>
              </div>
      </div>

  </body>