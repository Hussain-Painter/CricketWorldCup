<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
            <h1 align='center'>CRICKET WORLD CUP</h1>
        
       <?php
       include 'db.php';
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error)
       {
           die("Connection failed :(");
       }
      ?>
     <div>
      <a href='#Teams'>Teams</a>&nbsp;&nbsp;
      <a href='#matches'>Matches</a>&nbsp;&nbsp;
      <a href='#Most_Runs'>Most Runs</a>&nbsp;&nbsp;
      <a href='#Most_Wickets'>Most Wickets</a>&nbsp;&nbsp;
      <a href='#Most_Dismissals'>Most Dismissals</a>&nbsp;&nbsp;
      <a href='#Strike-Rate'>Strike-Rate</a>&nbsp;&nbsp;
      <a href='#Economy'>Economy</a>&nbsp;&nbsp;
      <div id='Teams'>
      <h2>TEAMS</h2>  
      </div>
          <table color="Black" cellpadding="10%" id="Teams">
          <tr bgcolor="Blue">
                    
                    <th><font color="White">TEAM NAME</font></th>
                    <th><font color="White">POSITION</font></th>
                    <th><font color="White">COACH NAME</font></th>
                    <th><font color="White">CAPTAIN NAME</font></th>
          </tr>
              <?php
              //Display Teams
              $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE Match_ID=3 AND Win_or_loss=1;';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $team_name=$row['Team_Name'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td><font color='Black'>CHAMPIONS</font></td>
                       ");
                  }
              }
              $sql='SELECT Coach_name FROM Coach WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=3 AND Win_or_loss=1);';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $coach = $row['Coach_name'];
                  echo("<td>$coach</td>");

                }
              }
              $sql='SELECT P_Name FROM Players WHERE P_ID=(SELECT Captained_by FROM Teams WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=3 AND Win_or_loss=1));';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $name = $row['P_Name'];
                  echo ("<td>$name</td></tr>");

                }
              }
              $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE Match_ID=3 AND Win_or_loss=0;';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $team_name=$row['Team_Name'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td><font color='Black'>RUNNERS-UP</font></td>
                       ");
                  }
              }
              $sql='SELECT Coach_name FROM Coach WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=3 AND Win_or_loss=0);';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $coach = $row['Coach_name'];
                  echo("<td>$coach</td>");

                }
              }
              $sql='SELECT P_Name FROM Players WHERE P_ID=(SELECT Captained_by FROM Teams WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=3 AND Win_or_loss=0));';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $name = $row['P_Name'];
                  echo("<td>$name</td></tr>");

                }
              }
              $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE Match_ID=2 AND Win_or_loss=0';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $team_name=$row['Team_Name'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td><font color='Black'>SEMI FINALS</font></td>
                       ");
                      
                  }
              }
              $sql='SELECT Coach_name FROM Coach WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=2 AND Win_or_loss=0);';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $coach = $row['Coach_name'];
                  echo("<td>$coach</td>");

                }
              }
              $sql='SELECT P_Name FROM Players WHERE P_ID=(SELECT Captained_by FROM Teams WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=2 AND Win_or_loss=0));';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $name = $row['P_Name'];
                  echo("<td>$name</td></tr>");

                }
              }
              $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON  t.Team_ID = tm.Team_ID WHERE Match_ID=1 AND Win_or_loss=0';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $team_name=$row['Team_Name'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td><font color='Black'>SEMI FINALS</font></td>
                       ");
                      
                  }
              }
              $sql='SELECT Coach_name FROM Coach WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=1 AND Win_or_loss=0);';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $coach = $row['Coach_name'];
                  echo("<td>$coach</td>");

                }
              }
              $sql='SELECT P_Name FROM Players WHERE P_ID=(SELECT Captained_by FROM Teams WHERE Team_ID=(SELECT Team_ID FROM team_match_stats WHERE Match_ID=1 AND Win_or_loss=0));';
              $result=$conn->query($sql);
              if ($result->num_rows>0)
              {
                while ($row = $result->fetch_assoc())
                {
                  $name = $row['P_Name'];
                  echo("<td>$name</td></tr>");

                }
              }

              ?>
              </table>
              </div>
              <div id="matches">
              <h2>MATCHES</h2>
              <table color="Black" cellpadding="10%" id='Match'>
              <tr bgcolor="Blue">
                    
                    <th><font color="White">WINNING TEAM</font></th>
                    <th><font color="White">MARGIN</font></th>
                    <th><font color="White">DATE AND TIME</font></th>
                    <th><font color="White">DEFEATED TEAM</font></th>
                    <th><font color="White">STAGE</font></th>
                    <th><font color="White">UMPIRE 1</font></th>
                    <th><font color="White">UMPIRE 2</font></th>
                    <th><font color="White">UMPIRE 3</font></th>
                    <th><font color="White">UMPIRE 4</font></th>

              </tr>
              <?php
              /*
              $sql='SELECT Match_ID FROM Matches;';
              $result=$conn->query($sql);
              $match_ids = array();
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                        array_push($match_ids,$row['Match_ID']);
                  }
              }
               */
                $sql='SELECT Team_Name,Margin FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=1 AND Win_or_loss=1;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                      $margin = $row['Margin'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td>$margin</td>");
                     
                    }

                }
               
              $sql='SELECT M_datetime FROM Matches WHERE Match_ID=1';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $datetime = $row['M_datetime'];
                        echo("<td>$datetime</td>");
                     
                    }

                }
                $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=1 AND Win_or_loss=0;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                     
                      echo("<td>$team_name</td>");
                     
                    }

                }
                $sql='SELECT Stage FROM Matches WHERE Match_ID=1';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $Stage = $row['Stage'];
                        echo("<td>$Stage</td>");
                     
                    }

                }
                $sql='SELECT U_Name FROM Umpires u INNER JOIN match_ump mu ON u.Umpire_ID=mu.Ump_ID INNER JOIN matches m ON m.Match_ID=mu.Match_ID WHERE m.Match_ID=1;';
                $result=$conn->query($sql);
                if ($result->num_rows>0)
                {
                  while ($row = $result->fetch_assoc())
                  {
                    $uName=$row['U_Name'];
                    echo("<td>$uName</td>");
                  }
                  echo("</tr>");
                }



                $sql='SELECT Team_Name,Margin FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=2 AND Win_or_loss=1;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                      $margin = $row['Margin'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td>$margin</td>");
                     
                    }

                }
               
              $sql='SELECT M_datetime FROM Matches WHERE Match_ID=2';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $datetime = $row['M_datetime'];
                        echo("<td>$datetime</td>");
                     
                    }

                }
                $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=2 AND Win_or_loss=0;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                     
                      echo("<td>$team_name</td>");
                     
                    }

                }
                $sql='SELECT Stage FROM Matches WHERE Match_ID=2';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $Stage = $row['Stage'];
                        echo("<td>$Stage</td>");
                     
                    }

                }
                $sql='SELECT U_Name FROM Umpires u INNER JOIN match_ump mu ON u.Umpire_ID=mu.Ump_ID INNER JOIN matches m ON m.Match_ID=mu.Match_ID WHERE m.Match_ID=2;';
                $result=$conn->query($sql);
                if ($result->num_rows>0)
                {
                  while ($row = $result->fetch_assoc())
                  {
                    $uName=$row['U_Name'];
                    echo("<td>$uName</td>");
                  }
                  echo("</tr>");
                }


                $sql='SELECT Team_Name,Margin FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=3 AND Win_or_loss=1;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                      $margin = $row['Margin'];
                      echo("<tr bgcolor='White'>
                      <td>$team_name</td>
                      <td>$margin</td>");
                     
                    }

                }
               
              $sql='SELECT M_datetime FROM Matches WHERE Match_ID=3';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $datetime = $row['M_datetime'];
                        echo("<td>$datetime</td>");
                     
                    }

                }
                $sql='SELECT Team_Name FROM Teams t INNER JOIN team_match_stats tm ON t.Team_ID=tm.Team_ID WHERE Match_ID=3 AND Win_or_loss=0;';
                $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $team_name = $row['Team_Name'];
                     
                      echo("<td>$team_name</td>");
                     
                    }

                }
                $sql='SELECT Stage FROM Matches WHERE Match_ID=3';
              $result = $conn->query($sql);
                if ($result->num_rows>0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                      $Stage = $row['Stage'];
                        echo("<td>$Stage</td>");
                     
                    }

                }
                $sql='SELECT U_Name FROM Umpires u INNER JOIN match_ump mu ON u.Umpire_ID=mu.Ump_ID INNER JOIN matches m ON m.Match_ID=mu.Match_ID WHERE m.Match_ID=3;';
                $result=$conn->query($sql);
                if ($result->num_rows>0)
                {
                  while ($row = $result->fetch_assoc())
                  {
                    $uName=$row['U_Name'];
                    echo("<td>$uName</td>");
                  }
                  echo("</tr>");
                }

              ?>
              </table>
              <h2>PLAYER STATS</h2>
              <h3 id='Most_Runs'>MOST RUNS</h3>
              <table color="Black" cellpadding="10%">
              <tr bgcolor="Blue">
                    
                    <th><font color="White">NAME</font></th>
                    <th><font color="White">ROLE</font></th>
                    <th><font color="White">RUNS SCORED</font></th>
              </tr>

              <?php
              $sql='SELECT P_Name,P_Role,Runs_Scored FROM Players WHERE Runs_Scored>100 order by Runs_Scored DESC';
              $result = $conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $name=$row['P_Name'];
                      $role=$row['P_Role'];
                      $Runs=$row['Runs_Scored'];
                    echo("<tr bgcolor='White'>
                      <td>$name</td>
                      <td>$role</td>
                      <td>$Runs</td>
                       </tr>");
                    }

              }
              ?>
              </table>
              <h3 id='Most_Wickets'>Most Wickets</h3>
              <table color="Black" cellpadding="10%" >
              <tr bgcolor="Blue">
                    
                    <th><font color="White">NAME</font></th>
                    <th><font color="White">ROLE</font></th>
                    <th><font color="White">WICKETS TAKEN</font></th>
              </tr>

              <?php
              $sql='SELECT P_Name,P_Role,Wickets_Taken FROM Players WHERE Wickets_Taken>5 order by Wickets_Taken DESC;';
              $result = $conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $name=$row['P_Name'];
                      $role=$row['P_Role'];
                      $wickets=$row['Wickets_Taken'];
                    echo("<tr bgcolor='White'>
                      <td>$name</td>
                      <td>$role</td>
                      <td>$wickets</td>
                       </tr>");
                    }

              }
              ?>
              </table>
              <h3 id='Most_Dismissals'>Most Dismissals Affected</h3>
              <table color="Black" cellpadding="10%" >
              <tr bgcolor="Blue">
                    
                    <th><font color="White">NAME</font></th>
                    <th><font color="White">ROLE</font></th>
                    <th><font color="White">DISMISSALS AFFECTED</font></th>
              </tr>

              <?php
              $sql='SELECT P_Name,P_Role,No_of_DismissalsAffected FROM Players WHERE No_of_DismissalsAffected>3 order by No_of_DismissalsAffected DESC;';
              $result = $conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $name=$row['P_Name'];
                      $role=$row['P_Role'];
                      $dismissalsAffected=$row['No_of_DismissalsAffected'];
                    echo("<tr bgcolor='White'>
                      <td>$name</td>
                      <td>$role</td>
                      <td>$dismissalsAffected</td>
                       </tr>");
                    }

              }
              ?>
              </table>

              <h3 id='Strike-Rate'>BEST STRIKE RATE</h3>
              <table color="Black" cellpadding="10%" >
              <tr bgcolor="Blue">
                    
                    <th><font color="White">NAME</font></th>
                    <th><font color="White">ROLE</font></th>
                    <th><font color="White">STRIKE RATE</font></th>
              </tr>

              <?php
              $sql='SELECT P_Name,P_Role,Runs_Scored/Balls_faced*100 AS SR FROM Players WHERE Balls_faced>18 ORDER BY SR DESC;';
              $result = $conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $name=$row['P_Name'];
                      $role=$row['P_Role'];
                      $SR=$row['SR'];
                    echo("<tr bgcolor='White'>
                      <td>$name</td>
                      <td>$role</td>
                      <td>$SR</td>
                       </tr>");
                    }

              }
              ?>
              </table>

              <h3 id='Economy'>BEST ECONOMY</h3>
              <table color="Black" cellpadding="10%" >
              <tr bgcolor="Blue">
                    
                    <th><font color="White">NAME</font></th>
                    <th><font color="White">ROLE</font></th>
                    <th><font color="White">ECONOMY</font></th>
              </tr>

              <?php
              $sql='SELECT P_Name,P_Role,Runs_Conceded/Balls_bowled*6 Economy FROM Players WHERE Balls_bowled>18 ORDER BY Economy;';
              $result = $conn->query($sql);
              if ($result->num_rows>0)
              {
                  while ($row = $result->fetch_assoc())
                  {
                      $name=$row['P_Name'];
                      $role=$row['P_Role'];
                      $eco=$row['Economy'];
                    echo("<tr bgcolor='White'>
                      <td>$name</td>
                      <td>$role</td>
                      <td>$eco</td>
                       </tr>");
                    }

              }
              ?>
              </table>


    </body>
</html>