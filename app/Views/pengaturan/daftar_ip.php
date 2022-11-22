<?= $this->extend('layout/main'); ?>
<?= $this->section('mainContent'); ?>
<div class="content-wrapper">

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-6 mb-3 p-0">
          <div class="col p-0">
            <h4 class="my-auto card-title">Daftar IP</h4>
          </div>

        </div>
        <div class="row mb-2">
          <div class="col">

            <a href="" class="btn btn-info tambah-ip <?= $data ? 'disabled' : ''; ?> ">Tambah</a>
          </div>
        </div>



        <table class="table table-bordered mt-2 pt-2" id="table-ip">
          <thead>
            <tr>
              <th style="border-top: 1px solid grey;"> Nomor </th>
              <th style="border-top: 1px solid grey;"> IP AMORA </th>
              <th style="border-top: 1px solid grey;"> IP PREVIEW </th>
              <th style="border-top: 1px solid grey;"> Aksi </th>
            </tr>
          </thead>
          <tbody class="">
            <?php $no = 1; ?>
            <?php foreach ($data as $d) : ?>
              <tr>
                <td><?= 1; ?></td>
                <td><?= $d['ip_amora']; ?></td>
                <td><?= $d['ip_preview']; ?></td>

                <td><a href="" data-id="<?= $d['id']; ?>" class="btn btn-info btn-ubah">Ubah</a> <a href="" data-id="<?= $d['id']; ?>" class="btn btn-danger btn-hapus">Hapus</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  <div id="modal"></div>
  <script>
    $(document).ready(function() {
      function table_akun() {
        let table = $('#table-ip').DataTable({
          // "processing": true,
          // "serverSide": true,
          "order": [],
          // "ajax": {
          //   "url": "<?= base_url('eksekusi/data_eksekusi_belum_datatable'); ?>",
          //   "type": "POST"
          // },
          "columnDefs": [{
              "target": 0,
              "orderable": false,
            },
            {
              responsivePriority: 1,
              targets: 0,

            },
            {
              responsivePriority: 1,
              targets: 1,

            },
            {
              responsivePriority: 1,
              targets: 2,

            },
            {
              responsivePriority: 1,
              targets: -1,

            },


          ],
          rowReorder: {
            selector: 'td:nth-child(1)'
          },
          responsive: true

        })

      }
      table_akun();

      $('.tambah-ip').click(function(e) {
        e.preventDefault();
        $.ajax({
          type: "get",
          url: "<?= base_url('pengaturan/modal_ip'); ?>",

          dataType: "json",
          success: function(response) {
            $('#modal').html(response);
            $('#modal_ip').modal('show');
          }
        });
      })
      $('.btn-ubah').each(function(index, element) {
        $(this).click(function(e) {
          e.preventDefault();
          let id = $(this).data('id');
          console.log(id);
          $.ajax({
            type: "post",
            url: "<?= base_url('pengaturan/modal_ip'); ?>",
            data: {
              id
            },
            dataType: "json",
            success: function(response) {
              $('#modal').html(response);
              $('#modal_ip').modal('show');
            }
          });
        })
      })

      $('.btn-hapus').each(function(index, element) {
        $(this).click(function(e) {
          e.preventDefault();
          let id = $(this).data('id');
          console.log(id);
          Swal.fire({
            title: 'Anda yakin?',
            text: "Anda tidak akan dapat mengulanginya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal!',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: "post",
                url: "<?= base_url('pengaturan/hapus_ip'); ?>",
                data: {
                  id
                },
                dataType: "json",
                success: function(response) {

                  $(location).attr('href', `<?= base_url('pengaturan/daftar_ip'); ?>`);
                }
              });
            }
          })

        })
      })


    });
  </script>

  <?= $this->endSection(); ?>