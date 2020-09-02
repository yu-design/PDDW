<?php ob_start() ?>
    <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts(){
        // Create the data table.
            var data = new google.visualization.arrayToDataTable([
                ['Titre', 'Nombre'],

                <?php foreach($arr as $key=>$val):?>
                    ['<?php echo $val['Titre']?>', <?php echo $val['Nombre']?>],
                <?php endforeach ?>

            ]);

            var options = {
                title: 'Les 5 meilleures ventes',
                width: 800,
                heigh: 800,
            };
            
            var chart = new google.visualization.PieChart(document.getElementById('charts'));
            chart.draw(data, options);
        }
    </script>
    <div id="charts"></div>

<?php
    $titre = "Statistique de vente";
    $content = ob_get_clean();
?>
