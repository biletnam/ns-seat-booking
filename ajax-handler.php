<?php
include($_POST['doc_root']."wp-blog-header.php");
require_once('ns-seat-booking-functions.php');

$action = $_POST['action'];

switch($action){
	case "searchTrains":
 	  	searchTrains();
 	break;
 	case "bookNow":
 		bookNow();
 	break;
 	case "drawSeats":
 		drawSeats();
 	break;
  case "proceedToPayments":
    proceedToPayments();
  break;
  case "payNow":
    payNow();
  break;
}
 
 
function searchTrains(){

  //print_r($_POST);

  $trains = ns_search_trains();

  $train_details_html = '

  <table class="pure-table pure-table-bordered">
  <thead>
    <tr>
      <th>Train Name</th>
      <th>Type</th>
      <th>Arrival Time</th>
      <th>Departure Time</th>
      <th>Train Ends at</th>
      <th>Frequency</th>
      <th></th>
    </tr>
  </thead>
  ';

  foreach($trains as $train){

    $train_details_html .= '
    <tr>
      <td>'.$train->train_name.'</td>
      <td>'.$train->train_type.'</td>
      <td>'.$train->arrival_time.'</td>
      <td>'.$train->departure_time.'</td>
      <td>'.$train->train_to.'</td>
      <td>'.$train->train_frequency.'</td>
      <td> <input type="button" value="Buy Tickets" onclick="bookNow(1)" /> </td>
    </tr>
    ';

  }

  $train_details_html .= '

  </table>

  ';


  echo $train_details_html;

}

function bookNow(){

	echo '
	Passenger Car No:

  <form id="seat_arrangement">

	<select onchange="drawSeats(this.value)" name="car_no">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select>

  <input type="hidden" id="train_id" name="train_id" value="'.$_POST['train_id'].'" />

	';

	echo '<div id="seat_ajax"></div>

  </form>
  ';

}

function drawSeats(){

$car_id = $_POST['id'];

echo '

<div class="train">
  <div class="exit exit--front fuselage">
    <center><h2>'.$car_id.'</h2></center>
  </div>
  <ol class="cabin fuselage">
    <li class="row row--1">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="1A" name="seats[]" value="1A"/>
          <label for="1A">1A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="1B" name="seats[]" value="1B"/>
          <label for="1B">1B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="1C" name="seats[]" value="1C"/>
          <label for="1C">1C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" disabled id="1D" name="seats[]" value="1D"/>
          <label for="1D">Occupied</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="1E" name="seats[]" value="1E"/>
          <label for="1E">1E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="1F" name="seats[]" value="1F"/>
          <label for="1F">1F</label>
        </li>
      </ol>
    </li>
    <li class="row row--2">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2A" name="seats[]" value="2A"/>
          <label for="2A">2A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2B" name="seats[]" value="2B"/>
          <label for="2B">2B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2C" name="seats[]" value="2C"/>
          <label for="2C">2C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2D" name="seats[]" value="2D"/>
          <label for="2D">2D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2E" name="seats[]" value="2E"/>
          <label for="2E">2E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="2F" name="seats[]" value="2F"/>
          <label for="2F">2F</label>
        </li>
      </ol>
    </li>
    <li class="row row--3">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3A" name="seats[]" value="3A"/>
          <label for="3A">3A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3B" name="seats[]" value="3B"/>
          <label for="3B">3B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3C" name="seats[]" value="3C"/>
          <label for="3C">3C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3D" name="seats[]" value="3D"/>
          <label for="3D">3D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3E" name="seats[]" value="3E"/>
          <label for="3E">3E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="3F" name="seats[]" value="3F"/>
          <label for="3F">3F</label>
        </li>
      </ol>
    </li>
    <li class="row row--4">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4A" name="seats[]" value="4A"/>
          <label for="4A">4A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4B" name="seats[]" value="4B"/>
          <label for="4B">4B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4C" name="seats[]" value="4C"/>
          <label for="4C">4C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4D" name="seats[]" value="4D"/>
          <label for="4D">4D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4E" name="seats[]" value="4E"/>
          <label for="4E">4E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="4F" name="seats[]" value="4F"/>
          <label for="4F">4F</label>
        </li>
      </ol>
    </li>
    <li class="row row--5">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5A" name="seats[]" value="5A"/>
          <label for="5A">5A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5B" name="seats[]" value="5B"/>
          <label for="5B">5B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5C" name="seats[]" value="5C"/>
          <label for="5C">5C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5D" name="seats[]" value="5D"/>
          <label for="5D">5D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5E" name="seats[]" value="5E"/>
          <label for="5E">5E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="5F" name="seats[]" value="5F"/>
          <label for="5F">5F</label>
        </li>
      </ol>
    </li>
    <li class="row row--6">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6A" name="seats[]" value="6A"/>
          <label for="6A">6A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6B" name="seats[]" value="6B"/>
          <label for="6B">6B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6C" name="seats[]" value="6C"/>
          <label for="6C">6C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6D" name="seats[]" value="6D"/>
          <label for="6D">6D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6E" name="seats[]" value="6E"/>
          <label for="6E">6E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="6F" name="seats[]" value="6F"/>
          <label for="6F">6F</label>
        </li>
      </ol>
    </li>
    <li class="row row--7">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7A" name="seats[]" value="7A"/>
          <label for="7A">7A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7B" name="seats[]" value="7B"/>
          <label for="7B">7B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7C" name="seats[]" value="7C"/>
          <label for="7C">7C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7D" name="seats[]" value="7D"/>
          <label for="7D">7D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7E" name="seats[]" value="7E"/>
          <label for="7E">7E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="7F" name="seats[]" value="7F"/>
          <label for="7F">7F</label>
        </li>
      </ol>
    </li>
    <li class="row row--8">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8A" name="seats[]" value="8A"/>
          <label for="8A">8A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8B" name="seats[]" value="8B"/>
          <label for="8B">8B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8C" name="seats[]" value="8C"/>
          <label for="8C">8C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8D" name="seats[]" value="8D"/>
          <label for="8D">8D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8E" name="seats[]" value="8E"/>
          <label for="8E">8E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="8F" name="seats[]" value="8F"/>
          <label for="8F">8F</label>
        </li>
      </ol>
    </li>
    <li class="row row--9">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9A" name="seats[]" value="9A"/>
          <label for="9A">9A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9B" name="seats[]" value="9B"/>
          <label for="9B">9B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9C" name="seats[]" value="9C"/>
          <label for="9C">9C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9D" name="seats[]" value="9D"/>
          <label for="9D">9D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9E" name="seats[]" value="9E"/>
          <label for="9E">9E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="9F" name="seats[]" value="9F"/>
          <label for="9F">9F</label>
        </li>
      </ol>
    </li>
    <li class="row row--10">
      <ol class="seats" type="A">
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10A" name="seats[]" value="10A" />
          <label for="10A">10A</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10B" name="seats[]" value="10B" />
          <label for="10B">10B</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10C" name="seats[]" value="10C" />
          <label for="10C">10C</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10D" name="seats[]" value="10D" />
          <label for="10D">10D</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10E" name="seats[]" value="10E" />
          <label for="10E">10E</label>
        </li>
        <li class="seat">
          <input class="seat_checkbox" type="checkbox" id="10F" name="seats[]" value="10F" />
          <label for="10F">10F</label>
        </li>
      </ol>
    </li>
  </ol>
  <div class="exit exit--back fuselage">
    
  </div>
</div>

<input type="button" value="Proceed" onclick="proceedToPayments()" />

';


}


function proceedToPayments(){

//print_r($_POST);

// calculate substation departure time by dividing number of stations from the time difference

$train = ns_get_train_by_id($_POST['train_id']);
  
  echo '

    <table class="pure-table pure-table-bordered">
      <thead>
        <tr class="detailDable" height="30px">
          <th width="20%">Train</th>
          <th width="20%">Departure</th>
          <th width="20%">Arrival</th>
          <th width="20%">Seat No</th>
          <th width="20%">Cost</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td align="center" height="30px">'.$train->train_name.'</td>
          <td align="center">'.$_POST['from'].' <br /> '.$train->departure_time.'</td>
          <td align="center">'.$_POST['to'].' <br /> '.$train->arrival_time.'</td>
          <td align="center">'.implode(", ",$_POST['seats']).'</td>
          <td align="center">'.(count($_POST['seats'])*120).' LKR</td>
        </tr>
        <tr>
          <td colspan="4" style="height:25px;">Service Charge</td>
          <td>10%</td>
        </tr>
        <tr>
          <td colspan="4" style="height:25px;">Total</td>
          <td><strong style="font-size:25px;">'.((count($_POST['seats'])*120)+(((count($_POST['seats'])*120)*10)/100)).' LKR</strong></td>
        </tr>
      </tbody>
    </table>

  <h4>Payment Type</h4>

  <form id="payment_method_form" class="pure-form">

    <input type="hidden" name="train_id" value="'.$_POST['train_id'].'" />
    <input type="hidden" name="car_no" value="'.$_POST['car_no'].'" />
    <input type="hidden" name="seats" value="'.implode(", ",$_POST['seats']).'" />

    <label for="payment_method_1" class="pure-radio">
        <input id="payment_method_1" type="radio" name="payment_method" value="credit_card">
        Credit Card
    </label>

    <label for="payment_method_2" class="pure-radio">
        <input id="payment_method_2" type="radio" name="payment_method" value="ezCash">
        ezCash
    </label>

    <label for="payment_method_3" class="pure-radio">
        <input id="payment_method_3" type="radio" name="payment_method" value="mCash">
        mCash
    </label>

  </form>

    <input type="button" value="Pay Now" onclick="payNow()" />

  ';

}


function payNow(){

  //print_r($_POST);

  ns_do_booking($_POST);

  $train_data = ns_get_train_by_id($_POST['train_id']);

  echo '<h1 class="payment_succesful">Payment Successful</h1>';

  echo '

  <table class="pure-table pure-table-bordered">
    <tr>
      <td>From</td>
      <td>'.$_POST['from'].'</td>
    </tr>
    <tr>
      <td>To</td>
      <td>'.$_POST['to'].'</td>
    </tr>
    <tr>
      <td>Date</td>
      <td>'.$_POST['date'].'</td>
    </tr>
    <tr>
      <td>Return Date</td>
      <td>'.$_POST['return_date'].'</td>
    </tr>
    <tr>
      <td>Train</td>
      <td>'.$train_data->train_name.'</td>
    </tr>
    <tr>
      <td>Seats</td>
      <td>'.$_POST['seats'].'</td>
    </tr>
    <tr>
      <td>Ticket Status</td>
      <td style="color:green">Confirmed</td>
    </tr>
  </table>

  ';

  echo '
    <div style="text-align:center">A Copy of this reciept has been sent to your email for reference.</div>
  ';

}


?>
