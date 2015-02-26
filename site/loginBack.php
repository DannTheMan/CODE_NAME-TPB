<?php require 'database.php'; ?>

<?php
function cleanNonAsciiCharactersInString($orig_text) {

    $text = $orig_text;

    // Single letters
    $text = preg_replace("/[∂άαáàâãªä]/u",      "a", $text);
    $text = preg_replace("/[∆лДΛдАÁÀÂÃÄ]/u",     "A", $text);
    $text = preg_replace("/[ЂЪЬБъь]/u",           "b", $text);
    $text = preg_replace("/[βвВ]/u",            "B", $text);
    $text = preg_replace("/[çς©с]/u",            "c", $text);
    $text = preg_replace("/[ÇС]/u",              "C", $text);        
    $text = preg_replace("/[δ]/u",             "d", $text);
    $text = preg_replace("/[éèêëέëèεе℮ёєэЭ]/u", "e", $text);
    $text = preg_replace("/[ÉÈÊË€ξЄ€Е∑]/u",     "E", $text);
    $text = preg_replace("/[₣]/u",               "F", $text);
    $text = preg_replace("/[НнЊњ]/u",           "H", $text);
    $text = preg_replace("/[ђћЋ]/u",            "h", $text);
    $text = preg_replace("/[ÍÌÎÏ]/u",           "I", $text);
    $text = preg_replace("/[íìîïιίϊі]/u",       "i", $text);
    $text = preg_replace("/[Јј]/u",             "j", $text);
    $text = preg_replace("/[ΚЌК]/u",            'K', $text);
    $text = preg_replace("/[ќк]/u",             'k', $text);
    $text = preg_replace("/[ℓ∟]/u",             'l', $text);
    $text = preg_replace("/[Мм]/u",             "M", $text);
    $text = preg_replace("/[ñηήηπⁿ]/u",            "n", $text);
    $text = preg_replace("/[Ñ∏пПИЙийΝЛ]/u",       "N", $text);
    $text = preg_replace("/[óòôõºöοФσόо]/u", "o", $text);
    $text = preg_replace("/[ÓÒÔÕÖθΩθОΩ]/u",     "O", $text);
    $text = preg_replace("/[ρφрРф]/u",          "p", $text);
    $text = preg_replace("/[®яЯ]/u",              "R", $text); 
    $text = preg_replace("/[ГЃгѓ]/u",              "r", $text); 
    $text = preg_replace("/[Ѕ]/u",              "S", $text);
    $text = preg_replace("/[ѕ]/u",              "s", $text);
    $text = preg_replace("/[Тт]/u",              "T", $text);
    $text = preg_replace("/[τ†‡]/u",              "t", $text);
    $text = preg_replace("/[úùûüџμΰµυϋύ]/u",     "u", $text);
    $text = preg_replace("/[√]/u",               "v", $text);
    $text = preg_replace("/[ÚÙÛÜЏЦц]/u",         "U", $text);
    $text = preg_replace("/[Ψψωώẅẃẁщш]/u",      "w", $text);
    $text = preg_replace("/[ẀẄẂШЩ]/u",          "W", $text);
    $text = preg_replace("/[ΧχЖХж]/u",          "x", $text);
    $text = preg_replace("/[ỲΫ¥]/u",           "Y", $text);
    $text = preg_replace("/[ỳγўЎУуч]/u",       "y", $text);
    $text = preg_replace("/[ζ]/u",              "Z", $text);

    // Punctuation
    $text = preg_replace("/[‚‚]/u", ",", $text);        
    $text = preg_replace("/[`‛′’‘]/u", "'", $text);
    $text = preg_replace("/[″“”«»„]/u", '"', $text);
    $text = preg_replace("/[—–―−–‾⌐─↔→←]/u", '-', $text);
    $text = preg_replace("/[  ]/u", ' ', $text);

    $text = str_replace("…", "...", $text);
    $text = str_replace("≠", "!=", $text);
    $text = str_replace("≤", "<=", $text);
    $text = str_replace("≥", ">=", $text);
    $text = preg_replace("/[‗≈≡]/u", "=", $text);
    $text = str_replace("ыЫ", "bl", $text);
    $text = str_replace("℅", "c/o", $text);
    $text = str_replace("₧", "Pts", $text);
    $text = str_replace("™", "tm", $text);
    $text = str_replace("№", "No", $text);        
    $text = str_replace("Ч", "4", $text);                
    $text = str_replace("‰", "%", $text);
    $text = preg_replace("/[∙•]/u", "*", $text);
    $text = str_replace("‹", "<", $text);
    $text = str_replace("›", ">", $text);
    $text = str_replace("‼", "!!", $text);
    $text = str_replace("⁄", "/", $text);
    $text = str_replace("∕", "/", $text);
    $text = str_replace("⅞", "7/8", $text);
    $text = str_replace("⅝", "5/8", $text);
    $text = str_replace("⅜", "3/8", $text);
    $text = str_replace("⅛", "1/8", $text);        
    $text = preg_replace("/[‰]/u", "%", $text);
    $text = preg_replace("/[Љљ]/u", "Ab", $text);
    $text = preg_replace("/[Юю]/u", "IO", $text);
    $text = preg_replace("/[ﬁﬂ]/u", "fi", $text);
    $text = preg_replace("/[зЗ]/u", "3", $text); 
    $text = str_replace("£", "(pounds)", $text);
    $text = str_replace("₤", "(lira)", $text);
    $text = preg_replace("/[‰]/u", "%", $text);
    $text = preg_replace("/[↨↕↓↑│]/u", "|", $text);
    $text = preg_replace("/[∞∩∫⌂⌠⌡]/u", "", $text);


    //2) Translation CP1252.
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans['f'] = '&fnof;';    // Latin Small Letter F With Hook
    $trans['-'] = array(
        '&hellip;',     // Horizontal Ellipsis
        '&tilde;',      // Small Tilde
        '&ndash;'       // Dash
        );
    $trans["+"] = '&dagger;';    // Dagger
    $trans['#'] = '&Dagger;';    // Double Dagger         
    $trans['M'] = '&permil;';    // Per Mille Sign
    $trans['S'] = '&Scaron;';    // Latin Capital Letter S With Caron        
    $trans['OE'] = '&OElig;';    // Latin Capital Ligature OE
    $trans["'"] = array(
        '&lsquo;',  // Left Single Quotation Mark
        '&rsquo;',  // Right Single Quotation Mark
        '&rsaquo;', // Single Right-Pointing Angle Quotation Mark
        '&sbquo;',  // Single Low-9 Quotation Mark
        '&circ;',   // Modifier Letter Circumflex Accent
        '&lsaquo;'  // Single Left-Pointing Angle Quotation Mark
        );

    $trans['"'] = array(
        '&ldquo;',  // Left Double Quotation Mark
        '&rdquo;',  // Right Double Quotation Mark
        '&bdquo;',  // Double Low-9 Quotation Mark
        );

    $trans['*'] = '&bull;';    // Bullet
    $trans['n'] = '&ndash;';    // En Dash
    $trans['m'] = '&mdash;';    // Em Dash        
    $trans['tm'] = '&trade;';    // Trade Mark Sign
    $trans['s'] = '&scaron;';    // Latin Small Letter S With Caron
    $trans['oe'] = '&oelig;';    // Latin Small Ligature OE
    $trans['Y'] = '&Yuml;';    // Latin Capital Letter Y With Diaeresis
    $trans['euro'] = '&euro;';    // euro currency symbol
    ksort($trans);

    foreach ($trans as $k => $v) {
        $text = str_replace($v, $k, $text);
    }

    // 3) remove <p>, <br/> ...
    $text = strip_tags($text);

    // 4) &amp; => & &quot; => '
    $text = html_entity_decode($text);    

    return $text;
}

?>

<?php
unset($_COOKIE[crypt("username","askdalkweasdaaowej312sa9")]);
//$ss = crypt(htmlspecialchars($_POST["secure"]), "1241asda0");
//$ss = $string = preg_replace( '/[^[:print:]]/', '',$ss);
$key = 'holyhell24601359';
$string = htmlspecialchars($_POST["secure"]);//'string to be encrypted';

$ss = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
//$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
//$ss = htmlspecialchars($_POST["secure"]);
$uname = htmlspecialchars($_POST["username"]);

$sql = "SELECT hash, username FROM users WHERE username='$uname'";
$sid = $pdo->prepare($sql);
$sid->execute();
$name = "";
$ans = false;
if ($sid->rowCount() == 0) {
    echo('false');
} else {
    while ($found = $sid->fetch()) {
        $f0 = cleanNonAsciiCharactersInString($found[0]);//'/[^[:print:]]/', '',$found[0]);
        if(strcmp($f0,$ss)==0){$ans = true;
        $name = $found[1];}
        //echo("    :  ".strcmp($f0,$ss)." : ".$ss."  :  ".$f0);
    }

    if ($ans) {$cookie_name = crypt("username","askdalkweasdaaowej312sa9");
        $cookie_value = $name;
        $days = 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * $days), "/");
        // 86400 = 1 day
    }

    if ($ans) {
        echo('true');
    } else
        echo('false');
}
?>