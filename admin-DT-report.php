
<?php
include "lang.php";
  $actionRemovePhDReport = str_replace("/load_admin_DT/","/admin_remove_dt_report/",$_SERVER['REQUEST_URI']);
  $actionShowPhDReport =str_replace("/load_admin_DT/","/show_DTReport/",$_SERVER['REQUEST_URI']);
?>

<p><button id="report_button">Supprimer la ligne sélectionnée</button></p>

<table id="report" class="display">
    <thead>
        <tr>
            <th></th>
            <th>Rapport</th>
            <?php        
                foreach ($report_headers as $row) {
                    echo "<th>".$translation[$row["COLUMN_NAME"]]."</th>";                
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php     

        foreach ($report_data as $row) {
            echo "<tr>";
            ?>
            <td class="dt-control" id="entry<?php echo $row['ID'];?>"></td>
            <td><i class='far fa-file-alt' onclick='window.open("<?php echo $actionShowDTReport; ?>?code=<?php echo htmlspecialchars(urlencode($this->enc("csi-".$row["Matricule"]."-DT")));?>", "_blank");'></i></td>   
            <?php
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
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function format(d) {
        return (
    <?php        
            $i=2;
            foreach ($report_headers as $row) {
                echo "'".addslashes($translation[$row["COLUMN_NAME"]])." : '+d[".$i."]+'<br>'+\n";                
                $i=$i+1;
            }
            echo "'<br>'"
    ?>
        );
    }

    sleep(2000).then(() => { 
        const table = new DataTable('#report', {
            columnDefs: [
                { targets: [0,1,4,5,6,7,44], visible: true},
                { targets: '_all', visible: false }
            ],
            select: {
               style: 'multi+shift'
            }
        });
 
        // Array to track the ids of the details displayed rows
        const detailRows = [];
        $("#report_button").on("click",function(){
            ids=table.rows({selected: true}).data();
            $.each(ids, function (index,value) {
                var anId=value[2];
                $.post("<?php echo $actionRemoveDTReport; ?>",{id: anId},function(data){
                    console.log(data);                
                });
            table.rows({selected: true}).remove().draw(false);            
        });
        });                

        table.on('click', 'tbody td.dt-control', function () {
            let tr = event.target.closest('tr');
            
            let row = table.row(tr);
            var anId=row.data()[1];
            let idx = detailRows.indexOf(anId);
        
            if (row.child.isShown()) {
                tr.classList.remove('details');
                row.child.hide();
        
                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            }
            else {
                tr.classList.add('details');
                row.child(format(row.data())).show();
        
                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(anId);
                }
            }
        });
        
        // On each draw, loop over the `detailRows` array and show any child rows
        table.on('draw', () => {
            detailRows.forEach((id, i) => {
                let el = document.querySelector('#entry' + id + ' td.dt-control');
        
                if (el) {
                    el.dispatchEvent(new Event('click', { bubbles: true }));
                }
            });
        });
    });
});
</script>