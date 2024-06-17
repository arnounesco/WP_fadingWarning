//what text do we want to show
let warningText = 'The content of this site will be updated during the coming weeks.<br />Please come back often!';

$('body').
prepend(
    '<div id="fadingWarning" class="has-text-align-center" style="background: var(--wp--preset--color--cyan-bluish-gray);">' +
    warningText +
    '</div>'
);

$('#fadingWarning').fadeOut(10000);



