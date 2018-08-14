<?php
function is_active($page) {
  $uri = "$_SERVER[REQUEST_URI]";
  if (strpos($uri, $page)) {
    echo 'active';
  }
}
?>

<ul class="nav nav-sidebar">
  <li class="<?php is_active('dasbor'); ?>">
    <a href="../dasbor"><i class="glyphicon glyphicon-home"></i> Dasboard</a>
  </li>
 <li class="<?php is_active('surat'); ?>">
    <a href="../surat"><i class="glyphicon glyphicon-list-alt"></i> Data Surat</a>
  <li class="<?php is_active('user'); ?>">
    <a href="../user"><i class="glyphicon glyphicon-user"></i> User</a>
  </li>
</ul>

