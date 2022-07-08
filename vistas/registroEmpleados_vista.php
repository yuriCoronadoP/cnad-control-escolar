<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-9">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registro de empleados</h1>
                                    </div>
                                    <form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                        
                                        <div class="form-group row">
                                        
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control form-control-select" name="rfc" id="">
                                                    <option value="">RFC</option>
                                                    <?php
                                                        if(count($dataset_personas) > 0){
                                                            foreach($dataset_personas as $persona)
                                                            {
                                                                echo "<option value= '$persona->idpersonas'>".
                                                                $persona->rfc."</option>";
                                                            }
                                                        }   
                                                    ?>
                                                </select>                                            
                                            </div>
                                            <div class="col-sm-6">                                                  
                                                <input name="usuario" type="text" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Usuario">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input name="password" type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-select" name="rol" id="">
                                                    <option value="">Rol</option>
                                                    <?php
                                                        if(count($dataset_permisos) > 0){
                                                            foreach($dataset_permisos as $permiso)
                                                            {
                                                                echo "<option value='$permiso->idpermisos'>".
                                                                $permiso->rol."</option>";
                                                            }
                                                        }   
                                                    ?>
                                                </select> 
                                                
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Registrar
                                        </button>
                                        
                                    </form>
                                    
                                </div>
                                <?php echo $mensajes; ?>          
                            </div>
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