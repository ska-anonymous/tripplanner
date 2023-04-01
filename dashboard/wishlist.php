<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wish List</title>

    <!-- include Header here -->
    <?php
    require_once('../components/header.php');
    // get the database connection for getting data
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
                        <h1 class="m-0">Wish List</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Main Content Starts Here -->
                <div class="row" id="places-container">
                    <?php
                    // GET DATA FOR WISHLIST FROM DATABASE
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM wishlist WHERE user_id = '$user_id'";
                    $qry = $pdo->prepare($sql);
                    $qry->execute();
                    if($qry->rowCount()){
                    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data as $row){
                        $business_status = $row['place_business_status'] ? '<p>Business Status: '.$row["place_business_status"].'</p>' : "";
                        $ratingHtml="";
                        if($row['place_rating'] > 0 ){
                            $ratingHtml = '<h5>Rating: <span class="text-warning">';
                            for($i=0; $i < floor($row['place_rating']); $i++){
                                $ratingHtml.= '<i class="bi bi-star-fill"></i>';
                            }
                            if($row['place_rating'] > floor($row['place_rating']))
                                $ratingHtml.= '<i class="bi bi-star-half"></i>';
                            $ratingHtml .= '</span></h5>';
                        }
                        echo '
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card card-primary d-flex flex-fill">
                            <div class="card-header border-bottom-0">
                                <img src="'.$row['place_icon'].'" style="position:absolute; right:10px; width:30px; border-radius:50px; background-color: white;">
                                <h3>'.$row['place_name'].'</h3>
                                <p>Address: '.$row['place_address'].'</p>'.'
                                '.$business_status.'
                                '.$ratingHtml.'
                            </div>
                            <div class="card-body pt-0 map" data-place-id="'.$row['place_id'].'" style="height:250px;">

                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                        ';
                    }
                    }
                    ?>
                </div>
                <!-- Main Content Ends Here -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Include Footer Here -->
    <?php
    require_once('../components/footer.php');
    ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlpLpGQnjDpqtgTvJDRxmfWXsqiX_L-as&callback=mapLoaded&libraries=places" async defer></script>
    <script>
        function mapLoaded() {
            putMaps();
        }

        function initMap(placeId, element) {
            var map = new google.maps.Map(element, {
                zoom: 15
            });

            var request = {
                placeId: placeId
            };

            var service = new google.maps.places.PlacesService(map);

            service.getDetails(request, function(place, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    map.setCenter(place.geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: place.geometry.location
                    });
                }
            });
        }
        // initialize maps on the map elements in the dom
        function putMaps() {
            let mapContainers = document.querySelectorAll('.map[data-place-id]');
            Array.from(mapContainers).forEach(container => {
                let placeId = container.getAttribute('data-place-id');
                (function mapInitiator() {
                    try {
                        initMap(placeId, container);
                    } catch (err) {
                        mapInitiator();
                    }
                })();

            })
        }
    </script>