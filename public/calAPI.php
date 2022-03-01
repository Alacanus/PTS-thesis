<?php
require __DIR__ . '/../src/bootstrap.php';

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */

view('header', ['title' => 'Create Event']);
$tableNAme ='users';
$option_list = get_db_Options($tableNAme);
$errors ='';
$client = init_Cal_Client();
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // store in the session also
    $_SESSION['upload_token'] = $token;

    // redirect back to the example
    header('Location: ' . filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], FILTER_SANITIZE_URL));
  }


  if (!empty($_SESSION['upload_token'])) {
    $client->setAccessToken($_SESSION['upload_token']);
    if ($client->isAccessTokenExpired()) {
      unset($_SESSION['upload_token']);
      // $_SESSION['upload_token'] = 'no accesstoken';
    }
  } else {
    $authUrl = $client->createAuthUrl();
    $_SESSION['authUrl'] = $authUrl;
    // redirect_to($authUrl);
  }
  if($client->getAccessToken() && !$client->isAccessTokenExpired()){


    $service = new Google_Service_Calendar($client);

    // Print the next 10 events on the user's calendar.
    $calendarId = 'primary';
    $optParams = array(
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
    );
    $results = $service->events->listEvents($calendarId, $optParams);
    $events = $results->getItems();

    if (empty($events)) {
        print "No upcoming events found.\n";
    } else {
        echo '<pre>';
        print "Upcoming events:\n";
        foreach ($events as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }
            printf("%s (%s)\n", $event->getSummary(), $start);
        }
        echo '</pre>';
    }
}else{
    echo '
    <a href="'.$authUrl .'">
     <input type="submit" value ="Auth PTS"/>
   </a>
    ';
}


?>

Meeting form
<main>
<form id="form" action="" method="post" >
            <label>Name of Meeting</label>
            <input type="text" name="meetingName" id="meetingName" />
            <small><?= $errors['meetingName'] ?? '' ?></small>
            <label>Description of Meeting</label>
            <input type="text" name="Descmeeting" id="Descmeeting" />
            <small><?= $errors['Descmeeting'] ?? '' ?></small>
            <label for="dateStart">Date start</label>
            <input type="datetime-local" name="dateStart" id="dateStart" type="date" >
            <small><?= $errors['dateStart'] ?? '' ?></small>
            <label for="dateEnd">Date end</label>
            <input type="datetime-local" name="dateEnd" id="dateEnd" type="date" />
            <small><?= $errors['dateEnd'] ?? '' ?></small>
            <!-- <label for="dateEnd">DAILY Frequency</label>
            <input type="number" name="freqMeeting" id="freqMeeting" type="date" /> -->
            <small><?= $errors['freqMeeting'] ?? '' ?></small>
    
    <label for="email">Name of Participants<div class="reqcolor">*</div></label>
                                <select name="email" >
                                    <option value="">- - - - Select - - - -</options>
                                    <option value="lourdes.mendoza@benilde.edu.ph">lourdes.mendoza@benilde.edu.ph</options>
                                        <?php
                                        foreach ($option_list as $options) {
                                            echo '<option value="' . $options['email'] . '">' . $options['firstname'] . " ". $options['lastName'] . '</option>';
                                        }
                                        ?>
                                </select>
                                <small><?= $errors['email'] ?? '' ?></small>
    <button>Create Meeting</button>
</form>
<p><?= $errors ?></p>
<?php

if (is_post_request()) {
    

    if(isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
        $meetingname = $_POST['meetingName'];
        $meetingdesc = $_POST['Descmeeting'];
        $meetingstart = $_POST['dateStart'];
        $meetingend = $_POST['dateEnd'];
        $email = $_POST['email'];
        $calendar = $service->calendars->get('primary');
        //format start
    $dtstart= new DateTime("$meetingstart");
    $googleEventTime1 = date_sub($dtstart, date_interval_create_from_date_string("7 hours"));//add time adjustment
    $googleStart = date_format($googleEventTime1, 'c');
//format end
    $dtend= new DateTime("$meetingend");
    $googleEventTime2 = date_sub($dtend, date_interval_create_from_date_string("7 hours"));
    $googleEnd = date_format($googleEventTime2, 'c');


    $event = new Google_Service_Calendar_Event(array(
        'summary' => $meetingname,
        'location' => 'Google Meet',
        'description' => $meetingdesc,
        'start' => array(
          'dateTime' => $googleStart,
          'timeZone' => 'Asia/Manila',
        ),
        'end' => array(
          'dateTime' => $googleEnd,
          'timeZone' => 'Asia/Manila',
        ),
        'recurrence' => array(
          'RRULE:FREQ=DAILY;COUNT=1'
        ),
        'attendees' => array(
          array('email' => $email),
        ),
        'reminders' => array(
          'useDefault' => FALSE,
          'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
          ),
        ),
        'conferenceData' => array(
                        'createRequest' => array(
                            'requestId'=>bin2hex(random_bytes(16)),
                            'conferenceSolutionKey'=> array(
                                'type'=>'hangoutsMeet'
                            ),
                        ),
                      ),
                    "entryPoints" => [
                        "entryPointType"=>  'video',
                    ],
      ));
  $calendarId = 'primary';
  $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
  printf('<br>Event created: %s\n', $event->htmlLink);
  echo '<br>';
  printf('<br>Meeting Link: %s\n', $event->hangoutLink);
    }else{
        $errors = 'Please Fill the proper fields';
    }

}
?>
</main>