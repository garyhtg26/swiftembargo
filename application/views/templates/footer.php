<!-- Footer -->
<footer class="page-footer font-small bg-darker ">

<!-- Copyright -->
<div style="color: white;" class="footer-copyright text-center py-3">© 2021 Copyright:
  <a href="https://idxpartners.com/"> Id/x partners</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
     <script>
      function toggleCheckbox(element)
 {
    if (element.checked) {
      $('#noid').prop('readonly', true);
      document.getElementById("noid").value = '';

    }
    else if (!element.checked){
      $('#noid').removeProp('readonly');
      $('#noid').prop('readonly', false);

     

    }
 }
    </script>
   <script>
      $(document).ready(function() {
          $('#example').DataTable(
            {
                "lengthMenu": [[50, 100,150,200, -1], [50,100,150,200, "All"]],
                "ordering": true,
                "order": [[ 0, "desc" ]],
                
            } 
          );
      } );
    </script>
  </body>
</html>
