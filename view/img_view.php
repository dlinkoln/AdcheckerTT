<?php
  $img = $imgs_arr[random_int(0, count($imgs_arr)-1)];
?>
<img class="widget" src="pics/<?=$img;?>" alt=""/>

<script>
  document.querySelector('.widget').addEventListener('click', async function(e) {
    await fetch('?clicked', { method: 'HEAD' })
    window.location = "http://www.srilankaembassy.ru/ru/"
  })
</script>