<div class="wedevs-enquiry-form" id="wedevs-enquiry-form">
    <form action="" method="post">
        <div class="form-row">
            <label for="name"><?php _e( 'Name', 'wedevs-academy' ) ?></label>

            <input required class="form-controll" type="text" id="name" name="name" value="" placeholder="your name" >
        </div>

        <div class="form-row">
            <label for="email"><?php _e( 'E-Mail', 'wedevs-academy' ) ?></label>

            <input required type="email" id="email" name="email" value="" placeholder="your email" >
        </div>

        <div class="form-row">
            <label for="message"><?php _e( 'Message', 'wedevs-academy' ) ?></label>

            <textarea required id="message" name="message" value="" ></textarea>
        </div>

        <div class="form-row">

            <?php wp_nonce_field( 'wd-ac-enquiry-form' ); ?>

            <input type="hidden" name="action" value="wd_ac_enquiry" >
            <input type="submit" name="send_enquiry" value="<?php esc_attr_e( 'Send Enquiry', 'wedevs-academy' ) ?>" >
        </div>

    </form>

</div>