@extends('layout.layout')

@section('title', 'About Us')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="row down">
    <div class="col-lg-10 about">
        <h3>Site Developer</h3>
        <h3>Khrystenko Eugene</h3>
        <img src="img/123.jpg" style="height: 300px; margin: 15px 0">
        <div class="full-text">
            &#9992; м. Бориспіль<br>
            &#9742; тел. +38063-831-74-54<br>
            &#9993; E-mail: <a href="contact.html">swallow1991@gmail.com</a><br>
            Дата народження: 05.08.1991р.<br>
            Skype: +38063-831-74-54
            <div style="margin-top: 10px">
                <a href="https://www.instagram.com/eugene_xp/"><img src="img/instagram.png" alt="istagram"
                                                                    height="30"></a>
                <a href="https://www.facebook.com/e.khrystenko"><img src="img/facebook.png" alt="facebook"
                                                                     height="30"></a>
                <a href="https://m.vk.com/e_khrystenko"><img src="img/VK.png" alt="vk" height="30"></a>
            </div>
            <hr>

            <h3>Освіта:</h3>
            <p>2008-2011 - <a href="http://ccte.nau.edu.ua/" target="_blanc">Київський Радіомеханічний
                    Коледж</a>
                <br>Спеціальність: Обслуговування комп’ютерних систем і мереж (молодший спеціаліст).
                <br>2015-2018 - <a href="http://www.dut.edu.ua/ua/" target="_blanc">Державний Університет
                    Телекомунікацій</a>
                <br>Спеціальність: Комп’ютерна інженерія (бакалавр).</p>

            <h3>Досвід роботи:</h3>
            <p>2011р. – Системний адміністратор в <a href="http://www.perspektuva.com.ua/" target="_blanc">НВК
                    Гімназія «Перспектива»</a>
                <br>2012-2014 рр. – Комірник в <a href="http://rada.com.ua/eng/catalog/17899/" target="_blanc">«ДП
                    з ІІ Аіро Кейтерінг Сервісіз Україна»</a>
                <br>2016-2017 рр. – Товарознавець в <a href="https://skyfoodservice.com.ua/" target="_blanc">ТОВ
                    «Sky Food Services»</a>
                <br>2018-2020 рр. – Диспетчер оперативного відділу в <a href="https://skyfoodservice.com.ua/"
                                                                        target="_blanc">ТОВ «Sky Food
                    Services»</a>
                <br>2020-дотепер – Технік в <a href="https://www.pgcareers.com/plant-tech-boryspil"
                                                                        target="_blanc">«P&G»</a>
            </p>
            <p><strong>Знання мов:</strong> володію українською (вільно), російською (вільно), англійською
                (середній рівень)
                <br><strong>Досягнення:</strong> Був двічі визнаний кращим працівником місяця в компанії ТОВ
                «Sky Food Services» на посаді товарознавця та диспетчера оперативного відділу.
                <br><strong>Ділові якості:</strong> відповідальний, дисциплінований, комунікабельний, швидко
                навчаюсь новому, вмію вирішувати конфліктні ситуації, стресостійкий, вмію працювати в команді.
                <br><strong>Додаткові навики:</strong>
                <br>Знання основ документообігу.
                <br>Впевнений користувач ПК:
                <br>- Пакет MS Office, Outlook, 1С, Amadeus;
                <br>Знання розробки сайтів:
                <br>Frontend:
                <br>- HTML, CSS (Bootstrap, Less), GIT;
                <br>- jQuery, базовый рівень JS;
                <br>Backend:
                <br>- PHP, Laravel, MySQL.
                <br>Інструменти для розробки:
                <br>- IDE PHP Storm 2020
                <br>- Sublime Text 3
            </p>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
