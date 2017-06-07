<?php if( ! class_exists( 'smtp_config' ) or wp_die ( 'error found.' ) ) 
{   

    // https://codex.wordpress.org/Plugin_API/Action_Reference/phpmailer_init

    class smtp_config
    {
        public static $slug = 'smtp';

        public static function init ( $phpmailer=null ) 
        {
            $phpmailer->isSMTP(); 

            $host = get_option( 'wp-gcf-host' ) !== false ? get_option( 'wp-gcf-host' ) : 'smtp.example.com';

            $phpmailer->Host = $host;

            $auth = get_option( 'wp-gcf-smtp-auth' ) == 1 ? false : true;

            $phpmailer->SMTPAuth = $auth;
            
            static::access( $phpmailer );
            static::settings( $phpmailer );
        }

        public static function access ( $phpmailer=null ) 
        {
            $port = get_option( 'wp-gcf-port' ) !== false ? get_option( 'wp-gcf-port' ) : 25;

            $phpmailer->Port = $port;

            $user = get_option( 'wp-gcf-user' ) !== false ? get_option( 'wp-gcf-user' ) : 'yourusername';

            $phpmailer->Username = $user;

            $pass = get_option( 'wp-gcf-pass' ) !== false ? get_option( 'wp-gcf-pass' ) : 'yourpassword';

            $phpmailer->Password = $pass;
        }

        public static function settings ( $phpmailer=null ) 
        {
            $secure = get_option( 'wp-gcf-smtp-secure' ) !== false ? get_option( 'wp-gcf-smtp-secure' ) : 'tls';

            $phpmailer->SMTPSecure = $secure;

            $from = get_option( 'wp-gcf-from' ) !== false ? get_option( 'wp-gcf-from' ) : 'you@yourdomail.com';

            $phpmailer->From = $from;
            
            $from_name = get_option( 'wp-gcf-from-name' ) !== false ? get_option( 'wp-gcf-from-name' ) : 'Your Name';

            $phpmailer->FromName = $from_name;
        }
    }
}
?>