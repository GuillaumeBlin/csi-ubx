<?php
include "lang.php";
$actionRemoveCSIReport = str_replace("/load_admin_CSI/", "/admin_remove_csi_report/", $_SERVER['REQUEST_URI']);
$actionShowCSIReport = str_replace("/load_admin_CSI/", "/show_CSIReport/", $_SERVER['REQUEST_URI']);
?>

<table id="report-csi" class="display">
    <thead>
        <tr>
            <th></th>
            <th>Rapport</th>
            <?php
            foreach ($report_headers as $row) {
                echo "<th>" . $translation[$row["COLUMN_NAME"]] . "</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($report_data as $row) {
            echo "<tr>";
        ?>
            <td class="dt-control" id="entry<?php echo $row['ID']; ?>"></td>
            <td><i class='far fa-file-alt' onclick='window.open("<?php echo $actionShowCSIReport; ?>?code=<?php echo htmlspecialchars(urlencode($this->enc("csi-" . $row["Matricule"] . "-CSI"))); ?>", "_blank");'></i></td>
        <?php
            foreach ($row as $info) {
                echo "<td>" . $info . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        function format(d) {
            return (
                <?php
                $i = 2;
                foreach ($report_headers as $row) {
                    echo "'" . addslashes($translation[$row["COLUMN_NAME"]]) . " : '+d[" . $i . "]+'<br>'+\n";
                    $i = $i + 1;
                }
                echo "'<br>'"
                ?>
            );
        }

        sleep(0).then(() => {
            const table = new DataTable('#report-csi', {
                columnDefs: [{
                        targets: [0, 1, 4, 8, 9, 10, 11, 43],
                        visible: true
                    },
                    {
                        targets: '_all',
                        visible: false
                    }
                ],
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'selectAll',
                                text: 'Tout sélectionner',
                                titleAttr: 'Sélectionner toutes les lignes'
                            },
                            {
                                extend: 'selectNone',
                                text: 'Ne rien sélectionner',
                                titleAttr: 'Sélectionner aucune ligne'
                            },
                            {
                                text: '<i class="far fa-trash-alt"></i>',
                                titleAttr: 'Supprimer les lignes sélectionnées',
                                className: 'report-csi_button'
                            },
                            {
                                extend: 'spacer',
                                style: 'bar'
                            },
                            {
                                extend: 'csv',
                                titleAttr: 'Export en CSV',
                                text: '<i class="fas fa-file-csv"></i>',
                                filename: 'Rapports-CSI',
                                exportOptions: {
                                    modifier: {
                                        page: 'all',
                                        search: 'none'
                                    }
                                }
                            },
                            {
                                extend: 'excel',
                                titleAttr: 'Export en Excel',
                                text: '<i class="far fa-file-excel"></i>',
                                filename: 'Rapports-CSI',
                                exportOptions: {
                                    modifier: {
                                        page: 'all',
                                        search: 'none'
                                    }
                                }
                            }

                        ]
                    }
                },
                select: {
                    style: 'multi+shift'
                }
            });

            // Array to track the ids of the details displayed rows
            const detailRows = [];
            $(".report-csi_button").on("click", function() {
                ids = table.rows({
                    selected: true
                }).data();
                if (ids.length>0 && confirm('Vous êtes sur le point de supprimer ' + ids.length + ' rapport(s). Etes-vous sûr(e) de vouloir continuer ?')) {

                    $.each(ids, function(index, value) {
                        var anId = value[2];
                        $.post("<?php echo $actionRemoveCSIReport; ?>", {
                            id: anId
                        }, function(data) {
                            console.log(data);
                        });
                        table.rows({
                            selected: true
                        }).remove().draw(false);
                    });
                }
            });

            table.on('click', 'tbody td.dt-control', function() {
                let tr = event.target.closest('tr');

                let row = table.row(tr);
                var anId = row.data()[1];
                let idx = detailRows.indexOf(anId);

                if (row.child.isShown()) {
                    tr.classList.remove('details');
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice(idx, 1);
                } else {
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
                        el.dispatchEvent(new Event('click', {
                            bubbles: true
                        }));
                    }
                });
            });
        });
    });
</script>