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

    <div class="main">
        <div class="gradient bookingCard px-3 py-4 mt-2" onclick="popupGrind('bookPopup')">
            <h4 class="title">Send package</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, pariatur!</p>
            <button type="button" class="btnWhite btn-sm">Book Now&nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
        </div>
        <div class="mt-4">
            <h3 class="sectionTitle">Available Loads</h3>
            <div class="bookingsList mt-2">
                <div class="singleBooking secCard" onclick="trackBooking();">
                    <div class="bookingHeader">
                        <div class="vehicleIcon warning">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="title">
                            <h4 class="font-md">Whatever the title be</h4>
                            <h6 class="font-xs">ASG124512S</h6>
                        </div>
                        <div class="nextIcon font-xs">
                            <i class="fas fa-angle-right"></i>
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
                </div>
                <div class="singleBooking secCard" onclick="trackBooking();">
                    <div class="bookingHeader">
                        <div class="vehicleIcon danger">
                            <i class="fas fa-biking"></i>
                        </div>
                        <div class="title">
                            <h4 class="font-md">Whatever the title be</h4>
                            <h6 class="font-xs">ASG124512S</h6>
                        </div>
                        <div class="nextIcon font-xs">
                            <i class="fas fa-angle-right"></i>
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
                </div>
                <div class="singleBooking secCard" onclick="trackBooking();">
                    <div class="bookingHeader">
                        <div class="vehicleIcon primary">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="title">
                            <h4 class="font-md">Whatever the title be</h4>
                            <h6 class="font-xs">ASG124512S</h6>
                        </div>
                        <div class="nextIcon font-xs">
                            <i class="fas fa-angle-right"></i>
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
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupGrind bookPopup">
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
                                    id="from"
                                    placeholder="From*"
                                    required
                                />
                                <label for="from">From*</label>
                            </div>
                            <div class="inputGroup">
                                <input
                                    type="text"
                                    id="to"
                                    placeholder="To*"
                                    required
                                />
                                <label for="to">To*</label>
                            </div>
                        </div>
                        <div class="inputGroup mb-3">
                            <input
                                type="number"
                                id="quantity"
                                placeholder="Quantity*"
                                required
                            />
                            <label for="quantity">Quantity*</label>
                        </div>
                        <div class="inputGroup mb-3">
                            <select required>
                                <option value="">--Select Material--</option>
                            </select>
                        </div>
                        <div class="inputGroup mb-3">
                            <input
                                type="number"
                                id="quantity"
                                placeholder="Advance(in %)"
                                required
                            />
                            <label for="quantity">Advance amount(in %)</label>
                        </div>
                        <div class="text-right mb-3">
                            <p class="textDarkGrey font-md mb-1">Approx amount:</p>
                            <h6>₹1,200</h6>
                        </div>
                        <div class="inputGroup">
                            <button type="submit" class="w-100 btnWhite">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupGrind trackPopup">
        <div class="mainPopup">
            <div class="popupContent bottomPopup px-3 py-4">
                <div class="popupHeader d-flex justify-content-between align-items-center">
                    <h3 class="font-rg">Track your order</h3>
                    <div class="closePopup">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>
                <div class="popupBody pl-4">
                    <div class="timeline pl-4 mt-4 mb-3">
                        <div class="singleLine crossed">
                            <h4 class="title font-md">Crossed Raipur Toll Plaza</h4>
                            <h6 class="font-xs textDarkGrey mt-1">10:00 PM at 17th April, 2022</h6>
                            <div class="checkmark">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="singleLine crossed">
                            <h4 class="title font-md">Crossed Bhilai Toll Plaza</h4>
                            <h6 class="font-xs textDarkGrey mt-1">11:00 PM at 17th April, 2022</h6>
                            <div class="checkmark">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="singleLine">
                            <h4 class="title font-md">Crossed Rajnandgaon Toll Plaza</h4>
                            <h6 class="font-xs textDarkGrey mt-1">Not yet reached</h6>
                            <div class="checkmark"></div>
                        </div>
                        <div class="singleLine">
                            <h4 class="title font-md">Crossed Nagpur Toll Plaza</h4>
                            <h6 class="font-xs textDarkGrey mt-1">Not yet reached</h6>
                            <div class="checkmark"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./footer.html.php"; ?>
    <?php include "./scripts.html.php"; ?>

    <script>
        function trackBooking() {
            popupGrind("trackPopup");
        }
    </script>
</body>
</html>