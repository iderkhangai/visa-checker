<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js" integrity="sha512-o/ntaESEzg24PLA+CA6ru6vAYSpyexMPQHdmukczxk631ZPIrwOo1/UjuTAqtDbcGZnfqShoWAc0vBIEOyLnSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

<body>
    <!-- Page 1 -->
    <page size="A4" style="background-color: white">
        <div class="container">
            <div class="row">
                <div id="phototext">
                    <img src="https://www.picng.com/upload/avatar/png_avatar_73978.png" width="15%">
                </div>
                <div class="box-body">
                    <div class="box box-secondary">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <h3 class="bg-blue" style="padding: 5px">1. VISA GRANT NOTICE</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Full Name : ider</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>Gender</td>
                                </tr>

                                <tr>
                                    <td>Nationality</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Passport No</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Passport Ex date</td>
                                    <td></td>
                                </tr>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <div class="box box-secondary">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <h3 class="bg-blue" style="padding: 5px">2. VISA DETAILS</h3>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Full Name : ider</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>Gender</td>
                                </tr>

                                <tr>
                                    <td>Nationality</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Passport No</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Passport Ex date</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="box box-secondary">
                    <div class="endnotes">
                        * The fields marked with * do not need to be filled in by family members of EU, EEA or CH citizens (spouse, child or dependent ascendant) while exercising their right to free
                        movement. Family members of EU, EEA or CH citizens shall present documents to prove this relationship and fill in fields no 34 and 35.
                        <br>
                        (x) Fields 1-3 shall be filled in in accordance with the data in the travel document.
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>


<style>

</style>

<script>
    // var printDoc = new jsPDF();
    const doc = new jsPDF({
        unit: 'pt'
    }) // create jsPDF object
    const pdfElement = document.getElementById('pdf') // HTML element to be converted to PDF

    doc.html(pdfElement, {
        callback: (pdf) => {
            pdf.save('MyPdfFile.pdf')
        },
        margin: 32, // optional: page margin
        // optional: other HTMLOptions
    })
</script>