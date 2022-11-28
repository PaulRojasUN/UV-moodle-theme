/*
 * @module     theme_mooveuv/modal_login
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import $ from 'jquery';

export const init = () => {

    var urlLocation = window.location.pathname;
    var urlSplit = urlLocation.split("/");
    var locationSearch = window.location.search;

    var arrayQuestionnaires = ["78456123"];

    var parameter = locationSearch.split("=")[1];

    if (urlSplit.includes('questionnaire') && urlSplit.includes('view.php')) {

        if (arrayQuestionnaires.includes(parameter)) {
            $('.complete > a').html("Participe del proceso de votación");
        }
    } else if (urlSplit.includes('questionnaire') && (urlSplit.includes('complete.php') || urlSplit.includes('preview.php'))) {
        if (arrayQuestionnaires.includes(parameter)) {
            $('input[name=submit]').val("Votar");
            $('.floatprinticon').hide();
            $('.mod_questionnaire_completepage generalbox>h3').html('Gracias por participar en el proceso de votación.');
            $('.mod_questionnaire_previewpage>h2').html('Previsualizando');
        }
    }
};
