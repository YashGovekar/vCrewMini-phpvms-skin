<div id="breadcrumbs-wrapper" data-image="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg" class="breadcrumbs-bg-image" style="background-image: url(&quot;<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg&quot;);">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Contact Us</h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="#">Contact Us</a>
                  </li>
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
<div class="container">
    <div class="card">
        <div class="card-content">
                  <h4 class="card-title">Contact Us</h4>
            <div class="col s12 m12 l12">
                <div class="card-alert card green">
                <div class="card-content white-text">
                  <p>SUCCESS : We have received your Contact Request.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            </div>
                   <!-- Contact Sidenav -->
    <div id="sidebar-list" class="row contact-sidenav">
      <div class="col s12 m12 l4">
        <!-- Sidebar Area Starts -->
        <div class="sidebar-left sidebar-fixed">
          <div class="sidebar">
            <div class="sidebar-content">
              <div class="sidebar-menu list-group position-relative">
                <div class="sidebar-list-padding app-sidebar contact-app-sidebar" id="contact-sidenav">
                  <ul class="contact-list display-grid">
                    <li>
                      <h5 class="m-0">What will be next step?</h5>
                    </li>
                    <li>
                      <h6 class="mt-5 line-height">You are moving one step closer to make our VA perfect!</h6>
                    </li>
                    <li>
                      <hr class="mt-5">
                    </li>
                  </ul>
                  <div class="row">
                    
                    <!-- Mail -->
                    <div class="col s12 mail mt-4 p-0">
                      <div class="col s2 m2 l2"><i class="material-icons"> mail_outline </i></div>
                      <div class="col s10 m10 l10">
                        <p class="m-0"><?php echo ADMIN_EMAIL ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- Sidebar Area Ends -->
      </div>
      <div class="col s12 m12 l8 contact-form margin-top-contact">
        <div class="row">
          <form class="col s12" method="post" action="<?php echo url('/contact'); ?>">
            <div class="row">
              <div class="input-field col m6 s12">
                  <?php
		if(Auth::LoggedIn())
		{
			echo '<input name="name" id="name" type="text" value="'.Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname.'" class="validate" readonly>';
		}
		else
		{
		?>
			<input name="name" id="name" type="text" class="validate">
                
			<?php
		}
		?>
          <label for="name">Your Name</label>      
              </div>
              <div class="input-field col m6 s12">
                  <?php
		if(Auth::LoggedIn())
		{
			echo '<input id="email" name="email" type="text" class="validate" value="'.Auth::$userinfo->email.'" readonly>';
		}
		else
		{
            echo '<input id="email" name="email" type="email" class="validate">';
        }
		?>
                
                <label for="email">Your e-mail</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col m6 s12">
                <input id="company" type="text" class="validate" name="subject" value="<?php echo $_POST['subject'];?>">
                <label for="company">Subject</label>
              </div>
              <div class="input-field col s12 width-100">
                <textarea id="textarea1" class="materialize-textarea" name="message"><?php echo $_POST['message'];?></textarea>
                <label for="textarea1">Message</label>
              </div>
            <div class="input-field col s12 width-100">
                <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                <div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>
                <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                </script>
            </div>
            <div class="input-field col s12 width-100">
                <input type="hidden" name="loggedin" value="<?php echo (Auth::LoggedIn())?'true':'false'?>" />
                <button class="btn mb-1 waves-effect waves-light " type="submit" name="submit">Send
                  <i class="material-icons right">send</i>
                </button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
                    
        </div>
<script>
$(document).ready(function(){
   $('#dash').removeClass('active');
    $('#contact').addClass('active');
});
</script>