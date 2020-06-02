<?php

namespace OTP\Helper;

use OTP\Traits\Instance;
if(! defined( 'ABSPATH' )) exit;

class MoAddonListContent
{

use Instance;
    function __construct()
    {
    
    define("MO_ADDONS_CONTENT",serialize( array(

    "WORDPRESS_SMS_NOTIFICATION" =>      [
        'addonName'  => 'WordPress SMS Notification to Admin & User on Registration',
        'addonDescription'  => 'Allows your site to send out custom SMS notifications to Customers and Administrators when a new user registers on your Wordpress site. Click on the button above for further details.', 
        'addonPrice' => '$20*',

    ],
    "WORDPRESS_PASSWORD_RESET" =>      [
        'addonName'  => 'WooCommerce Password Reset Over OTP',
        'addonDescription'  => 'Allows your users to reset their password using OTP instead of email links. Click on the button above for further details.',
        'addonPrice' => '$22*',

    ],
    "REGISTER_USING_ONLY_PHONE" =>      [
        'addonName'  => 'Register Using Only Phone Number',
        'addonDescription'  => 'Allows your users to register on your Wordpress site using only their Phone Number instead of email address. Click on the button above for further details.',
        'addonPrice' => '$25*',

    ],
    "RESEND_OTP_CONTROL" =>      [
        'addonName'  => 'Resend OTP Control',
        'addonDescription'  => 'Allows you to block OTP from being sent out before the set timer is up. Click on the button above for further details.',
        'addonPrice' => '$30*',

    ],
    )));


    }
    public static function showAddonsContent(){
        $displayMessage = "";
        $messages = unserialize(MO_ADDONS_CONTENT);
        echo '<div class="mo_otp_wrapper">';
        $queryBody = "Hi! I am interested in the {{addonName}} addon, could you please tell me more about this addon?";
        foreach ($messages as $messageKey)
        {
            echo'<div id="'.$messageKey["addonName"].'">
                                <center><h3 style="color:white;">'.$messageKey["addonName"].'<br /><br /></h3></center>
                                
                                <footer>
                                    <center><input type="button" class="button button-primary button-large" onclick="otpSupportOnClick(\''.str_replace("{{addonName}}",$messageKey["addonName"], $queryBody).'\');" value="Interested"/>
                                    </center>
                                    </footer>
                                <span class="cd-pricing-body">
                                    <ul class="cd-pricing-features">
                                        <li style="color:white;text-align: center;">'.$messageKey["addonDescription"].'</li>
                                    </ul>
                                </span></div>
                            ';

                                }
        echo '</div><br>';
        return $displayMessage;
    }

}