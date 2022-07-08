<?php include 'header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Empleados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>CURP</th>
                                            <th>Usuario</th>
                                            <th>Rol</th>
                                            <th>Restablecer contrasenia</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php  
                                        
                                        if(count($dataset_empleados) > 0)
                                        {

                                            foreach($dataset_empleados as $empleado){
                                                echo "<tr>";
                                                    echo "<td>".$empleado->usuario."</td>";
                                                    echo "<td>".$empleado->usuario."</td>";
                                                    echo "<td>".$empleado->usuario."</td>";
                                                    echo "<td>".$empleado->password."</td>";
                                                    echo "<td>".$empleado->usuario."</td>";
                                                    echo "<td>".$empleado->usuario."</td>";
                                                echo "</tr>";
                                            }
                                        }

                                        
                                        ?>                                
                                    </tbody>
                                </table>
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