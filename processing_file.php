<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Гостевая книга</title>
</head>

<body>

<?php
	$name = $_POST['username'];
	$mail = $_POST['email'];
	$text_mes = $_POST['message'];
	
	
	$fp = fopen('counter.txt', 'a+');
	$test = fwrite($fp, $name ); 
	$test = fwrite($fp, "\r\n");
	$test = fwrite($fp, $mail );
	$test = fwrite($fp, "\r\n");
	$test = fwrite($fp, $text_mes );
	$test = fwrite($fp, "\r\n");
	
	if ($test) ;
//		echo 'Данные в файл успешно занесены.<br />';
	else 
		echo 'Ошибка при записи в файл.<br />';
	fclose($fp); //Закрытие файла
/**/
?>

<?php
	require ('index.html');
	
/**/
?>

<?php
	$fp = fopen("counter.txt", "r"); // Открываем файл в режиме чтения
	if ($fp) 
	{
		$n = -1 ;
		while (!feof($fp))
		{
			$n ++ ;
			$m_array [ $n ] [ 0 ] = fgets($fp, 100);
			$m_array [ $n ] [ 1 ] = fgets($fp, 100);
			$m_array [ $n ] [ 2 ] = fgets($fp, 999);			
		}
		?>
        <table border = " 1 " width = " 1100 " align = "center" > 
        <?
		for($i=0;$i<$n;$i++)
		{
		/*	?><td><? echo $m_array [ $i ] [ 1 ] ?></td><? ;	*/
			?><tr>
            	<td width = " 300 " align = "center" valign = "top" ><? echo $m_array [ $i ] [ 0 ]."<br />".$m_array [ $i ] [ 1 ] ?></td>
                <td width = " 700 " align = "center" valign = "top" ><? echo $m_array [ $i ] [ 2 ] ?></td><? echo "<br />" ?>
              </tr>
			<?
		}
        ?>
        </table>
        <?
	}
	
	else 
		echo "Ошибка при открытии файла<br />";
	fclose($fp);
	
?>





</body>
</html>