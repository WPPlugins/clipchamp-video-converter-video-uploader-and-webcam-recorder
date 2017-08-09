<?php $sub = $_POST['subscription']; ?>
<?php if ( $sub ) : ?>
<script type="text/javascript">
    var subscription = JSON.parse( '<?php echo $sub; ?>' );
</script>
<?php endif; ?>
<div class="welcome">
    <header class="header header--welcome">
        <img class="header__image" src="<?php echo plugins_url( 'images/logo_colored.png', dirname( __FILE__ ) ); ?>" />
        <h1 class="heading heading--1">Welcome to Clipchamp!</h1>
        <p class="subheading subheading--1">
            <?php if ( empty( $settings['general']['field-apiKey'] ) ) : ?>
            Thanks for installing our video recorder plugin. With it you can collect videos from your site visitors easily. Just 3 more steps and you're ready to go.
            <?php else : ?>
            Thank you for updating Clipchamp! Check out our <a href="https://wordpress.org/plugins/clipchamp-video-converter-video-uploader-and-webcam-recorder/#developers" target="_blank">changelog</a> to see what changed in this version.
            <?php endif; ?>
        </p>
        <p class="button-row">
            <a class="button button-primary" href="options-general.php?page=ccb_settings">Settings</a>
            <a class="button button--default" href="https://clipchamp.com/en/developers" target="_blank">Docs</a>
        </p>
    </header>
    <?php if ( empty( $settings['general']['field-apiKey'] ) ): ?>
    <div class="getting-started">
        <h2 class="heading heading--2">Getting Started</h2>
        <p class="subheading subheading--2">Follow the steps below to complete the setup.</p>
        <ol class="steps">
            <li class="steps__item steps__item--active">Signup/Login</li>
            <li class="steps__item">Configure API</li>
            <li class="steps__item">Configure Plugin</li>
        </ol>
        <div class="step" id="step1">
            <h3 class="step__headline">1. Log in to your Clipchamp API account</h3>
            <div class="alert alert--error" id="wrongPlan">
                <p class="alert__message">You already have a non-API account at clipchamp.com. Please contact us if you'd like to trial the API & WordPress plugin.</p>
            </div>
            <p class="step__description">Click the button below to log in. Don't have an account yet? Sign up for a free 14 day trial by clicking the same button below. No credit card required.</p>
            <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
            <a href="#" onclick="window.open('https://login.clipchamp.com?title=Login / Sign Up&plan=enterprise&redirect=<?php echo urlencode( $actual_link ); ?>')" class="button button-primary">Link your Clipchamp account</a>
            <p>All free trial accounts get access to all <a href="https://clipchamp.com/en/developers" target="_blank">API features</a>. Please see our API's <a href="https://clipchamp.com/en/pricing/api-access" target="_blank">pricing page</a> for all available plans and pricing options at the end of the trial.</p>
        </div>
        <div class="step" id="step2" style="display: none;">
            <h3 class="step__headline">2. Configure API settings</h3>
            <p class="step__description">Enter the domain of your WordPress site on the Clipchamp API's settings page and set up an upload destination for your users' videos (e.g. your YouTube channel or a Google Drive folder). The button below will take you to your API settings at clipchamp.com to enter these details.</p>
            <a id="configureAPI" href="https://clipchamp.com/en/api-setup" target="_blank" class="button button-primary">Configure your API settings</a>
        </div>
        <div class="step" id="step3" style="display: none;">
            <h3 class="step__headline">3. Configure the WordPress plugin settings</h3>
            <p class="step__description">Set the same upload destination for your users' videos in the WordPress plugin settings - this will connect the WordPress plugin to your Clipchamp API account. You can also style the embedded video recorder button and user interface in the WordPress plugin settings options.</p>
            <a id="configurePlugin" href="options-general.php?page=ccb_settings" target="_blank" class="button button-primary">Configure your plugin settings</a>
        </div>
        <div class="step" id="step4" style="display: none;">
            <div class="step__success">
                <svg viewBox="0 0 44 44"><path id="path-1" d="M7.48,18.76,16.95,28,36.69,8.81l3.31,4L16.95,35.19,4,22.14Z" fill="#fff"></path></svg>
            </div>
            <h3 class="step__headline">That's it, you're ready to collect videos!</h3>
            <p class="step__description">The plugin is now successfully set up. To test it, create a new post and add the <code>[clipchamp]</code> shortcode to it, then save the post, navigate to it in your site's frontend and you'll see a Clipchamp video recording & uploading button embedded in the main content area.</p>
            <p class="step__description">Our team is happy to assist if you run into any troubles. Please <a mailto>contact us here</a> and let us know how we can help. Please include as many details into your message as you can as this will allow us to help you more quickly. Happy video collecting!</p>
        </div>
    </div>
    <p>If you need a more detailed explanation, <a href="https://help.clipchamp.com/hc/en-us/articles/221593288-How-to-install-the-Video-Uploader-Webcam-Recorder-WordPress-Plugin" target="_blank">check out our help centre article</a>.</p>
    <?php else: ?>
    <?php endif; ?>
</div>