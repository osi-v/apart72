<div class="clear">
</div>
 <section class="booking">
<div class="title2">
	 Забронировать квартиру прямо сейчас!
	<form class="bookingformbottom" id="reserveformbottom">
    <div class="sys-msg err hide">
			Вы не заполнили обязательные поля!
		</div>
   <div class="sys-msg success hide">
			Заявка успешно отправлена!<br>
			Наш специалист свяжется с Вами в течении 3 минут.
		</div>
   <div class="booking-form-content">
    <div class="bookingform-date"><input type="text" name="date_from" placeholder="Дата заезда*" class="datepicker">
        <input type="text" name="date_to" placeholder="Дата выезда*" class="datepicker">
        </div>
        <div class="bookingform-date"><input type="text" name="price_from" placeholder="Цена от">
        <input type="text" name="price_to" placeholder="Цена до">
        </div>
        <div class="bookingformbottom-contacts">
        <input type="text" name="name" placeholder="Представьтесь*"><br>
        <input type="text" name="phone" placeholder="Телефон*"><br>
        <input type="checkbox" name="agree" id="agreebottom"><label for="agreebottom">Согласен с обработкой персональных данных</label><br>
        <input type="submit" id="bookingsend" name="submit" value="Забронировать">
        </div>
    </form>
</div>
 </section> 
    </main>
    <div class="clear"></div>
    <footer class="site-footer container_20">
        <div class="copyright">АПАРТАМЕНТЫ72
            <br><?=date("Y");?> © ВСЕ ПРАВА ЗАЩИЩЕНЫ</div>
        <div class="social">
            <div class="lets-friend">Давайте дружить!</div>
            <div class="pluso social-buttons" data-background="transparent" data-options="big,square,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter"></div>
        </div>
    </footer>
    
    <form class="bookingform" id="reserveform">
    <div class="sys-msg err hide">
			Вы не заполнили обязательные поля!
		</div>
   <div class="sys-msg success hide">
			Заявка успешно отправлена!<br>
			Наш специалист свяжется с Вами в течении 3 минут.
		</div>
   <div class="booking-form-content">
    <div class="bookingform-date"><input type="text" name="date_from" placeholder="Дата заезда*" class="datepicker">
        <input type="text" name="date_to" placeholder="Дата выезда*" class="datepicker">
        <input type="hidden" name="flatinfo" id="flatinfo">
        </div>
        <div class="bookingform-contacts">
        <input type="text" name="name" placeholder="Представьтесь*"><br>
        <input type="text" name="phone" placeholder="Телефон*">
        <textarea name="comment" id="" cols="30" rows="10" placeholder="Комментарий"></textarea>
        </div>
        <input type="checkbox" name="agree" id="agree"><label for="agree">Согласен с обработкой персональных данных</label><br>
        <input type="submit" id="send" name="submit" value="Отправить">
        </div>
    </form>
    <script type="text/javascript">
        (function () {
            if (window.pluso)
                if (typeof window.pluso.start == "function") return;
            if (window.ifpluso == undefined) {
                window.ifpluso = 1;
                var d = document,
                    s = d.createElement('script'),
                    g = 'getElementsByTagName';
                s.type = 'text/javascript';
                s.charset = 'UTF-8';
                s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
                var h = d[g]('body')[0];
                h.appendChild(s);
            }
        })();
    </script>
</body>

</html>