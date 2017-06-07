<?php if( ! class_exists( 'html' ) or wp_die ( 'error found.' ) ) 
{
    
     class html 
     {
         
         public static $text = "text";
         
         // html:table(array(), array());
         public static function table($elem=array(), $tab=array()){
            
               $html = null;
                
               if(is_array($elem) AND is_array($tab) ){
                
                    if(count($elem)>=1 AND count($tab)>=1){
                        
                          foreach($elem as $elem_key => $elem_var ){
                             if( !is_null($elem[$elem_key])) $elem_res .= $elem_key ."=". $elem[$elem_key] . " "; 
                          }
                          
                          $html .= '<table '.$elem_res.'>';
                          $html .= '<tbody>';

                          foreach($tab as $tab_key => $tab_var ){

                             if( is_string( $tab_var )) 
                                 $html .= '<tr class="form-field form-required">'; 
                                 
                                 $labl = array( 
                                                 'text' => $tab_key,
                                                 'class' => 'description',
                                               );
                                 
                                 $html .= "<th scope='row'>".self::label($labl)."</th><td>".$tab[$tab_key]."</td>"; 
                                 $html .= '</td>';
                          }
                          
                          $html .= '</tbody>';
                          $html .= '</table>';
                          
                    }
               }
               
               return $html;
         }
         
          // html:form_table(array(), array());
         public static function form_table($elem=array(), $tab=array()){
            
               $html = null;
                
               if(is_array($elem) AND is_array($tab) ){
                
                    if(count($elem)>=1 AND count($tab)>=1){
                        
                          foreach($elem as $elem_key => $elem_var ){
                             if( !is_null($elem[$elem_key])) $elem_res .= $elem_key ."=". $elem[$elem_key] . " "; 
                          }
                          
                          $html .= '<table '.$elem_res.'>';
                          $html .= '<tbody>';

                          foreach($tab as $tab_key => $tab_var ){

                             if( is_string( $tab_var )) 
                                 $html .= '<tr class="form-field form-required">'; 
                                 
                                 $labl = array( 
                                                 'text' => $tab_key,
                                                 'class' => 'description',
                                              );
                                 
                                 $html .= "<th scope='row'>".self::label($labl)."</th><td>".$tab[$tab_key]."</td>"; 
                                 $html .= '</td>';
                          }
                          
                          $html .= '</tbody>';
                          $html .= '</table>';
                          
                    }
               }
               
               return $html;
         }
         
         // html:table_list(array(), array(), array());
         public static function table_list($elem=array(), $tab1=array(), $tab2=array(), $quick=array()){
            
               $html = null;
               $elem_res = null;
               
               $sort_value = null;
               $count_cols = null;
               
               if(is_array($elem) AND is_array($tab1) AND is_array($tab2)){
                
                    if(count($elem)>=1 AND count($tab1)>=1 AND count($tab1)>=1){
                          
                          if(!empty($elem)){
                              foreach($elem as $elem_key => $elem_var ){
                                 if( !is_null($elem[$elem_key])) $elem_res .= $elem_key ."=". $elem[$elem_key] . " "; 
                              }
                          }
                          
                          $html .= '<table '.$elem_res.'>';
                          $html .= '<tbody>';
                          
                          // exam = array( 1, 2, 3 );
                          
                          if(!empty($tab1)){
                            
                              $html .= '<tr>';
                              
                              foreach($tab1 as $tab1_key => $tab1_var):
                              
                                   $tab1_value = $tab1[$tab1_key];
                                   
                                   $label = array( 
                                                   'text' => $tab1_value, 
                                                   'for' => 'description' 
                                                 );
                                   
                                   $label_class = 'class="label"';
                                   $html .= '<td '.$label_class.'>'.html::label( $label ).'</td>';
                              endforeach;
                              
                              $html .= '</tr>';
                          }
                          
                          // exam = array( array(1), array(2), array(3) )
                          
                          foreach($tab2 as $tab2_key => $tab2_var):
                                
                               $tab2_value = $tab2[$tab2_key];
                               
                               $count_cols = count( $tab2[$tab2_key] );
                               
                               if( is_array($tab2_value) ){
                                
                                   if( count($tab2_value)>=1 ){
                                       
                                       $key_val = array_keys( $tab2_value );
                                       $value_sort_filter = !empty( $key_val[4] ) ? $key_val[4] : !empty($key_val[2]) ? $key_val[2] : $key_val[3];
                                       
                                       $html .= '<tr class="sort '.$value_sort_filter.'">';
                                       
                                       foreach( $tab2_value as $tab2_value_key => $tab2_value_result ){
                                           
                                               if( is_string($tab2_value[$tab2_value_key])) {
                                                
                                                    $html .= '<td class="result '.$tab2_value_key.'" >' . ( $tab2_value[$tab2_value_key] ) . '</td>';
                                                    
                                               }
                                                 
                                       }
                                       
                                       $html .= '</tr>';
                                       
                                       if(!empty($quick[$tab2_key])){
                                           if( !is_null($quick[$tab2_key])){
                                               $html .= '<tr class="edit-quick">';
                                                   $html .= '<td colspan="'.$count_cols.'">'.$quick[$tab2_key].'</td>';
                                               $html .= '</tr>';
                                           }
                                       }
                                   }
                                
                               }
                              
                          endforeach;
                          
                          if(!empty($tab1)){
                            
                              $html .= '<tr>';
                              
                              foreach($tab1 as $tab1_key => $tab1_var):
                              
                                   $tab1_value = $tab1[$tab1_key];
                                   
                                   $label = array( 
                                                   'text' => $tab1_value, 
                                                   'for' => 'description' 
                                                 );
                                   
                                   $label_class = 'class="label"';
                                   $html .= '<td '.$label_class.'>'.html::label( $label ).'</td>';
                              endforeach;
                              
                              $html .= '</tr>';
                          }
                          
                          $html .= '</tbody>';
                          $html .= '</table>';
                    
                    }
            
               }
               
               return $html;
         }
         
         public static function tabler($element=array(), $table1=array(), $table2=array()){
               
                 $html = null;
                 
                 $html .= '<table class="wp-list-table widefat fixed pages" cellspacing="0" id="sortval">';
                 
                 if( !empty($table1) AND !is_null($table1)){
                 
                     $html .= '<thead>';
                     $html .= '<tr>';
                     
                     if( is_array($table1) ){
                         
                         $html .= '<th id="cb" class="manage-column column-cb check-column" style="" scope="col"><input type="checkbox" id="module-delete" class="module-delete" name="module_delete[]" value="" /></th>';
                          
                         foreach( $table1 as $table1_keys => $table1_vals ){
                                  
                                  $tbl1keys = strtolower($table1_keys);
                                  $tbl1vals = ucwords(strtolower( $table1_vals));

                                  $html .= '<th id="title" class="manage-column column-'.$tbl1keys.' desc" style="" scope="col">'.$tbl1vals.'</th>';
                            
                         }
                        
                     }      
                     
                     $html .= '<tr>';
                     $html .= '</thead>';
                 
                 }
                
                 $html .= '<tfoot></tfoot>';
                
                 if( !empty($table2) AND !is_null($table2)){
                    
                     $html .= '<tbody id="the-list">';
                     
                     if( is_array($table2) ){
                        
                         $i = 0;
                         foreach( $table2 as $table2_keys => $table2_vals ){
                                  
                                  $alter = ($i % 2) ? '' : 'alternate';

                                  $html .= '<tr id="post-'.$i.'" class="post-'.$i.' type-page status-publish hentry '.$alter.' iedit author-self level-'.$i.' entry sort" valign="top">';
                                  
                                  $html .= '<th class="check-column column-line" scope="row"></th>';
                                  $html .= '<td class="post-'.$i.' page-'.$i.' column-'.$i.' column-line"></td>';
                                  $html .= '<td class="desc column-desc column-line"></td>';
                                  $html .= '<td class="file column-file column-line"></td>';
                                  $html .= '<td class="sort column-sort column-line"></td>';
                                  $html .= '<td class="action column-action column-line"></td>';
                                     
                                  $html .= '</tr>';
                                  
                                  $i++;  
                                 
                         }
                         
                     }
                     
                     $html .= '</tbody>';
                
                 }
                 
                 if( !empty($table1) AND !is_null($table1)){
                 
                     $html .= '<thead>';
                     $html .= '<tr>';
                     
                     if( is_array($table1) ){
                         
                         $html .= '<th id="cb" class="manage-column column-cb check-column" style="" scope="col"><input type="checkbox" id="module-delete" class="module-delete" name="module_delete[]" value="" /></th>';
                          
                         foreach( $table1 as $table1_keys => $table1_vals ){
                                  
                                  $tbl1keys = strtolower($table1_keys);
                                  $tbl1vals = ucwords(strtolower( $table1_vals));

                                  $html .= '<th id="title" class="manage-column column-'.$tbl1keys.'" desc" style="" scope="col">'.$tbl1vals.'</th>';
                            
                         }
                        
                     }      
                     
                     $html .= '<tr>';
                     $html .= '</thead>';
                 
                 }
                
                 $html .= '</table>';
                
                 return $html;
                  
           }
         
         // html:label(array() );
         public static function label ( $label=array() )
         {
            
            $label_result = null; 
            $label_text = null;
            
            if( is_array( $label ) AND ! is_null( $label ) ) :
                
                if( count($label) >=1 )
                {
                    foreach( $label as $label_key => $label_var ) 
                    {
                        if( $label_key == self::$text ) {
                            $label_text .= $label[$label_key];
                        }
                        
                        if( $label_key != self::$text ){ 
                            $label_result .= "{$label_key}={$label[$label_key]} ";
                        }  
                    }
                    
                    return "<label {$label_result}>{$label_text}</label>";   
                }  

            endif;
         }
         
         public static function textarea ( $label=array() ) 
         {
               
            $label_result = null; 
            $label_text = null;
            
            if( is_array( $label ) AND !is_null( $label ) ) 
            {
                
                if( count( $label ) >=1 ) {
                    
                    foreach($label as $label_key => $label_var){
                        
                        if( $label_key == self::$text ) $label_text .= $label[$label_key];
                        if( $label_key != self::$text ) $label_result .= "{$label_key}='{$label[$label_key]}' "; 
                        
                    }
                    
                    return "<textarea {$label_result}>{$label_text}</textarea>";   
                }  
            } 
         }
         
         public static function fieldset($legend=null,$is_string=null) 
         {
            $html = null;

            if( !is_null( $is_string)){ 
             	$html .= "<fieldset>";
                
                if( !is_null($legend) AND is_string($legend) ): $html .= "<legend>$legend</legend>"; endif;
                
                if( is_string($is_string) ): $html .= $is_string; endif;
                
                $html .= "</fieldset>";
            }
            
            return $html;
             
         }
         
         public static function icon_logo($title=null, $details=null, $submit=true) 
         {
             if( !is_null($title) AND !is_null($details )){
                  
                  if( is_string($title) AND is_string($title)){
                    
                         //<div id='icon-option' class='icon-option'><br /></div>
                         
                         if( $submit == true ){
                             $add = array( 'name' => 'add_option', 'value' => 'Add New Options', 'id' => 'add_option_id', 'class' => 'add_option_class add_submit' );                  
                             $add_new_submit = input::submit( $add );
                         } else {
                             $add_new_submit = null;
                         }
                         
                         return "<h2 class='title'>$title $add_new_submit</h2><p>$details</p>";  
                                 
                  }
             }
         }
         
         public static function h2_page($label=null, $href=null, $is_active=true){
                 $html = null;
                 
                 $html .= '<div class="wrap">';
                 
                 if( !is_null($label)){
                      $label_val = ucwords(strtolower($label));
                 } else {
                      $label_val = '';
                 }
                 
                 $html .= '<h2 class="title">'.$label_val.' '; 
                 
                 if( $is_active == true ) $html .= '<a class="add-new-h2" href="'.$href.'">Add New</a>';
                 
                 $html .= '</h2>';
                 
                 $html .= '</div>';
                 
                 return $html;
                 
           }
         
         public static function select ( $elem=array(), $array=array(), $filter=null, $defaults=null ) 
         {
             $html  = null;
             $label = null;
             $count = 0;
             $numz  = 0;
             
             if( ! empty ( $array ) 
              AND ! empty ( $elem ) )
             {

                 if( is_array ( $elem ) ) 
                 {

                     foreach( $elem as $elem_row => $elem_val ) 
                     {
                         $label .= $elem_row . "='" . $elem[$elem_row] . "' ";
                     }
                     
                     $html .= '<select '.$label.'>';
                     
                     $select_defualts = !is_null( $defaults ) ? $defaults : "...";
                     $html .= '<option value="' . __( $numz ) . '">'. __( $select_defualts ) . ' </option>';
                     
                     foreach( $array as $array_row => $array_val ) 
                     {
                          //$array_key_val = $array_row == $count ? $array_val : $array_row;

                          $is_selected = $array_row == $filter ? "selected=''" : false; 
                          $html .= '<option value="' . __( $array_row ) . '" ' . __( $is_selected ) . '>' . trim ( $array_val ) . '</option>';
                          $count++;
                     }
                     
                     $html .= '</select>';
                 }
             }
             
             return $html;
             
         }

         /**
          * wodpress : default table structure
          * wp : html/table
         **/

         public static function table_top_label () 
         {
             $html = null;

             $html .= '<thead>
                         <tr>
                             <td id="cb" class="manage-column column-cb check-column">
                                 <label class="screen-reader-text" for="cb-select-all-1">
                                     Select All
                                 </label>
                                 <input id="cb-select-all-1" type="checkbox">
                             </td>
                             <th scope="col" id="title" class="manage-column column-title">
                                 Name
                             </th>
                             <th scope="col" id="tags" class="manage-column column-tags column-primary">
                                 Excerpt
                             </th>
                             <th scope="col" id="author" class="manage-column column-author">
                                 Author
                             </th>
                             <th scope="col" id="comments" class="manage-column column-comments">
                                 <span class="vers comment-grey-bubble" title="Comments">
                                     <span class="screen-reader-text">
                                         Comments
                                     </span>
                                 </span>
                             </th>
                             <th scope="col" id="date" class="manage-column column-date">
                                 Date
                             </th>    
                         </tr>
                     </thead>';

             return $html;  
         }

         public static function table_bottom_label () 
         {
             $html = null;

             $html .= '<tfoot>
                         <tr>
                             <td class="manage-column column-cb check-column">
                                 <label class="screen-reader-text" for="cb-select-all-2">
                                     Select All
                                 </label>
                                 <input id="cb-select-all-2" type="checkbox">
                             </td>
                             <th scope="col" class="manage-column column-title">
                                 Name
                             </th>
                             <th scope="col" id="tags" class="manage-column column-tags column-primary">
                                 Excerpt 
                             </th>
                             <th scope="col" class="manage-column column-author">
                                 Author
                             </th>
                             <th scope="col" class="manage-column column-comments">
                                 <span class="vers comment-grey-bubble" title="Comments">
                                     <span class="screen-reader-text">
                                         Comments
                                     </span>
                                 </span>
                             </th>
                             <th scope="col" class="manage-column column-date">
                                 Date
                             </th>   
                         </tr>
                     </tfoot>';

             return $html;
         }

         // END
        
     }
     
}
?>