<!DOCTYPE html>
<html lang="en">

<head>
    <title>SKAG | Find Places</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
                            Find Places By Entering City Name
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="places_form">
                            <label for="city-name">Location Name</label>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="select2-purple" data-select2-id="29">
                                            <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="35">Alabama</option>
                                                <option data-select2-id="36">Alaska</option>
                                                <option data-select2-id="37">California</option>
                                                <option data-select2-id="38">Delaware</option>
                                                <option data-select2-id="39">Tennessee</option>
                                                <option data-select2-id="40">Texas</option>
                                                <option data-select2-id="41">Washington</option>
                                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="16" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered">
                                                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 449.667px;"></li>
                                                        </ul>
                                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-block">Find</button>
                                </div>
                        </form>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card text-light d-flex flex-fill" style="background: linear-gradient(to bottom, transparent 0%,  rgb(0,0,0,0.3)) 100%, url('https://source.unsplash.com/random/300×300/?nature');">
                                <div class="card-header border-bottom-0">
                                    Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="lead"><b>Nicole Pearson</b></h2>
                                            <p class="text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card d-flex flex-fill" style="background: linear-gradient(to bottom, transparent 0%,  rgb(0,0,0,0.3)) 100%, url('https://source.unsplash.com/random/300×300/?nature');">
                                <div class="card-header border-bottom-0">
                                    Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="lead"><b>Nicole Pearson</b></h2>
                                            <p class="text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="bi bi-heart"></i> Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card d-flex flex-fill" style="background: linear-gradient(to bottom, transparent 0%,  rgb(0,0,0,0.3)) 100%, url('https://source.unsplash.com/random/300×300/?nature');">
                                <div class="card-header border-bottom-0">
                                    Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="lead"><b>Nicole Pearson</b></h2>
                                            <p class="text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>