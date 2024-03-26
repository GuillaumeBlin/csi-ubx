<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<table id="report" class="display">
    <thead>
        <tr>
            <?php        
                foreach ($report_headers as $row) {
                    echo "<th>".$row["COLUMN_NAME"]."</th>";                
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php     
        foreach ($report_data as $row) {
            echo "<tr>";
            foreach ($row as $info) {
                echo "<td>".$info."</td>";    
            }            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
        $( document ).ready(function() {
            sleep(10000).then(() => { 

    new DataTable('#report', {
    scrollX: true
});
});
        });
</script>