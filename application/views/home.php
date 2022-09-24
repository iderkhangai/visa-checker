  <!-- Navbar -->
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <title>KOREA VISA PORTAL | Check Application Status > Check Application Status & Print</title>

  <body class="box box-default" style="background-color: #eef1f7">
      <div class=" col-md-6" style="background: white;  position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1 style="border-left: 7px solid; padding-left:12px">
                  Search
                  <small style="color: #c33838;font-weight: bold;">Check Application Status & Print</small>
              </h1>
          </section>
          <section class="content">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-default">
                          <!-- form start -->
                          <?php $this->load->helper("form"); ?>
                          <form role="form" action="<?php echo base_url() ?>home/search" method="post" role="form">
                              <div class="box-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fname">Full Name <span style="color: red; font-size: 15px">*</span> </label>
                                              <input type="text" placeholder="Type your name as shown in your passport" required class="form-control" id="fname" name="fname">
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
                                              <label for="dob">Date of birth <span style="color: red; font-size: 15px">*</span></label>
                                              <input type="date" data-date="" data-date-format="DD MMMM YYYY" required class="form-control " value="" id="dob" name="dob">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="passport_no">Passport No <span style="color: red; font-size: 15px">*</span></label>
                                              <input type="text" placeholder="X1234567" required class="form-control" value="" id="passport_no" name="passport_no">
                                          </div>
                                      </div>

                                  </div>
                              </div>
                      </div><!-- /.box-body -->

                      <div class="box-footer">
                          <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Search</button>
                          <input type="reset" class="btn btn-default" value="Reset" />
                      </div>
                      </form>
                  </div>

                  <div class="col-md-12" style="padding-top: 30px;">
                      <section class="content-header">
                          <h1 style="border-left: 7px solid; padding-left:12px">
                              Search Result
                              <small style="color: #c33838;font-weight: bold;">Status</small>
                          </h1>
                      </section>

                      <br>
                      <section>
                          <?php
                            if (!empty($result)) {
                                foreach ($result as $row) {
                            ?>
                                  <table class="box box-default table">
                                      <tbody>
                                          <tr>
                                              <td style="background: #f7f7f7;">Application Number</td>
                                              <td><?php echo $row->appno ?></td>
                                              <td style="background: #f7f7f7;">Purpose of Entry</td>
                                              <td><?php echo $row->entry_purpose ?></td>
                                          </tr>
                                          <tr>

                                          </tr>
                                          <tr>
                                              <td style="background: #f7f7f7;">Date of Application</td>
                                              <td><?php echo $row->date_of_issue ?></td>
                                              <td style="background: #f7f7f7;">Application Status</td>
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

                                      </tbody>
                                  </table>

                                  <table class="table box box-default">
                                      <tr>
                                          <td style="background: #f7f7f7;">Types of Visa </td>
                                          <td><?php echo $row->visa_type ?></td>

                                          <td style="background: #f7f7f7;">Status of Stay</td>
                                          <td><?php echo $row->no_entries ?></td>
                                      </tr>
                                      <tr>
                                          <td style="background: #f7f7f7;">Expiry date</td>
                                          <td><?php echo $row->passport_expiration_date ?></td>
                                          <td> <?php if (strtoupper($row->visa_status) === 'APPROVED') : ?>
                                          <td>
                                              <a class="btn btn-default" href="<?php echo base_url() . 'home/print/' . $row->userId; ?>">Certificate</a>
                                          </td>
                                      <?php else : ?>
                                          <td>-</td>
                                      <?php endif; ?></td>
                                      </tr>
                                  </table>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- <script>
      $(document).ready(function() {
          $('#passport_no').bind('keydown', function(evt) {

              var regEx = new RegExp("^[A-Z]{1}[0-9]{7}$");
              console.log(regEx);
              var key = String.fromCharCode(evt.which || evt.charCode);
              if (regEx.test(key) === false)
                  evt.preventDefault();
          });
      })
  </script> -->