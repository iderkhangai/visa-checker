<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js" integrity="sha512-o/ntaESEzg24PLA+CA6ru6vAYSpyexMPQHdmukczxk631ZPIrwOo1/UjuTAqtDbcGZnfqShoWAc0vBIEOyLnSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https//fonts.googleapis.com/earlyaccess/notosanskr.css">
<style>
    html {
        font-family: 'Noto Sans KR', sans-serif;
        letter-spacing: -0.01rem;
    }

    body {
    
        margin-left: auto;
        margin-right: auto;

    }

    .propile {
        width: 250px;
        height: 400px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .header-title {
        background-color: #cdc8c8;
        padding: 10px;
    }

    .title {
        /* align-items: center; */
        text-align: center;
        margin-top: 60px;
    }

    .section {
        /* display: flex; */
        margin-bottom: 50px;
    }

    p {
        flex: 1;
    }
</style>
<div class="content">
    <h2 class="title">VISA GRANT NOTICE</h2>
    <div class="section">
        <p style="float:left" id="passport_no"> Visa No: <?php echo $userInfo->passport_no ?> </p>
        <p style="float: right"> <?php echo $userInfo->createdDtm ?></p>
    </div>
    <hr>
    <div class="con">
        <h3 class="header-title">1. Details of Applicants</h3>
        <table class="table table-striped outer-table">
            <tbody>
                <td style="width:250px;">
                    <img src="<?php echo base_url('assets/') . $userInfo->photo; ?>" width="100%" height="100%" class="img img-rounded" />
                </td>
                <td>
                    <table class="table table-bordered resume-table">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td><?php echo $userInfo->name ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo $userInfo->dob ?></td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td><?php echo $userInfo->nationality ?></td>
                            </tr>
                            <tr>
                                <th>Passport No</th>
                                <td><?php echo $userInfo->passport_no ?></td>
                            </tr>
                            <tr>
                                <th>Passport expiration Date</th>
                                <td><?php echo $userInfo->passport_expiration_date ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php
                                    if ($userInfo->gender == 0)
                                        echo 'Male';
                                    else {
                                        echo 'Female';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tbody>
        </table>

        <h3 class="header-title">2. VISA DETAILS</h3>
        <table class="table table-striped outer-table resume-table-2">
            <colgroup>
                <col style="width:250px;">
                <col>
            </colgroup>
            <tbody>
                <tr>
                    <th>Status of Stay</th>
                    <td><label class="label label-default"><?php echo $userInfo->visa_type ?></label></td>
                </tr>
                <tr>
                    <th>Date of Issue</th>
                    <td><?php echo $userInfo->date_of_issue ?></td>
                </tr>
                <tr>
                    <th>Period of Stay</th>
                    <td><?php echo $userInfo->passport_expiration_date ?></td>
                </tr>
                <tr>
                    <th>Validity Period of Visa</th>
                    <td><?php echo $userInfo->visa_period ?></td>
                </tr>
                <tr>
                    <th>Number of Entries</th>
                    <td><?php echo $userInfo->no_entries ?></td>
                </tr>
                <tr>
                    <th>Issuing Authority</th>
                    <td><?php echo $userInfo->issued_by ?></td>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <td><?php echo $userInfo->remark ?></td>
                </tr>
            </tbody>
        </table>

        <h3 class="sub-title">NOTICE</h3>
        <pre> test </pre>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var form = $('.content'),
            cache_width = form.width(),
            a4 = [595.28, 841.89]; // for a4 size paper width and height  
        const visa = $("#passport_no").text();
        getCanvas().then(function(canvas) {
            var
                img = canvas.toDataURL("image/png"),
                doc = new jsPDF({
                    unit: 'px',
                    format: 'a4'
                });
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save(visa);
            form.width(cache_width);
        });

        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }
    });
</script>