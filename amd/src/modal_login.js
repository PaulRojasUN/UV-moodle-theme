/*
 * @module     theme_mooveuv/modal_login
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import $ from 'jquery';
import * as Templates from 'core/templates';
import * as ModalFactory from 'core/modal_factory';

export const init = (logintoken, logourl, loginurl, forgotpasswordurl) => {
    var trigger = $('#login');

    ModalFactory.create({
        title: Templates.render('theme_mooveuv/modal_login_header', {'logourl': logourl}),
        body: Templates.render('theme_mooveuv/modal_login_body', {'logintoken': logintoken,
                                                                  'loginurl': loginurl,
                                                                  'forgotpasswordurl': forgotpasswordurl}),
    }, trigger)
    .then(function(modal) {
        $(document).on('click', function(ev) {

            if (ev.target == $('.modal')[0]) {
                modal.hide();
            }
        });

        return modal;
    })
    .catch(function(e) {
        window.console.log(e);
    });
};
