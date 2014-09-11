
      </div><!-- /.row -->

    </div><!-- /.container -->

    <!--div class="blog-footer">
      <p>handsomepcm&trade; cocotubog&reg; &copy; 2014</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div-->
    <br><br><br>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.validate.js"></script>
    <?php
      if (isset($customjs)) 
      {
        echo $customjs;
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
    </script>
  </body>
</html>