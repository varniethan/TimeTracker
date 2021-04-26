@extends('layouts.login-reg')

@section('content')
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <h1><i class="fa fa-clock-o"></i>Time Tracker</h1>
                <section class="login_content">
                    <x-forms.login/>
                    <p class="change_link">Need help with login? <br>
                        <a class="reset_pass" href="reset">Reset your password</a>
                    </p>
                    <div class="separator">
                        <p class="change_link">Don't have a Tracker account? <br>
                            <a href="register" class="to_register"> Sign up for free! </a>
                        </p>
                    </div>
                    <h1><i class="fa fa-clock-o"></i> Time Tracker</h1>
                    <p>©2021 All Rights Reserved. Time Tracker!. Privacy and Terms</p>
                </section>
            </div>
        </div>
    </div>
@endsection
