<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    
    <a href="<?php echo URLROOT; ?>/home" class="logo"><b>ET<span>MS</span></b></a>
    <div class="nav notify-row" id="top_menu">
        </div>
    
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
           <li>
    <a class="logout" href="<?php echo URLROOT; ?>/users/logout">
        <i class="fa fa-sign-out"></i> Déconnexion
    </a>
</li>
        </ul>
    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {
    $('#logsTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', text: '<i class="fa fa-file-excel-o"></i> Excel', className: 'btn btn-success' },
            { extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf-o"></i> PDF', className: 'btn btn-danger' }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });
});
</script>
</header>