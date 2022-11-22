<?= $this->extend('layout/main'); ?>
<?= $this->section('mainContent'); ?>
<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex col-md align-items-center mb-3 mt-2">
                    <div class="col-md-4">
                        <h4 class="my-auto card-title"> Data APM</h4>

                    </div>
                    <select name="semester" id="cari-semester" class="form-control mr-2">
                        <option selected disabled>Pilih semester</option>
                        <option value="I">I</option>
                        <option value="II">II</option>

                    </select>
                    <select name="tahun" id="cari-tahun" class="form-control">
                        <option selected disabled>Pilih tahun</option>
                        <?php
                        $tahun = date('Y');
                        for ($i = 0; $i < 5; $i++) : ?>
                            <option value="<?= $tahun - $i; ?>"><?= $tahun - $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <div class="col">
                        <a href="" class="btn btn-primary cari-data-apm">
                            Submit
                        </a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Area</th>
                                <th scope="col">Jumlah Sub Checklist</th>
                                <th scope="col">Jumlah link terisi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-link-apm">


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div id="modal"></div>

    <script>
        $(document).ready(function() {



            let data_semester;
            if (new Date().getMonth() >= 1 && new Date().getMonth() <= 6) {
                data_semester = 'I';
            } else {
                data_semester = 'II';
            }
            let linkApm = (semester = null, tahun = null) => {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('home/getLinkApm'); ?>",
                    data: {
                        semester,
                        tahun

                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#tbody-link-apm').html("");
                        let nomorUrut = 1;
                        Object.entries(response).forEach(([key, val]) => {
                            if (key != 'jumlah_total_target' && key != 'jumlah_total_link')
                                $('#tbody-link-apm').append(
                                    `
                        <tr>
                                    <td>${nomorUrut++}</td>
                                    <td class="text-wrap">${key}</td>
                                    <td class="text-wrap">${val.jumlah_target}</td>
                                    <td class="text-wrap">${(val.jumlah_link)?val.jumlah_link:'-'}</td>

                                  </tr>
                        `
                                )
                        });
                        $('#tbody-link-apm').append(
                            `
                        <tr>
                                    <td colspan=2>Total</td>
                                    
                                    <td class="text-wrap">${(response.jumlah_total_target)?response.jumlah_total_target:'-'}</td>
                                    <td class="text-wrap">${(response.jumlah_total_target)?response.jumlah_total_link:'-'}</td>

                                  </tr>
                        `
                        )
                        // response.forEach(element => {
                        //     $('.tbody-akreditasi').append(
                        //         `
                        // <tr>
                        //             <td>${nomorUrut++}</td>
                        //             <td class="text-wrap">${element.jumlah_target}</td>
                        //             <td class="text-wrap">${element.jumlah_link}</td>

                        //           </tr>
                        // `
                        //     )
                        // });

                    }
                });
            }

            linkApm(data_semester, new Date().getFullYear());

            $('.cari-data-apm').on('click', function(e) {
                e.preventDefault();
                let semester = $('#cari-semester').val();
                let tahun = $('#cari-tahun').val();
                linkApm(semester, tahun);
            })



        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->endSection(); ?>