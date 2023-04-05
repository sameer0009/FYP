<head>
    
    <style>
        /* Style the table */
table {
  border-collapse: collapse;
  width: 5%;
}

/* Style the caption */
caption {
  font-size: 1.2em;
  font-weight: bold;
  margin-bottom: 1em;
}

/* Style the table header */
th {
  background-color: #ddd;
  border: 1px solid #ccc;
  font-weight: normal;
  padding: 0.5em;
  text-align: center;
}

/* Style the table cells */
td {
  border: 1px solid #ccc;
  padding: 0.5em;
  text-align: center;
}

/* Style the button within a cell */
td button {
  background-color: yellow;
  border: none;
  padding: 0.25em 0.5em;
}

/* Style the selected day */
td.selected {
  background-color: #ddf;
}

/* Style the today cell */
td.today {
  background-color: #fdd;
}

/* Style the weekend cells */
td.weekend {
  background-color: #eee;
}

    </style>
</head>

<?php
// Connect to the database
include('../dbcon.php');

// Get the class schedule from the database
$sql = "SELECT * FROM class_schedule";
$result = mysqli_query($con, $sql);

// Initialize an array to store the class schedule
$schedule = array();

// Loop through the results and add them to the schedule array
while ($row = mysqli_fetch_assoc($result)) {
    $date = date('Y-m-d', strtotime($row['class_date']));
    if (!isset($schedule[$date])) {
        $schedule[$date] = 1;
    } else {
        $schedule[$date]++;
    }
}

// Set the timezone
date_default_timezone_set('UTC');

// Set the month and year to display
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date('n');
}
if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = date('Y');
}

// Get the number of days in the selected month
$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Get the name of the selected month
$monthName = date('F', mktime(0, 0, 0, $month, 1, $year));

// Get the day of the week the first day of the month falls on
$firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

// Determine the number of blank cells to insert before the first day
if ($firstDay == 7) {
    $blankCells = 0;
} else {
    $blankCells = $firstDay;
}

// Start the HTML output
echo "<table>";
echo "<caption style='color:black;'>$monthName $year</caption>";
echo "<tr>";
echo "<th style='color:black; font-weight:bold;'>Sun</th>";
echo "<th style='color:black; font-weight:bold;'>Mon</th>";
echo "<th style='color:black; font-weight:bold;'>Tue</th>";
echo "<th style='color:black; font-weight:bold;'>Wed</th>";
echo "<th style='color:black; font-weight:bold;'>Thu</th>";
echo "<th style='color:black; font-weight:bold;'>Fri</th>";
echo "<th style='color:black; font-weight:bold;'>Sat</th>";
echo "</tr>";

// Initialize the day counter
$dayCount = 1;

// Loop through each week in the month
while ($dayCount <= $numDays) {
    echo "<tr>";
    // Loop through each day in the week
    for ($i = 1; $i <= 7; $i++) {
        // Check if we need to insert a blank cell
        if ($blankCells > 0) {
            echo "<td>&nbsp;</td>";
            $blankCells--;
        } else {
            // Check if the current day is in the class schedule
            $date = date('Y-m-d', mktime(0, 0, 0, $month, $dayCount, $year));
            $classCount = isset($schedule[$date]) ? $schedule[$date] : 0;
            // Output the day cell with the class count
            echo "<td>";
            if ($classCount > 0) {
                echo "<button style='background-color: yellow;'>";
            }
            echo "<span style='font-weight: bold;'>$dayCount</span>";
            if ($classCount > 0) {
                echo "</button>";
            }
            echo "</td>";
            // Increment the day counter
            $dayCount++;
        }
        // Check if we've reached the end of the month
        if ($dayCount > $numDays) {
            break;
        }
    }
    echo "</tr>";
    if ($dayCount <= $numDays) {
        echo '<tr>';
   

    }
}
echo '</tbody></table>';
mysqli_close($con);
?>
