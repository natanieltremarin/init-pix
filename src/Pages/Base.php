<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QrCode Pix Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <base href="/init-pix/">
</head>
<body>
    <main>
        <section class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-4 text-center">
                    <div class="container data-card">
                        <div class="form-group">
                            <input class="form-control" type="text" id="key" maxlength="99" placeholder="Acount Key">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="beneficiary_name" maxlength="25" placeholder="Beneficiary's name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="beneficiary_city" maxlength="15" placeholder="Beneficiary city">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" id="order_value" min="0.01" step="0.01" placeholder="Value">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="order_identificator" maxlength="50" placeholder="Action identifier">
                        </div>
                        <button class="btn btn-light" onclick="pix.getQrCode()">
                            <img src="assets/img/pix.svg" width="30">
                        </button>
                    </div>
                </div>
                <div class="pix-logo">

                </div>
                <div class="col-12 col-sm-8">
                    <div class="container qr-data">
                        <section id="qrCode"></section>
                    </div>
                </div>
                <?php include 'Parts/Message.php' ?>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/message.js"></script>
    <script src="assets/js/request.js"></script>
    <script src="assets/js/pix.js"></script>
</body>
</html>