<!doctype html>

<html>
	<head>
		<meta charset="utf-8" />
		<script type="text/javascript" charset="UTF-8"></script>
	</head>
	
	
	<body>

	メールで問い合わせます。<br><br>
	<a href="http://localhost/phpmyfaq/index.php?action=ask&category_id=0"><u>※このリンク先より質問を登録後、問い合わせてください。</a></u>
    <br><br>
	
	<!-- send.phpにPOST -->
	<form action="send.php" method="post">
	
		<!-- 宛先メール:<input type="TEXT" name="to" id="to" placeholder="メールアドレス" ><br>  -->
		
		<p>カテゴリを選択し、件名、問い合わせ内容を入力後「送信」ボタンをクリックしてください。</p>
		<br>

		<!-- javascriptの処理 -->
		<script>
		function isCheck() {
			var arr_checkBoxes = document.getElementsByClassName("checkBoxes");
			var count = 0;
			for (var i = 0; i < arr_checkBoxes.length; i++) {
				if (arr_checkBoxes[i].checked) {
					count++;
				}
			}
			if (count > 0) {
				return true;
			} else {
				window.alert("カテゴリを1つ以上選択してください。");
				return false;
			}
		}
		</script>

		<!--宛先設定 -->
		<!-- class="checkBoxes" と記載されている chexboxがひとつ以上選択されているか、上記のjavascriptの処理で確認している -->
		<p>カテゴリ選択（必須）:</p>
		<input type="checkbox" name="to[]" class="checkBoxes" value="koya.sato.1219@gmail.com">WAS　
		<input type="checkbox" name="to[]" class="checkBoxes" value="tama.cs.team@gmail.com">アプリ　
		<input type="checkbox" name="to[]" class="checkBoxes" value="EBB0PPN@jp.ibm.com">MQ　
		<input type="checkbox" name="to[]" class="checkBoxes" value="koya.sato.1219@gmail.com">OS　
		<input type="checkbox" name="to[]" class="checkBoxes" value="tama.cs.team@gmail.com">HW　
		<input type="checkbox" name="to[]" class="checkBoxes" value="EBB0PPN@jp.ibm.com">DB　
		<input type="checkbox" name="to[]" class="checkBoxes" value="koya.sato.1219@gmail.com">その他
		<br><br>

		<p>件名 :</p><input type="TEXT" size="86" name="subject" id="subject" placeholder="件名"><br>

		<p>本文 :</p><textarea name="message01" id="message01" cols="85" rows="10" placeholder="本文"></textarea><br>

		<!-- return isCheck()にて、chexboxの選択状態を判定 -->
		<input type="submit" value="送信" onClick="return isCheck()" /><br><br>

	</form>

	</body>

</html>
