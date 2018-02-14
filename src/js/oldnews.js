jQuery(document).ready(function($) {
	var listNews = new ListOldNews(17); // аргумент - количество ссылок новостей на странице
  listNews.getListOldNewsFromServer();
});