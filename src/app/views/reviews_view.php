<div class="reviews">
	<h1><i class="fa fa-comments"></i>Відгуки та пропозиції</h1>
	<img src="/img/pages/_content/reviews_main.jpg" alt="відгуки та пропозиції">
	
	<p style="line-height: 1.2em; text-align: justify;">Усе наше життя ми приймаємо рішення. Плануємо ми сходити в ресторан або купити нове плаття? Як вибрати той чи інший заклад? Відповідаючи на всі ці питання, нерідко на допомогу нам приходять відгуки &ndash; думки людей, які вже одного разу робили те ж саме чи скористалися цим сервісом. Згідно зі статистикою, більше 70% людей вважає за краще користуватися послугами, про які вони можуть отримати будь-яку додаткову інформацію. Відгуки та рекомендації інших людей &ndash; безумовно найоптимальніший соціальний доказ якості послуги.</p>
	
	<button id="form-open"><i class="fa fa-commenting"></i>Залишити відгук</button>
	
	<!-- START REVIEWS BLOCK -->
	<div class="reviews-content">
		<div class="reviews-block">
			<div class="preloader" id="preview-preloader">
				<i class="icon-spin2 animate-spin"></i>
			</div>
		</div>
	</div>
	<!-- END REVIEWS BLOCK -->
	<!-- <button class="more"><i class="fa fa-undo"></i>Більше...</button> -->
	
	<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
	

	<div class="reviews-form">
		
		<div class="form-logo"></div>
		<div class="reviews-form-body">
			<div id="err-win">
				<i class="fa fa fa-spinner fa-spin"></i>
				<div></div>
			</div>
			<form action="#">
				<div>
					<fieldset>
						<legend>Ваші дані</legend>

						<div class="form-row">
							<div class="focus-line">
								<label for="first_name">Ім'я<em>*</em></label>
								<input type="text" name="first_name" id="first_name" required="">
							</div>
						</div>

						<div class="form-row">
							<div class="focus-line">
								<label for="last_name">Прізвище<em>*</em></label>
								<input type="text" name="last_name" id="last_name" required="">
							</div>
						</div>

						<div class="form-row">
							<div class="focus-line">
								<label for="email">Пошта <br><span>(для зв'язку з Вами в разі необхідності, не буде показано)</span></label>
								<input type="email" name="email" id="email">
							</div>
						</div>

						<div class="form-row">
							<label for="end_date" id="label_check">Дата закінчення нашого учбового закладу:</label>
							<div class="focus-line focus-date">
								<select name="end_date" id="end-date-month">
								</select>
							</div>
							<div class="focus-line focus-date">
								<select name="end_date" id="end-date-year">
								</select>
							</div>
							<div class="check">
								<input type="checkbox" id="not-education"> 
								Я не навчався в цьому закладі, але хочу залишити відгук
							</div>
						</div>
						<div class="form-row">
							<div class="focus-line">
								<label for="form_profession">Професія, за якою навчалися</label>
								<input type="text" name="form_profession" id="form_profession">
							</div>
						</div>
						<div class="form-row">
							<div class="focus-line">
								<label for="form_company">Підприємство, де працюєте</label>
								<input type="text" name="form_company" id="form_company">
							</div>
						</div>
						<div class="form-row">
							<div class="focus-line">
								<label for="form_position">Посада</label>
								<input type="text" name="form_position" id="form_position">
							</div>
						</div>
					</fieldset>

					<!-- <fieldset>
						<legend>Де працюєте</legend>
						
					</fieldset>
 -->

				</div>

				<div>
					<fieldset>
						<legend>Відгук</legend>

						<div class="form-row">
							<div class="focus-line">
								<label for="review">Напишіть відгук чи питання</label>
								<textarea name="review" id="review" rows="12"></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="focus-line">
								<label for="proposition">Напишіть пропозицію чи побажання</label>
								<textarea name="proposition" id="proposition" rows="10"></textarea>
							</div>
						</div>

					</fieldset>
					
				</div>
				<div>
					<fieldset>
						<legend>Оцінка</legend>
						<div class="rating form-rating">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<span><span class="rating-txt">0</span> із 5</span>
						</div>
					</fieldset>
				</div>
				<div>
					<fieldset>
					<div>
						<input type="submit" value="Відправити">
						<input type="reset" value="Скинути">
						<input type="button" value="Закрити" id="form-close">
					</div>
						
					</fieldset>
				</div>
			</form>
		</div>
		
	</div>
</div>
