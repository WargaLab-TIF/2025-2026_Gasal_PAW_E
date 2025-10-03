<?php
function Maketab($batas, $aturan, $warna) {
    ?>
    <table class="tabel">
        <tr>
            <th></th>
            <?php for($h=1; $h<=$batas; $h++): ?>
                <th><?= $h ?></th>
            <?php endfor; ?>
        </tr>

        <?php for($i=1; $i<=$batas; $i++): ?>
            <tr>
                <th><?= $i ?></th>
                <?php for($j=1; $j<=$batas; $j++): ?>
                    <?php if ($aturan == "1"): ?>
                        <?php $x = ($i % $j) * ($i % $j) * ($i % $j); ?>
                        <?php if ($x ** 3 == $i % $j): ?>
                            <td style="background-color:<?= $warna ?>"><?= $i % $j ?></td>
                        <?php else: ?>
                            <td><?= $i % $j ?></td>
                        <?php endif; ?>

                    <?php elseif ($aturan == "2"): ?>
                        <?php if ($batas == $j || $j == 1 || $batas == $i || $i == 1): ?>
                            <td style="background-color:<?= $warna ?>"><?= $i % $j ?></td>
                        <?php else: ?>
                            <td><?= $i % $j ?></td>
                        <?php endif; ?>

                    <?php elseif ($aturan == "3"): ?>
                        <?php if ($i % $j <= 1): ?>
                            <td><?= $i % $j ?></td>
                        <?php else: ?>
                            <?php
                                $prime = 0;
                                for ($fit = 1; $fit <= ($i % $j); $fit++):
                                    if (($i % $j) % $fit == 0):
                                        $prime++;
                                    endif;
                                endfor;
                            ?>
                            <?php if ($prime == 2): ?>
                                <td style="background-color:<?= $warna ?>"><?= $i % $j ?></td>
                            <?php else: ?>
                                <td><?= $i % $j ?></td>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php elseif ($aturan == "4"): ?>
                        <?php if ($i == $j): ?>
                            <td style="background-color:<?= $warna ?>"><?= $i % $j ?></td>
                        <?php else: ?>
                            <td><?= $i % $j ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <?php
}