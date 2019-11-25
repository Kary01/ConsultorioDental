<!DOCTYPE html>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
      <?php
      require_once('./connection.php');
      $client = getClient();
      if(! is_a ($client, "Google_Client")) {
              echo $client;
      }
      else { ?>
          <input type='date' id='available_dates'/>
          <select id='available_times'>
          </select>
          <button id='submit'>Schedule me!</button>
          <p id='dump'></p>

          <script>
              $(document).ready(function() {
                  document.getElementById('available_dates').addEventListener('change', function(){
                      get_times(this);
                  });
                  document.getElementById('submit').addEventListener('click', function(){
                      schedule_me(this);
                  });
              });
              function get_times(date_picker) {
                  var date = date_picker.value;
                  //https://www.w3schools.com/xml/xml_http.asp
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                         // Typical action to be performed when the document is ready:
                         document.getElementById('available_times').innerHTML = xhttp.responseText;
                      }
                  };
                  xhttp.open('GET', '/calendars.php?action=get_times&date='+date+'&t=' + Math.random());
                  xhttp.setRequestHeader('X-Requested-With', 'xmlhttprequest');
                  xhttp.send();
              }
              function schedule_me(btn) {
                  var date = document.getElementById('available_dates').value;
                  var time = document.getElementById('available_times').value;
                  //https://www.w3schools.com/xml/xml_http.asp
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                         // Typical action to be performed when the document is ready:
                         document.getElementById('dump').innerHTML = xhttp.responseText;
                      }
                  };
                  xhttp.open('GET', '/calendars.php?action=schedule_me&date='+date+'&time='+time+'&t=' + Math.random());
                  xhttp.setRequestHeader('X-Requested-With', 'xmlhttprequest');
                  xhttp.send();
              }
          </script>

      <?php }
      ?>
  </body>
</html>