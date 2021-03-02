<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Фабрика расчетов: Бесплатное веб приложение для Расчета приведенной толщины металла");
$APPLICATION->SetPageProperty("title", "Бесплатное веб приложение для Расчета приведенной толщины металла - Фабрика расчетов");
$APPLICATION->SetTitle("Расчет приведенной толщины металла");
?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/script.js"></script>

<script src="js/res1.js"></script>
<script type="text/javascript">
    function l(elem, href) {
        $.get(href, function(data) {
            $(".service_choice").html($(data).filter("#bread"));
            $(".service_body").html($(data).filter("#con"));
            $(".asterisk").html($(data).filter("#asterisk"));
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#service_h").offset().top
            }, 250);
        });
    }

    function r(elem) {
        $.get('/me/res1.html', function(data) {
            $(".service_choice").html($(data).filter("#bread"));
            $(".service_body").html($(data).filter("#con"));
            start(elem, 0, 1);
        });
    }

    function calc() {
        var h = parseFloat($('#h').val());
        var b = parseFloat($('#b').val());
        var s = parseFloat($('#s').val());
        var t = parseFloat($('#t').val());
        if (b >= h) {
            alert("Ширина не может быть больше высоты");
            return;
        } else if (s >= b || s >= h) {
            alert("Толщина стенки не может быть больше высоты или ширины");
            return;
        }
        var S = (h * (b / 2) - ((h - 2 * t) * ((b / 2) - (s / 2)))) * 2 / 100;
        $('#data').attr("data-params", "type;" + h + ";" + b + ";" + s + ";" + t + ";" + "0;" + S);
        var elem = $('#con');
        $.get('/me/res1.html', function(data) {
            $(".service_choice").html($(data).filter("#bread"));
            $(".service_body").html($(data).filter("#con"));
            start(elem, 1, 1);
        });
    }

    function calc_tr() {
        var d = parseFloat($('#d').val());
        var h = parseFloat($('#h').val());
        var S = ((Math.PI * d * d / 4) - (Math.PI * (d - h) * (d - h) / 4));
        if (h >= d) {
            alert("Диаметр не может быть меньше толщины стенки");
            return;
        }
        $('#data').attr("data-params", "tr;" + d + ";" + h);
        var elem = $('#con');
        $.get('/me/res1.html', function(data) {
            $(".service_choice").html($(data).filter("#bread"));
            $(".service_body").html($(data).filter("#con"));
            start(elem, 1, 2);
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('.service_block').mouseenter(function() {
            $('a', this).css('color', 'white');
            $('.arr', this).css('color', 'white');
        });
        $('.service_block').mouseleave(function() {
            $('a', this).css('color', 'black');
            $('.arr', this).css('color', '#60b2f0');
        });
    });
</script>
<div class="block5 clear-fix row">
    <div class="col-12">
        <? $APPLICATION->IncludeComponent(
    "vild:free_service.block4", 
    ".default", 
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "TEXT" => "Приведенная толщина металла - отношение площади поперечного сечения металлоконструкции к обогреваемому периметру, где площадь поперечного сечения профиля - определяется путем расчета или по сортаменту ГОСТ на металлический профиль; обогреваемый периметр профиля - периметр или его часть, на которую возможно воздействие огня или высокой температуры.",
        "SRC" => "/img/block3_m.png"
    ),
    false
    );?>
    </div>
    <div class="col-12">
        <div class="block5_r">
            <div class="b5_head orange">
                <img src="img/b5_h.png" alt="">
                <p class="b5_h">Как пользоваться?</p>
            </div>
            <div class="b5_b">
                <div class="b5_b_p">
                    <div class="b5_b_n">
                        <div class="b5_b_n_b orange"><span>1</span></div>
                    </div>
                    <div class="b5_b_t">Выбор типа профиля и стандарта. Внимание: размеры профилей с одинаковыми названиями из разных стандартов могут отличаться!</div>
                </div>
                <div class="b5_b_p">
                    <div class="b5_b_n">
                        <div class="b5_b_n_b orange"><span>2</span></div>
                    </div>
                    <div class="b5_b_t">Выбор названия профиля для двутавров и швеллеров; длинны, высоты и толщины для уголков, прямоугольных и квадратных профилей или ввод геометрических размеров для сварных двутавров и круглых труб.</div>
                </div>
                <div class="b5_b_p">
                    <div class="b5_b_n">
                        <div class="b5_b_n_b orange"><span>3</span></div>
                    </div>
                    <div class="b5_b_t">Установка обогреваемого периметра на схематическом изображении профиля осуществляется мышью. Обогреваемый периметр отмечен оранжевым цветом.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block_serv1" style="border-bottom-width: 0px;">
    <div class="type_of_profile pb-3">Тип профиля</div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <div class="nav-item nav-link active level-1-tabs mr-3 py-3" id="nav-i-beam-tab" data-toggle="tab" href="#nav-i-beam" role="tab" aria-controls="nav-i-beam" aria-selected="true">
                <img src="/free/me/img/i-beam.png" alt="Двутавр" class="">
                <span class="pl-4">Двутавр</span>
            </div>
            <div class="nav-item nav-link level-1-tabs mr-3 py-3" id="nav-trumpet-tab" data-toggle="tab" href="#nav-trumpet" role="tab" aria-controls="nav-trumpet" aria-selected="false">
                <img src="/free/me/img/trumpet.png" alt="Труба">
                <span class="pl-4">Труба</span>
            </div>
            <div class="nav-item nav-link level-1-tabs mr-3 py-3" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                <img src="/free/me/img/profile.png" alt="Профиль">
                <span class="pl-4">Профиль</span>
            </div>
            <div class="nav-item nav-link level-1-tabs mr-3 py-3" id="nav-channel-tab" data-toggle="tab" href="#nav-channel" role="tab" aria-controls="nav-channel" aria-selected="false">
                <img src="/free/me/img/channel.png" alt="Швеллер">
                <span class="pl-4">Швеллер</span>
            </div>
            <div class="nav-item nav-link level-1-tabs py-3" id="nav-corner-tab" data-toggle="tab" href="#nav-corner" role="tab" aria-controls="nav-corner" aria-selected="false">
                <img src="/free/me/img/corner.png" alt="Уголок">
                <span class="pl-4">Уголок</span>
            </div>
        </div>
    </nav>
    <div class="tab-content level-2-background" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-i-beam" role="tabpanel" aria-labelledby="nav-i-beam-tab">
            <nav>
                <div class="nav nav-tabs pt-4 mx-2" id="nav-tab-1" role="tablist">
                    <div class="nav-item nav-link level-2-tabs mr-3 py-3" id="STO_ASCHM_20-93-tab" data-toggle="tab" href="#STO_ASCHM_20-93" role="tab" aria-controls="STO_ASCHM_20-93" aria-selected="true">
                        <span class="pl-4">СТО АСЧМ 20-93</span>
                    </div>
                    <div class="nav-item nav-link level-2-tabs mr-3 py-3" id="nav-GOST_26020-83-tab" data-toggle="tab" href="#nav-GOST_26020-83" role="tab" aria-controls="nav-GOST_26020-83" aria-selected="false">
                        <span class="pl-4">ГОСТ 26020-83</span>
                    </div>
                    <div class="nav-item nav-link level-2-tabs mr-3 py-3" id="nav-GOST_8239-89-tab" data-toggle="tab" href="#nav-GOST_8239-89" role="tab" aria-controls="nav-GOST_8239-89" aria-selected="false">
                        <span class="pl-4">ГОСТ 8239-89</span>
                    </div>
                    <div class="nav-item nav-link level-2-tabs mr-3 py-3" id="nav-GOST_19425-74-tab" data-toggle="tab" href="#nav-GOST_19425-74" role="tab" aria-controls="nav-GOST_19425-74" aria-selected="false">
                        <span class="pl-4">ГОСТ 19425-74</span>
                    </div>
                    <div class="nav-item nav-link level-2-tabs py-3" id="nav-welded_in_size-tab" data-toggle="tab" href="#nav-welded_in_size" role="tab" aria-controls="nav-welded_in_size" aria-selected="false">
                        <span class="pl-4">Сварной по размерам</span>
                    </div>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent-1">
                <div class="tab-pane fade show" id="STO_ASCHM_20-93" role="tabpanel" aria-labelledby="STO_ASCHM_20-93-tab">
                    <div class="row pl-2 pb-3">
                        <div class="col-lg-4">
                            <input id="normal" class="radio" type="radio" name="STO_ASCHM_20-93" value="normal">
                            <label for="normal">СТО АСЧМ 20-93<br>нормальные<br></label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select normal-img">
                            <select name="" class="normal-value" disabled="disabled">
                                <option value="">10Б1</option>
                                <option value="">12Б1</option>
                                <option value="">12Б2</option>
                                <option value="">14Б1</option>
                                <option value="">14Б2</option>
                                <option value="">16Б1</option>
                                <option value="">16Б2</option>
                                <option value="">18Б1</option>
                                <option value="">18Б2</option>
                                <option value="">20Б1</option>
                                <option value="">25Б1</option>
                                <option value="">25Б2</option>
                                <option value="">30Б1</option>
                                <option value="">30Б2</option>
                                <option value="">35Б1</option>
                                <option value="">35Б2</option>
                                <option value="">40Б1</option>
                                <option value="">40Б2</option>
                                <option value="">45Б1</option>
                                <option value="">45Б2</option>
                                <option value="">50Б1</option>
                                <option value="">50Б2</option>
                                <option value="">50Б3</option>
                                <option value="">55Б1</option>
                                <option value="">55Б2</option>
                                <option value="">60Б1</option>
                                <option value="">60Б2</option>
                                <option value="">70Б0</option>
                                <option value="">70Б1</option>
                                <option value="">70Б2</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" class="radio" id="wide-shelving" name="STO_ASCHM_20-93" value="wide-shelving">
                            <label for="wide-shelving">СТО АСЧМ 20-93<br>широкополочные</label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select wide-shelving-img">
                            <select name="" class="wide-shelving-value" disabled="disabled">
                                <option value="">20Ш1</option>
                                <option value="">25Ш1</option>
                                <option value="">30Ш1</option>
                                <option value="">30Ш2</option>
                                <option value="">35Ш1</option>
                                <option value="">35Ш2</option>
                                <option value="">40Ш1</option>
                                <option value="">40Ш2</option>
                                <option value="">45Ш1</option>
                                <option value="">50Ш1</option>
                                <option value="">50Ш2</option>
                                <option value="">50Ш3</option>
                                <option value="">50Ш4</option>
                                <option value="">60Ш1</option>
                                <option value="">60Ш2</option>
                                <option value="">60Ш3</option>
                                <option value="">60Ш4</option>
                                <option value="">70Ш1</option>
                                <option value="">70Ш2</option>
                                <option value="">70Ш3</option>
                                <option value="">70Ш4</option>
                                <option value="">70Ш5</option>
                                <option value="">80Ш1</option>
                                <option value="">80Ш2</option>
                                <option value="">90Ш1</option>
                                <option value="">90Ш2</option>
                                <option value="">100Ш1</option>
                                <option value="">100Ш2</option>
                                <option value="">100Ш3</option>
                                <option value="">100Ш4</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" class="radio" id="columned" name="STO_ASCHM_20-93" value="columned">
                            <label for="columned">СТО АСЧМ 20-93<br>колонный</label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select columned-img">
                            <select name="" class="columned-value" disabled="disabled">
                                <option value="">20К1</option>
                                <option value="">20К2</option>
                                <option value="">25К1</option>
                                <option value="">25К2</option>
                                <option value="">25К3</option>
                                <option value="">30К1</option>
                                <option value="">30К2</option>
                                <option value="">30К3</option>
                                <option value="">30К4</option>
                                <option value="">35К1</option>
                                <option value="">35К2</option>
                                <option value="">40К1</option>
                                <option value="">40К2</option>
                                <option value="">40К3</option>
                                <option value="">40К4</option>
                                <option value="">40К5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-GOST_26020-83" role="tabpanel" aria-labelledby="nav-GOST_26020-83-tab">
                    <div class="row pl-2 pb-3">
                        <div class="col-lg-3">
                            <input id="gost-normal" class="radio" type="radio" name="nav-GOST_26020-83" value="gost-normal">
                            <label for="gost-normal">ГОСТ 26020-83<br>нормальные<br></label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select gost-normal-img">
                            <select name="" class="gost-normal-value" disabled="disabled">
                                <option value="">10Б1</option>
                                <option value="">12Б1</option>
                                <option value="">12Б2</option>
                                <option value="">14Б1</option>
                                <option value="">14Б2</option>
                                <option value="">16Б1</option>
                                <option value="">16Б2</option>
                                <option value="">18Б1</option>
                                <option value="">18Б2</option>
                                <option value="">20Б1</option>
                                <option value="">23Б1</option>
                                <option value="">26Б1</option>
                                <option value="">26Б2</option>
                                <option value="">30Б1</option>
                                <option value="">30Б2</option>
                                <option value="">35Б1</option>
                                <option value="">35Б2</option>
                                <option value="">40Б1</option>
                                <option value="">40Б2</option>
                                <option value="">45Б1</option>
                                <option value="">45Б2</option>
                                <option value="">50Б1</option>
                                <option value="">50Б2</option>
                                <option value="">55Б1</option>
                                <option value="">55Б2</option>
                                <option value="">60Б1</option>
                                <option value="">60Б2</option>
                                <option value="">70Б1</option>
                                <option value="">70Б2</option>
                                <option value="">80Б1</option>
                                <option value="">80Б2</option>
                                <option value="">90Б1</option>
                                <option value="">90Б2</option>
                                <option value="">100Б1</option>
                                <option value="">100Б2</option>
                                <option value="">100Б3</option>
                                <option value="">100Б4</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input id="gost-wide-shelving" type="radio" class="radio" name="nav-GOST_26020-83" value="gost-wide-shelving">
                            <label for="gost-wide-shelving">ГОСТ 26020-83<br>широкополочные</label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select gost-wide-shelving-img">
                            <select name="" class="gost-wide-shelving-value" disabled="disabled">
                                <option value="">20Ш1</option>
                                <option value="">23Ш1</option>
                                <option value="">26Ш1</option>
                                <option value="">26Ш2</option>
                                <option value="">30Ш1</option>
                                <option value="">30Ш2</option>
                                <option value="">30Ш3</option>
                                <option value="">35Ш1</option>
                                <option value="">35Ш2</option>
                                <option value="">35Ш3</option>
                                <option value="">40Ш1</option>
                                <option value="">40Ш2</option>
                                <option value="">40Ш3</option>
                                <option value="">50Ш1</option>
                                <option value="">50Ш2</option>
                                <option value="">50Ш3</option>
                                <option value="">50Ш4</option>
                                <option value="">60Ш1</option>
                                <option value="">60Ш2</option>
                                <option value="">60Ш3</option>
                                <option value="">60Ш4</option>
                                <option value="">70Ш1</option>
                                <option value="">70Ш2</option>
                                <option value="">70Ш3</option>
                                <option value="">70Ш4</option>
                                <option value="">70Ш5</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="radio" class="radio" id="gost-columned" name="nav-GOST_26020-83" value="gost-columned">
                            <label for="gost-columned">ГОСТ 26020-83<br>колонные</label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select gost-columned-img">
                            <select name="" class="gost-columned-value" disabled="disabled">
                                <option value="">20К1</option>
                                <option value="">20К2</option>
                                <option value="">23К1</option>
                                <option value="">23К2</option>
                                <option value="">26К1</option>
                                <option value="">26К2</option>
                                <option value="">26К3</option>
                                <option value="">30К1</option>
                                <option value="">30К2</option>
                                <option value="">30К3</option>
                                <option value="">35К1</option>
                                <option value="">35К2</option>
                                <option value="">35К3</option>
                                <option value="">40К1</option>
                                <option value="">40К2</option>
                                <option value="">40К3</option>
                                <option value="">40К4</option>
                                <option value="">40К5</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="radio" class="radio" id="gost-additional-series" name="nav-GOST_26020-83" value="gost-additional-series">
                            <label for="gost-additional-series">ГОСТ 26020-83<br>доп. серии (Д)</label><br>
                            <img src="/free/me/img/arrow.png" alt="стрелка" class="img-select gost-additional-series-img">
                            <select name="" class="gost-additional-series-value" disabled="disabled">
                                <option value="">24Дб1</option>
                                <option value="">27Дб1</option>
                                <option value="">36Дб1</option>
                                <option value="">35Дб1</option>
                                <option value="">40Дб1</option>
                                <option value="">45Дб1</option>
                                <option value="">45Дб2</option>
                                <option value="">30Дш1</option>
                                <option value="">40Дш1</option>
                                <option value="">50Дш1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-GOST_8239-89" role="tabpanel" aria-labelledby="nav-GOST_8239-89-tab">
                    <span>ГОСТ 8239-89</span>
                </div>
                <div class="tab-pane fade" id="nav-GOST_19425-74" role="tabpanel" aria-labelledby="nav-GOST_19425-74-tab">
                    <span>ГОСТ 19425-74</span>
                </div>
                <div class="tab-pane fade" id="nav-welded_in_size" role="tabpanel" aria-labelledby="nav-welded_in_size-tab">
                    <span>Сварной по размерам</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-trumpet" role="tabpanel" aria-labelledby="nav-trumpet-tab">
            <p>Труба</p>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <p>Профиль</p>
        </div>
        <div class="tab-pane fade" id="nav-channel" role="tabpanel" aria-labelledby="nav-channel-tab">
            <p>Швеллер</p>
        </div>
        <div class="tab-pane fade" id="nav-corner" role="tabpanel" aria-labelledby="nav-corner-tab">
            <p>Уголок</p>
        </div>
    </div>
</div>
<div class="block_serv1 mt-4">
    <div class="prog-block">
        <div class="row">
            <div class="col-lg-3">
                <div class="i-beam-section-b">b</div>
                <div class="i-beam-section-h">h</div>
                <div class="i-beam-section-t">t</div>
                <div class="i-beam-section-s">s</div>
                <img src="/free/me/img/i-beam-section.png" class="ml-5 mt-4 pl-3 pt-3" alt="i-beam-section">
            </div>
            <div class="col-lg-9 mt-4">
                <div class="row mt-5 w-75">
                    <div class="col">
                        <div class="standard">
                            <div class="mx-4 my-2 py-1">123</div>
                        </div>
                    </div>
                    <div class="col mt-n4 pl-2">
                        <span class="heated-perimeter-text">Обогреваемый периметр, мм:</span>
                        <div class="heated-perimeter">
                            <div class="mx-4 my-2 py-1">456</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mb-5">
                    <div class="col-lg-5">
                        <span class="metal-thickness-text">Приведенная толщина металла*, мм:</span>
                        <div class="metal-thickness mt-1">
                            <div class="mx-4 my-2 py-1">789</div>
                        </div>
                    </div>
                    <div class="col-lg-7 pl-5">
                        <div class="metal-thickness-description">
                            <div>* Приведенная толщина металла - отношение площади поперечного сечения металлоконструкции к обогреваемому периметру, где площадь
                                поперечного сечения профиля - определяется путем расчета или по сортаменту ГОСТ на металлический профиль; обогреваемый периметр профиля -
                                периметр или его часть, на которую возможно воздействие огня или высокой температуры.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>