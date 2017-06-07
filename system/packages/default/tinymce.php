<?php if( ! class_exists( 'tinymce' ) or wp_die ( 'error found.' ) ) :

    // https://codex.wordpress.org/Function_Reference/wp_editor

    class tinymce 
    {

        public static $slug = 'tinymce';

        /**
         * wordpress : tinymce 
         * @param array : elements
        **/

        public static function settings ( $elems=null ) 
        {
            return array( $elems );
        }

        /**
         * wordpress : tinymce 
         * @param string (required) : content
         * @param string (required) : editor_id
        **/

        public static function textarea ( $content=null, $editor_id=null, $elems=array( 'media_buttons' => false ) ) 
        {
            // Turn on the output buffer
            ob_start();

            // Echo the editor to the buffer
            wp_editor( $content, $editor_id, static::settings( $elems ) );

            // Store the contents of the buffer in a variable
            $editor_contents = ob_get_clean();

            // Return the content you want to the calling function
            return $editor_contents;
        }

        // END
    }

endif;
?>