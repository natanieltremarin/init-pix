var pix = {
    
    getQrCode: function () {

        var obj = {
            key: document.getElementById('key').value,
            beneficiary_name: document.getElementById('beneficiary_name').value,
            beneficiary_city: document.getElementById('beneficiary_city').value,
            order_value: document.getElementById('order_value').value,
            order_identificator: document.getElementById('order_identificator').value
        };

        request.ajax('?generator/generate', obj, function (result) {

            if (result.error !== null) {

                message.alert(result.error);

            } else {

                document.getElementById('qrCode').innerHTML = result.success;
            }

            return false;
        });
    },
};