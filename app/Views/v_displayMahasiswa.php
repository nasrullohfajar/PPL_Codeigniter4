<?= $this->extend('v_template')?>
<?= $this->section('content')?>
<table border="1" width = 100%>
    <form action="<?= base_url(); ?>/mahasiswa" method="GET">
        <input type="text" name="cari" placeholder="cari berdasarkan nama">
        <button type="submit">cari</button>
    </form>
        <tr>
            <th>no</th>
            <th>nim</th>
            <th>nama</th>
            <th>umur</th>
            <th>opsi</th>
        </tr>

        <?php
            $no = 1;
            if(!empty($mahasiswa)){
                foreach($mahasiswa as $data){?>
                <tr>
                    <td><?=$no;?></td>
                    <td><?=$data['NIM'];?></td>
                    <td><?=$data['Nama'];?></td>
                    <td><?=$data['Umur'];?></td>
                    <td><a href="/mahasiswa/detail/<?php echo $data['NIM'];?>">detail</a>
                        <a href="/mahasiswa/edit/<?php echo $data['NIM'];?>">edit
                    </td>
                </tr>
            
        <?php
            $no++;
            }
        }
        ?>
    </table>
<?= $this->endSection()?>