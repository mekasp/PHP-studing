<?php
$tests = [
    0 => [
        'question' => 'Употребляешь?',
        'answer' => 'ДА',
        'options' => [
            'ДА','НЕТ'
        ]
    ],
    1 => [
        'question' => 'Чаще чем раз в неделю?',
        'answer' => 'ДА',
        'options' => [
            'ДА','НЕТ'
        ]
    ],
    2 => [
        'question' => 'Любиль колоться в подьездах?',
        'answer' => 'ДА',
        'options' => [
            'ДА','НЕТ'
        ]
    ],
    3 => [
        'question' => 'Любишь сосать за пакет солей?',
        'answer' => 'ДА',
        'options' => [
            'ДА','НЕТ'
        ]
    ],
    4 => [
        'question' => 'Сколько обычно берешь грамм за отсос?',
        'answer' => '5г',
        'options' => [
                '1г','3г','5г','6г'
        ]
    ]
];


var_dump($_POST);

if (isset($_POST['answers'])) {
    $rightAnswers = 0;
    if ($tests[0]['answer'] == $_POST['answers'][0]) {
        $rightAnswers++;
    }
    if ($tests[1]['answer'] == $_POST['answers'][1]) {
        $rightAnswers++;
    }
    if ($tests[2]['answer'] == $_POST['answers'][2]) {
        $rightAnswers++;
    }
    if ($tests[3]['answer'] == $_POST['answers'][3]) {
        $rightAnswers++;
    }
    if ($tests[4]['answer'] == $_POST['answers'][4]) {
        $rightAnswers++;
    }
    var_dump(($rightAnswers / count($tests)) * 100);

}
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Тест на наркомана<br>На сколько ты наркоман?</h1>
        <form method="post">

            <?php foreach ($tests as $key => $test){ ?>

                <p><?php echo $test['question'];?></p>

                <select name="answers[<?php echo $key; ?>]">

                    <?php foreach ($test['options'] as $option) {?>
                        <option value="<?php echo $option; ?>"> <?php echo $option; ?> </option>
                    <?php }?>

                </select>
                <hr/>

            <?php } ?>

            <button type="submit">Подтвердить</button>
        </form>
        <p>ВЫ НАРКОМАН НА<?php echo ($rightAnswers / count($tests)) * 100;?> %</p>
    </body>
</html>
