
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="assets/js/general.js"></script>
    <?php
		if(isset($data['urlJquery'])){
    ?>
      <script src="<?php echo  $data['urlJquery'] ?>"></script>
    <?php 
      }
    ?> 
  </body>
</html>