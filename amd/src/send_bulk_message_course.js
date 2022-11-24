/*
 * @module     theme_mooveuv/modal_login
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export const init = () => {

    var url = document.location.href;

    if (url.indexOf('?') > 0) {

        var getString = url.split('?')[1];
        var GET = getString.split('&');
        var get = {};

        for (var i = 0, l = GET.length; i < l; i++) {
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
    }

    var messageTextArea = document.getElementById('bulk-message');
    messageTextArea.value = 'Test';

};
