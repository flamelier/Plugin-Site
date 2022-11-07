/*
Patsy Panel is under the PolyForm Commercial Software License with specific Terms found in the LICENSE folder in the root of the project and a free trial is available.
Copyright (C) 2022 Computer Wolf LLC.
*/

/* Listenner and Transparency Applicator */
$(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
    $('nav').css('background','#212121');
    } else {
    $('nav').css('background','transparent');
    }
    });