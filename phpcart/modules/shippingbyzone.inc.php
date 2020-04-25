<?php

/*
This custom shipping module looks at the country (3-digit code) and then the state (2-digit code) that the product will be shipped to. If international, a single price range is assigned. If domestic, it uses a custom zone chart to choose a shipping price range.

The domestic shipping price range can be based on subtotal dollars in the cart or the quantity of items ordered to select the final shipping price.

Shipping zone info and shipping price info are held in arrays that can be modified to change the values.
*/


// Step 1 - Shipping Configuration -
// Select your shipping configuration and insert it into the variable:

//   "subtotal"          - SubTotal Dollars of cart determines shipping price
//   "quantity"         - Quantity of items in cart determines shipping price

$shipping_config = "subtotal";

// End Step 1

/*
Step 2 - Cart Range
Based on the shipping cofig that you choose in step 1, modify cart range to match

Subtotal Array - Example:
               Subtotal Price Range
      Range 0:    $  .01 => $25.00
      Range 1:    $25.01 => $50.00
      Range 2:    $50.01 => $100.00
      Range 3:    $100.01 and up

      $cart_range = array (
         "25.00",
         "50.00",
         "100",
      );

Quantity Array - Example:
               Quantity Price Range
      Range 0:    1 => 25   pieces
      Range 1:    26 => 50 pieces
      Range 2:    51 => 100 pieces
      Range 3:    101 and up pieces

      $cart_range = array (
         "5",
         "10",
         "20",
      );
*/

$cart_range = array (
   "25.00",
   "50.00",
   "100",
);

// End Step 2


// Step 3 - Domestic Zone Array
//  Use either a USPS, UPS, FedEx chart to set up the zones by entering each 2-digit state code
// This example is for a company located in Florida.

$domestic_zone_array = array (
// zone 0
   array ("FL"),
// zone 1
   array ("GA", "MS", "AL", "SC", "NC", "VA", "VW", "TN", "KY"),
// zone 2
   array ("LA", "AR", "MO", "IL", "IN", "OH", "MI", "PA", "MD", "DE", "DC", "NJ", "CT", "RI", "MA", "VT", "NH", "ME", "MN"),
// zone 3
   array ("NY", "WI", "ND", "SD", "IA", "NE", "KS", "OK", "TX"),
// zone 4
   array ("MT", "CO", "NM", "AZ", "CA", "OR"),
// zone 5
   array ("NV", "UT", "WV", "ID", "WA"),
// zone 6
   array ("HI"),
// zone 7
   array ("AK"),
);

// End Step 3


// Step 4 - International Zone Array
// Identify the countries

$international_zone_array = array (
// zone 0 - Canada
   "CAN",
// zone 1 - Mexico
   "MEX",
// zone 2 - Puerto Rico
   "PRI",
// zone 3 - All other countries
);
// end Step 4

// Step 5 - PRICES BY RANGES
// Insert pricing into the domestic and international arrays to reflect your shipping price options.

$domestic_final_price = array (
// range 0 (zone0, zone1, zone2, zone3, zone4, zone5, zone6, zone7)
   array ("5.25", "6.25", "7.25", "8.25", "9.25", "10.25", "11.25"),
// zone 1
   array ("15.25", "16.25", "17.25", "18.25", "19.25", "20.25", "21.25"),
// zone 2
   array ("25.25", "26.25", "27.25", "28.25", "29.25", "30.25", "31.25"),
// zone 3
   array ("35.25", "36.25", "37.25", "38.25", "39.25", "40.25", "41.25"),
);

$international_final_price = array (
// range 0 (zone0, zone1, zone2, zone3, zone4, zone5, zone6, zone7)
   array ("8.25", "9.25", "10.25", "11.25", "12.25", "13.25", "14.25"),
// zone 1
   array ("8.25", "9.25", "10.25", "11.25", "12.25", "13.25", "14.25"),
// zone 2
   array ("5.25", "6.25", "7.25", "8.25", "9.25", "10.25", "11.25"),
// zone 3
   array ("25.25", "26.25", "27.25", "28.25", "29.25", "30.25", "31.25"),
);
// End Step 5


///////////////////////////////////////////////////
//
// Please do not modify the code below this line.
//
//////////////////////////////////////////////////


function CalculateTotalShipping($products, $subtotal){
   global $config, $shipping_config, $cart_range, $domestic_zone_array, $international_zone_array, $domestic_final_price, $international_final_price;

   // clear variables
   $totalshipping = 0;
   $totalweight = 0;

   $billing = GetBilling(); // so we can get the country

   // Free Shipping Level
   if ($config["ShippingFreeLevel"] <= $subtotal && trim($config["ShippingFreeLevel"]) != "")  // free shipping if total is greater or equal
      return 0;

   // No Products in Cart
   if (sizeof($products) == 0)
      return 0;

   // Get Country
   $country_selected = LookupCountry3($billing["COUNTRYID"]);

   // If USA, get domestic shipping price
   if ($country_selected == "USA"){

      // Get State ID
      $state_selected = LookupState($billing["STATEID"]);

      // Find State in Zone Array

      for ($i = 0; $i <= 7; $i++){
         $find_state = array_search($state_selected, $domestic_zone_array[$i]);
         if ($find_state !== FALSE){
            $zone_selected = $i;
         }
      }


      if ($shipping_config == "subtotal"){

         if ($subtotal > 0 AND $subtotal < $cart_range[0]){
            $totalshipping = $domestic_final_price[0][$zone_selected];
         }
         elseif ($subtotal > $cart_range[0] AND $subtotal < $cart_range[1]){
            $totalshipping = $domestic_final_price[1][$zone_selected];
         }
         elseif ($subtotal > $cart_range[1] AND $subtotal < $cart_range[2]){
            $totalshipping = $domestic_final_price[2][$zone_selected];
         }
         elseif ($subtotal > $cart_range[2] ){
            $totalshipping = $domestic_final_price[3][$zone_selected];
         }

      }
      elseIf ($shipping_config == "quantity"){

         // get total quanities of items in cart
         $total_quanity = 0;
         foreach ($products as $product){ // calculate shipping
            $total_quanity += $total_quanity + $product[PRODUCTQUANTITY];
         }


         if ($total_quanity > 0 AND $total_quanity < $cart_range[0]){
            $totalshipping = $domestic_final_price[0][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[0] AND $total_quanity < $cart_range[1]){
            $totalshipping = $domestic_final_price[1][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[1] AND $total_quanity < $cart_range[2]){
            $totalshipping = $domestic_final_price[2][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[2] ){
            $totalshipping = $domestic_final_price[3][$zone_selected];
         }
      }

      return $totalshipping;
   }
   else { // international orders

      // check to see if this is an identified zone
      $zone_selected = array_search($country_selected, $international_zone_array);
      if ($zone_selected == '' ){
         $zone_selected = 3;
      }

      if ($shipping_config == "subtotal"){

         if ($subtotal > 0 AND $subtotal < $cart_range[0]){
            $totalshipping = $international_final_price[0][$zone_selected];
         }
         elseif ($subtotal > $cart_range[0] AND $subtotal < $cart_range[1]){
            $totalshipping = $international_final_price[1][$zone_selected];
         }
         elseif ($subtotal > $cart_range[1] AND $subtotal < $cart_range[2]){
            $totalshipping = $international_final_price[2][$zone_selected];
         }
         elseif ($subtotal > $cart_range[2] ){
            $totalshipping = $international_final_price[3][$zone_selected];
         }

      }
      elseIf ($shipping_config == "quantity"){

         // get total quanities of items in cart
         $total_quanity = 0;
         foreach ($products as $product){ // calculate shipping
            $total_quanity += $total_quanity + $product[PRODUCTQUANTITY];
         }


         if ($total_quanity > 0 AND $total_quanity < $cart_range[0]){
            $totalshipping = $international_final_price[0][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[0] AND $total_quanity < $cart_range[1]){
            $totalshipping = $international_final_price[1][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[1] AND $total_quanity < $cart_range[2]){
            $totalshipping = $international_final_price[2][$zone_selected];
         }
         elseif ($total_quanity > $cart_range[2] ){
            $totalshipping = $international_final_price[3][$zone_selected];
         }
      }

      return $totalshipping;
   }


}
?>