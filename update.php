$tn = $_GET['tabname'];
$pk1 = $_GET['primarykey'];
$pk2 = $_GET['primarykey2'];
$pk3 = $_GET['primarykey3'];
$pid1 = $_GET['primaryid'];
$pid2 = $_GET['primaryid2'];
$pid3 = $_GET['primaryid3'];
$t1 = $_GET['type1'];
$t2 = $_GET['type2'];
$v1 = $_GET['val1'];
$v2 = $_GET['val2'];

if($tn == 'Abstract'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $absTable = "SELECT * FROM Abstract";

    if($result = mysqli_query($db_conx, $absTable)){
      echo "<h2>Abstract Table</h2><table>";
      echo "<thead><tr><th>PhotoID</th><th>Comment</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['PhotoID'];
        $t2 = $row['Comment'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Customer'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $custTable = "SELECT * FROM Customer";

    if($result = mysqli_query($db_conx, $custTable)){
      echo "<h2>Customer Table</h2><table>";
      echo "<thead><tr><th>LoginName</th><th>Password</th><th>CName</th><th>CType</th><th>BillingAddress</th><th>Str1</th><th>Str2</th><th>City</th><th>State</th><th>Zip</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $customer_loginname = $row['LoginName'];
        $customer_password = $row['Password'];
        $customer_cname = $row['CName'];
        $customer_ctype = $row['CType'];
        $customer_billingaddress = $row['BillingAddress'];
        $customer_str1 = $row['Str1'];
        $customer_str2 = $row['Str2'];
        $customer_city = $row['City'];
        $customer_state = $row['State'];
        $customer_zip = $row['Zip'];
        echo "<tr><td>".$customer_loginname."</td><td>".$customer_password."</td><td>".$customer_cname."</td><td>".$customer_ctype."</td><td>".$customer_billingaddress."</td><td>".$customer_str1."</td><td>".$customer_str2."</td><td>".$customer_city."</td><td>".$customer_state."</td><td>".$customer_zip."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Landscape'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."', ".$t2."='".$v2."' WHERE ".$pk1."='".$pid1."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $landTable = "SELECT * FROM Landscape";

    if($result = mysqli_query($db_conx, $landTable)){
      echo "<h2>Landscape Table</h2><table>";
      echo "<thead><tr><th>PhotoID</th><th>Place</th><th>Country</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['PhotoID'];
        $t2 = $row['Place'];
        $t3 = $row['Country'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Location'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."' AND ".$pk2."='".$pid2."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $locTable = "SELECT * FROM Location";

    if($result = mysqli_query($db_conx, $locTable)){
      echo "<h2>Location Table</h2><table>";
      echo "<thead><tr><th>Place</th><th>Country</th><th>Description</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['Place'];
        $t2 = $row['Country'];
        $t3 = $row['Description'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Model'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."' AND ".$pk2."='".$pid2."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $modelTable = "SELECT * FROM Model";

    if($result = mysqli_query($db_conx, $modelTable)){
      echo "<h2>Model Table</h2><table>";
      echo "<thead><tr><th>MName</th><th>MBDate</th><th>MBio</th><th>MSex</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['MName'];
        $t2 = $row['MBDate'];
        $t3 = $row['MBio'];
        $t4 = $row['MSex'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td><td>".$t4."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Models'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."' AND ".$pk2."='".$pid2."' AND ".$pk3."='".$pid3."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $modelsTable = "SELECT * FROM Models";

    if($result = mysqli_query($db_conx, $modelsTable)){
      echo "<h2>Models Table</h2><table>";
      echo "<thead><tr><th>PhotoID</th><th>MName</th><th>MBDate</th><th>Agency</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['PhotoID'];
        $t2 = $row['MName'];
        $t3 = $row['MBDate'];
        $t4 = $row['Agency'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td><td>".$t4."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Photo'){
  if(!empty($t2)){
    $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."', ".$t2."='".$v2."' WHERE ".$pk1."='".$pid1."'";
  }
  else {
    $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."'";
  }
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $photoTable = "SELECT * FROM Photo";

    if($result = mysqli_query($db_conx, $photoTable)){
      echo "<h2>Photo Table</h2><table>";
      echo "<thead><tr><th>PhotoID</th><th>Speed</th><th>Film</th><th>FStop</th><th>Color</th><th>Resolution</th><th>Price</th><th>Date</th><th>TransID</th><th>PName</th><th>PBDate</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['PhotoID'];
        $t2 = $row['Speed'];
        $t3 = $row['Film'];
        $t4 = $row['FStop'];
        $t5 = $row['Color'];
        $t6 = $row['Resolution'];
        $t7 = $row['Price'];
        $t8 = $row['Date'];
        $t9 = $row['TransID'];
        $t10 = $row['PName'];
        $t11 = $row['PBDate'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td><td>".$t4."</td><td>".$t5."</td><td>".$t6."</td><td>".$t7."</td><td>".$t8."</td><td>".$t9."</td><td>".$t10."</td><td>".$t11."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Photographer'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."' AND ".$pk2."='".$pid2."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $pgTable = "SELECT * FROM Photographer";

    if($result = mysqli_query($db_conx, $pgTable)){
      echo "<h2>Photographer Table</h2><table>";
      echo "<thead><tr><th>PName</th><th>PBDate</th><th>PBio</th><th>PAddress</th><th>PNationality</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['PName'];
        $t2 = $row['PBDate'];
        $t3 = $row['PBio'];
        $t4 = $row['PAddress'];
        $t5 = $row['PNationality'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td><td>".$t4."</td><td>".$t5."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
elseif($tn == 'Transaction'){
  $tmp = "UPDATE ".$tn." SET ".$t1."='".$v1."' WHERE ".$pk1."='".$pid1."'";
   echo "<h3>".$tmp."</h3>";
  if($result = mysqli_query($db_conx, $tmp)){
    echo "<br>Update Successful";
    $transTable = "SELECT * FROM Transaction";

    if($result = mysqli_query($db_conx, $transTable)){
      echo "<h2>Transaction Table</h2><table>";
      echo "<thead><tr><th>TransID</th><th>TDate</th><th>CardNo</th><th>CardType</th><th>CardExpDate</th><th>TotalAmount</th><th>LoginName</th></tr></thead><tbody>";
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $t1 = $row['TransID'];
        $t2 = $row['TDate'];
        $t3 = $row['CardNo'];
        $t4 = $row['CardType'];
        $t5 = $row['CardExpDate'];
        $t6 = $row['TotalAmount'];
        $t7 = $row['LoginName'];
        echo "<tr><td>".$t1."</td><td>".$t2."</td><td>".$t3."</td><td>".$t4."</td><td>".$t5."</td><td>".$t6."</td><td>".$t7."</td></tr>";
      }
      echo "</tbody></table><hr/>";
    mysqli_free_result($result);
    }
  }

}
