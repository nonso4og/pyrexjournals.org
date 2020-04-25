<?php

/*======================================================================*\

|| #################################################################### ||

|| #                    PHPCart version 4.9                           # ||

|| # ---------------------------------------------------------------- # ||

|| #       All code is copyright Webrigger Internet Services          # ||

|| #        No files may be redistributed in whole or part.           # ||

|| # ----------------- PHPCART IS NOT FREE SOFTWARE ----------------- # ||

|| #    http://www.phpcart.net | http://www.phpcart.net/forum/        # ||

|| #################################################################### ||

\*======================================================================*/

if (!function_exists('array_replace')){
	
  function array_replace( array &$array, array &$array1) {
    $args = func_get_args();
    $count = func_num_args();

    for ($i = 0; $i < $count; ++$i) {
      if (is_array($args[$i])) {
        foreach ($args[$i] as $key => $val) {
            $array[$key] = $val;
        }
      }
      else {
        trigger_error(
          __FUNCTION__ . '(): Argument #' . ($i+1) . ' is not an array',
          E_USER_WARNING
        );
        return NULL;
      }
    }

    return $array;
  }
} 

?>