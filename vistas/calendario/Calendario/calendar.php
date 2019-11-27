<?php
$m=''; //for error messages
$id_event=''; //id event created 
$link_event; 
if(isset($_POST['agendar'])){
    

    date_default_timezone_set('America/Guayaquil');
    include_once 'vendor/autoload.php';

    //configurar variable de entorno / set enviroment variable
    putenv('GOOGLE_APPLICATION_CREDENTIALS=ConsultorioDental-020b46bbb85e.json');

    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->setScopes(['https://www.googleapis.com/auth/calendar']);

    //define id calendario
    $id_calendar='lacet6hg4lksboobe5000lu5u0@group.calendar.google.com';//
    
   
      
    $datetime_start = new DateTime($_POST['date_start']);
    $datetime_end = new DateTime($_POST['date_start']);
    
    //aumentamos una hora a la hora inicial/ add 1 hour to start date
    $time_end = $datetime_end->add(new DateInterval('PT1H'));
    
    //datetime must be format RFC3339
    $time_start =$datetime_start->format(\DateTime::RFC3339);
    $time_end=$time_end->format(\DateTime::RFC3339);

    
    $nombre=(isset($_POST['username']))?$_POST['username']:' xyz ';
    try{
        
        //instanciamos el servicio
    	 $calendarService = new Google_Service_Calendar($client);
      
        
      
        //parámetros para buscar eventos en el rango de las fechas del nuevo evento
        //params to search events in the given dates
        $optParams = array(
            'orderBy' => 'startTime',
            'maxResults' => 20,
            'singleEvents' => TRUE,
            'timeMin' => $time_start,
            'timeMax' => $time_end,
        );

        //obtener eventos 
        $events=$calendarService->events->listEvents($id_calendar,$optParams);
        
        //obtener número de eventos / get how many events exists in the given dates
        $cont_events=count($events->getItems());
     
        //crear evento si no hay eventos / create event only if there is no event in the given dates
        if($cont_events == 0){

            $event = new Google_Service_Calendar_Event();
            $event->setSummary('Cita con el paciente '.$nombre);
            $event->setDescription('Revisión , Tratamiento');

            //fecha inicio
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($time_start);
            $event->setStart($start);

            //fecha fin
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($time_end);
            $event->setEnd($end);

          
            $createdEvent = $calendarService->events->insert($id_calendar, $event);
            $id_event= $createdEvent->getId();
            $link_event= $createdEvent->gethtmlLink();
            
        }else{
            $m = "Hay ".$cont_events." eventos en ese rango de fechas";
        }


    }catch(Google_Service_Exception $gs){
     
      $m = json_decode($gs->getMessage());
      $m= $m->error->message;

    }catch(Exception $e){
        $m = $e->getMessage();
      
    }
}





?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
     <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
      <script type="text/javascript" src="moment.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
      <style type="text/css">
          body{
            background-color: #0174DF;
          }

          
          form{
                background-color: #fff;
                margin: 10% 35%;
                width: 30%;
                border: 2px solid;
                padding: 15px;
            }
          @media screen AND (max-width: 480px){
            form{
                margin: 0px 3%;
                width: 94%;
            }
          }
      </style>
</head>
<body>


  <form action="" method="POST">
    <?php 
    if(isset($_POST['agendar'])){
      if($m!=''){
      ?>
      <label class="control-form">Error :<?php echo $m;   ?></label>
      <?php
      }
      elseif($id_event!=''){
        ?>
        <label class="control-form">ID EVENTO :<?php echo $id_event;   ?></label><br>
        <a href="<?php  echo $link_event;  ?>">LINK</a>
        <?php
      }
      ?><br>
      <button type="button" class="btn btn-primary btn-block" onclick="reload();">BACK</button>
      <?php
    }
    else{
    ?>
    <div class="form-group">

      <div class="row">
        <div class="col-sm-12">
            <label>Name</label>
              <div class="form-group">
                  <div class="input-group ">
                      <input type="text" class="form-control "  name="username" placeholder="Enter your name" autocomplete="off" />
                    
                  </div>
              </div>
          </div>
      </div>
      <div class="row">

          <div class="col-sm-12">
            <label>DateTime</label>
              <div class="form-group">
                  <div class="input-group date"  id="datetimepicker1" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="date_start"/>
                      <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
          </div>
         
      </div>
      
    </div>
  

 
  <button type="submit" class="btn btn-primary btn-block" name="agendar">Submit</button>
   <?php 
    }
    ?>
</form>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                   format: 'YYYY-MM-DD HH:mm'
                });
            });

            function reload(){
              location.href="calendar.php";
            }
        </script>
</body>
</html>