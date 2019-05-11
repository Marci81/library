<?php $this->load->view('partials/nav'); ?>
<h1><?php echo lang('index_heading'); ?></h1>
<p><?php echo lang('index_subheading'); ?></p>



        <div class="container users-headings ">
            <div id="infoMessage"><?php echo $message; ?></div>

        <div class="row">

            <div class="col-md-2">
                <h5><?php echo lang('index_fname_th'); ?></h5>
            </div>
            <div class="col-md-2">
                <h5><?php echo lang('index_lname_th'); ?></h5>
            </div>
            <div class="col-md-2">
                <h5><?php echo lang('index_email_th'); ?></h5>
            </div>
            <div class="col-md-2">
                <h5><?php echo lang('index_groups_th'); ?></h5>
            </div>
            <div class="col-md-2">
                <h5><?php echo lang('index_status_th'); ?></h5>
            </div>
            <div class="col-md-2">
                <h5><?php echo lang('index_action_th'); ?></h5>
            </div>
        </div>

        <hr class="hr">

    </div>

    <?php foreach ($users as $user): ?>

        <div class="szekcio">
            <div class="container">

                <div class="row user-info">

                    <div class="col-md-2">
                        <p><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="col-md-2">
                        <p><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>

                    <div class="col-md-2">
                        <?php foreach ($user->groups as $group): ?>
                            <p><?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?></p>
                        <?php endforeach ?>
                    </div>

                    <div class="col-md-2">
                        <p><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></p>
                        <p><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></p>
                    </div>

                    <div class="col-md-2">
                        <p><?php echo anchor('auth/create_user', lang('index_create_user_link')) ?>
                            | <?php echo anchor('auth/create_group', lang('index_create_group_link')) ?></p>
                    </div>

                </div>

                <hr class="hr">

            </div>
        </div>

    <?php endforeach; ?>


<?php $this->load->view('partials/footer'); ?>


<script src="/../assets/js/jquery.min.js"></script>
<script src="/../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/../assets/js/bs-animation.js"></script>