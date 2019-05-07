<!-- CSS -->
<style>
    body{
        background-image: url('<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/787-Boeing1-1024x517.png');
        background-size: cover;
        height: 100%
    }
    
    .mainme{
        margin-top:80px;
        opacity:0.9
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.0.1/dist/css/mstepper.min.css">
<div class="row me">
    <div class="col s2"></div>
    <div class="col s8">
            <div class="card mainme">
                <div class="card-content pb-0">
                    <br><br>
                    <div class="card-header">
                        <h3 class="card-title" style="text-align:center"><?php echo SITE_NAME ?> Registration</h3>
                    </div>
                    <br><br>
                    <form method="post" action="<?php echo url('/registration');?>"><ul class="stepper horizontal" id="horizStepper">
                        <li class="step active">
                            <div class="step-title waves-effect">Personal</div>
                            <div class="step-content">
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <label for="firstName">First Name: <span class="red-text">*</span></label>
                                        <input type="text" id="firstName" name="firstname" class="validate" aria-required="true" required="">
                                        <?php
                                            if($firstname_error == true)
                                                echo '<p class="error">Please enter your first name</p>';
                                        ?>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <label for="lastName">Last Name: <span class="red-text">*</span></label>
                                        <input type="text" id="lastName" class="validate" aria-required="true" name="lastname" required="">
                                        <?php
                                            if($lastname_error == true)
                                                echo '<p class="error">Please enter your last name</p>';
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <label for="Email">Email: <span class="red-text">*</span></label>
                                        <input type="email" class="validate" name="email" id="Email" required="">
                                        <?php
                                            if($email_error == true)
                                                echo '<p class="error">Please enter your email address</p>';
                                        ?>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        
                                        <select class="validate" name="code" required="">
                                            <?php
                                            foreach($airline_list as $airline) {
                                            echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="contactNum">Airline: <span class="red-text">*</span></label>
                                    </div>
                                </div>
                                <div class="step-actions">
                                    <div class="row">
                                        <div class="col m4 s12 mb-3">
                                            <button class="red btn btn-reset" type="reset">
                                                <i class="material-icons left">clear</i>Reset
                                            </button>
                                        </div>
                                        <div class="col m4 s12 mb-3">
                                            <button class="btn btn-light previous-step" disabled="">
                                                <i class="material-icons left">arrow_back</i>
                                                Prev
                                            </button>
                                        </div>
                                        <div class="col m4 s12 mb-3">
                                            <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                Next
                                                <i class="material-icons right">arrow_forward</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step">
                            <div class="step-title waves-effect">Details</div>
                            <div class="step-content">
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <select class="validate" id="simple-classic-progress-skills" name="hub" size="1" required="">
                                            <?php
                                            foreach($hub_list as $hub) {
                                                echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
                                            }
                                            ?>
                                        </select>
                                        <label>Hub: <span class="red-text">*</span></label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <select class="validate" name="location" size="1" required="">
                                            <?php
                                             foreach($country_list as $countryCode=>$countryName) {
                                                if(Vars::POST('location') == $countryCode) {
                                                    $sel = 'selected="selected"';
                                                } else {
                                                    $sel = '';
                                                }

                                                echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                                             }
                                         ?>
                                        </select>
                                        <label>Location: <span class="red-text">*</span></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <label>Password:</label>
                                        <input class="validate" type="password" id="simple-classic-progress-city" name="password1" required="">
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <label>Confirm Password:</label>
                                        <input class="validate" type="password" id="simple-classic-progress-city" name="password2" required="">
                                                <?php
                                                if($password_error != '')
                                                    echo '<p class="error">'.$password_error.'</p>';
                                                ?>
                                    </div>
                                </div>
                                <div class="step-actions">
                                    <div class="row">
                                        <div class="col m4 s12 mb-3">
                                            <button class="red btn btn-reset" type="reset">
                                                <i class="material-icons left">clear</i>Reset
                                            </button>
                                        </div>
                                        <div class="col m4 s12 mb-3">
                                            <button class="btn btn-light previous-step">
                                                <i class="material-icons left">arrow_back</i>
                                                Prev
                                            </button>
                                        </div>
                                        <div class="col m4 s12 mb-3">
                                            <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                Next
                                                <i class="material-icons right">arrow_forward</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step">
                            <div class="step-title waves-effect">Security</div>
                            <div class="step-content">
                                <div class="row">
                                    <?php

                                    //Put this in a seperate template. Shows the Custom Fields for registration
                                    Template::Show('registration_customfields.tpl');

                                    ?>
                                    <div class="col m3">
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                                        <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
                                        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                                        </script>
                                    </div>
                                    <div class="col m3">
                                    </div>
                                </div>
                                
                                <div class="step-actions">
                                    <div class="row">
                                        <div class="col m6 s12 mb-1">
                                            <button class="red btn mr-1 btn-reset" type="reset">
                                                <i class="material-icons">clear</i>
                                                Reset
                                            </button>
                                        </div>
                                        <div class="col m6 s12 mb-1">
                                            <button type="submit" name="submit" class="waves-effect waves-dark btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul></form>
                </div>
            </div>
        </div>
    
</div>

                <!-- JS -->
<script src="https://unpkg.com/materialize-stepper@3.0.1/dist/js/mstepper.min.js"></script>
<script>
   var stepper = document.querySelector('.stepper');
   var stepperInstace = new MStepper(stepper, {
      // options
      firstActive: 0 // this is the default
   })
</script>
<script>
   
    $(document).ready(function() {
        
        $("body").removeClass("2-columns");
        $("body").addClass("1-column login-bg blank-page blank-page");
        $('#main').attr('id', 'old');

    });
   
</script>
