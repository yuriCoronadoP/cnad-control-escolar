<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <h1 class="h3 mb-4 text-gray-800">Permisos</h1>
                                <!-- Nested Row within Card Body -->
                                <div class="row">                                
                                    <div class="col-lg-12">
                                        <form class="user" id="form_permisosEmpleados" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" >
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input name="rol" autofocus type="text" class="form-control form-control-user" placeholder="Rol">
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Agregar
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </form>

                                        <hr>

                                        <div class="row">
                                            <?php $colores = ['primary','success','secondary','info','warning','danger']; ?>
                                            <?php foreach ($dataset_permisos as $key => $value) { ?>
                                                <div class="col-xl-3 col-md-6 mb-4">
                                                    <div class="card border-left-<?php echo $colores[$key%count($colores)]; ?> shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-<?php echo $colores[$key%count($colores)]; ?> text-uppercase mb-1">
                                                                        ID: <?php echo $value['idpermisos']; ?>
                                                                    </div>
                                                                    <div class="mb-0 font-weight-bold text-gray-800 text-uppercase">
                                                                        <?php echo acortarRoles($value['rol']); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href="" class="nav-link">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                       
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nested Row within Card Body -->
                                <?php echo $mensajes; ?>
                            </div>
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