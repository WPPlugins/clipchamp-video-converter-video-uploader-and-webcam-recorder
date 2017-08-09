<?php
/*
 * Video Section
 */
?>

<?php if ( 'ccb_field-preset' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-preset' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-preset]' ); ?>">
        <?php foreach ($default_sets['presets'] as $preset ) : ?>
            <option value="<?php esc_attr_e( $preset ); ?>" <?php selected( $settings['field-preset'], $preset ); ?>><?= $preset; ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">The video conversion preset, which causes us to produce an output video that is optimized for a particular usage scenario or device. Notice that under your subscription plan with us, only a subset of these presets may be available.</p>

<?php endif; ?>

<?php if ( 'ccb_field-format' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-format' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-format]' ); ?>">
        <?php foreach ($default_sets['formats'] as $format ) : ?>
            <option value="<?php esc_attr_e( $format ); ?>" <?php selected( $settings['field-format'], $format ); ?>><?php esc_attr_e( $format ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">The output video format. Notice that the range of supported formats is constrained by the setting for preset, i.e., the "web" preset supports "mp4" and "webm", "mobile" supports "mp4", "windows" supports "asf", and "animation" supports "gif". Under your subscription plan with us, only a subset of these formats may be available.</p>

<?php endif; ?>

<?php if ( 'ccb_field-resolution' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-resolution' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-resolution]' ); ?>">
        <?php foreach ($default_sets['resolutions'] as $resolution ) : ?>
            <option value="<?php esc_attr_e( $resolution ); ?>" <?php selected( $settings['field-resolution'], $resolution ); ?>><?php esc_attr_e( $resolution ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">The resolution of the output video. All selections are downscale only, thus if a lower resolution video is submitted it will not be enlarged. This selection may be further constrained by your plan. For instance, if your plan supports up to <code>480p</code> (standard definition) resolution, we will not produce output videos with a higher resolution. <code>320w</code> and <code>640w</code> produce videos with a limited width rather than a limited height. If a resolution that is not covered by your plan is selected, we will use the highest setting available.</p>

<?php endif; ?>

<?php if ( 'ccb_field-compression' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-compression' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-compression]' ); ?>">
        <?php foreach ($default_sets['compressions'] as $compression ) : ?>
            <option value="<?php esc_attr_e( $compression ); ?>" <?php selected( $settings['field-compression'], $compression ); ?>><?php esc_attr_e( ucfirst( $compression ) ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">The compression ratio for the output video, where "max" generally compresses best and fastest at the expense of compromising quality the most. In turn, "min" compresses the least and takes most time, while retaining the best quality.</p>

<?php endif; ?>

<?php if ( 'ccb_field-fps' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-fps' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-fps]' ); ?>">
        <?php foreach ($default_sets['framerates'] as $fps => $fpsLabel ) : ?>
            <option value="<?php esc_attr_e( $fps ); ?>" <?php echo ( $fps == $settings['field-fps'] || ( $fps != 'keep' && $settings['field-fps'] != 'keep' ) ) ? 'selected' : ''; ?>><?php esc_attr_e( $fpsLabel ); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" id="<?php esc_attr_e( 'ccb_field-fps-custom' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-fps-custom]' ); ?>" style="<?php echo $settings['field-fps'] == 'keep' ? 'display: none' : ''; ?>" value="<?php if ( $settings['field-fps'] != 'keep' ) esc_attr_e( $settings['field-fps'] ); ?>" />
    <p class="description">Explanation here</p>

<?php endif; ?>

<?php if ( 'ccb_field-inputs' == $field['label_for'] ) : ?>

    <?php foreach ($default_sets['inputs'] as $input => $inputLabel ) : ?>
        <p>
            <input id="<?php esc_attr_e( 'ccb_field-inputs-' . $input ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-inputs][]' ); ?>" type="checkbox" value="<?php esc_attr_e( $input ); ?>" <?php checked( true, in_array( $input, $settings['field-inputs'] ) ); ?> />
            <label for="<?php esc_attr_e( 'ccb_field-inputs-' . $input ); ?>"><?php esc_attr_e( $inputLabel ); ?></label>
        </p>
    <?php endforeach; ?>
    <p class="description">The sources the user can pick an input video from, namely her webcam and her computer's file system.</p>

<?php endif; ?>

<?php if ( 'ccb_field-output' == $field['label_for'] ) : ?>

    <?php //TODO:Notify user of special conditions ?>
    <select id="<?php esc_attr_e( 'ccb_field-output' ); ?>" name="<?php esc_attr_e( 'ccb_settings[video][field-output]' ); ?>" class="output-select">
        <?php foreach ($default_sets['outputs'] as $output => $outputLabel ) : ?>
            <?php //$isAllowed = in_array( $output, $plan['features']['output'] ); ?>
            <option value="<?php esc_attr_e( $output ); ?>" <?php selected( $settings['field-output'], $output ); ?>>
                <?php esc_attr_e( $outputLabel ); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <p class="description">
        The destinations where we will make the output video available or upload to. If you select "Youtube", "Microsoft Azure", "Google Drive" or "Amazon S3", you need to authorize us to upload the video into the appropriate account from the
        <?php if ( !empty( $api_key ) ) : ?>
            <a href="https://clipchamp.com/portal?api_key=<?php esc_attr_e( $api_key ) ?>">subscription configuration page</a>.
        <?php else : ?>
            <a href="https://clipchamp.com/pricing">subscription configuration page</a>.
        <?php endif; ?>
        You need an enterprise plan to use the "WordPress Media Library" option.
    </p>
    <?php if ( strcmp( $settings['field-output'], 'blob' ) == 0 ) : ?>
        <p>Upload Max Filesize: <code><?php echo ini_get( 'upload_max_filesize' ); ?></code></p>
        <p>Post Max Size: <code><?php echo ini_get( 'post_max_size' ); ?></code></p>
    <?php endif; ?>

<?php endif; ?>

<?php if ( 'ccb_field-camera-limit' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-camera-limit' ); ?>" name="<?php esc_attr_e( 'ccb_settings[camera][field-camera-limit]' ); ?>" class="regular-text" value="<?php esc_attr_e( $camera['field-camera-limit'] ); ?>" />
    <p class="description">Limit camera recording length to a given number of seconds. The maximum length is limited by your plan and technical considerations.</p>

<?php endif; ?>

<?php
/*
 * S3 Section
 */
?>

<?php if ( 'ccb_field-s3-region' == $field['label_for'] ) : ?>

    <select id="<?php esc_attr_e( 'ccb_field-s3-region' ); ?>" name="<?php esc_attr_e( 'ccb_settings[s3][field-s3-region]' ); ?>" class="output-select">
        <?php foreach ($default_sets['s3_regions'] as $region => $regionLabel ) : ?>
            <option value="<?php esc_attr_e( $region ); ?>" <?php selected( $s3['field-s3-region'], $region ); ?>><?php esc_attr_e( $regionLabel ); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">
        Please select the region of your bucket
    </p>
    <?php if ( strcmp( $settings['field-output'], 'blob' ) == 0 ) : ?>
        <p>Upload Max Filesize: <code><?php echo ini_get( 'upload_max_filesize' ); ?></code></p>
        <p>Post Max Size: <code><?php echo ini_get( 'post_max_size' ); ?></code></p>
    <?php endif; ?>

<?php endif; ?>

<?php if ( 'ccb_field-s3-bucket' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-s3-bucket' ); ?>" name="<?php esc_attr_e( 'ccb_settings[s3][field-s3-bucket]' ); ?>" class="regular-text" value="<?php esc_attr_e( $s3['field-s3-bucket'] ); ?>" />
    <p class="description">Target bucket for S3 upload. Value is required if uploading to S3.</p>

<?php endif; ?>

<?php if ( 'ccb_field-s3-folder' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-s3-folder' ); ?>" name="<?php esc_attr_e( 'ccb_settings[s3][field-s3-folder]' ); ?>" class="regular-text" value="<?php esc_attr_e( $s3['field-s3-folder'] ); ?>" />
    <p class="description">(Optional) Target folder for S3 upload. If specified, uploaded files will be placed in this folder, i.e. the S3 key will have this as a prefix.</p>

<?php endif; ?>

<?php
/*
 * Azure Section
 */
?>

<?php if ( 'ccb_field-azure-container' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-azure-container' ); ?>" name="<?php esc_attr_e( 'ccb_settings[azure][field-azure-container]' ); ?>" class="regular-text" value="<?php esc_attr_e( $azure['field-azure-container'] ); ?>" />
    <p class="description">Target container for blob storage upload. Value is required if uploading to Azure.</p>

<?php endif; ?>

<?php if ( 'ccb_field-azure-folder' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-azure-folder' ); ?>" name="<?php esc_attr_e( 'ccb_settings[azure][field-azure-folder]' ); ?>" class="regular-text" value="<?php esc_attr_e( $azure['field-azure-folder'] ); ?>" />
    <p class="description">(Optional) Target folder for azure upload. If specified, uploaded files will be placed in this folder, i.e. the blob name will have this as a prefix.</p>

<?php endif; ?>

<?php
/*
 * Google Drive Section
 */
?>

<?php if ( 'ccb_field-gdrive-folder' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-gdrive-folder' ); ?>" name="<?php esc_attr_e( 'ccb_settings[gdrive][field-gdrive-folder]' ); ?>" class="regular-text" value="<?php esc_attr_e( $gdrive['field-gdrive-folder'] ); ?>" />
    <p class="description">(Optional) Target folder for Google Drive upload. If specified, uploaded files will be placed in this folder. Relative to the globally configured root folder. If the folder doesn't exist, it will be created. Can be specified as a '/'-delimited path, or (e.g. if you have '/' in a folder name) using an array of strings. <strong>NOTE</strong>: We do cache the Google-assigned ID of the folder, which means if the folder is moved (or removed) we will continue uploading to it in its new location for some time.</p>

<?php endif; ?>

<?php
/*
 * Youtube Section
 */
?>

<?php if ( 'ccb_field-youtube-title' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-youtube-title' ); ?>" name="<?php esc_attr_e( 'ccb_settings[youtube][field-youtube-title]' ); ?>" class="regular-text" value="<?php esc_attr_e( $youtube['field-youtube-title'] ); ?>" />
    <p class="description">(Optional) Assign this title to the video when it is uploaded.</p>

<?php endif; ?>

<?php if ( 'ccb_field-youtube-description' == $field['label_for'] ) : ?>

    <input id="<?php esc_attr_e( 'ccb_field-youtube-description' ); ?>" name="<?php esc_attr_e( 'ccb_settings[youtube][field-youtube-description]' ); ?>" class="regular-text" value="<?php esc_attr_e( $youtube['field-youtube-description'] ); ?>" />
    <p class="description">(Optional) Assign this description to the video when it is uploaded.</p>

<?php endif; ?>
