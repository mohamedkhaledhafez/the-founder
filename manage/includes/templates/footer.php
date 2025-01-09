 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
     <div class="copyright">
         &copy; Copyright <strong><span>Ultra Apps</span></strong>. All Rights Reserved
     </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


 <!-- Vendor JS Files -->
 <script src="<?php echo $vendor ?>apexcharts/apexcharts.min.js"></script>
 <script src="<?php echo $vendor ?>bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo $vendor ?>chart.js/chart.umd.js"></script>
 <script src="<?php echo $vendor ?>echarts/echarts.min.js"></script>
 <script src="<?php echo $vendor ?>quill/quill.min.js"></script>
 <script src="<?php echo $vendor ?>simple-datatables/simple-datatables.js"></script>
 <script src="<?php echo $vendor ?>tinymce/tinymce.min.js"></script>
 <script src="<?php echo $vendor ?>php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="<?php echo $js ?>main.js"></script>
 <!-- <script src="<?php echo $js ?>mdb.min.js"></script> -->

 <!-- <script src="<?php echo $js ?>backend.js"></script> -->

 <script>
     /* Google Chart -------------------------------------------------------------------*/
     // Load the Visualization API and the piechart package.
     google.load('visualization', '1.0', {
         'packages': ['corechart']
     });

     // Set a callback to run when the Google Visualization API is loaded.
     google.setOnLoadCallback(drawChart);

     // Callback that creates and populates a data table,
     // instantiates the pie chart, passes in the data and
     // draws it.
     function drawChart() {

         // Create the data table.
         var data = new google.visualization.DataTable();
         data.addColumn('string', 'Topping');
         data.addColumn('number', 'Slices');
         data.addRows([
             ['Mushrooms', 3],
             ['Onions', 1],
             ['Olives', 1],
             ['Zucchini', 1],
             ['Pepperoni', 2]
         ]);

         // Set chart options
         var options = {
             'title': 'How Much Pizza I Ate Last Night'
         };

         // Instantiate and draw our chart, passing in some options.
         var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
         pieChart.draw(data, options);

         var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
         barChart.draw(data, options);
     }

     $(document).ready(function() {
         if ($.browser.mozilla) {
             //refresh page on browser resize
             // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
             $(window).bind('resize', function(e) {
                 if (window.RT) clearTimeout(window.RT);
                 window.RT = setTimeout(function() {
                     this.location.reload(false); /* false to get page from cache */
                 }, 200);
             });
         } else {
             $(window).resize(function() {
                 drawChart();
             });
         }
     });
 </script>
 <script src="<?php echo $js ?>sweetalert.min.js"></script>
 <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
     <script>
         swal({
             title: "<?php echo $_SESSION['status']; ?>",
             icon: "<?php echo $_SESSION['status_code']; ?>",
             button: "OK",
         });
     </script>
 <?php
        unset($_SESSION['status']);
    }

    ?>
 </body>

 </html>