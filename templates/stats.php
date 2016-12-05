<?php
  include "base.php"
?>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>

    <script type="text/javascript">
      onReady('#chart', function() {
        var chart = c3.generate({
            data: {
                columns: [
                    ['data1', 30],
                    ['data2', 120],
                ],
                type : 'donut',
                onclick: function (d, i) { console.log("onclick", d, i); },
                onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                onmouseout: function (d, i) { console.log("onmouseout", d, i); }
            },
            donut: {
                title: "Iris Petal Width"
            }
        });
      });

      // Set a timeout so that we can ensure that the `chart` element is created.
      function onReady(selector, callback) {
        var intervalID = window.setInterval(function() {
          if (document.querySelector(selector) !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
          }
        }, 500);
      }
    </script>
  </head>
  <body>
    <div id="chart"></div>
  </body>
</html>
