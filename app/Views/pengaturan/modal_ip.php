<div class="modal" id="modal_ip" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title"><?= ($data_ip) ? "Ubah ip" : "Tambah ip"; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-upload-file" method="post" action="<?= base_url('pengaturan/insert_ip' . ($data_ip ? '/ubah' : '')); ?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="ip_amora">IP AMORA</label>
                        <input type="text" name="ip_amora" class="form-control" placeholder="Masukkan ip amora " value="<?= ($data_ip) ? $data_ip['ip_amora'] : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ip_preview">IP PREVIEW</label>
                        <input type="text" name="ip_preview" class="form-control" placeholder="Masukkan ip preview " value="<?= ($data_ip) ? $data_ip['ip_preview'] : ""; ?>">
                    </div>
                    
                    <input type="hidden" name="id" value="<?= ($data_ip) ? $data_ip['id'] : ""; ?>">
                    

                    <button type="submit" class="btn btn-primary submit-button">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $('.custom-file-input').each(function() {
        $(this).change(function() {
            let nama = $(this).val()
            console.log(nama)
            $(this).siblings('.custom-file-label').text(nama)
        })
    });

   
</script>