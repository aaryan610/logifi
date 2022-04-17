<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>

    <?php include "../header.html.php"; ?>

    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>
<body>
    <div class="body registerBody bgGrey p-4">
        <form id="registerForm" autocomplete="off">
            <div class="row">
                <div class="col-lg-12 mt-4 text-center">
                    <h4 class="w-100">Sign Up</h4>
                </div>
            </div>
            <div class="registerSection registerSection1 active">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="inputGroup">
                            <input
                                type="text"
                                id="name"
                                class="required"
                                placeholder="Full Name*"
                                required
                            />
                            <label for="name">Full Name*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="inputGroup">
                            <input
                                type="number"
                                id="mobileNo"
                                class="required"
                                placeholder="10 Digit Mobile No.*"
                                required
                            />
                            <label for="mobileNo">10 Digit Mobile No.*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3 mb-4">
                        <div class="inputGroup">
                            <input
                                type="email"
                                id="email"
                                class="required"
                                placeholder="Email-ID*"
                                required
                            />
                            <label for="email">Email-ID*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="registerFunction(2);">Send OTP</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="registerSection registerSection2">
                <div class="row">
                    <div class="col-lg-12 mt-3 mb-4">
                        <div class="inputGroup">
                            <input
                                type="number"
                                id="otp"
                                class="required"
                                placeholder="4 Digit OTP*"
                                required
                            />
                            <label for="otp">4 Digit OTP*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="registerFunction('submit')">Sign Up</button>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="registerFunction(1)">Go Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <h6 class="text-center my-3">or</h6>
        <button type="button" class="googleBtn">
            <img src="./assets/images/logos/google.png" alt="Continue to Logifi with Google" />
            Continue with Google
        </button>
        <p class="text-center mt-4"><a href="./login.html">Sign in</a> if you already have an account.</p>
    </div>

    <?php include "../scripts.html.php"; ?>

    <script>
        function registerFunction(section) {
            if(section === 2) {
                let flag = 0;
                let mobileNoFlag = 0;

                $(".registerSection1 input.required").each(function() {
                    if($(this).val() == "")
                        flag++;
                });

                if($("#mobileNo").val() != "" && $("#mobileNo").val().length != 10)
                    mobileNoFlag++;

                if(flag === 0 && mobileNoFlag === 0) {
                    $(".registerSection").removeClass("active");
                    $(".registerSection2").addClass("active");
                } else if(flag != 0)
                    alert("Please fill out all the required fields!");
                else
                    alert("Please enter a valid mobile no.");
            } else if(section === "submit") {
                let flag = 0;
                let otpFlag = 0;

                let matchOtp = 1111;

                if($("#otp").val() == "")
                    flag++;
                else {
                    if($("#otp").val().length === 4) {
                        if($("#otp").val() != matchOtp)
                            otpFlag++;
                    }
                    else
                        otpFlag++;
                }

                if(flag === 0 && otpFlag === 0) {
                    $("#registerForm").submit();
                } else if(flag != 0)
                    alert("Please fill out all the required fields!");
                else
                    alert("Please enter a valid OTP");
            } else {
                $(".registerSection").removeClass("active");
                $(".registerSection" + section).addClass("active");
            }
        }
    </script>
</body>
</html>