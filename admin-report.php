
<table id="report" class="display">
    <thead>
        <tr>
            <th></th>
            <th></th>
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
            ?>
            <td class="dt-control"></td>   
            <td class="dt-editor-delete"><button><i class="fa fa-trash"/></button></td>         
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
            $i=1;
            foreach ($report_headers as $row) {
                echo "'".$row["COLUMN_NAME"]." :'+d[".$i."]+'<br>'+\n";                
                $i=$i+1;
            }
            echo "'<br>'"
    ?>
        );
    }

    sleep(2000).then(() => { 
        const table = new DataTable('#report', {
            columnDefs: [
                { targets: [0,1,3,4,43], visible: true},
                { targets: '_all', visible: false }
            ]
        });
 
        // Array to track the ids of the details displayed rows
        const detailRows = [];
        table.on('click', 'td.de-editor-delete button', function (e) {
            editor.remove(e.target.closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            });
        });
        table.on('click', 'tbody td.dt-control', function () {
            let tr = event.target.closest('tr');
            let row = table.row(tr);
            let idx = detailRows.indexOf(tr.id);
        
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
                    detailRows.push(tr.id);
                }
            }
        });
        
        // On each draw, loop over the `detailRows` array and show any child rows
        table.on('draw', () => {
            detailRows.forEach((id, i) => {
                let el = document.querySelector('#' + id + ' td.dt-control');
        
                if (el) {
                    el.dispatchEvent(new Event('click', { bubbles: true }));
                }
            });
        });
    });
});
</script>