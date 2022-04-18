<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>

    <?php include "../header.html.php"; ?>

    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body theme="<?php echo $theme; ?>">
    <?php include "../navbar.html.php"; ?>

    <div class="main">
        <div class="profileHeader secCard">

        </div>
        <div class="profileList mt-2">
            <a href="./my-bookings.html" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-list"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">My Bookings</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="javascript:void(0);" class="singleItem secCard" onclick="popupGrind('editDetailsPopup')">
                <div class="itemIcon font-md">
                    <i class="fas fa-user"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">Edit Details</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="#" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">About Us</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="#" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-star"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">Rate Us</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="javascript:void(0);" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">Give Feedback</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="javascript:void(0);" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-adjust"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">Dark Theme</h4>
                </div>
                <div class="nextIcon">
                    <label class="switch">
                        <input type="checkbox" checked />
                        <span class="slider round"></span>
                    </label>
                </div>
            </a>
            <a href="javascript:void(0);" class="singleItem secCard">
                <div class="itemIcon font-md">
                    <i class="fas fa-share-alt"></i>
                </div>
                <div class="text">
                    <h4 class="font-md">Share LogiFi App</h4>
                </div>
                <div class="nextIcon">
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <div class="gradient bookingCard px-3 py-4 mt-3" onclick="popupGrind('bookPopup')">
                <h4 class="title">Send package</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, pariatur!</p>
                <button type="button" class="btnWhite btn-sm">Book Now&nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
            </div>
        </div>

        <div class="appInfo">
            <img src="./assets/images/logos/dark-grey.png" alt="Dark Grey LogiFi Logo" />
            <h6 class="textDarkGrey font-md mt-3">Version 1.0</h6>
            <h5 class="textDarkGrey font-rg mt-3">
                Developed by <a href="http://techeffin.com" target="_blank" rel="noopener noreferrer">TechEffin</a>
            </h5>
        </div>
    </div>

    <div class="popupGrind editDetailsPopup">
        <div class="mainPopup">
            <div class="popupContent bottomPopup px-3 py-4">
                <div class="popupHeader d-flex justify-content-between align-items-center">
                    <h3 class="font-rg">Fill in the details</h3>
                    <div class="closePopup">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>
                <div class="popupBody">
                    <form>
                        <div class="grid2 mt-4 mb-3">
                            <div class="inputGroup">
                                <input
                                    type="text"
                                    id="fname"
                                    placeholder="First Name*"
                                    required
                                />
                                <label for="fname">First Name*</label>
                            </div>
                            <div class="inputGroup">
                                <input
                                    type="text"
                                    id="lname"
                                    placeholder="Last Name*"
                                    required
                                />
                                <label for="lname">Last Name*</label>
                            </div>
                        </div>
                        <div class="inputGroup mb-3">
                            <input
                                type="email"
                                id="email"
                                placeholder="Email-ID*"
                                required
                            />
                            <label for="email">Email-ID*</label>
                        </div>
                        <div class="inputGroup mb-3">
                            <input
                                type="number"
                                id="mobileNo"
                                placeholder="Mobile No.*"
                                required
                                disabled
                            />
                            <label for="mobileNo">Mobile No.*</label>
                        </div>
                        <div class="inputGroup">
                            <button type="submit" class="w-100 btnWhite">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../footer.html.php"; ?>
    <?php include "../scripts.html.php"; ?>

    <script>
        function trackBooking() {
            popupGrind("trackPopup");
        }

        $(".singleTab").click(function() {
            $(".singleTab.active").removeClass("active");
            $(this).addClass("active");
        });
    </script>
</body>
</html>