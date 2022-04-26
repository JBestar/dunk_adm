

<script src="<?php echo base_url('assets/js/worker.js');?>"></script>

<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo base_url('/assets/js/main-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo base_url('/assets/js/main-script.js?v=1');?>"></script>
<?php endif ?>

</body>
</html>