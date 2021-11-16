var message = {

    alert: function (message) {
        document.getElementById('message-type').classList.add('alert-warning');
        document.getElementById('message-tittle').textContent = 'Erro';
        document.getElementById('message-text').textContent = message;
        this.display();
    },

    success: function (message) {
        document.getElementById('message-type').classList.add('alert-success');
        document.getElementById('message-tittle').textContent = 'Sucesso';
        document.getElementById('message-text').textContent = message;
        this.display();
    },

    display: function () {

        setTimeout(function () {
            document.getElementById('message-type').classList.remove('alert-success');
            document.getElementById('message-type').classList.remove('alert-warning');
            document.getElementById('message').classList.remove('show');
            document.getElementById('message').classList.add('invisible');
            document.getElementById('message').style.zIndex = 100;
            document.getElementById('message-tittle').textContent = '';
            document.getElementById('message-text').textContent = '';
        }, 4000);

        document.getElementById('message').classList.remove('invisible');
        document.getElementById('message').classList.add('show');
        document.getElementById('message').style.zIndex = 9999;
    }
}