<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<link rel="stylesheet" href="/fonts/awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/admin.css">
<script src="/js/jquery.js"></script>
<script src="/js/admin.js">	</script>
<div class="admin-header">
	<h1>Добавить новость</h1>
	<h2></h2>
</div>
<div class="control-panel">
	<ul>
		<li class="active" data-id="addNews">Добавление новости</li>
		<li>Редактирование новости</li>
		<li>Администрация</li>
		<li>Партнеры</li>
	</ul>
</div>
<div class="content">
	
	<form  id="addNews" action="#" enctype="multipart/form-data">
		<label for="article-header">Заголовок</label>
		<input type="text" id="article-header">

		<div></div>
		
		<div class="textarea">
			<label for="article-text">Текс статьи</label>
			<textarea id="article-text"></textarea>
			<div class="btn-panel-adds">	
				<div id='addBold'><i class="fa fa-bold"></i></div>
				<div id='addItalic'><i class="fa fa-italic"></i></div>
				<div id='addCommenting'><i class="fa fa-commenting"></i></div>
				<div id='addTags'>Добавить абзацы</div>
			</div>
			
		</div>
		
		<div id="slide">Файлы изображений для новости <br> <span>Нажмите чтобы свернуть таблицу</span></div>
		
		<div class="btn-panel">
			<label for="" class="fileContainer">
				Загрузить картинки
				<input type="file" id="files" name="filename" multiple="">
			</label>
			<input type="submit" value="Добавить новость">
		</div>
		
		<table id="img-pre">
			<tr>
				<th>Файл</th>
				<th>Описание</th>
				<th>Главное изображение новости</th>
			</tr>
		</table>
	</form>



</div>
<div id="result-win">
	<span id="result-win-preloader"><i class="fa fa-refresh fa-spin"></i></span>
	<div id="result-box"></div>
	<i id="result-win-btn-close">x</i>
</div>
