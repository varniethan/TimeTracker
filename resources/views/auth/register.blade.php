@extends('layouts.login-reg')

@section('content')
    <div>
        <div class="login_wrapper">
            <h1><i class="fa fa-clock-o"></i>Time Tracker</h1>
            <section class="login_content">
                <b class="boldContent">Start Tracking Time Today</b><br>Free Account. Cancel Anytime
                <x-forms.register/>
                <button type="submit" class="btn btn-lg btn-success font-size-16 mt-xlg-4 mt-md-3 mb-2" href="index.html">Start Time Tracking</button>
                <p class="text-center term-text font-size-14 mt-3">By submitting this form you accept our <a target="_blank" href="https://www.boomr.com/terms"> <strong>Terms of Service</strong></a></p>
                <p class="change_link">Already have an account?<br>
                    <a class="reset_pass" href="login">Sign-In</a>
                </p>
                <div class="separator">
                    <p class="change_link">Joining as an employee? <br>
                        <a href="empsignup" class="to_register"> Sign up here </a>
                    </p>
                </div>
                <h1><i class="fa fa-clock-o"></i> Time Tracker</h1>
                <p>©2021 All Rights Reserved. Time Tracker!. Privacy and Terms</p>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>--}}
    <script type="text/javascript">
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    //y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = true;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function password_visible() {
            var x = document.getElementsByClassName("password_input");
            var i;
            for (i = 0; i < x.length; i++) {
                if (x[i].type === "password") {
                    x[i].type = "text";
                }else if (x[i].type === "text") {
                    x[i].type = "password";
                }
                else {
                    x.type = "password";
                }
            }
        }
    </script>
@endsection
