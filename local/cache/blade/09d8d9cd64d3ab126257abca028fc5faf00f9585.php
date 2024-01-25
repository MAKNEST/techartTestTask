<div class="<?php echo e($block); ?>" id="<?php echo e($id); ?>" style="width: 100%; height: 70vh" attr-test="<?php echo e($data); ?>">
   <div class="<?php echo e($block->elem('adress')); ?>">
      <?php echo $addres; ?>

   </div>   
</div>

<script>
   localStorage.setItem('data', {'"' + <?php echo $data; ?> + '"'});


</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){
   w[l] = w[l] || [];
   w[l].push({
         'gtm.start': new Date().getTime(),
         event: 'gtm.js'
      });

   var f=d.getElementsByTagName(s)[0],
      j= d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
      console.log(dl);
   j.async=true;
   j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
   f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NZSS8MH');</script>
<!-- End Google Tag Manager -->
<?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/office/map/map.blade.php ENDPATH**/ ?>