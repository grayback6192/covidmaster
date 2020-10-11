<?php
echo $this->Html->css('registerform');
$this->assign('title', 'Covid Masters | Sign up');
?>

<div class="main">
    <div class="container">
        <div class="sign-up-content">
            <form method="POST" class="signup-form">
                <h2 class="form-title">Signup Form</h2>

                <?php if ($this->validationErrors) : ?>
                    <?php foreach ($validationErrorsArray as $key => $errors) : ?>
                        <div class="error-message"><?php echo $errors[0] ?></div>
                    <?php endforeach ?>
                <?php endif ?>

                <div class="form-textbox">
                    <label for="name">Full name</label>
                    <input type="text" name="name" id="name" />
                </div>


                <div class="form-textbox">
                    <label for="avatar">Avatar Name</label>
                    <input type="avatar" name="avatar" id="avatar" />
                </div>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>

                <div class="form-textbox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" />
                </div>

                <div class="form-textbox form-btn-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                </div>
            </form>

            <p class="loginhere">
                Already have an account ?<a href="/account/signin" class="loginhere-link"> Log in</a>
            </p>
        </div>
    </div>

</div>