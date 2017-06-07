<?php if( ! class_exists( 'send_email' ) or wp_die ( 'error found.' ) ) {

    // https://developer.wordpress.org/reference/functions/wp_mail/

    class send_email 
    {

        public static function data ( $data=array() ) 
        {
            if ( array_key_exists( 'to', $data ) ) {
                $to = $data['to'];
            }
            if ( array_key_exists( 'subject', $data ) ) {
                $subject = $data['subject'];
            }
            if ( array_key_exists( 'body', $data ) ) {
                $body = $data['body'];
            }
            if ( array_key_exists( 'headers', $data ) ) {
                $headers = $data['headers'];
            }
            if ( array_key_exists( 'attachments', $data ) ) {
                $attachments = $data['attachments'];
            }

            wp_mail( $to, $subject, $body, $headers, $attachments );
        }

        public static function all ( $data=array(), $emails=array() ) 
        {
            if ( array_key_exists( 'subject', $data ) ) {
                $subject = $data['subject'];
            }
            if ( array_key_exists( 'body', $data ) ) {
                $body = $data['body'];
            }
            if ( array_key_exists( 'headers', $data ) ) {
                $headers = $data['headers'];
            }
            if ( array_key_exists( 'attachments', $data ) ) {
                $attachments = $data['attachments'];
            }

            $to = $emails;

            if( is_array( $to ) ) : 
                foreach( $to as $key => $res ) :
                    wp_mail( trim( $res ), $subject, $body, $headers, $attachments );
                endforeach;
            endif;
        }

        // END
    }
}
?>