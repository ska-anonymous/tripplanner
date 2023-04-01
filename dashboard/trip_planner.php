<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trip Planner</title>

    <!-- include Header here -->
    <?php
    require_once("../components/header.php");
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