<?php
function Maketab($batas, $aturan, $warna) {
    ?>
    <table class="tabel">
        <tr>
            <th></th>
            <?php for($i=1; $i<=$batas; $i++): ?>
                <th><?= $i ?></th>
            <?php endfor; ?>
        </tr>

        <?php for($j=1; $j<=$batas; $j++): ?>
            <tr>
                <th><?= $j ?></th>
                <?php for($k=1; $k<=$batas; $k++): ?>
                    <?php if ($aturan == "1"): ?>
                        <?php $x = ($j % $k) * ($j % $k) * ($j % $k); ?>
                        <?php if ($x ** 3 == $j % $k): ?>
                            <td style="background-color:<?= $warna ?>"><?= $j % $k ?></td>
                        <?php else: ?>
                            <td><?= $j % $k ?></td>
                        <?php endif; ?>

                    <?php elseif ($aturan == "2"): ?>
                        <?php if ($batas == $k || $k == 1 || $batas == $j || $j == 1): ?>
                            <td style="background-color:<?= $warna ?>"><?= $j % $k ?></td>
                        <?php else: ?>
                            <td><?= $j % $k ?></td>
                        <?php endif; ?>

                    <?php elseif ($aturan == "3"): ?>
                        <?php if ($j % $k <= 1): ?>
                            <td><?= $j % $k ?></td>
                        <?php else: ?>
                            <?php
                                $prime = 0;
                                for ($fit = 1; $fit <= ($j % $k); $fit++):
                                    if (($j % $k) % $fit == 0):
                                        $prime++;
                                    endif;
                                endfor;
                            ?>
                            <?php if ($prime == 2): ?>
                                <td style="background-color:<?= $warna ?>"><?= $j % $k ?></td>
                            <?php else: ?>
                                <td><?= $j % $k ?></td>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php elseif ($aturan == "4"): ?>
                        <?php if ($j == $k): ?>
                            <td style="background-color:<?= $warna ?>"><?= $j % $k ?></td>
                        <?php else: ?>
                            <td><?= $j % $k ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <?php
}
