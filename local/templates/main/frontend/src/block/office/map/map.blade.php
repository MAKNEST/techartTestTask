<div class="{{ $block }}" id="{{ $id }}" style="width: 100%; height: 70vh" attr-test="{{ $data }}">
   <div class="{{ $block->elem('adress') }}">
      {!! $addres !!}
   </div>   
</div>

<script>
   localStorage.setItem('data', {'"' + {!! $data !!} + '"'});


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
