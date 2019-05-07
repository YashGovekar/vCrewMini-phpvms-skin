<head>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/pages/login.css">
</head> 
<div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="post" name="<?php echo url('login') ?>"> 
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Sign in</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input type="text" name="email">
          <label for="username" class="center-align">Pilot ID / Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input type="password" name="password" >
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input type="checkbox" name="remember"/>
              <span>Remember Me</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <input type="hidden" name="redir" value="index.php/profile" />
            <input type="hidden" name="action" value="login" />
            <button type="submit" name="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12" value="">Login</button> 
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="user-register.html">Register Now!</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
        </div>
      </div>
    </div>
<script>
   
    $(document).ready(function() {
        
        $("body").removeClass("2-columns");
        $("body").addClass("1-column login-bg blank-page blank-page");
        $('#main').attr('id', 'old');

    });
   
</script>
