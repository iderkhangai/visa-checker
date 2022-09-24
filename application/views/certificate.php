<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js" integrity="sha512-o/ntaESEzg24PLA+CA6ru6vAYSpyexMPQHdmukczxk631ZPIrwOo1/UjuTAqtDbcGZnfqShoWAc0vBIEOyLnSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https//fonts.googleapis.com/earlyaccess/notosanskr.css">
<title>Certificate</title>
<style>
    body {

        width: 596px;
        height: 852px;
        margin-left: auto;
        margin-right: auto;
        font-family: monospace;
        letter-spacing: -0.01rem;

    }

    .propile {
        width: 230px;
        height: 200px;
        background-position: center;
        background-repeat: no-repeat;
    }

    .header-title {
        background-color: #cdc8c8;
        padding: 10px;
    }

    ul {
        list-style-type: decimal;
    }

    .notice {
        font-size: 10.6667px;

    }

    .title {
        /* align-items: center; */
        text-align: center;
        margin-top: 60px;
        font-size: 20px;
    }

    .section {
        /* display: flex; */
        margin-bottom: 40px;
        /* border-bottom: 1px red solid; */

    }

    .line {
        border-bottom: 2px solid black;
        margin-bottom: -10px;
    }

    p {
        flex: 1;
    }

    .header-title {
        font-size: 13.3333px;
        font-weight: 500;
        background-color: #c0c0c0;
        color: black;
    }

    .top-header {
        top: 92.3904px;
        font-size: 10.6667px;
        font-family: monospace;
    }

    .middle-header {
        font-size: 13.3333px;
    }

    td {
        padding: 1px !important;


    }

    th {
        padding: 1px !important;
        line-height: 100;
        font-weight: normal;
        text-align: left;


    }
</style>
<div class="content">
    <div class="top">
        <p style="float:left" class="top-header"> 대한민국법무부 <br> MINISTRY OF JUSTICE,THE REPUBLIC OF KOREA </p>
        <p style="float: right" class="top-header"> <img width="100px" src="<?php echo base_url() ?>assets/images/barcode.png"> </p>
    </div>
    <h2 class="title">VISA GRANT NOTICE <p>사증발급확인서</p>
    </h2>
    <div class="section">
        <p style="float:left" id="passport_no" class="middle-header"> Visa No.(사증번호): <?php echo $userInfo->passport_no ?> </p>
        <p style="float: right" class="middle-header"> <?php echo $userInfo->createdDtm ?></p>
    </div>
    <div class="line"></div>
    <div class="con">
        <h3 class="header-title">1. DETAILS OF APPLICANT 신청자정보</h3>
        <table>
            <tbody>
                <td style="width: auto;height: auto;">
                    <img src="<?php echo base_url('assets/') . $userInfo->photo; ?>" width="100%" height="100%" class="img" />
                </td>
                <td style="height: 150px;">
                    <table class="table table-bordered resume-table">
                        <tbody>
                            <tr>
                                <th>Full Name 영문성명</th>
                                <td><?php echo $userInfo->name ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth 생년월일</th>
                                <td><?php echo $userInfo->dob ?></td>

                                <th>Gender <br>성별</th>
                                <td><?php
                                    if ($userInfo->gender == 0)
                                        echo 'Male';
                                    else {
                                        echo 'Female';
                                    }
                                    ?>
                                </td>

                            </tr>
                            <tr>
                                <th>Nationality 국적</th>
                                <td><?php echo $userInfo->nationality ?></td>
                            </tr>
                            <tr>
                                <th>Passport No.여권번호</th>
                                <td><?php echo $userInfo->passport_no ?></td>
                            </tr>
                            <tr>
                                <th>Passport Expiration Date 여권만료일</th>
                                <td><?php echo $userInfo->passport_expiration_date ?></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tbody>
        </table>

        <h3 class="header-title" style=" margin-top: 0px;">2. VISA DETAILS 사증사항</h3>
        <table class="table table-bordered" style="text-align: center;">
            <tbody>
                <tr>
                    <th>Status of Stay <br>체류자격</th>
                    <td><?php echo $userInfo->visa_type ?></td>
                    <th>Date of Issue <br>발급일</th>
                    <td><?php echo $userInfo->date_of_issue ?></td>
                    <th>Period of Stay <br>체류기간</th>
                    <td><?php echo $userInfo->period_of_stay ?></td>

                </tr>
                <tr>
                    <th>Validity Period of Visa<br> 사증유효기간</th>
                    <td><?php echo $userInfo->visa_period ?></td>
                    <th>Issuing Authority <br>발급기관</th>
                    <td><?php echo $userInfo->issued_by ?></td>
                    <th>Number of Entries <br>사증종류</th>
                    <td><?php echo $userInfo->no_entries ?></td>
                </tr>
                <tr>
                    <th>Remarks 비고</th>
                    <td colspan="5"><?php echo $userInfo->remark ?></td>
                </tr>
            </tbody>
        </table>
        <p style="font-size: 13.3px;line-height: 14px; padding-left:10px; padding-right:10px">
            This document confirms that the above applicant’s Korean visa application has been approved andthat the visa is currently valid in accordance with Article 7 (Issuance of Visa) of theEnforcement Decree of the Immigration Act.

        <p>대한민국 출입국관리법 시행령 제7조(사증발급)의 규정에 의하여 기재된 신청인에 대하여 사증 발급이허가되었으며 해당 사증이 유효함을 확인합니다.</p>


        </p>
        <p style="text-align: center; font-size: 13.3px;line-height: 14px;">Minister of Justice, Republic of Korea 대한민국 법무부 장관</p>
        <div class="line"></div>
        <h3 class="header-title">
            < 주의사항 NOTICE>
        </h3>

        <ul style="list-style-type: decimal; padding-left: 20px;text-align: justify;line-height: 14px;" class="notice">
            <li>
                이 사증발급확인서는 신청인에 대하여 대한민국 사증이 유효하게 발급되었음을 증명하는 서류입니다. 이 확인서를 소지한 사람은, 본 서류에 사진이 인쇄되지 않았더라도, 대한민국 사증발급 여부를 확인받기 위한 공식 증명으로 활용할 수 있습니다. 본 서류의 유효성은 인터넷 비자포털(www.visa.go.kr)에서 확인할 수 있습니다.
                <p>This document is a proof that a valid visa of the Republic of Korea (ROK) has been issued to the above applicant. Theholder of this document may use it as an official proof to verify the validity of the issuance ROK visa, even whithout aphoto on it. The validity of this document can be verified on the KOREA VISA PORTAL web-site (www.visa.go.kr).</p>
            </li>
            <li>
                이 확인서를 소지한 신청인은 위에 기재된 사증 유효기간 이전에 출입국관리공무원의 입국심사를 받은 후 대한민국에 입국하여,기재된 체류기간 동안 체류할 수 있습니다. 다만, 사증을 발급받았더라도 입국심사 과정에서 출입국관리법에 따라 대한민국 입국이 불허될 수 있으며, 체류기간이 변경될 수 있습니다.
            </li>
            <li>
                본 서류를 위.변조하거나, 허위의 사실을 제시하여 본 서류를 발급받은 경우 대한민국 관계법령에 의거하여 처벌받을 수 있으며,향후 입국이 제한될 수 있습니다.
                <p>Forging or falsifying of this document, or stating false information to obtain this document is strictly prohibited and mayresult in punishment and entry denial under the relevant laws and regulations of the ROK.</p>
            </li>
            <li>
                확인서에 기재된 여권의 정보(여권번호, 유효기간 등)가 변경되는 경우, 재외공관에 방문하여 여권 변경 사항을 신고하고 사증을재발급 받아야 합니다.
                <p>
                    In case the passport information (Passport Number, Date of Expiry, etc.) indicated in this document changes, applicants arerequired to visit Consular Offices of the ROK to report the changes and have a visa re-issued
                </p>
            </li>
            <li>
                이 확인서에 기재된 여권 정보와 소지한 여권의 정보가 다른 경우 대한민국 입국이 제한될 수 있습니다.
            </li>
            <p>
                Entry may be denied should the passport information on this document differ from that shown on the applicant’s passport.
            </p>
        </ul>
        <div class="line"></div>
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
            doc.save(visa + "certificate.pdf");
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