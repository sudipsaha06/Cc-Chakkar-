<?php
if (preg_match('/^(\/ip|\.ip|!ip)/', $text)) {


    $iplist = preg_replace("/[^0-9.]/", "",$message);
    if(empty($iplist)){
      sendMessage($chatId, 'Send IP address',$mes_id);
      exit();
    }
    $array = explode("\n", $iplist);
   

  $gip = file_get_contents('https://scamalytics.com/ip/'.$array[0].'');
      

  
  $msg = trim(strip_tags(getStr($gip,'   <div style="border-bottom: 1px solid #CCCCCC"><b>IP Fraud Risk API</b></div>
        <pre style="margin: 0; text-transform: lowercase;">','</pre>
        <div style="border-top: 1px solid #CCCCCC"><a href="/ip/api/pricing">Click here</a> for details of our <a href="/ip/api/pricing">free usage tier</a>, <a href="/ip/api/pricing">free trial</a>, and <a href="/ip/api/pricing">pricing information</a>.</div>')));

$score = trim(strip_tags(getStr($gip,'"ip":"'.$array[0].'",
  "score":"','",')));
  
  $risk = $country = trim(strip_tags(getStr($gip,'"ip":"'.$array[0].'",
  "score":"'.$score.'",
  "risk":"','"
}')));
  
$country = trim(strip_tags(getStr($gip,'   </tr>
        <tr>
            <th>Country Name</th>','   </tr>
        <tr>')));
  $isp = trim(strip_tags(getStr($gip,'   </tr>
        <tr>
            <th>ISP Name</th>','   </tr>
        <tr>')));

$message = "<b>
[火] 𝙄𝙋 𝙁𝙍𝘼𝙐𝘿𝙍𝙄𝙎𝙆 📡
━━━━━━━━━━━━━━
•├𝙄𝙋 : <code>$array[0]</code>
•├𝙎𝘾𝙊𝙍𝙀 : <code>$score</code>
•├𝙍𝙄𝙎𝙆 : <code>$risk</code>
•├𝙄𝙎𝙋 : <code>$isp</code>
•├𝘾𝙊𝙐𝙉𝙏𝙍𝙔 : <code>$country</code>

•├𝙍𝙀𝙌: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━━
•├𝘿𝙀𝙑: <code>@hackedworld69</code>
</b>";

$urlEncodedMessage = urlencode($message);

sendMessage($chatId, $urlEncodedMessage, $mes_id);
}
?>


