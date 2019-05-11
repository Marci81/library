<html>
    <head>
        <!-- Custom fonts for this template-->
        <link href="<?=site_url('/assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?=site_url('/assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <h1><?php echo lang('login_heading');?></h1>
        <p><?php echo lang('login_subheading');?></p>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/login");?>

          <p>
            <?php echo lang('login_identity_label', 'identity');?>
            <?php echo form_input($identity);?>
          </p>

          <p>
            <?php echo lang('login_password_label', 'password');?>
            <?php echo form_input($password);?>
          </p>

          <p>
            <?php echo lang('login_remember_label', 'remember');?>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
          </p>


          <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

        <?php echo form_close();?>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
        </div>
        </div>
        </body>
    
</html>

