<?php
session_start();
?>

<?php

   function get_song_length($tracks){
       $lengths = array();
       foreach($tracks as $track){
           $length = $track["duration_ms"]/1000;
           $lengths[] = floatval($length);
       }
       return $lengths;
   }

   function get_followers($info){

                $followers = $info['followers']['total'];
                $followers_array = array_reverse(str_split($followers));
                $better_followers = "";
                $i = 0;
                foreach($followers_array as $char){
                     if ($i % 3 == 0 and $i != 0){
                         $better_followers = ',' . $better_followers;
                     }
                     $better_followers = $char . $better_followers;
                     $i += 1;
               }
        return $better_followers;
    }

    function get_collaborations($tracks){
       $collabs = 0;
       foreach($tracks as $track){
           $artists = $track['artists'];
           $collabs += (count($artists) - 1);
       }
       return $collabs;
    }

    function average_length(array $lengths){ //In Seconds
      $number = count($lengths);
      $avg = 0;
      for($k = 0; $k < $number; $k++){
        $avg += $lengths[$k];
      }
      $avg_length = $avg / $number;
      return gmdate("H:i:s", $avg_length);
    }

    function percentage_collaborations($tracks){
      $collabs = 0;
      $number = count($tracks);
      foreach($tracks as $track){
        if(count($track['artists']) > 1){
          $collabs++;
        }
      }
      
      $percentage = ($collabs / $number) * 100;

      return $percentage;
    }


?>
