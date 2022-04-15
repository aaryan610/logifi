<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php include "../header.html.php"; ?>

    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>
<body>
    <div class="header">
        <img src="./assets/images/login.png" alt="" class="img-fluid">
    </div>
    <div class="body bgGrey p-4">
        <form id="loginForm" autocomplete="off">
            <div class="row">
                <div class="col-lg-12 mt-4 text-center">
                    <h4 class="w-100">Sign In</h4>
                </div>
            </div>
            <div class="loginSection loginSection1 active">
                <div class="row">
                    <div class="col-lg-12 my-4">
                        <div class="inputGroup">
                            <input
                                type="number"
                                id="mobileNo"
                                placeholder="10 Digit Mobile No.*"
                                required
                            />
                            <label for="mobileNo">10 Digit Mobile No.*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="loginFunction(2);">Send OTP</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loginSection loginSection2">
                <div class="row">
                    <div class="col-lg-12 my-4">
                        <div class="inputGroup">
                            <input
                                type="number"
                                id="otp"
                                placeholder="4 Digit OTP*"
                                required
                            />
                            <label for="otp">4 Digit OTP*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="loginFunction('submit')">Sign In</button>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="loginFunction(1)">Go Back</button>
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
        <p class="text-center mt-4"><a href="./register.html">Sign up</a> to create a new account.</p>
    </div>

    <?php include "../scripts.html.php"; ?>

    <script>
        function loginFunction(section) {
            if(section === 2) {
                let flag = 0;
                let mobileNoFlag = 0;

                if($("#mobileNo").val() == "")
                    flag++;

                if($("#mobileNo").val().length != null && $("#mobileNo").val().length != 10)
                    mobileNoFlag++;

                if(flag === 0 && mobileNoFlag === 0) {
                    $(".loginSection").removeClass("active");
                    $(".loginSection2").addClass("active");
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

                if(flag === 0 && otpFlag === 0)
                    $("#loginForm").submit();
                else if(flag != 0)
                    alert("Please fill out all the fields!");
                else
                    alert("Please enter a valid OTP");
            } else {
                $(".loginSection").removeClass("active");
                $(".loginSection" + section).addClass("active");
            }
        }
    </script>
</body>
</html>