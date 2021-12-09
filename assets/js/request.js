var request = {

    post: function (url, dados, callback) {

        try {
            if (dados !== null) {
                dados = JSON.stringify(dados);
            }

            var request = new XMLHttpRequest();
            request.open('POST', url, true);
            request.onreadystatechange = function () {

                if (request.status === 200) {
                    
                    if (request.readyState === 4) {
                    
                        if (callback !== undefined) {
                            callback(JSON.parse(request.responseText));
                        }
                    }
                }
            }

            request.send(dados);

        } catch {
            message.alert('Falha ao estabelecer conexao com o servico');
        }
    },

}