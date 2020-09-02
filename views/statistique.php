<?php ob_start() ?>
    <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts(){
        // Create the data table.
            var data = new google.visualization.arrayToDataTable([
                ['Titre','nombre'],
                <?php foreach($arr as $key=>$val){?>
                    ['<?= $val['Nombre']?>','<?= $val['Titre']?>'],
                <?php}?>
            ]);

            var options = {
                title: 'Les 5 meilleures ventes',
                width: 800,
                heigh: 350,
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