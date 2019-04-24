function show_alert(type, message) {
    var div_container = document.createElement('div');
    var button_close = document.createElement('button');
    var i_remove = document.createElement('i');
    var i_icon = document.createElement('i');
    var text = document.createElement('h4');

    div_container.setAttribute('id', 'div_alert_container');

    div_container.classList.add('alert', 'has-' + type);
    button_close.classList.add('close-btn', 'btn-link');
    i_remove.classList.add('glyphicon','remove-2');
    i_icon.classList.add('alert-icon', 'glyphicon', 'circle-ok');

    text.innerHTML = message;

    button_close.addEventListener('click', hide_alert, false);

    button_close.appendChild(i_remove);
    div_container.appendChild(button_close);
    div_container.appendChild(i_icon);
    div_container.appendChild(text);

    document.body.appendChild(div_container);

    setTimeout(hide_alert, 1000);
}

function hide_alert() {
    if(document.getElementById('div_alert_container') !== null)
        document.getElementById('div_alert_container').remove();
}