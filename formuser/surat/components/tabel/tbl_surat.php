<thead>
					<tr>
      <th>No.</th>
      <th>Tanggal Surat</th>
      <th>Nomor Surat</th>
      <th>Tanggal</th>
      <th>Perihal</th>
      <th>Nama Pengirim</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
	</thead>
		<tbody>
		<?php
			$name=$_SESSION['username_user'];
			$query="select * from user where username_user='$name'";	
			$hasil1=mysqli_query($db,$query);
			$bdg=mysqli_fetch_assoc($hasil1);
			$sql = "select * from surat where nama_bdg='$bdg[nama_bdg]'";
			$hasil = mysqli_query($db,$sql);
			if($hasil == false){
			}
			$i=1;
			while ($ar = mysqli_fetch_array ($hasil)){
				
			echo "
			<tr>
			<td align=center>$i</td>
			<td>$ar[tgl_surat]</td>
			<td>$ar[nmr_surat]</a></td>
			<td>$ar[tanggal]</td>														
			<td>$ar[perihal]</a></td>
			<td>$ar[nama]</a></td>
			<td>$ar[keterangan]</a></td>
			<td>
        <!-- Single button -->
        <div class='btn-group pull-right'>
          <button type='button' class='btn btn-default btn-xs dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>
          <span class='caret'></span>
          </button>
          <ul class='dropdown-menu pull-right' role='menu'>
            <li>
              <a href='conf.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-danger'></i> Konfirmasi</a>
            </li>
			<li class='divider'></li>
             <li>
              <a href='show.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-check'></i> Detail</a>
            </li>
            
            <li class='divider'></li>
            <li>
              <a href='download.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-download'></i> Unduh Berkas</a>
            </li>
            </ul>
        </div>
      </td>
			</tr>";
			$i++;		
			}
			?>
			</tbody>