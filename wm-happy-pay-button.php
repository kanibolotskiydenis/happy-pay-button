<?php
/**
 * Plugin Name: Happy Pay Button
 * Description: Happy Pay Button
 * Version: 1.0.1
 */

function cw_change_product_price_display( $price ) {
    global $woocommerce_loop;
    if( is_product() && !$woocommerce_loop['name'] == 'related' ) {
        $button_block = '<div class="happy-pay-wrapper">
            <div class="happy-pay-caption">BUY NOW, PAY LATER</div>
            <div class="happy-pay-body">
                <div class="happy-pay-button" id="happy-pay-button" onclick="show_happy_modal()">
                    <img src="' . plugins_url('assets/images/button-happypay.svg', __FILE__) . '" alt="Happy Pay Button"/>
                </div>
                <div class="happy-pay-text">No Deposit. Only (Value = Price / 2) on your next two paycheques. Interest free.</div>
            </div>
        </div>';

        $price .= $button_block;
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );
add_filter( 'woocommerce_cart_item_price', 'cw_change_product_price_display' );

add_action( 'wp_enqueue_scripts', 'style_scripts' );
function style_scripts () {
    //wp_register_style( 'my_style', plugins_url('style-plugin-rules.css',__FILE__ ));
    wp_register_style( 'happy_button_style', plugins_url('assets/css/styles.css',__FILE__ ));
    wp_register_script( 'happy_button_script', plugins_url('assets/js/script.js',__FILE__ ));
    //<link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">
    wp_enqueue_style( 'happy_button_style' );
    wp_enqueue_script( 'happy_button_script' );
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" /><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Quicksand&display=swap" rel="stylesheet" />';
    echo '<div id="happy-button-modal" class="happy-button-modal" style="display:none">
        <div class="hppbtn-modal-content">
          <img src="'.plugins_url('assets/images/close-icon.svg', __FILE__).'" class="hppbtn-modal-close" onclick="hide_happy_modal()" / />
          <div class="hppbtn-all-padding">
            <div class="hppbtn-modal-logo">
              <img src="'.plugins_url('assets/images/happy-pay-logo.svg', __FILE__).'" class="modal-button-image" />
              <div class="hppbtn-title">
                <h2 class="hppbtn-modal-title">
                  BUY THE THINGS YOU LOVE AND PAY FOR THEM OVER TWO MONTHS.
                </h2>
                <p class="hppbtn-modal-sub-title">
                  Payments are interest-free with no deposit required.
                  <br />#ChooseHappy
                </p>
              </div>
            </div>
          </div>
          <div class="hppbtn-all-padding">
            <div class="row cf">
              <div class="hppbtn-block hppbtn-fr">
                <p><span class="hppbtn-circle"></span>Add items to your cart</p>
              </div>
              <div class="hppbtn-block hppbtn-fr">
                <p><span class="hppbtn-circle"></span>Choose
                  <span class="text-title">Happy Pay</span>
                  at checkout
                </p>
              </div>
              <div class="hppbtn-block hppbtn-fr">
                <p><span class="hppbtn-circle"></span>Enter your payment details</p>
              </div>
              <div class="hppbtn-block hppbtn-fr">
                <p><span class="hppbtn-circle"></span>Your first payment (50%) will be taken on the first pay day post purchase and the second payment (50%) will be taken on the next payday thereafter.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
