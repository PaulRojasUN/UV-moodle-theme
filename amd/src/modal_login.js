define(['jquery', 'core/templates', 'core/modal_factory'], function($, Templates, ModalFactory) {

    return {
        init: function(logintoken) {
            var trigger = $('#login');

            ModalFactory.create({
                title: 'Test title',
                body: Templates.render('theme_mooveuv/modal_login', {'logintoken': logintoken}),
                footer: 'Footer'
            }, trigger);
        }
    };
});