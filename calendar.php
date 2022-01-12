<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
</head>

<body>

    <?php
    function Calendar($m)
    {
        if ($m > 12 || $m <= 0) {
            print_r("Error number!");
        } else {

            $daysInMonth = cal_days_in_month(CAL_JULIAN, $m, 2021); //кількість днів в місяці
            $jd = gregoriantojd($m, 1, 2021); // дата в юліан. календ.
            $weekDay = jddayofweek($jd, 0); // день тижня
            if($weekDay == 0) $weekDay=7;
            $td = "<tr>";
            $table = "<table>
            <tr>
                <th>Пн</th>
                <th>Вт</th>
                <th>Ср</th>
                <th>Чт</th>
                <th>Пт</th>
                <th style='color: red'>Сб</th>
                <th style='color: red'>Нд</th>
            </tr>";

            for ($i = 1; $i < $daysInMonth+$weekDay; $i++) {

                if ($i < $weekDay) {
                    $td .= "<td> </td>";
                } else {
                    $td .= "<td>" . $i-$weekDay+1 . "   </td>";
                    if (($i) % 7 == 0) {
                        $td .= "</tr><br/>";
                    }
                }
            }
            $td .= "</tr></table>";
            echo $table . $td;
        }
    }

    Calendar(12);
    ?>
</body>

</html>