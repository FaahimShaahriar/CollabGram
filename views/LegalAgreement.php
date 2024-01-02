<!DOCTYPE html>
<html>

<head>
    <title>****Legal Agreement****</title>
    <link rel="stylesheet" href="legalstyle.css">
    <script>
        // Validation using JavaScript
        function validateForm() {
            var acceptTermsCheckbox = document.getElementById("accept_terms");

            if (acceptTermsCheckbox.checked) {
                alert("Successfully accepted the terms and conditions. Redirecting to login page.");
                window.location.href = "login.php";
            } else {
                alert("Please accept the terms and conditions to proceed.");
            }
        }
    </script>
</head>

<body>
<header>
            <div class="header-content">
                <div class="logo-div">
                    <img class="nav-image" src="../Assests/logo.jpg">
                </div>
                <div class="heading-style">
                    <p>CollabGram</p>
                </div>
                <div class="nav-container">
                    <nav>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="LegalAgreement.php">Login</a></li>
                            <li><a href="registration.php">Registration</a></li>
                            <li><a href="faq.php">Faq</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

    <center>
        <div class="legal">
            <form action="" method="post" onsubmit="validateForm(); return false;">
                <p>CollabGram. Before proceeding, please read and accept our terms and conditions:</p>

                <h1>Terms and Conditions</h1>
                <ul>
                    <li>By using our services, you agree to be bound by these terms and conditions. Please read them carefully.</li>
                    <li>You are responsible for maintaining the confidentiality of your account and password.</li>
                    <li>We may change or update these terms. Any changes will be effective immediately.</li>
                    <li>You agree not to use our services for any illegal or unauthorized purpose.</li>
                    <li>We reserve the right to terminate your account at our discretion.</li>
                </ul>

                <h1> Acceptance</h1>
                <p><input type="checkbox" id="accept_terms" required> I have read and accept the terms and conditions.</p>

                <p><input type="submit" value="Proceed to Login"></p>
            </form>
        </div>
        <div class="hudai"></div>
    </center>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © by Shahriar Hannan 2023</p>
            </div>
        </div>
    </footer>
</body>

</html>
