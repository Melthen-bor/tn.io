<?php
$register=handle_input($_GET["register"]);
if($register=="yes"){
  $accounts = fopen("accounts.data","a");
  $ids = fopen("ids.data","a");
  $emails=fopen("emails.data","a");
  $passwords=fopen("passwords.data","a");
  $genders=fopen("genders.data","a");
  $tn=fopen("tn.data","a");
  $hc=fopen("hc.data","a");
  $default=fopen("default.data","r");
  $max=fgets($default);
  fclose($default);
  fwrite($accounts,handle_input($_GET["account"]));
  fwrite($ids,handle_input($max));
  fwrite($emails,handle_input($_GET["email"]));
  fwrite($passwords,handle_input($_GET["password"]));
  fwrite($genders,handle_input($_GET["gender"]));
  fwrite($tn,"no");
  fwrite($hc,"no");
  fclose($accounts);
  fclose($ids);
  fclose($emails);
  fclose($passwords);
  fclose($genders);
  fclose($tn);
  fclose($hc);
  $max++;
  $default=fopen("default.data","w");
  fwrite($default,$max);
} else{
  $accounts = fopen("accounts.data","r");
  $ids = fopen("ids.data","r");
  $emails=fopen("emails.data","r");
  $passwords=fopen("passwords.data","r");
  $genders=fopen("genders.data","r");
  $max=0;
  $check="";
  if($_GET["type"]=="tn"){
    $have=fopen("tn.data","r");
  } else{
    $have=fopen("hc.data","r");
  }
  while(!feof($accounts)){
    $check=fget($accounts);
    if($check==handle_input($_GET["account"])){
       break;
    }
    $max++;
  }
  fclose($accounts);
  $count=0;
  $passed=0;
  while($count<$max){
    $check=fget($ids);
    $count++;
    if($count==$max){
      if($check==handle_input($_GET["id"])){
        $passed=1;
      }
    }
  }
  fclose($ids);
  if($passed==0){
    fclose($emails);
    fclose($passwords);
    fclose($genders);
  } else{
    $count=0;
    $passed=0;
    while($count<$max){
      $check=fget($emails);
      $count++;
      if($count==$max){
        if($check==handle_input($_GET["email"])){
          $passed=1;
        }
      }
    }
    fclose($emails);
    if($passed==0){
      fclose($passwords);
      fclose($genders);
    } else{
      $count=0;
      $passed=0;
      while($count<$max){
        $check=fget($passwords);
        $count++;
        if($count==$max){
          if($check==handle_input($_GET["password"])){
            $passed=1;
          }
        }
      }
      fclose($passwords);
      if($passed==0){
        fclose($genders);
      } else{
        $count=0;
        $passed=0;
        while($count<$max){
          $check=fget($genders);
          $count++;
          if($count==$max){
            if($check==handle_input($_GET["gender"])){
              $passed=1;
            }
          }
        }
        fclose($gender);
        if($passed==1){
          
        }
      }
    }
  }
}
function handle_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>
