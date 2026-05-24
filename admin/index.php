<!-- <?php
include('../config/dbcon.php');
include('includes/header.php');
?> -->

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <!-- <?php
                                                $dash_user_query = "SELECT * FROM registration";
                                                $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                                if($category_total = mysqli_num_rows($dash_user_query_run))
                                                {
                                                    echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                                }
                                                else
                                                {
                                                    echo '<h4 class="mb-0">No Data</h4>';
                                                }
                                            ?> -->
                                            </div>
                                        </div>
                                        <a href="view-register.php">View-Detail</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Product</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <!-- <?php
                                                $dash_user_query = "SELECT * FROM product";
                                                $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                                if($category_total = mysqli_num_rows($dash_user_query_run))
                                                {
                                                    echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                                }
                                                else
                                                {
                                                    echo '<h4 class="mb-0">No Data</h4>';
                                                }
                                            ?> -->
                                            </div>
                                        </div>
                                        <a href="product-view.php">View-Detail</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Contant
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $dash_user_query = "SELECT * FROM contact";
                                                        $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                                        if($category_total = mysqli_num_rows($dash_user_query_run))
                                                        {
                                                            echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h4 class="mb-0">No Data</h4>';
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                                <a href="manage-contact.php">View-Detail</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Order</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                        $dash_user_query = "SELECT * FROM orders";
                                                        $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                                        if($category_total = mysqli_num_rows($dash_user_query_run))
                                                        {
                                                            echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h4 class="mb-0">No Data</h4>';
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <a href="manage-order.php">View-Detail</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Book Table</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $dash_user_query = "SELECT * FROM reservation";
                                                $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                                if($category_total = mysqli_num_rows($dash_user_query_run))
                                                {
                                                    echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                                }
                                                else
                                                {
                                                    echo '<h4 class="mb-0">No Data</h4>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <a href="manage-table.php">View-Detail</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>