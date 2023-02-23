
    <script src="/PHP-2/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/PHP-2/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/PHP-2/assets/js/custom.js"></script>
    <script src="/PHP-2/assets/js/owl.carousel.min.js"></script>

    <!-- Alertify JS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
          alertify.set('notifier','position', 'top-right');
            <?php 
                if(isset($_SESSION['status']))
                {
            ?>
                    alertify.success('<?=$_SESSION['status']?>');
            <?php
                    unset($_SESSION['status']);        
                } 
            ?>
        </script>

  </body>
</html>