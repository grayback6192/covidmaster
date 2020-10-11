<?php
    echo $this->Html->css('registerform');
    $this->assign('title', 'Covid Masters | Sign in');
?>

<div class="main">

        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">Sign In</h2>

                    <div class="error-message"><?php echo isset($validationError) ? $validationError : ''?></div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" />
                    </div>

                    <div class="form-textbox form-btn-submit">
                        <input type="submit" name="submit" id="submit" class="submit" value="Log In" />
                    </div>
                    
                    <p class="loginhere">
                        Don't have an account ?<a href="/account/signup" class="loginhere-link"> Sign Up</a>
                    </p>
                </form>

            </div>
        </div>

    </div>