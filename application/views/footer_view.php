<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	
				<!--iv class="footer">
				  <p>handsomepcm&trade; cocotubog&reg; &copy; 2014</p>
				</div-->
				<br><br?
	        </div>
      	</div>
    </div>
	<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/datatables-bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.jeditable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.dataTables.editable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/custom/fnreloadajax.js"></script>
	<?php
		if (isset($customjs)) 
		{
			echo $customjs;
		}
		if (isset($subject)) 
		{
			$encoded = json_encode($subject);
		}
	?>

	<script type="text/javascript">
		var APP_URL = "<?php echo base_url()?>";
		var CSRF_HASH = '<?php echo $this->security->get_csrf_hash(); ?>';
		$.ajaxSetup({
	        data: {
	            csrf_test_name: '<?php echo $this->security->get_csrf_hash(); ?>'
	        }
	    });

	    var subjects = '<?php echo (isset($subject)) ? $encoded : "" ?>';

	</script>

</body>
</html>