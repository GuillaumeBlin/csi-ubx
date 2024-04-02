<script type="text/javascript" src="/concrete/js/jquery.js"></script>
<link href="/application/files/cache/css/ub_tiers/main.css" rel="stylesheet" type="text/css" media="all">

<style type="text/css">
        @media print {
             *{
                font-size: 80%x!important;
             }
             h3::before, .h3::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 28px;
                border-radius: 1px;
                background: rgb(var(--site-color));
                transform-origin: 0 100%;
                transform: translateY(2px) rotate(30deg);
            }

        }
    </style>

<div class="std-page">
    <div class="wrapper">
        <main id="content-main" class="std-page-main std-content">
            <div class="std-page-main-inner">
                <h1>Rapport annuel du comité de suivi individuel de thèse</h1>
<?php 
$report_read_only=true;
include('form-CSI.php');
?>
            </div>
        </main>
    </div>            
</div>