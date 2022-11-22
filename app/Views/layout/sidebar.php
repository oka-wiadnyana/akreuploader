<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(''); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#apm" aria-expanded="false" aria-controls="apm">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">APM</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apm">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('akreditasi/index'); ?>">Checklist</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('akreditasi/daftar_assesment_internal'); ?>">Ass Internal</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('akreditasi/daftar_assesment_eksternal'); ?>">Ass Eksternal</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('akreditasi/import_checklist'); ?>">Import Checklist</a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="<?= base_url('eksekusi/putusan_belum_selesai'); ?>">Belum selesai</a></li> -->

                </ul>
            </div>
        </li>


        <?php if (session()->get('level') == "administrator" || session()->get('level') == "ketua" || session()->get('level') == "wakil" || session()->get('level') == "sekretaris" || session()->get('level') == "ortala") : ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
                    <span class="icon-bg"><i class="mdi mdi-settings menu-icon"></i></span>
                    <span class="menu-title">Setting</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="setting">
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('pengaturan/daftar_google_client'); ?>">Google Client</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('pengaturan/parent_folder'); ?>">Parent Folder</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('pengaturan/redirect_uri'); ?>">Redirect URI</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('pengaturan/daftar_ip'); ?>">IP Target</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('pengaturan/daftar_akun'); ?>">Akun</a></li>

                    </ul>
                </div>
            </li>
        <?php endif; ?>


        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="<?= base_url('auth/logout'); ?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Log Out</span></a>
            </div>
        </li>
    </ul>
</nav>