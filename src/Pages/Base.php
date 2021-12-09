<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QrCode Pix Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <base href="/init-pix/">
</head>

<body>
    <main>
        <section class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <img src="assets/img/logo_pix_grande.svg" alt="" width="200">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 mt-4">
                    <div class="container data-card">
                        <p>
                            <i class="fas fa-user-circle"></i>
                            Data Acount
                        </p>
                        <div class="form-group">
                            <input class="form-control" type="text" id="key" maxlength="99" placeholder="Chave">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="beneficiary_name" maxlength="25" placeholder="Nome do Beneficiário">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="beneficiary_city" maxlength="15" placeholder="Cidade do Beneficiário">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" id="order_value" min="0.01" step="0.01" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="order_identificator" maxlength="50" placeholder="Identificador da ação">
                        </div>
                        <button class="btn btn-light" onclick="pix.getQrCode()">
                            <img src="assets/img/pix.svg" width="30">
                        </button>
                    </div>
                </div>
                <div class="col-12 col-sm-8 mt-4 mb-4">
                    <div class="container qr-data">
                        <p class="text-left">
                            <i class="fas fa-qrcode"></i>
                            Qrcode
                        </p>
                        <section id="qrCode"></section>
                        <hr>
                        <i class="fab fa-whatsapp pointer" onclick="pix.openWppMessage()"></i>
                    </div>
                </div>
                <div class="col-12">
                    <p class="dev-by">
                        Developed by Nataniel Tremarin
                        <br>
                        <i class="fab fa-instagram"></i>
                        @natanieltremarin
                    </p>
                </div>  
                <?php include 'Parts/Message.php' ?>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/fontawesome.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/message.js"></script>
    <script src="assets/js/request.js"></script>
    <script src="assets/js/pix.js"></script>
</body>

</html>