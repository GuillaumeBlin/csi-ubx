<script type="text/javascript" src="/concrete/js/jquery.js"></script>
<link href="/application/files/cache/css/ub_tiers/main.css" rel="stylesheet" type="text/css" media="all">

<style type="text/css">
.print-content {    
  display: none !important;
}
        @media print {
             *{
                font-size: 1em!important;
             }
             .print-content {
                display: block !important;
            }
            textarea {display: none !important;}
             h1{
                font-size: 2em!important;
             }
             h3{
                page-break-before: always;
                font-size: 1.5em!important;
             }
             h3:first-of-type{
                page-break-before: avoid;
             }
            h3::before {
                content: ''!important;
                position: absolute!important;
                top: 0!important;
                left: 0!important;
                width: 2px!important;
                height: 28px!important;
                border-radius: 1px!important;
                background: blue!important;
                transform-origin: 0 100%!important;
                transform: translateY(2px) rotate(30deg)!important;
            }
             h4{
                font-size: 1.3em!important;
                text-transform:none!important;
             }
             h5{
                margin-bottom: 0px;
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