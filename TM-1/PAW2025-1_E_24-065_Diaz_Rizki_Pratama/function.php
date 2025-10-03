<?php function tampilkanTabel($batasUkuran, $aturanFilter, $warnaFilter){ ?>
<?php if ($aturanFilter == 'satu'):?>
    <table>
        <!-- INI HEADER HORIZONTAL -->
        <tr>
            <th></th>
            <?php for ($i=1; $i <= $batasUkuran ; $i++): ?>
            <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>

        <!-- INI HEADER VERTIKAL -->
        <?php for ($j=1; $j <= $batasUkuran ; $j++): ?>
        <tr>
            <th><?= $j ?></th>

            <!-- INI ISI TABEL -->
            <?php for ($k=1; $k <= $batasUkuran ; $k++): ?>
                <?php 
                $hasil = $j ** $k;
                $akar = sqrt($hasil);
                ?>
                <?php if($akar == floor($akar)): ?>
                    <td style="background-color: <?= $warnaFilter ?>;"><?=$hasil?></td>
                <?php else: ?>
                    <td><?=$hasil?></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>

    </table>

<!-- INI BAGIAN PERCABANGAN 2 -->
<?php elseif ($aturanFilter == 'dua'): ?>
    <table>

        <!-- INI HEADER HORIZONTAL -->
        <tr>
            <th></th>
            <?php for ($i=1; $i <= $batasUkuran ; $i++): ?>
            <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>
        
        <!-- INI HEADER VERTIKAL -->
        <?php for ($j=1; $j <= $batasUkuran ; $j++): ?>
        <tr>
            <th><?= $j ?></th>

            <!-- INI ISI TABEL -->
            <?php for ($k=1; $k <= $batasUkuran ; $k++): ?>
                <?php $hasil = $j ** $k; ?>
                <?php if(($j + $k) % 2 == 0): ?>
                    <td style="background-color: <?= $warnaFilter ?>;"><?=$hasil?></td>
                <?php else: ?>
                    <td><?=$hasil?></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

<!-- INI BAGIAN PERCABANGAN KETIGA -->
<?php elseif ($aturanFilter == 'tiga'): ?>
    <table>
        <!-- INI HEADER HORIZONTAL -->
        <tr>
            <th></th>
            <?php for ($i=1; $i <= $batasUkuran ; $i++): ?>
            <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>

        <!-- INI HEADER VERTIKAL -->
        <?php for ($j=1; $j <= $batasUkuran ; $j++): ?>
        <tr>
            <th><?= $j ?></th>

            <!-- INI ISI TABEL -->
            <?php for ($k=1; $k <= $batasUkuran ; $k++): ?>
                <?php 
                $komposit = 0;
                $hasil = $j ** $k;
                ?>

                <?php for ($x = 1; $x <= $hasil; $x++): ?>
                <?php 
                if ($hasil % $x == 0) {
                    $komposit+=1;
                }
                if ($komposit > 2) {
                    break;
                }
                ?>
                <?php endfor; ?>

                <?php if ($komposit > 2): ?>
                    <td style="background-color: <?= $warnaFilter ?>;"><?=$hasil?></td>
                <?php else: ?>
                    <td><?= $hasil ?></td>
                <?php endif; ?>

            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

<!-- INI BAGIAN PERCABANGAN KEEMPAT -->
<?php elseif ($aturanFilter == 'empat'): ?>
    <table>

        <!-- INI HEADER HORIZONTAL -->
        <tr>
            <th></th>
            <?php for ($i=1; $i <= $batasUkuran ; $i++): ?>
            <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>

        <!-- INI HEADER VERTIKAL -->
        <?php $temp = $batasUkuran ?>
        <?php for ($j=1; $j <= $batasUkuran ; $j++): ?>
        <tr>
            <th><?= $j ?></th>

            <!-- INI ISI TABEL -->
            <?php for ($k=1; $k <= $batasUkuran ; $k++): ?>
                <?php 
                $hasil = $j ** $k;
                ?>
                <?php if($temp == $k): ?>
                    <td style="background-color: <?= $warnaFilter ?>;"><?=$hasil?></td>
                <?php else: ?>
                    <td><?=$hasil?></td>
                <?php endif; ?>
            <?php endfor; ?>
        <?php $temp-=1 ?>
        </tr>
        <?php endfor; ?>
    </table>

<?php else: ?>
    <p style="text-align: center; font-weight: bold; margin-top: 20px;">Silahkan pilih aturan filter tampilan!</p>
<?php endif; ?>
<?php } ?>