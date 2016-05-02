<?php

function nssb_init() {

  if (!is_admin()) {
    wp_enqueue_script('nssb_js', plugins_url('/js/nssb.js',__FILE__), array( 'jquery','jquery-ui-datepicker' ) );
    wp_localize_script( 'nssb_js', 'ajax_object',
            array( 'ajax_url' => NSSB_AJAX, 'doc_root' => ABSPATH ) );


    wp_enqueue_style('nssb_css', plugins_url('/css/nssb.css',__FILE__));
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

    
    wp_enqueue_style('ns-form-style-base', 'http://yui.yahooapis.com/pure/0.6.0/base-min.css');
    wp_enqueue_style('ns-form-style-resgrid', 'http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css');
    wp_enqueue_style('ns-form-style-forms', 'http://yui.yahooapis.com/pure/0.6.0/forms-min.css');
    wp_enqueue_style('ns-form-style-tables', 'http://yui.yahooapis.com/pure/0.6.0/tables-min.css');

    


  }

}

function nssb_head() {
  
}

function nssb_front_content($content) {

  if(is_page($page="book-now")){

        $plugin_content = '
        <script>
          jQuery(document).ready(function() {
              jQuery(".datepick").datepicker({
                  dateFormat : "dd-mm-yy"
              });

            jQuery("#withreturn").change(function(){
                if(this.checked){
                    jQuery("#return_date_wrapper").css("visibility","visible");
                }else{
                    jQuery("#return_date_wrapper").css("visibility","hidden");
                }
            });

          });

        

        </script>



      <form class="pure-form pure-form-stacked" id="train_search_form">
          <fieldset>
              <legend style="font-size:40px;">Search Trains</legend>

              <div class="pure-g">
                  <div class="pure-u-1 pure-u-md-1-3">
                      <label for="from">Journey From</label>
                      <select name="from" id="from" class="pure-input-1-2">
                         <option value="- SELECT -" selected="selected">- SELECT -</option><option value="ABANPOLA">ABANPOLA</option><option value="AGPOPURA">AGPOPURA</option><option value="AHANGAMA">AHANGAMA</option><option value="AKURALA">AKURALA</option><option value="ALAWWA">ALAWWA</option><option value="ALAWWATUPIYIYA">ALAWWATUPIYIYA</option><option value="ALUTHGAMA">ALUTHGAMA</option><option value="AMBALANGODA">AMBALANGODA</option><option value="AMBEPUSSA">AMBEPUSSA</option><option value="AMBEWELA">AMBEWELA</option><option value="ANAVILUNDAWA">ANAVILUNDAWA</option><option value="ANGULANA">ANGULANA</option><option value="ANU.NEW TOWN">ANU.NEW TOWN</option><option value="ANURAPURA">ANURAPURA</option><option value="ARACHIKATTUWA">ARACHIKATTUWA</option><option value="AUNGALLA">AUNGALLA</option><option value="AVISSAWELLA">AVISSAWELLA</option><option value="AWUKANA">AWUKANA</option><option value="BADULLA">BADULLA</option><option value="BALANA">BALANA</option><option value="BALAPITIYA">BALAPITIYA</option><option value="BAMBALAPITIYA">BAMBALAPITIYA</option><option value="BANDARAWELA">BANDARAWELA</option><option value="BANGADENIYA">BANGADENIYA</option><option value="BASE LINE">BASE LINE</option><option value="BATICALOA">BATICALOA</option><option value="BATTULUOYA">BATTULUOYA</option><option value="BATUWATTA">BATUWATTA</option><option value="BEMMULLA">BEMMULLA</option><option value="BENTOTA">BENTOTA</option><option value="BERUWALA">BERUWALA</option><option value="BOLAWATTA">BOLAWATTA</option><option value="BOOSHA">BOOSHA</option><option value="BORALESSA">BORALESSA</option><option value="BOTALE">BOTALE</option><option value="BUJJOMUWA">BUJJOMUWA</option><option value="BULUGAHAGODA">BULUGAHAGODA</option><option value="CHILAW">CHILAW</option><option value="CHINA BAY">CHINA BAY</option><option value="COTTA ROAD">COTTA ROAD</option><option value="DARALUWA">DARALUWA</option><option value="DEHIWAL">DEHIWAL</option><option value="DEMATAGODA">DEMATAGODA</option><option value="DEMODARA">DEMODARA</option><option value="DEVAPURAM">DEVAPURAM</option><option value="DIYATALAWA">DIYATALAWA</option><option value="DODANDUWA">DODANDUWA</option><option value="EGODA UYANA">EGODA UYANA</option><option value="ELLA">ELLA</option><option value="ENDERAMULLA">ENDERAMULLA</option><option value="ERATTAPRIYAKULAM">ERATTAPRIYAKULAM</option><option value="ERAVUR">ERAVUR</option><option value="FORT">FORT</option><option value="GAL OYA">GAL OYA</option><option value="GALABADA">GALABADA</option><option value="GALGAMUWA">GALGAMUWA</option><option value="GALLE">GALLE</option><option value="GALLELLA">GALLELLA</option><option value="GAMPAHA">GAMPAHA</option><option value="GAMPOLA">GAMPOLA</option><option value="GANEGODA">GANEGODA</option><option value="GANEMULLA">GANEMULLA</option><option value="GANEWATTA">GANEWATTA</option><option value="GANGODA">GANGODA</option><option value="GELIOYA">GELIOYA</option><option value="GINTOTATA">GINTOTATA</option><option value="GIRAMBE">GIRAMBE</option><option value="GODAGAMA">GODAGAMA</option><option value="GREAT WESTERN">GREAT WESTERN</option><option value="HABARADUWA">HABARADUWA</option><option value="HABARANA">HABARANA</option><option value="HALI ELA">HALI ELA</option><option value="HAPUTALE">HAPUTALE</option><option value="HATARESKOTUWA">HATARESKOTUWA</option><option value="HATTON">HATTON</option><option value="HEEL OYA">HEEL OYA</option><option value="HENDENIYAP GODA">HENDENIYAP GODA</option><option value="HETTIMULLA">HETTIMULLA</option><option value="HIKKADUWA">HIKKADUWA</option><option value="HINRAKGODA">HINRAKGODA</option><option value="HIRIYALA">HIRIYALA</option><option value="HOMA HOS ROAD">HOMA HOS ROAD</option><option value="HOMAGAMA">HOMAGAMA</option><option value="HORAPE">HORAPE</option><option value="HORIWILA">HORIWILA</option><option value="HUNUPITIYA">HUNUPITIYA</option><option value="IDAL GASHINNA">IDAL GASHINNA</option><option value="IHALA WATAWALA">IHALA WATAWALA</option><option value="IHALAKOTTE">IHALAKOTTE</option><option value="INDURUWA">INDURUWA</option><option value="INGURUOYA">INGURUOYA</option><option value="JA ELA">JA ELA</option><option value="JAYANTIPURAM">JAYANTIPURAM</option><option value="KADADASI NAGAR">KADADASI NAGAR</option><option value="KADIGAMUWA">KADIGAMUWA</option><option value="KADUGANNAWA">KADUGANNAWA</option><option value="KAHAWE">KAHAWE</option><option value="KAKKAPALLIA">KAKKAPALLIA</option><option value="KALAWEWA">KALAWEWA</option><option value="KALKUDAH">KALKUDAH</option><option value="KALU NORTH">KALU NORTH</option><option value="KALU SOUTH">KALU SOUTH</option><option value="KAMBURUGGAMUWA">KAMBURUGGAMUWA</option><option value="KANDANA">KANDANA</option><option value="KANDEGODA">KANDEGODA</option><option value="KANDY">KANDY</option><option value="KANTALE">KANTALE</option><option value="KAPUWATTA">KAPUWATTA</option><option value="KATALUWA">KATALUWA</option><option value="KATTUWA">KATTUWA</option><option value="KATUGASTOOTA">KATUGASTOOTA</option><option value="KATUGODA">KATUGODA</option><option value="KATUKURURNDA">KATUKURURNDA</option><option value="KATUNAYAKA">KATUNAYAKA</option><option value="KEENAWALA">KEENAWALA</option><option value="KEKIRAWA">KEKIRAWA</option><option value="KELANIYA">KELANIYA</option><option value="KINIGAMA">KINIGAMA</option><option value="KIRULPONE">KIRULPONE</option><option value="KITAL ELLA">KITAL ELLA</option><option value="KOGGALA">KOGGALA</option><option value="KOICHCHIKADE">KOICHCHIKADE</option><option value="KOLPETTI">KOLPETTI</option><option value="KOMPANNAVIDIYA">KOMPANNAVIDIYA</option><option value="KON WEWA">KON WEWA</option><option value="KORALAWEELA">KORALAWEELA</option><option value="KOSGAMA">KOSGAMA</option><option value="KOSGODA">KOSGODA</option><option value="KOSHINNA">KOSHINNA</option><option value="KOTAGALA">KOTAGALA</option><option value="KOTTAWA">KOTTAWA</option><option value="KUDAHAKAPALA">KUDAHAKAPALA</option><option value="KUDAWEW">KUDAWEW</option><option value="KUMARAKANDA">KUMARAKANDA</option><option value="KUMBALGAMA">KUMBALGAMA</option><option value="KURANA">KURANA</option><option value="KURUNEGALA">KURUNEGALA</option><option value="LAKSHA UYANA">LAKSHA UYANA</option><option value="LIYAAGE MULLA">LIYAAGE MULLA</option><option value="LUNAWA">LUNAWA</option><option value="LUNUWILA">LUNUWILA</option><option value="MADAMPAGAMA">MADAMPAGAMA</option><option value="MADAMPPE">MADAMPPE</option><option value="MADURANKULIYA">MADURANKULIYA</option><option value="MAGALEGODA">MAGALEGODA</option><option value="MAGGONA">MAGGONA</option><option value="MAHA INDURUWA">MAHA INDURUWA</option><option value="MAHARAGAMA">MAHARAGAMA</option><option value="MAHAYYAWA">MAHAYYAWA</option><option value="MAHO">MAHO</option><option value="MALAPALLA">MALAPALLA</option><option value="MANAMPITIYA">MANAMPITIYA</option><option value="MANGALAELIYA">MANGALAELIYA</option><option value="MANUWANGAMA">MANUWANGAMA</option><option value="MARADANA">MARADANA</option><option value="MATALE">MATALE</option><option value="MATARA">MATARA</option><option value="MEDAGAMA">MEDAGAMA</option><option value="MEDAVACHCHI">MEDAVACHCHI</option><option value="MEEGODA">MEEGODA</option><option value="MIDIGAMA">MIDIGAMA</option><option value="MIHIN JUNCTION">MIHIN JUNCTION</option><option value="MINNERIYA">MINNERIYA</option><option value="MIRIGAMA">MIRIGAMA</option><option value="MIRISSA">MIRISSA</option><option value="MOLLIPOTANA">MOLLIPOTANA</option><option value="MORAGOLLAGAMA">MORAGOLLAGAMA</option><option value="MORATUWA">MORATUWA</option><option value="MOUNT LAVINIA">MOUNT LAVINIA</option><option value="MUNDAL">MUNDAL</option><option value="MUTTUGALA">MUTTUGALA</option><option value="NAGOLLAGAMA">NAGOLLAGAMA</option><option value="NAILIYA">NAILIYA</option><option value="NANU OYA">NANU OYA</option><option value="NARAHENPITA">NARAHENPITA</option><option value="NATHTHANDIYA">NATHTHANDIYA</option><option value="NAVALAPITIYA">NAVALAPITIYA</option><option value="NAWINNA">NAWINNA</option><option value="NEEGAMA">NEEGAMA</option><option value="NEGOMBO">NEGOMBO</option><option value="NELUMPOKUNA">NELUMPOKUNA</option><option value="NUGEGODA">NUGEGODA</option><option value="OHIYA">OHIYA</option><option value="PADUKKA">PADUKKA</option><option value="PALAVI">PALAVI</option><option value="PALLEWELA">PALLEWELA</option><option value="PALUGASWEWA">PALUGASWEWA</option><option value="PANADURA">PANADURA</option><option value="PANAGODA">PANAGODA</option><option value="PANALIYA">PANALIYA</option><option value="PANNIPITIYA">PANNIPITIYA</option><option value="PARAKUMPURA">PARAKUMPURA</option><option value="PARASANGAHWEWA">PARASANGAHWEWA</option><option value="PATANPAHA">PATANPAHA</option><option value="PATEGAMGODA">PATEGAMGODA</option><option value="PATTIPOA">PATTIPOA</option><option value="PAYA NORTH">PAYA NORTH</option><option value="PAYA SOUTH">PAYA SOUTH</option><option value="PERADENIA">PERADENIA</option><option value="PERALANDA">PERALANDA</option><option value="PERKUM UYANA">PERKUM UYANA</option><option value="PILADUWA">PILADUWA</option><option value="PILIMATALAWA">PILIMATALAWA</option><option value="PINNAWALA">PINNAWALA</option><option value="PINWATTA">PINWATTA</option><option value="PIYADIGAMA">PIYADIGAMA</option><option value="PIYAGAMA">PIYAGAMA</option><option value="POLATHU MODAERA">POLATHU MODAERA</option><option value="POLGAHGAWELA">POLGAHGAWELA</option><option value="POLONNARUWA">POLONNARUWA</option><option value="POONANI">POONANI</option><option value="POONEWA">POONEWA</option><option value="POTUHERA">POTUHERA</option><option value="PULICHCHAKULAMA">PULICHCHAKULAMA</option><option value="PUTTALAM">PUTTALAM</option><option value="PUWAKPITIYA">PUWAKPITIYA</option><option value="RADELLA">RADELLA</option><option value="RAGAMA">RAGAMA</option><option value="RAMBUKKANA">RAMBUKKANA</option><option value="RANAMUKGAMA">RANAMUKGAMA</option><option value="RANDENIGAMA">RANDENIGAMA</option><option value="RATGAMA">RATGAMA</option><option value="RATMALANA">RATMALANA</option><option value="RICHMAND HILL">RICHMAND HILL</option><option value="ROZELLA">ROZELLA</option><option value="SALIYAPURA">SALIYAPURA</option><option value="SARASAVI UYANA">SARASAVI UYANA</option><option value="SAWARANA">SAWARANA</option><option value="SECARATARIAT HOALT">SECARATARIAT HOALT</option><option value="SEEDUWA">SEEDUWA</option><option value="SEENIGAMA">SEENIGAMA</option><option value="SENARATHGAMA">SENARATHGAMA</option><option value="SIYABALANGAMUWA">SIYABALANGAMUWA</option><option value="SRIWASTIPURA">SRIWASTIPURA</option><option value="TALAWA">TALAWA</option><option value="TALAWAKELE">TALAWAKELE</option><option value="TALAWATTEGEDARA">TALAWATTEGEDARA</option><option value="TALPE">TALPE</option><option value="TAMBILIGALA">TAMBILIGALA</option><option value="TAMBUTTEGAMA">TAMBUTTEGAMA</option><option value="TANBALAGAMUWA">TANBALAGAMUWA</option><option value="TELWATTA">TELWATTA</option><option value="TILADIYA">TILADIYA</option><option value="TIMBIRIYAGEDARA">TIMBIRIYAGEDARA</option><option value="TISMALPOLA">TISMALPOLA</option><option value="TRAIN HOLT">TRAIN HOLT</option><option value="TRINCO">TRINCO</option><option value="TUDEELLA">TUDEELLA</option><option value="TUMMODARA">TUMMODARA</option><option value="UDAHAMULLA">UDAHAMULLA</option><option value="UDATALAWINNA">UDATALAWINNA</option><option value="UDATTAWELA">UDATTAWELA</option><option value="UDUWARA">UDUWARA</option><option value="UKUWELA">UKUWELA</option><option value="ULAPANE">ULAPANE</option><option value="UNAWATUNA">UNAWATUNA</option><option value="VALACHCHENNAI">VALACHCHENNAI</option><option value="VAUNIA">VAUNIA</option><option value="VEYANGODA">VEYANGODA</option><option value="WADDUWA">WADDUWA</option><option value="WAGGA">WAGGA</option><option value="WAIKKALA">WAIKKALA</option><option value="WALAHAPITIYA">WALAHAPITIYA</option><option value="WALAKUMBURA">WALAKUMBURA</option><option value="WALGAMA">WALGAMA</option><option value="WALPOLA">WALPOLA</option><option value="WANAWASALA">WANAWASALA</option><option value="WANDURAWA">WANDURAWA</option><option value="WATAGODA">WATAGODA</option><option value="WATAREKA PLATFORM">WATAREKA PLATFORM</option><option value="WATAWALA">WATAWALA</option><option value="WATTEGAMA">WATTEGAMA</option><option value="WELIGAMA">WELIGAMA</option><option value="WELIKANDA">WELIKANDA</option><option value="WELLAWA">WELLAWA</option><option value="WELLAWATTA">WELLAWATTA</option><option value="WIJAYARAJADAHANA">WIJAYARAJADAHANA</option><option value="WILWATTA">WILWATTA</option><option value="YAGODA">YAGODA</option><option value="YATAGAMA">YATAGAMA</option><option value="YATHTHALGODA">YATHTHALGODA</option>            
                      </select>
                  </div>

                  <div class="pure-u-1 pure-u-md-1-3">
                      <label for="date">Departure Date</label>
                      <input id="date" name="date" class="pure-u-23-24 datepick" type="text" required>
                  </div>

                  <div class="pure-u-1 pure-u-md-1-3">
                      <label for="to">Journey To</label>
                      <select name="to" id="to" class="pure-input-1-2">
                         <option value="- SELECT -" selected="selected">- SELECT -</option><option value="ABANPOLA">ABANPOLA</option><option value="AGPOPURA">AGPOPURA</option><option value="AHANGAMA">AHANGAMA</option><option value="AKURALA">AKURALA</option><option value="ALAWWA">ALAWWA</option><option value="ALAWWATUPIYIYA">ALAWWATUPIYIYA</option><option value="ALUTHGAMA">ALUTHGAMA</option><option value="AMBALANGODA">AMBALANGODA</option><option value="AMBEPUSSA">AMBEPUSSA</option><option value="AMBEWELA">AMBEWELA</option><option value="ANAVILUNDAWA">ANAVILUNDAWA</option><option value="ANGULANA">ANGULANA</option><option value="ANU.NEW TOWN">ANU.NEW TOWN</option><option value="ANURAPURA">ANURAPURA</option><option value="ARACHIKATTUWA">ARACHIKATTUWA</option><option value="AUNGALLA">AUNGALLA</option><option value="AVISSAWELLA">AVISSAWELLA</option><option value="AWUKANA">AWUKANA</option><option value="BADULLA">BADULLA</option><option value="BALANA">BALANA</option><option value="BALAPITIYA">BALAPITIYA</option><option value="BAMBALAPITIYA">BAMBALAPITIYA</option><option value="BANDARAWELA">BANDARAWELA</option><option value="BANGADENIYA">BANGADENIYA</option><option value="BASE LINE">BASE LINE</option><option value="BATICALOA">BATICALOA</option><option value="BATTULUOYA">BATTULUOYA</option><option value="BATUWATTA">BATUWATTA</option><option value="BEMMULLA">BEMMULLA</option><option value="BENTOTA">BENTOTA</option><option value="BERUWALA">BERUWALA</option><option value="BOLAWATTA">BOLAWATTA</option><option value="BOOSHA">BOOSHA</option><option value="BORALESSA">BORALESSA</option><option value="BOTALE">BOTALE</option><option value="BUJJOMUWA">BUJJOMUWA</option><option value="BULUGAHAGODA">BULUGAHAGODA</option><option value="CHILAW">CHILAW</option><option value="CHINA BAY">CHINA BAY</option><option value="COTTA ROAD">COTTA ROAD</option><option value="DARALUWA">DARALUWA</option><option value="DEHIWAL">DEHIWAL</option><option value="DEMATAGODA">DEMATAGODA</option><option value="DEMODARA">DEMODARA</option><option value="DEVAPURAM">DEVAPURAM</option><option value="DIYATALAWA">DIYATALAWA</option><option value="DODANDUWA">DODANDUWA</option><option value="EGODA UYANA">EGODA UYANA</option><option value="ELLA">ELLA</option><option value="ENDERAMULLA">ENDERAMULLA</option><option value="ERATTAPRIYAKULAM">ERATTAPRIYAKULAM</option><option value="ERAVUR">ERAVUR</option><option value="FORT">FORT</option><option value="GAL OYA">GAL OYA</option><option value="GALABADA">GALABADA</option><option value="GALGAMUWA">GALGAMUWA</option><option value="GALLE">GALLE</option><option value="GALLELLA">GALLELLA</option><option value="GAMPAHA">GAMPAHA</option><option value="GAMPOLA">GAMPOLA</option><option value="GANEGODA">GANEGODA</option><option value="GANEMULLA">GANEMULLA</option><option value="GANEWATTA">GANEWATTA</option><option value="GANGODA">GANGODA</option><option value="GELIOYA">GELIOYA</option><option value="GINTOTATA">GINTOTATA</option><option value="GIRAMBE">GIRAMBE</option><option value="GODAGAMA">GODAGAMA</option><option value="GREAT WESTERN">GREAT WESTERN</option><option value="HABARADUWA">HABARADUWA</option><option value="HABARANA">HABARANA</option><option value="HALI ELA">HALI ELA</option><option value="HAPUTALE">HAPUTALE</option><option value="HATARESKOTUWA">HATARESKOTUWA</option><option value="HATTON">HATTON</option><option value="HEEL OYA">HEEL OYA</option><option value="HENDENIYAP GODA">HENDENIYAP GODA</option><option value="HETTIMULLA">HETTIMULLA</option><option value="HIKKADUWA">HIKKADUWA</option><option value="HINRAKGODA">HINRAKGODA</option><option value="HIRIYALA">HIRIYALA</option><option value="HOMA HOS ROAD">HOMA HOS ROAD</option><option value="HOMAGAMA">HOMAGAMA</option><option value="HORAPE">HORAPE</option><option value="HORIWILA">HORIWILA</option><option value="HUNUPITIYA">HUNUPITIYA</option><option value="IDAL GASHINNA">IDAL GASHINNA</option><option value="IHALA WATAWALA">IHALA WATAWALA</option><option value="IHALAKOTTE">IHALAKOTTE</option><option value="INDURUWA">INDURUWA</option><option value="INGURUOYA">INGURUOYA</option><option value="JA ELA">JA ELA</option><option value="JAYANTIPURAM">JAYANTIPURAM</option><option value="KADADASI NAGAR">KADADASI NAGAR</option><option value="KADIGAMUWA">KADIGAMUWA</option><option value="KADUGANNAWA">KADUGANNAWA</option><option value="KAHAWE">KAHAWE</option><option value="KAKKAPALLIA">KAKKAPALLIA</option><option value="KALAWEWA">KALAWEWA</option><option value="KALKUDAH">KALKUDAH</option><option value="KALU NORTH">KALU NORTH</option><option value="KALU SOUTH">KALU SOUTH</option><option value="KAMBURUGGAMUWA">KAMBURUGGAMUWA</option><option value="KANDANA">KANDANA</option><option value="KANDEGODA">KANDEGODA</option><option value="KANDY">KANDY</option><option value="KANTALE">KANTALE</option><option value="KAPUWATTA">KAPUWATTA</option><option value="KATALUWA">KATALUWA</option><option value="KATTUWA">KATTUWA</option><option value="KATUGASTOOTA">KATUGASTOOTA</option><option value="KATUGODA">KATUGODA</option><option value="KATUKURURNDA">KATUKURURNDA</option><option value="KATUNAYAKA">KATUNAYAKA</option><option value="KEENAWALA">KEENAWALA</option><option value="KEKIRAWA">KEKIRAWA</option><option value="KELANIYA">KELANIYA</option><option value="KINIGAMA">KINIGAMA</option><option value="KIRULPONE">KIRULPONE</option><option value="KITAL ELLA">KITAL ELLA</option><option value="KOGGALA">KOGGALA</option><option value="KOICHCHIKADE">KOICHCHIKADE</option><option value="KOLPETTI">KOLPETTI</option><option value="KOMPANNAVIDIYA">KOMPANNAVIDIYA</option><option value="KON WEWA">KON WEWA</option><option value="KORALAWEELA">KORALAWEELA</option><option value="KOSGAMA">KOSGAMA</option><option value="KOSGODA">KOSGODA</option><option value="KOSHINNA">KOSHINNA</option><option value="KOTAGALA">KOTAGALA</option><option value="KOTTAWA">KOTTAWA</option><option value="KUDAHAKAPALA">KUDAHAKAPALA</option><option value="KUDAWEW">KUDAWEW</option><option value="KUMARAKANDA">KUMARAKANDA</option><option value="KUMBALGAMA">KUMBALGAMA</option><option value="KURANA">KURANA</option><option value="KURUNEGALA">KURUNEGALA</option><option value="LAKSHA UYANA">LAKSHA UYANA</option><option value="LIYAAGE MULLA">LIYAAGE MULLA</option><option value="LUNAWA">LUNAWA</option><option value="LUNUWILA">LUNUWILA</option><option value="MADAMPAGAMA">MADAMPAGAMA</option><option value="MADAMPPE">MADAMPPE</option><option value="MADURANKULIYA">MADURANKULIYA</option><option value="MAGALEGODA">MAGALEGODA</option><option value="MAGGONA">MAGGONA</option><option value="MAHA INDURUWA">MAHA INDURUWA</option><option value="MAHARAGAMA">MAHARAGAMA</option><option value="MAHAYYAWA">MAHAYYAWA</option><option value="MAHO">MAHO</option><option value="MALAPALLA">MALAPALLA</option><option value="MANAMPITIYA">MANAMPITIYA</option><option value="MANGALAELIYA">MANGALAELIYA</option><option value="MANUWANGAMA">MANUWANGAMA</option><option value="MARADANA">MARADANA</option><option value="MATALE">MATALE</option><option value="MATARA">MATARA</option><option value="MEDAGAMA">MEDAGAMA</option><option value="MEDAVACHCHI">MEDAVACHCHI</option><option value="MEEGODA">MEEGODA</option><option value="MIDIGAMA">MIDIGAMA</option><option value="MIHIN JUNCTION">MIHIN JUNCTION</option><option value="MINNERIYA">MINNERIYA</option><option value="MIRIGAMA">MIRIGAMA</option><option value="MIRISSA">MIRISSA</option><option value="MOLLIPOTANA">MOLLIPOTANA</option><option value="MORAGOLLAGAMA">MORAGOLLAGAMA</option><option value="MORATUWA">MORATUWA</option><option value="MOUNT LAVINIA">MOUNT LAVINIA</option><option value="MUNDAL">MUNDAL</option><option value="MUTTUGALA">MUTTUGALA</option><option value="NAGOLLAGAMA">NAGOLLAGAMA</option><option value="NAILIYA">NAILIYA</option><option value="NANU OYA">NANU OYA</option><option value="NARAHENPITA">NARAHENPITA</option><option value="NATHTHANDIYA">NATHTHANDIYA</option><option value="NAVALAPITIYA">NAVALAPITIYA</option><option value="NAWINNA">NAWINNA</option><option value="NEEGAMA">NEEGAMA</option><option value="NEGOMBO">NEGOMBO</option><option value="NELUMPOKUNA">NELUMPOKUNA</option><option value="NUGEGODA">NUGEGODA</option><option value="OHIYA">OHIYA</option><option value="PADUKKA">PADUKKA</option><option value="PALAVI">PALAVI</option><option value="PALLEWELA">PALLEWELA</option><option value="PALUGASWEWA">PALUGASWEWA</option><option value="PANADURA">PANADURA</option><option value="PANAGODA">PANAGODA</option><option value="PANALIYA">PANALIYA</option><option value="PANNIPITIYA">PANNIPITIYA</option><option value="PARAKUMPURA">PARAKUMPURA</option><option value="PARASANGAHWEWA">PARASANGAHWEWA</option><option value="PATANPAHA">PATANPAHA</option><option value="PATEGAMGODA">PATEGAMGODA</option><option value="PATTIPOA">PATTIPOA</option><option value="PAYA NORTH">PAYA NORTH</option><option value="PAYA SOUTH">PAYA SOUTH</option><option value="PERADENIA">PERADENIA</option><option value="PERALANDA">PERALANDA</option><option value="PERKUM UYANA">PERKUM UYANA</option><option value="PILADUWA">PILADUWA</option><option value="PILIMATALAWA">PILIMATALAWA</option><option value="PINNAWALA">PINNAWALA</option><option value="PINWATTA">PINWATTA</option><option value="PIYADIGAMA">PIYADIGAMA</option><option value="PIYAGAMA">PIYAGAMA</option><option value="POLATHU MODAERA">POLATHU MODAERA</option><option value="POLGAHGAWELA">POLGAHGAWELA</option><option value="POLONNARUWA">POLONNARUWA</option><option value="POONANI">POONANI</option><option value="POONEWA">POONEWA</option><option value="POTUHERA">POTUHERA</option><option value="PULICHCHAKULAMA">PULICHCHAKULAMA</option><option value="PUTTALAM">PUTTALAM</option><option value="PUWAKPITIYA">PUWAKPITIYA</option><option value="RADELLA">RADELLA</option><option value="RAGAMA">RAGAMA</option><option value="RAMBUKKANA">RAMBUKKANA</option><option value="RANAMUKGAMA">RANAMUKGAMA</option><option value="RANDENIGAMA">RANDENIGAMA</option><option value="RATGAMA">RATGAMA</option><option value="RATMALANA">RATMALANA</option><option value="RICHMAND HILL">RICHMAND HILL</option><option value="ROZELLA">ROZELLA</option><option value="SALIYAPURA">SALIYAPURA</option><option value="SARASAVI UYANA">SARASAVI UYANA</option><option value="SAWARANA">SAWARANA</option><option value="SECARATARIAT HOALT">SECARATARIAT HOALT</option><option value="SEEDUWA">SEEDUWA</option><option value="SEENIGAMA">SEENIGAMA</option><option value="SENARATHGAMA">SENARATHGAMA</option><option value="SIYABALANGAMUWA">SIYABALANGAMUWA</option><option value="SRIWASTIPURA">SRIWASTIPURA</option><option value="TALAWA">TALAWA</option><option value="TALAWAKELE">TALAWAKELE</option><option value="TALAWATTEGEDARA">TALAWATTEGEDARA</option><option value="TALPE">TALPE</option><option value="TAMBILIGALA">TAMBILIGALA</option><option value="TAMBUTTEGAMA">TAMBUTTEGAMA</option><option value="TANBALAGAMUWA">TANBALAGAMUWA</option><option value="TELWATTA">TELWATTA</option><option value="TILADIYA">TILADIYA</option><option value="TIMBIRIYAGEDARA">TIMBIRIYAGEDARA</option><option value="TISMALPOLA">TISMALPOLA</option><option value="TRAIN HOLT">TRAIN HOLT</option><option value="TRINCO">TRINCO</option><option value="TUDEELLA">TUDEELLA</option><option value="TUMMODARA">TUMMODARA</option><option value="UDAHAMULLA">UDAHAMULLA</option><option value="UDATALAWINNA">UDATALAWINNA</option><option value="UDATTAWELA">UDATTAWELA</option><option value="UDUWARA">UDUWARA</option><option value="UKUWELA">UKUWELA</option><option value="ULAPANE">ULAPANE</option><option value="UNAWATUNA">UNAWATUNA</option><option value="VALACHCHENNAI">VALACHCHENNAI</option><option value="VAUNIA">VAUNIA</option><option value="VEYANGODA">VEYANGODA</option><option value="WADDUWA">WADDUWA</option><option value="WAGGA">WAGGA</option><option value="WAIKKALA">WAIKKALA</option><option value="WALAHAPITIYA">WALAHAPITIYA</option><option value="WALAKUMBURA">WALAKUMBURA</option><option value="WALGAMA">WALGAMA</option><option value="WALPOLA">WALPOLA</option><option value="WANAWASALA">WANAWASALA</option><option value="WANDURAWA">WANDURAWA</option><option value="WATAGODA">WATAGODA</option><option value="WATAREKA PLATFORM">WATAREKA PLATFORM</option><option value="WATAWALA">WATAWALA</option><option value="WATTEGAMA">WATTEGAMA</option><option value="WELIGAMA">WELIGAMA</option><option value="WELIKANDA">WELIKANDA</option><option value="WELLAWA">WELLAWA</option><option value="WELLAWATTA">WELLAWATTA</option><option value="WIJAYARAJADAHANA">WIJAYARAJADAHANA</option><option value="WILWATTA">WILWATTA</option><option value="YAGODA">YAGODA</option><option value="YATAGAMA">YATAGAMA</option><option value="YATHTHALGODA">YATHTHALGODA</option>            
                      </select>
                  </div>

                  <div class="pure-u-1 pure-u-md-1-3" id="return_date_wrapper" style="visibility:hidden">
                      <label for="return_date">Return Date</label>
                      <input id="return_date" name="return_date" class="pure-u-23-24 datepick" type="text">
                  </div>

                  <div class="pure-u-1 pure-u-md-1-3">
                      <label for="withreturn" class="pure-checkbox">
                        <input id="withreturn" name="withreturn" type="checkbox"> With Return
                      </label>
                  </div>
              </div>

              <button type="button" class="pure-button pure-button-primary" onclick="searchTrains()">Search Available Trains</button>

          </fieldset>
      </form>


    <div id="ajax_data"></div>

        ';

    return $content.$plugin_content;

  }else{
    return $content;
  }

}

function ns_search_trains(){

  global $wpdb;
  $data = $wpdb->get_results("SELECT * FROM ns_trains");

  return $data;

}

function ns_get_train_by_id($id){

  global $wpdb;
  $data = $wpdb->get_row("SELECT * FROM ns_trains WHERE id='".$id."'");

  return $data;

}

function ns_get_booking_history(){

  global $wpdb;
  $data = $wpdb->get_results("SELECT * FROM ns_bookings WHERE user_id = '".um_profile_id()."'");

  return $data;

}

function ns_do_booking($post_values){

  global $wpdb;

  $train_data = serialize(ns_get_train_by_id($post_values['train_id']));
  $departure_on = date("Y-m-d h:i:s",strtotime($post_values['date']));
  $departure_from = $post_values['from'];
  $arrival_on = date("Y-m-d h:i:s",strtotime($post_values['return_date']));
  $arrival_from = $post_values['to'];
  $seats = $post_values['seats'];
  $payment_type = $post_values['payment_method'];
  $booking_date = date("Y-m-d h:i:s",time());

  $wpdb->insert( 
    'ns_bookings', 
    array( 
      'user_id' => um_profile_id(), 
      'train_data' => $train_data, 
      'departure_on' => $departure_on, 
      'departure_from' => $departure_from, 
      'arrival_on' => $arrival_on, 
      'arrival_from' => $arrival_from, 
      'seats' => $seats, 
      'payment_type' => $payment_type, 
      'booking_date' => 'value1', 
    )
  );

}

function ns_show_booking_history(){

  $data = ns_get_booking_history();
  //print_r($data);

  $output = '

    <table class="pure-table pure-table-bordered">
      <thead>
        <tr class="detailDable" height="30px">
          <th width="20%">Train</th>
          <th width="30%">Departure</th>
          <th width="30%">Arrival</th>
          <th width="20%">Seat No</th>
          <th></th>
        </tr>
        </thead>
        <tbody>';



  foreach($data as $row){

    $train_details = unserialize($row->train_data);

    $output .= '<tr>
            <td align="center">'.$train_details->train_name.'</td>
            <td align="center">'.$row->departure_from.' <br /> '.$row->departure_on.'</td>
            <td align="center">'.$row->arrival_from.' <br /> '.$row->arrival_on.'</td>
            <td align="center">'.$row->seats.'</td>
            <td align="center"><input type="button" value="View" /><input type="button" value="Cancel" /></td>
          </tr>';

  }

  $output .='
      </tbody>
    </table>
  ';

  echo $output;

}

?>