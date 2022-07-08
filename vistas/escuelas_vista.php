<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="p-5">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Escuelas</h1>

                    <form id="formEscuelas" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                        <div class="form-group">
                            <input name="fe_cct" class="form-control form-control-user" type="text" placeholder="C.C.T.">
                        </div>
                        <div class="form-group">   
                            <input name="fe_nombre" class="form-control form-control-user" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input name="fe_direccion" class="form-control form-control-user" type="text" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <input name="fe_telefono" class="form-control form-control-user" type="number" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <input name="fe_correo" class="form-control form-control-user" type="text" placeholder="Correo">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary align-self-end" name="guardar">
                                <span class="icon text-white-50"><i class="fas fa-flag"></i> Guardar</span>
                            </button>
                        </div>
                    </form>

                    <?php echo $mensajes; ?>

                </div>
                </div>
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'modal_vista.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>