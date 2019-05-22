<!doctype html>
<html>
  <head>
    <title>Mytheenga Project</title>
  </head>
  <body>
   <?php $count = $users->count();
   $amount=0;
   echo "No. of customers visit-";
   echo $count;
   echo "<br>";
   foreach ($users as $user) {
     $amount=$amount+$user->orderamount;
   }
   echo "Total amount-";
   echo $amount;
   /*
   $punchInTimes = array(
    '2013-08-01 09:00',
    '2013-08-02 09:06',
    '2013-08-03 08:50',
    '2013-08-04 09:20',
    '2013-08-05 09:01',
    '2013-08-06 08:56',
);*/

    $seconds = $average = 0;
    $result = null;
    //get seconds after midnight
    foreach($users as $dateString){
        $date = new \DateTime($dateString->ordertime);
        list($datePart) = explode(' ', $dateString->ordertime);
        $midnight = new \DateTime($datePart);
        $seconds += $date->getTimestamp() - $midnight->getTimestamp();
    }

    if($seconds > 0){
        $average = $seconds/$count;
        $hours = floor($average/3600);
        $average -= ($hours * 3600);
        $minutes = floor($average/60);
        $average -= ($minutes * 60);
        $result = new \DateInterval("PT{$hours}H{$minutes}M{$average}S");
    } else $result = new \DateInterval('PT0S');
    $final= $result->format("%Hh %Mm %Ss");
    echo "<br>";
echo "Average visit time is " . $final;
   ?>
     @if(Session::has('message'))
        <p >{{ Session::get('message') }}</p>
     @endif
          <table border=1>
            <tr>
            <td>Order ID</td>
            <td>Amount</td>
            <td>Stores Visited</td>
            <td>Date and Time  </td>
         </tr>
     @foreach ($users as $user)
         <tr>
            <td>{{ $user->orderid }}</td>
            <td>{{ $user->orderamount }}</td>
            <td>{{ $user->storelocation }}</td>
            <td>{{ $user->ordertime}}</td>
         </tr>
         @endforeach
         </table>
     <a href="find">Finding data </a>

     &nbsp;
	  <a href="index"> Importing data </a>
  </body>
</html>