<footer clSecurity Proposedass="custom_footer">
    <div class="containe-fluid">
        <div class="row">
            <div class="col-lg-6 pull-left">
                <span class="margin-right-15">© 2016 Credit mate.</span>
            </div>
            <div class="col-lg-6 col-md-6 pull-right text-right manage_mobile_footer">
                <ul class="list-inline terms">
                    <li><a href="javascript:void(0);">Privacy Policy</a></li>
                    <li><a href="javascript:void(0);">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- JavaScripts -->
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/holder.js" type="text/javascript"></script>
    <script src="js/pace.min.js" type="text/javascript"></script>
    <script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="js/core.js" type="text/javascript"></script>
    
    
    <!-- datatables -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- <script src="js/jquery.bootstrap.js" type="text/javascript"></script> -->
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
 <!-- maniac -->
    <script src="js/maniac.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script src="js/md5.js" type="text/javascript"></script>

    <!-- New Assests -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"    rel="stylesheet">    
     <link href="R_Assets/css/bootstrap-table.css" rel="stylesheet" />
     <link href="R_Assets/css/bootstrap-editable.css" rel="stylesheet" />
     <link href="R_Assets/css/custom.css" rel="stylesheet" />
     <script src="R_Assets/js/bootstrap-table.js" type="text/javascript"></script>
     <script src="R_Assets/js/tableExport.js" type="text/javascript"></script>
     <script src="R_Assets/js/bootstrap-editable.js" type="text/javascript"></script>
     <script src="R_Assets/js/bootstrap-table-editable.js" type="text/javascript"></script>
     <script src="R_Assets/js/bootstrap-table-export.js" type="text/javascript"></script>
     <script src="R_Assets/js/bootbox.min.js" type="text/javascript"></script>
     <script src="R_Assets/js/custom.js" type="text/javascript"></script>
    <!-- New Assests Ends -->



    <script type="text/javascript">
      var baseUrl_new = 'http://localhost/creditmate/public';
  	    $('.dob').datepicker({
            defaultDate: "+1w",
            minDate: new Date(1900,1-1,1), maxDate: '-18Y',
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat:"dd-mm-yy",
            changeYear: true,
            yearRange: "-100:+0", 
        });
        $('.datepicker').datepicker({
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat:"dd-mm-yy",
  		      changeYear: true,
  		      yearRange: "-100:+1", 
        });
        $('.datepicker_day').datepicker({
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat:"dd",
            changeYear: false,
        });
  	    $('.upto').datepicker({
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat:"dd-mm-yy",
  	        changeYear: true,
  	        yearRange: "-1:+50", 
        });
        jQuery(document).ready(function() {
          bootbox.init();
  	    });
      	$(document).on('click','a.confirm',function(e){
          var link = $(this).attr("href");
  	      e.preventDefault();
          bootbox.confirm($(this).attr('confirm-text'), function(confirmed) {
  	    	  if(confirmed)
  	    	    document.location.href = link;
  	      });
  	    });
      $(function(){ });
    </script>
    <script type="text/javascript">
        maniac.loaddatatables();

        $(document).ready(function(){
          $("#click_toggle").click(function(){
            $("#show_toogle").toggle(1000);
          });
        });
    </script> 
    <script>
    $(function() {
      var dateFormat = "dd-mm-yy",
      from = $( "#from_date" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat:"dd-mm-yy",
          maxDate: '0'
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to_date" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat:"dd-mm-yy",
        maxDate: '0'
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  });
  </script>
  <script src="js/jquery.PrintArea.js" type="text/javascript"></script>  
</body>
</html>	
	</div>
</div>