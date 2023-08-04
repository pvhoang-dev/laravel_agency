function convertDateToDateTime(date){
    let m = new Date(date);
    return ("0" + m.getUTCDate()).slice(-2) + "/" +
        ("0" + m.getUTCMonth()).slice(-2) + "/" +
        m.getFullYear() + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2);

}

function renderPagination(links){
    links.forEach(function (each) {
        $('#pagination')
            .append($('<li>').attr('class', `page-item ${each.active ? 'active' : ''}`)
            .append(`<a class="page-link" href="${each.url}">${each.label}</a>`));
    });
}

function notifySuccess(message = ''){
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        position: 'bottom-right',
        icon: 'success'
    })
}

function notifyError(message){
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'slide',
        position: 'bottom-right',
        icon: 'error'
    })
}