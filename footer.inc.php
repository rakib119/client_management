<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; BGD Client Management System.
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets\js\validation.js"></script>
<!-- Ajax Query -->
<script src="assets\js\ajax-query.js"></script>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Required datatable js -->
<!-- Buttons examples -->
<!-- Responsive examples -->
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Datatable init js -->
<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- error alert -->
<?php if (isset($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'Oops...',
            text: '<?= $_SESSION['error'] ?>',
            showConfirmButton: true,
        })
    </script>
<?php
    unset($_SESSION['login_error']);
endif;
?>
<!-- success alert -->
<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= $_SESSION['success'] ?>',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        })
    </script>
<?php
    unset($_SESSION['success']);
endif;
?>
<!-- delete confirmation -->
<script>
    $(".delete_data").click(function() {
        var link = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        })
    });
</script>
</body>


</html>