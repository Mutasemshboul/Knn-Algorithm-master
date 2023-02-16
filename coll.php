<?php



// $name = $_POST["name"];
// $email = $_POST["email"];
// $subject = $_POST["subject"];
// $message = $_POST["message"];

// $Laptop = $_POST["past_purchases"];   

// require "vendor/autoload.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// $mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

// $mail->isSMTP();
// $mail->SMTPAuth = true;

// $mail->Host = "smtp.gmail.com";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mail->Port = 587;

// $mail->Username = "alomariqasim10@gmail.com";
// $mail->Password = "sorhiafwipwfanen";

// $mail->setFrom($email, $name);
// $mail->addAddress("mutasemshboul14@gmail.com","qasim");

// $mail->Subject = $subject;
// $mail->Body = $message;




// if (isset($_POST["past_purchases"])) {
//     $past_purchases = array($_POST["past_purchases"]);

//     // Define an array of products and their features

// // Array of user-product interactions
// // $user_product = array(
// //     array("user" => "John", "product" => "Mouse"),
// //     array("user" => "Sara", "product" => "Keyboard"),
// //     array("user" => "Adam", "product" => "Flash drive"),
// //     array("user" => "Jane", "product" => "Monitor"),
// //     array("user" => "Eric", "product" => "Printer"),
// //     array("user" => "David", "product" => "Speakers"),
// //     array("user" => "Mary", "product" => "External hard drive"),
// //     array("user" => "Lisa", "product" => "Pen tablet"),
// //     array("user" => "Bob", "product" => "Scanner"),
// //     array("user" => "qasim", "product" => "Projector")

// // );

// // Collaborative filtering algorithm
// function recommend_product($past_purchases, $user_product, $products) {
//     // $user_products = array();
//     foreach ($user_product as $up) {
//       if (!in_array($up["product"], $past_purchases)) {
//         $user_products[] = $up["product"];
//       }
//     }
//     $similar_products = array();
//     foreach ($user_products as $up) {
//       foreach ($products as $p) {
//         if ($p["name"] == $up) {
//           $similar_products = array_merge($similar_products, $p["features"]);
//         }
//       }
//     }
//     $similar_products = array_count_values($similar_products);
//     arsort($similar_products);
//     $recommended_product = "";
//     foreach ($products as $p) {
//       if (!in_array($p["name"], $past_purchases) && !in_array($p["name"], $user_products)) {
//         $found = false;
//         foreach ($p["features"] as $feature) {
//           if (array_key_exists($feature, $similar_products)) {
//             $recommended_product = $p["name"];
//             $found = true;
//             break;
//           }
//         }
//         if ($found) {
//           break;
//         }
//       }
//     }
//     return $recommended_product;
//   }
  
// //   $products = array(
// //     array("name" => "Mouse", "features" => array("high performance", "long battery life", "lightweight")),
// //       array("name" => "Keyboard", "features" => array("affordable", "reliable", "good performance")),
// //       array("name" => "Flash drive", "features" => array("stylish design", "high-end performance", "fast processor")),
// //   );

// // $user_product = array(array("user" => "qasim", "product" => "Projector"));

// $products = array(
//     array("name" => "Mouse", "features" => array("high performance", "long battery life", "lightweight")),
//     array("name" => "Keyboard", "features" => array("affordable", "reliable", "good performance")),
//     array("name" => "Flash drive", "features" => array("stylish design", "high-end performance", "fast processor")),
//     // array("name" => "Monitor", "features" => array("ultra-slim design", "long battery life", "powerful performance")),
//     array("name" => "Printer", "features" => array("thin bezel display", "lightweight design", "powerful performance")),
//     array("name" => "Speakers", "features" => array("elegant design", "powerful processor", "long battery life")),
//     array("name" => "External hard drive", "features" => array("ultra-portable design", "long battery life", "retina display")),
//     array("name" => "Pen tablet", "features" => array("gaming laptop", "high-end graphics card", "fast processor")),
//     array("name" => "Projector", "features" => array("gaming laptop", "high-end graphics card", "fast processor"))
//   );


// $user_product = array(
//     array("user" => "John", "product" => "Mouse"),
//     array("user" => "Sara", "product" => "Keyboard"),
//     array("user" => "Adam", "product" => "Flash drive"),
//     // array("user" => "Jane", "product" => "Monitor"),
//     array("user" => "Eric", "product" => "Printer"),
//     array("user" => "David", "product" => "Speakers"),
//     array("user" => "Mary", "product" => "External hard drive"),
//     array("user" => "Lisa", "product" => "Pen tablet"),
//     array("user" => "Bob", "product" => "Scanner"),
//     array("user" => "qasim", "product" => "Projector")

// );



// // $user_product = array(
// //         array("user" => "John", "product" => "Mouse"),
    
// //     );
  
//   // Recommended product
//   $recommended_product = recommend_product($past_purchases, $user_product, $products);
  
//   // Output


// }


// $mail->Body =  "Thank You For Byuing $Laptop Laptop \r\n\n 
// Based on your past purchase of " . implode(", ", $past_purchases) . ", we recommend the $recommended_product.";



// $mail->send();
// header("Location: sent.html");


// User-item matrix
// $ratings = array(
//   'User1' => array('Item1' => 5, 'Item2' => 3, 'Item3' => 4),
//   'User2' => array('Item1' => 4, 'Item2' => 2, 'Item3' => 3, 'Item4' => 4),
//   'User3' => array('Item1' => 1, 'Item2' => 4, 'Item3' => 5, 'Item4' => 2),
//   'User4' => array('Item2' => 1, 'Item3' => 2, 'Item4' => 3)
// );

// // Calculate similarities
// function cosine_similarity($a, $b) {
//   $dot_product = 0;
//   $a_norm = 0;
//   $b_norm = 0;

//   foreach ($a as $key => $value) {
//       if (isset($b[$key])) {
//           $dot_product += $a[$key] * $b[$key];
//       }
//       $a_norm += $a[$key] * $a[$key];
//   }
//   foreach ($b as $key => $value) {
//       $b_norm += $b[$key] * $b[$key];
//   }

//   return $dot_product / (sqrt($a_norm) * sqrt($b_norm));
// }

// $similarities = array();
// foreach ($ratings as $user1 => $items1) {
//   foreach ($ratings as $user2 => $items2) {
//       if ($user1 != $user2) {
//           $similarity = cosine_similarity($items1, $items2);
//           $similarities[$user1][$user2] = $similarity;
//       }
//   }
// }

// // Make recommendations
// function recommend($user, $ratings, $similarities) {
//   $recommendations = array();

//   foreach ($ratings[$user] as $item => $rating) {
//       foreach ($similarities[$user] as $other_user => $similarity) {
//           if ($similarity > 0 && !isset($ratings[$other_user][$item])) {
//               $recommendations[$item] += $similarity * $rating;
//           }
//       }
//   }

//   arsort($recommendations);
//   return array_slice($recommendations, 0, 5, true);
// }

// $recommendations = recommend('User1', $ratings, $similarities);
// print_r($recommendations);


// User-item matrix
$ratings = array(
  'User1' => array('Item1' => 5, 'Item2' => 3, 'Item3' => 4),
  'User2' => array('Item1' => 4, 'Item2' => 2, 'Item3' => 3, 'Item4' => 4),
  'User3' => array('Item1' => 1, 'Item2' => 4, 'Item3' => 5, 'Item4' => 2),
  'User4' => array('Item2' => 1, 'Item3' => 2, 'Item4' => 3)
);

// Convert ratings to a matrix
$users = array_keys($ratings);
$items = array_unique(array_merge(...array_values($ratings)));
$matrix = array();
foreach ($users as $i => $user) {
  foreach ($items as $j => $item) {
      $matrix[$i][$j] = isset($ratings[$user][$item]) ? $ratings[$user][$item] : null;
  }
}

// Perform singular value decomposition (SVD)
$U = $S = $V = null;
$success = svd($matrix, $U, $S, $V);

if ($success) {
  // Make recommendations
  function recommend($user, $U, $S, $V, $items) {
      $recommendations = array();

      $user_index = array_search($user, array_keys($U));
      $user_vector = array_slice($U[$user_index], 0, 2); // use first two columns of U

      foreach ($items as $j => $item) {
          $item_vector = array_column($V, $j); // get j-th column of V
          $similarity = cosine_similarity($user_vector, $item_vector, $S);
          $recommendations[$item] = $similarity;
      }

      arsort($recommendations);
      return $recommendations;
  }

  $recommendations = recommend('User1', $U, $S, $V, $items);
  print_r($recommendations);
}

// Helper function to calculate cosine similarity using SVD
function cosine_similarity($a, $b, $S) {
  $dot_product = array_sum(array_map(function ($x, $y) { return $x * $y; }, $a, $b));
  $norm_a = sqrt(array_sum(array_map(function ($x) { return $x * $x; }, $a)) * $S[0][0]);
  $norm_b = sqrt(array_sum(array_map(function ($x) { return $x * $x; }, $b)) * $S[0][0]);

  return $dot_product / ($norm_a * $norm_b);
}

// Helper function to perform SVD using PHP's built-in svd function
function svd($A, &$U, &$S, &$V) {
  $A_T = array_map(null, ...$A);
  $U_T = null;
  $S_T = null;
  $V_T = null;
  $success = svd_decomp($A_T, $U_T, $S_T, $V_T);

  if ($success) {
      $U = array_map(null, ...$U_T);
      $S = $S_T;
      $V = $V_T;
  }

  return $success;
}




?>







