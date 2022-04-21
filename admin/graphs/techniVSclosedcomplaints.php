<?php

$conn = mysqli_connect("localhost", "ossum", "focus", "cpmsphp");
$sqlQuery = "SELECT dummy,COUNT(*) as total_complaints FROM `view_cmp` WHERE `statuses` like 'closed' group by dummy;
";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
$data = json_encode($data);



$name = array();
$comp = array();




mysqli_close($conn);
?>


<!DOCTYPE html>
 <html>
   <head>
   <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- semantic UI -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css"
    />
    <!--Chart js-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"
      integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E="
      crossorigin="anonymous"
    />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
      
    </style>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>IT_LOG</title>
   </head>
   <body>
   <h1 style="text-align: center">IT_LOG</h1>
    <hr />
    <div
      style="
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
      "
    >
      <h2 style="text-align: center">
        Bar Graph of Technicians vs their Closed Complaints in 
      </h2>
      <div
        class="chart-container"
        style="position: relative; height: 80vh; width: 80vw"
      >
        <canvas id="myChart"></canvas>
      </div>
  </body>
</html>


<script>

<?php
     echo "var data ='$data';";
 ?>
data = JSON.parse(data)
console.log(data)
let names = []
let complaints = []

for (let i = 0; i < data.length; i++) {
  // console.log(data[i]['name'] + ' ' + data[i]['total_complaints']);
  names.push(data[i]['dummy'])
  // console.log(data[i])
  complaints.push(data[i]['total_complaints'])
}

console.log(names)

    $(document).ready(function () {
      const ctx = document.getElementById("myChart").getContext("2d");
      const myChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: names,
          datasets: [
            {
              label: "Technician name",
              data:complaints,
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                  beginAtZero: true
              }
            }]
          },
        },
      });
    });
  </script>