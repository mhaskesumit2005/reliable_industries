</div>
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div
            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
            <div class="text-body">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>, <?= $admin_account[0]['admin_organization'] ?>. All Rights Reserved
            </div>
            <div class="d-none d-lg-inline-block">Developed By <a href="https://a2zithub.org/" target="_blank" class="footer-link me-4"><?= $admin_account[1]['admin_organization'] ?></a>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now">
    <a
        href="https://a2zithub.org/"
        target="_blank"
        class="btn btn-danger btn-sm btn-buy-now"><i class='bx bx-support me-2 fs-5'></i>Support</a>
</div>
<!-- Include jQuery before the closing body tag if it's not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach((item) => {
            const link = item.querySelector('.menu-link');
            const toggleLink = item.querySelector('.menu-toggle');

            if (link && link.href === window.location.href) {
                item.classList.add('active');
                let parent = item.closest('.menu-item');
                while (parent) {
                    parent.classList.add('open');
                    parent = parent.parentElement.closest('.menu-item');
                }
            }

            if (toggleLink) {
                toggleLink.addEventListener('click', (e) => {
                    e.preventDefault();

                    const submenu = item.querySelector('.menu-sub');
                    if (submenu) {
                        submenu.classList.toggle('d-none');
                        item.classList.toggle('open');
                    }
                });
            }
        });
    });
</script>





<!-- Core JS -->
<!-- build:js assets/admin_assets/vendor/js/core.js -->

<script src="<?= base_url() ?>assets/admin_assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url() ?>assets/admin_assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url() ?>assets/admin_assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>assets/admin_assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url() ?>assets/admin_assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= base_url() ?>assets/admin_assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= base_url() ?>assets/admin_assets/assets/js/dashboards-analytics.js"></script>
<script src="<?= base_url() ?>assets/admin_assets/assets/js/pages-account-settings-account.js"></script>

<!-- imggallery.js -->
<script src="<?= base_url() ?>assets/admin_assets/js/imggallery.js"></script>

<!-- Place this tag before closing body tag for github widget button. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>

<script>
    new DataTable('#datatable-demo', {
        layout: {
            topStart: {
                buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
            }
        }
    });
</script>

<!-- ckeditor5  -->
<script>
    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            window.editor = editor;
            console.log('CKeditor init');
            editor.setData();
            const data = editor.getData();
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });
</script>
</body>

</html>