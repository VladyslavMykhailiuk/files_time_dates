<?php
// Завдання 1

$file = fopen('test.txt','w+');
fwrite($file,'Hello Palmo' . PHP_EOL);
fclose($file);

// Завдання 2
$file = fopen('test.txt','r+');
$text = filesize('test.txt');
echo $text . "<br>";
fclose($file);

// Завдання 3

$file = fopen('test2.txt','w+');
unlink('test2.txt');

// Завдання 4

if(!is_dir('testDir')) {
    mkdir('testDir');
}

// Завдання 5

$arr = ['test1','test2','test3'];
foreach ($arr as $item) {
    if(!is_dir("testDir/$item")){
        mkdir('testDir/'.$item);
    }
}

// Завдання 6
//
$dir = array_diff(scandir('testDir'), array('.', '..'));
foreach ($dir as $item) {
    $file= fopen("testDir/$item/Hello.txt",'w+');
    fwrite($file,'Hello world'. PHP_EOL);
    fclose($file);
    echo file_get_contents("testDir/$item/Hello.txt");
}


// Завдання 7

function isFileOrDirectory(string $filename) :string {
    if(file_exists($filename)){
        return 'Передане значення є файлом або папкою';
    }
    else return 'Такої папки або файлу не існує';
}

echo "<br>". isFileOrDirectory('test.txt') . "<br>";

// Завдання 8

echo time() . "<br>" ;

// Завдання 9

echo mktime(0, 0, 0, 3,1, 2025) . "<br>";

// Завдання 10

echo mktime(0,0,0,12,31) . "<br>";

// Завдання 11

echo time() - mktime(13,12,59,3,15,2000) ."<br>";

// Завдання 12

echo floor((time() -mktime(7,23,48,)) / 3600) . "<br>";

// Завдання 13

echo date('Y.m.d H:i:s') . "<br>";

// Завдання 14

echo date('Y-m-d') . "<br>";
echo date('d.m.Y') . "<br>";
echo date('d.m.y') . "<br>";
echo date('H:i:s') . "<br>";

// Завдання 15

echo date('d.m.Y',mktime(0,0,0,2,12,2025)). "<br>";

// Завдання 16

$week = ["Неділя","Понеділок","Вівторок","Середа","Четвер","П'ятниця","Субота"];
echo $week[date('w', time())] . "<br>";
echo  $week[date('w',mktime(0,0,0,6,6,2006))] . "<br>";
echo  $week[date('w',mktime(0,0,0,7,16,2000))] . "<br>";

// Завдання 17

$month = [1=>"Січень","Лютий","Березень","Квітень","Травень","Червень","Липень","Серпень","Вересень","Жовтень","Листопад","Грудень"];
echo $month[date('n',time())] . "<br>";

// Завдання 18

echo date('t',time()) . "<br>";

// Завдання 19
?>

<form action="" method="post">
    <input type="number" placeholder="Введіть рік" name="year">
    <input type="submit" value="Дізнатися який рік">
</form>

<?php
if(isset($_POST['year'])){
    if(preg_match("/^[0-9]{4}$/",$_POST['year'])) {
        if(date('L',mktime(0,0,0,1,1,$_POST['year']))) {
            echo 'Рік високосний';
        }
        else echo 'Рік невисокосний';
    }
    else echo 'Неправильно ввели рік, спробуйте ще';
}

// Завдання 19

?>
<form action="" method="post">
    <input type="text" name="date" placeholder="Введіть дату 16.10.2000">
    <input type="submit" value="Дізнатись місяць">
</form>
<?php
if(isset($_POST['date'])){
    if(preg_match("/^[0-3][0-9].[0-1][0-9].[0-9]{4}$/",$_POST['date'])) {
        $date = explode('.',$_POST['date']);
        echo $week[date('w',mktime(0, 0, 0, $date[1], $date[0], $date[2]))];
    }
    else echo "Неправильно щось ввели";
}
// Завдання 20

?>
<form action="" method="post">
    <input type="text" name="date1" placeholder="Введіть дату 2025-12-31">
    <input type="text" name="date2" placeholder="Введіть дату 2025-12-31">
    <input type="submit" value="Дізнатись яка дата більше">
</form>
<?php
if(isset($_POST['date1']) && isset($_POST['date2'])){
    if(preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$_POST['date1']) && preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$_POST['date2'])){
        $date1 = explode('-',$_POST['date1']);
        $date2 = explode('-',$_POST['date2']);
        $dateTime1 =mktime(0,0,0,$date1[1],$date1[2],$date1[0]);
        $dateTime2 =mktime(0,0,0,$date2[1],$date2[2],$date2[0]);
        if($dateTime1>$dateTime2){
            echo "Більша перша дата";
        }
        else {
            echo "Більша друга дата";
        }
    }
    else echo 'Некоректно ввели дату';
}
// Завдання 21

$dateStr = '2025-12-31';
echo date('d-m-Y',strtotime($dateStr));

// Завдання 22
?>
<form action="" method="post">
    <input type="text" name="date3" placeholder="Введіть 16.10.2000 12:13:59">
    <input type="submit" value="Перетворити!">
</form>
<?php
if(isset($_POST['date3'])) {
    if(preg_match("/^[0-3][0-9].[0-1][0-9].[0-9]{4} [0-2][0-9]:[0-6][0-9]:[0-6][0-9]$/",$_POST['date3'])){
        echo date('H:i:s d.m.Y',strtotime($_POST['date3']));
    }
    else echo 'Щось неправильно ввели';
}

$strDate = date_create('2025-12-31');
echo date_format(date_modify($strDate, '2 day'), 'Y-m-d')."<br>";
echo date_format(date_modify($strDate, '1 month 3 day'), 'Y-m-d'). "<br>" ;
echo date_format(date_modify($strDate, '1 year'), 'Y-m-d')."<br>";
echo date_format(date_modify($strDate, '- 3 day'), 'Y-m-d')."<br>";

// Завдання 23

echo floor((mktime(0,0,0,12,31)-time())/86400);

// Завдання 24
?>
<form action="" method="post">
    <input type="text" name="fridays" placeholder="Введіть рік">
    <input type="submit" value="Дізнатися!">
</form>
<?php

if(isset($_POST['fridays'])) {
    if(preg_match("/^[0-9]{4}$/",$_POST['fridays'])){
        for ($i = 1; $i <= 12; $i++) {
            if (date('w', mktime(0, 0, 0, $i, 13, $_POST['fridays'])) == 5) {
                $unluckyFridays[] = date('d-m-Y', mktime(0, 0, 0, $i, 13, $_POST['fridays']));
            }
        }
        print_r($unluckyFridays);
    }
    else echo 'Щось пішло не так...';


}

// Завдання 25

$dateFor25 = date_create('now');
$modifyDay =  (date_modify($dateFor25, '- 100 day'));
$dayFor25 = date_format($modifyDay, 'w');
echo $week[$dayFor25];













