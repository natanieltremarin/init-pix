var pix = {
    linkWpp: null,

    init: function () {     
        var url = new URLSearchParams(window.location.search.substring(1));

        if (url.get('key') === null
            || url.get('beneficiary_name') === null
            || url.get('beneficiary_city') === null
            || url.get('order_value') === null
            || url.get('order_identificator') === null
        ) {
            return;
        }

        document.getElementById('key').value = url.get('key');
        document.getElementById('beneficiary_name').value = url.get('beneficiary_name');
        document.getElementById('beneficiary_city').value = url.get('beneficiary_city');
        document.getElementById('order_value').value = url.get('order_value');
        document.getElementById('order_identificator').value = url.get('order_identificator');

        this.getQrCode();
    },
    
    getQrCode: function () {

        var obj = {
            key: document.getElementById('key').value,
            beneficiary_name: document.getElementById('beneficiary_name').value,
            beneficiary_city: document.getElementById('beneficiary_city').value,
            order_value: document.getElementById('order_value').value,
            order_identificator: document.getElementById('order_identificator').value
        };

        var params = new URLSearchParams(window.location.search);
        
        params.append('key', obj.key);
        params.append('beneficiary_name', obj.beneficiary_name);
        params.append('beneficiary_city', obj.beneficiary_city);
        params.append('order_value', obj.order_value);
        params.append('order_identificator', obj.order_identificator);  

        this.linkWpp = window.location + '?' + params.toString();

        request.post('?generator/generate', obj, function (result) {

            if (result.error !== null) {

                message.alert(result.error);

            } else {

                document.getElementById('qrCode').innerHTML = result.success;
            }

            return false;
        });
    },

    openWppMessage: function () {
        var message = 'Para concluir o pagamento acesse o link e escaneie o QrCode link: ' + this.linkWpp;

        var phone_number = window.prompt('Insira o número de telefone para enviar a mesangem!');

        if (phone_number === null || phone_number === '') {
            return;
        }

        window.open('https://api.whatsapp.com/send?1=pt_BR&phone=' + phone_number + '&text=' + encodeURI(message));
    },
};

window.addEventListener('load', function () {
    pix.init();
});