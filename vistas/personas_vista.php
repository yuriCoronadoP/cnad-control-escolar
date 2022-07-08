<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="p-5">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Personas</h1>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="user">
                                                
                        <div class="form-group">
                            <input name="nombre" class="form-control form-control-user" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">   
                            <input name="paterno" class="form-control form-control-user" type="text" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <input name="materno" class="form-control form-control-user" type="text" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <select name="genero" class="form-control form-control-select">
                                <option value="">Genero</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="direccion" class="form-control form-control-user" type="text" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <input name="telefono" class="form-control form-control-user" type="text" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <input name="correo" class="form-control form-control-user" type="text" placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <input name="curp" class="form-control form-control-user" type="text" placeholder="CURP">
                        </div>
                        <div class="form-group">
                            <input name="rfc" class="form-control form-control-user" type="text" placeholder="RFC">
                        </div>
                        <div class="form-group">
                            <select name="id_escuela" class="form-control form-control-select">
                                <option value="">Escuela</option>
                                <?php
                                    if($dataSet_escuela->rowCount()>0)
                                    {
                                        foreach($resultado_dataSetescuela as $escuela)
                                        {
                                            echo "<option value= '$escuela->idescuela'>".
                                            $escuela->nombre."</option>";
                                        }
                                    }
                                ?>

                            </select>
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