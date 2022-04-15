<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Register</title>

    <?php include "../header.html.php"; ?>

    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/auth.css">
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
                                id="ename"
                                placeholder="Enterprise Name*"
                                required
                            />
                            <label for="ename">Enterprise Name*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3 mb-4">
                        <div class="inputGroup">
                            <input
                                type="text"
                                id="gst"
                                placeholder="GST No.*"
                                required
                            />
                            <label for="gst">GST No.*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="inputGroup">
                            <button type="button" class="w-100" onclick="registerFunction(2);">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="registerSection registerSection2">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="inputGroup">
                            <input
                                type="text"
                                id="dname"
                                placeholder="Driver's Name*"
                                required
                            />
                            <label for="dname">Driver's Name*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="inputGroup">
                            <input
                                type="text"
                                id="oname"
                                placeholder="Owner's Name*"
                                required
                            />
                            <label for="oname">Owner's Name*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3 mb-4">
                        <div class="inputGroup">
                            <input
                                type="email"
                                id="email"
                                placeholder="Email-ID*"
                                required
                            />
                            <label for="email">Email-ID*</label>
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
                let gstFlag = 0;

                if($("#gst").val() == "")
                    flag++;

                if($("#ename").val() == "")
                    flag++;

                // if($("#mobileNo").val().length != null && $("#mobileNo").val().length != 10)
                //     mobileNoFlag++;

                if(flag === 0 && gstFlag === 0) {
                    $(".registerSection").removeClass("active");
                    $(".registerSection2").addClass("active");
                } else if(flag != 0)
                    alert("Please fill out all the required fields!");
                else
                    alert("Please enter a valid GST no.");
            } else if(section === "submit") {
                let flag = 0;

                if($("#dname").val() == "")
                    flag++;

                if($("#oname").val() == "")
                    flag++;

                if($("#email").val() == "")
                    flag++;

                // if($("#mobileNo").val().length != null && $("#mobileNo").val().length != 10)
                //     mobileNoFlag++;

                if(flag === 0) {
                    $("#registerForm").submit();
                } else
                    alert("Please fill out all the required fields!");
            } else {
                $(".registerSection").removeClass("active");
                $(".registerSection" + section).addClass("active");
            }
        }
    </script>
</body>
</html>