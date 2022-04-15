<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php include "./header.html.php"; ?>

    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>
<body theme="<?php echo $theme; ?>">
    <?php include "./navbar.html.php"; ?>

    <div class="px-3 pb-3">
        <div class="gradient bookingCard px-3 py-4 mt-2">
            <h4 class="title">Send package</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, pariatur!</p>
            <a href="./book.html" class="btnWhite btn-sm">Book Now&nbsp;&nbsp;<i class="fas fa-angle-right"></i></a>
        </div>
        <div class="mt-4">
            <h3 class="sectionTitle">Available Loads</h3>
            <div class="bookingsList mt-2">
                <a href="#" class="singleBooking">
                    <div class="bookingHeader">
                        <div class="icon warning">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="title">
                            <h4>Whatever the title be</h4>
                            <h6>ASG124512S</h6>
                        </div>
                    </div>
                    <div class="bookingBody">
                        <div class="list">
                            <div class="singleItem">
                                <h6 class="title">From:</h6>
                                <h4 class="value">Raipur</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Material/Qty.:</h6>
                                <h4 class="value">Electronics/2 pc.</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">To:</h6>
                                <h4 class="value">Bhilai</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Price:</h6>
                                <h4 class="value">₹1,200</h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="singleBooking">
                    <div class="bookingHeader">
                        <div class="icon danger">
                            <i class="fas fa-biking"></i>
                        </div>
                        <div class="title">
                            <h4>Whatever the title be</h4>
                            <h6>ASG124512S</h6>
                        </div>
                    </div>
                    <div class="bookingBody">
                        <div class="list">
                            <div class="singleItem">
                                <h6 class="title">From:</h6>
                                <h4 class="value">Raipur</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Material/Qty.:</h6>
                                <h4 class="value">Electronics/2 pc.</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">To:</h6>
                                <h4 class="value">Bhilai</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Price:</h6>
                                <h4 class="value">₹1,200</h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="singleBooking">
                    <div class="bookingHeader">
                        <div class="icon primary">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="title">
                            <h4>Whatever the title be</h4>
                            <h6>ASG124512S</h6>
                        </div>
                    </div>
                    <div class="bookingBody">
                        <div class="list">
                            <div class="singleItem">
                                <h6 class="title">From:</h6>
                                <h4 class="value">Raipur</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Material/Qty.:</h6>
                                <h4 class="value">Electronics/2 pc.</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">To:</h6>
                                <h4 class="value">Bhilai</h4>
                            </div>
                            <div class="singleItem">
                                <h6 class="title">Price:</h6>
                                <h4 class="value">₹1,200</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <?php include "./footer.html.php"; ?>
    <?php include "./scripts.html.php"; ?>
</body>
</html>