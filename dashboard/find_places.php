<!DOCTYPE html>
<html lang="en">

<head>
    <title>Find Places</title>

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
                        <h1 class="m-0">Find Places</h1>
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
                    <div class="card-header">
                        <div class="card-title">
                            Find Places By searching
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="places_form">
                            <label for="location-search">Search For a Place</label>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" placeholder="Tourist sites in London" id="location-search" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-block">Find</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <img src="../dist/loading.gif" id="loading-icon" style="visibility: hidden;" alt="Loading....">
                        </div>
                        <br>
                        <hr>
                        <div class="row" id="places-container">
                            
                        </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlpLpGQnjDpqtgTvJDRxmfWXsqiX_L-as&callback=mapLoaded&libraries=places" async defer></script>
    <script>
        function mapLoaded(){
            // an empty function but is required as callback in api loading
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
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // listen to input on location search field to find the correct location name using google place api
            let placesForm = document.querySelector('#places_form');
            placesForm.addEventListener('submit', (e) => {
                event.preventDefault();

                let submitButton = placesForm.querySelector('#btn-submit');
                let locationSearch = document.querySelector('#location-search');
                let locationText = locationSearch.value.trim();

                if (locationText.length < 3) {
                    return;
                }
                console.log(locationText);
                let loadingIcon = document.querySelector('#loading-icon');
                loadingIcon.style.visibility = "visible";

                // now use api to fetch the locations name using the locationText as a query string
                let url = `../php_processing/ajax_find_places.php`;
                let formData = new FormData();
                formData.append('location-text', locationText);
                fetch(url, {
                        method: "POST",
                        body: formData,
                    })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        if (data.error) {
                            throw new Error(data['error-message']);
                        } else if (data['location-data']['status'].toLowerCase() != "ok") {
                            throw new Error("No Data was received. Try a valid search");
                        } else {
                            let locationData = data['location-data']['results'];
                            let html = '';
                            Array.from(locationData).forEach(location => {
                                let name = location.name ? location.name : '';
                                let icon = location.icon ? location.icon : '';
                                let formattedAddress = location.formatted_address ? location.formatted_address : '';
                                let rating = location.rating ? location.rating : false;
                                let businessStatus = location.business_status ? location.business_status : false;
                                let placeId = location.place_id ? location.place_id : '';
                                let ratingHtml = '';
                                if(rating){
                                    ratingLength = Math.floor(Number(rating));
                                    for(i=0; i<ratingLength; i++){
                                        ratingHtml += '<i class="bi bi-star-fill"></i>';
                                    }
                                    if(rating > Math.floor(Number(rating))){
                                        ratingHtml += '<i class="bi bi-star-half"></i>'
                                    }
                                }
                                html += `
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card card-primary d-flex flex-fill">
                                    <div class="card-header border-bottom-0">
                                        <img src="${icon}" style="position:absolute; right:10px; width:30px; border-radius:50px;">
                                        <h3>${name}</h3>
                                        <p>Address: ${formattedAddress}</p>
                                        ${businessStatus ? `<p>Business Status: ${businessStatus}</p>` : ''}
                                        ${rating ? `<h5>Rating: <span class="text-warning">${ratingHtml}</span></h5>` : ''}
                                    </div>
                                    <div class="card-body pt-0 map" data-place-id="${placeId}" style="height:250px;">

                                    </div>
                                    <div class="card-footer" data-place-id="${placeId}" data-name="${name}" data-icon="${icon}" data-rating="${rating}" data-address="${formattedAddress}" data-bussiness-status="${businessStatus}">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-sm bg-teal">
                                                <i class="bi bi-heart"></i> Add to Wish List
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary">
                                            <i class="bi bi-bus-front-fill"></i> Plan a Trip
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                `;

                            })

                            document.querySelector('#places-container').innerHTML = html;
                            putMaps();

                        }
                    })
                    .catch(err => {
                        toastr.error(err);
                    })
                    .finally(() => {
                        loadingIcon.style.visibility = 'hidden';
                    })

            })
        })

        function putMaps(){
            let mapContainers = document.querySelectorAll('.map[data-place-id]');
            Array.from(mapContainers).forEach(container=>{
                let placeId = container.getAttribute('data-place-id');
                initMap(placeId, container);
            })
        }
    </script>