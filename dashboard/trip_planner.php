<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trip Planner</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- include Header here -->
    <?php
    require_once("../components/header.php");
    // include db
    require_once('../php_processing/db_connect.php');
    ?>
    <!-- Header Ends here -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Trip Planner</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Main Content Starts Here -->
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="trip-name">Trip Name</label>
                                        <input type="text" class="form-control" name="trip_name" id="trip-name">
                                        <label for="num-of-travelers">Number of Travelers</label>
                                        <input type="number" name="num_of_travelers" class="form-control" min="1" id="num-of-travelers">
                                        <label for="trip-description">Description</label>
                                        <textarea name="trip_description" id="trip-description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departure-time">Departure Time</label>
                                        <input type="datetime-local" class="form-control" name="departure_time" id="departure-time">
                                        <label for="return-time">Return Time</label>
                                        <input type="datetime-local" class="form-control" name="return_time" id="return-time">
                                        <label for="return-time">Trip Budget</label>
                                        <input type="number" value="0" step="any" min="0" class="form-control" name="trip_budget" id="trip-budget">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="select-places">Select Places From Your Wishlist</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="places_select[]" multiple="multiple" id="select-places" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                <?php
                                                $user_id = $_SESSION['user_id'];
                                                $sql = "SELECT * FROM wishlist WHERE user_id='$user_id'";
                                                $qry = $pdo->prepare($sql);
                                                $qry->execute();
                                                if($qry->rowCount()){
                                                    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($data as $row){
                                                        echo '
                                                            <option value="'.$row['place_id'].'">'.$row['place_name'].'</option>
                                                        ';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Main Content Ends Here -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Include Footer Here -->
    <?php
    require_once("../components/footer.php");
    ?>

    <!-- Page specific Scripts -->
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
    </script>