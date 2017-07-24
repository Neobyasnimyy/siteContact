<?php

require_once 'myFun/testAuthorization.php';
// если не зарегистрированный пользователь перенаправляем на регистрацию
if (($authorization = testAuthorization()) == false) {
    header("Location: login.php");
    exit();
}
$title = 'Статьи';

//$style = '../../style/home.css';

include '../headAndHeader.php';

?>

    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
                <h4 align="left">Первая статья</h4>
                <p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего
                    сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я.</p>

                <p>Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого. Ни одного
                    штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.</p>

                <p>Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного
                    леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья
                    и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный
                    мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и
                    мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего,
                    судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо
                    мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит
                    мысль: "Ах!</p>

                <p>Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть
                    отражение моей души, как душа моя - отражение предвечного бога! " Друг мой.</p>

                <p>. . Но нет! Мне не под силу это, меня подавляет величие этих явлений. Душа моя озарена неземной
                    радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца.</p>

                <p>Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой
                    друг, так упоен ощущением покоя, что искусство мое страдает от этого.</p>

                <p>Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.
                    Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного
                    леса и лишь редкий луч проскальзывает в его</p>

                <h4 align="left">Вторая статья</h4>
                <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех
                    живут они в буквенных домах на берегу Семантика большого языкового океана.</p>

                <p>Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта
                    парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.</p>

                <p>Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ
                    жизни.</p>

                <p>Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир
                    грамматики.</p>

                <p>Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но
                    текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и
                    пустился в дорогу.</p>

                <p>Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего
                    родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка.
                    Грустный реторический вопрос скатился по его щеке и он продолжил свой путь.</p>

                <p>По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по
                    несколько раз. Единственное, что от меня осталось, это приставка «и». Возвращайся ты лучше в свою
                    безопасную страну». Не послушавшись рукописи, наш текст продолжил свой путь. Вскоре ему повстречался
                    коварный составитель</p>
                <h4 align="left">Третья статья</h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                    quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

                <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                    pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                    tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                    dapibus in, viverra quis, feugiat a, tellus.</p>

                <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies
                    nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus,
                    tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                    Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>

                <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam
                    quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet
                    nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus
                    nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien.</p>

                <p>Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.
                    Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci
                    luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis
                    et arcu.</p>

                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices
                    mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing.
                    Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero.
                    Cras id dui. Aenean ut eros et nisl sagittis vestibulum.</p>

                <p>Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis
                    hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci.
                    Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula
                    sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue
                    erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan
                    cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac</p>


                <h4 align="left">Четвертая статья</h4>
                <p>Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели
                    превратился в страшное насекомое. Лежа на панцирнотвердой спине, он видел, стоило ему приподнять
                    голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого
                    еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по
                    сравнению с остальным телом ножки беспомощно копошились у него перед глазами.</p>

                <p>«Что со мной случилось? » – подумал он. Это не было сном. Его комната, настоящая, разве что слишком
                    маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом,
                    где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который
                    он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку.</p>

                <p>На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю
                    тяжелую меховую муфту, в которой целиком исчезала ее рука. Затем взгляд Грегора устремился в окно, и
                    пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в
                    грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это
                    было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем состоянии он
                    никак не мог принять этого положения.</p>

                <p>С какой бы силой ни поворачивался он на правый бок, он неизменно сваливался опять на спину. Закрыв
                    глаза, чтобы не видеть своих барахтающихся ног, он проделал это добрую сотню раз и отказался от этих
                    попыток только тогда, когда почувствовал какую-то неведомую дотоле, тупую и слабую боль в боку. «Ах
                    ты, господи, – подумал он, – какую я выбрал хлопотную профессию! Изо дня в день в разъездах.</p>

                <p>Деловых волнений куда больше, чем на месте, в торговом доме, а кроме того, изволь терпеть тяготы
                    дороги, думай о расписании поездов, мирись с плохим, нерегулярным питанием, завязывай со все новыми
                    и новыми людьми недолгие, никогда не бывающие сердечными отношения. Черт бы побрал все это! » Он
                    почувствовал вверху живота легкий зуд; медленно подвинулся на спине к прутьям кровати, чтобы удобнее
                    было поднять голову; нашел зудевшее место, сплошь покрытое, как оказалось, белыми непонятными
                    точечками; хотел было ощупать это место одной из ножек, но сразу отдернул ее, ибо даже простое
                    прикосновение вызвало у него, Грегора, озноб. Он соскользнул в прежнее свое положение. «От этого
                    раннего вставания, – подумал он, – можно совсем обезуметь. Человек должен высыпаться. Другие
                    коммивояжеры живут, как одалиски. Когда я, например, среди дня возвращаюсь в гостиницу,</p>


            </div>
        </div>
    </div>

<?php
include '../footer.php';
?>