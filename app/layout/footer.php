<footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>LNJ Tech Solution</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created by PMI IT Departement
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
  </section> 

  <script src="<?php echo URLROOT; ?>/assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/lib/bootstrap/js/bootstrap.min.js"></script>
  
  <script class="include" type="text/javascript" src="<?php echo URLROOT; ?>/assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

  <script src="<?php echo URLROOT; ?>/assets/lib/common-scripts.js"></script>

  <script>
    $(document).ready(function() {
        
        // --- LOGIC FOR SENSOR RECORDS ---
        if ($('#recordsTable').length) {
            var recTable = $('#recordsTable').DataTable({
                "pageLength": 25,
                "order": [[4, "desc"]],
                "language": {
                    "search": "Rechercher:"
                }
            });
            
            $('#min-date, #max-date').on('change', function() {
                recTable.draw();
            });
        }

        if ($('#cartoTable').length) {
            $('#cartoTable').DataTable({
                "pageLength": 10,
                "order": [[3, "desc"]], 
                "language": {
                    "search": "Rechercher un plan:"
                }
            });
        }
    });
  </script>
</body>
</html>