<style>
    #currates .boi_cb{ text-align: center; font-weight: bold; }
    .curcode a:hover{ font-style: italic; }
</style>
<?php
    $xml = simplexml_load_file("http://www.boi.org.il/currency.xml");
?>
<table id='currates' dir='rtl'>
    <thead>
        <th>מט''ח</th>
        <th>יחידות</th>
        <th>קוד מט''ח</th>
        <th>מדינה</th>
        <th>שער</th>
        <th>שער חלופין</th>
    </thead>
    <tbody>
        <?php
            foreach($xml->children() as $child)
              {
                switch($child->NAME){
                    case 'Dollar':  $child->NAME = 'דולר';
                        break;
                    case 'Pound':  $child->NAME = 'פאונד';
                        break;
                    case 'Yen':  $child->NAME = 'ין';
                        break;
                    case 'krone':  $child->NAME = 'קרונה';
                        break;
                    case 'Krone':  $child->NAME = 'קרונה';
                        break;
                    case 'Rand':  $child->NAME = 'ראנד';
                        break;
                    case 'Krona':  $child->NAME = 'קרונה';
                        break;
                    case 'Franc':  $child->NAME = 'פרנק';
                        break;
                    case 'Dinar':  $child->NAME = 'דינר';
                        break;
                    case 'Euro':  $child->NAME = 'יורו';
                        break;
                }
                switch($child->COUNTRY){
                    case 'USA':  $child->COUNTRY = "ארה''ב";
                        break;
                    case 'Great Britain':  $child->COUNTRY = 'בריטניה';
                        break;
                    case 'Japan':  $child->COUNTRY = 'יפן';
                        break;
                    case 'EMU':  $child->COUNTRY = 'איחוד האירופי';
                        break;
                    case 'Australia':  $child->COUNTRY = 'אוסטרליה';
                        break;
                    case 'Canada':  $child->COUNTRY = 'קנדה';
                        break;
                    case 'Norway':  $child->COUNTRY = 'נורבגיה';
                        break;
                    case 'South Africa':  $child->COUNTRY = 'דרום אפריקה';
                        break;
                    case 'Sweden':  $child->COUNTRY = 'שוודיה';
                        break;
                    case 'Switzerland':  $child->COUNTRY = 'שוויץ';
                        break;
                    case 'Jordan':  $child->COUNTRY = 'ירדן';
                        break;
                    case 'Lebanon':  $child->COUNTRY = 'לבנון';
                        break;
                    case 'Egypt':  $child->COUNTRY = 'מצרים';
                        break;
                    case 'Denmark':  $child->COUNTRY = 'דנמרק';
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $child->NAME; ?></td>
                    <td><?php echo $child->UNIT; ?></td>
                    <td class='curcode'>
                        <a href='javascript:void(0)'>
                            <?php echo $child->CURRENCYCODE; ?></td>
                        </a>
                    <td><?php echo $child->COUNTRY; ?></td>
                    <td id='<?php echo $child->CURRENCYCODE; ?>'><?php echo $child->RATE; ?></td>
                    <td class='curchange'><?php echo $child->CHANGE; ?></td>
                </tr>
              <?php
              }
        ?>
    <tr><td class='boi_cb' colspan=6><hr>תרחף\תקליק על קוד מט''ח כדי לעביר ממנו לש''ח<hr></td></tr>
    <tr>
        <td colspan=2><select id='selectcur'><option value=''>בחר מט''ח</option></select></td>
        <td colspan=2><input id='sumbox' name='sum' value=1 type='number'></td>
        <td class='boi_cb' colspan=2><label id='cursum' for=sum>לשקלים</label></td>
    </tr>
    </tbody>
</table>
<script src='<?php echo plugins_url(); ?>/boixml/calc.js'></script>