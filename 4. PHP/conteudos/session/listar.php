<h1>Interagindo com a session</h1>

<ul>
    <?php
    session_start();

    $gols = ($_SESSION['gols']) ? $_SESSION['gols'] : array();

    $time = @$_REQUEST['time'];

    if (@$_REQUEST['action'] == 'remove') {
        echo ("remover " . $_REQUEST["time"]);
        unset($gols[$_REQUEST["time"]]);
    } else if (@$_REQUEST['action'] == 'up') {
        $gols[$time] = $gols[$time] + 1;
    } else if (@$_REQUEST['action'] == 'down') {
        $gols[$time] = $gols[$time] - 1;
    }


    foreach ($gols as $time => $qtd) :
    ?>
        <li>
            <form action="" method="GET">
                <?= $time ?> - <?= $qtd ?>
                <input type="hidden" name="time" value="<?= $time ?>" />
                <button type="submit" name="action" value="remove">X</button>
                <button type="submit" name="action" value="up">+</button>
                <button type="submit" name="action" value="down">-</button>
            </form>
        </li>
    <?php
    endforeach;

    $_SESSION["gols"] = $gols;
    print_r($_SESSION);
    ?>
</ul>