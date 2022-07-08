<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="p-5">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Agregar Clases</h1>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                        <div class="form-group">
                            <select class="form-control form-control-select">
                                <option value="">Maestro</option>
                                <option value="">Fulano</option>
                                <option value="">Mengano</option>
                                <option value="">Perengano</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-select">
                                <option value="">Materia</option>
                                <option value="">Algebra</option>
                                <option value="">Ingles I</option>
                                <option value="">Quimica I</option>
                                <option value="">LEOyE I</option>
                                <option value="">TICs</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="guardar">
                                <span class="icon text-white-50"><i class="fas fa-flag"></i> Guardar</span>
                            </button>
                        </div>
                    
                    
                        
                    </form>

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