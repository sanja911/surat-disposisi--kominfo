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
			$sql = "select * from surat";
			$hasil = mysqli_query($db,$sql);
			if($hasil == false){
			die ("Terjadi Kesalahan : ". mysqli_error());
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
              <a href='show.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-check'></i> Detail</a>
            </li>
            <li class='divider'></li>
			<li>
              <a href='edit.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-check'></i> Edit</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href='download.php?id_surat=$ar[id_surat]'><i class='glyphicon glyphicon-download'></i> Unduh Berkas</a>
            </li>
			<li class='divider'></li>";?>
			<li>
             <a href="hapus.php?id_surat=<?php echo $ar['id_surat'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                <i class="glyphicon glyphicon-trash"></i> Hapus
              </a>
            </li>
			</ul>
        </div>
      </td>
			</tr>
			<?php
			$i++;		
			}
			?>
			</tbody>