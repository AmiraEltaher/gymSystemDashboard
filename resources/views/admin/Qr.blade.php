<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        .qr-code {
            opacity: 0;
            display: flex;
            padding: 33px 0;
            border-radius: 5px;
            align-items: center;
            pointer-events: none;
            justify-content: center;
            border: 5px solid black;
            margin-top: 50px;
        }

        .wrapper.active .qr-code {
            opacity: 1;
            pointer-events: auto;
            transition: opacity 0.5s 0.05s ease;
        }

        .qr-code img {
            width: 170px;
        }
    </style>
</head>

<body>
    @include('admin.Main-header')
    @include('admin.Main-sidebar')



            <div class="col-md-8">
                <div class="wrapper">
                    <header style="margin-top: 100px;">
                        <h1 style="text-align: center;">QR الحصول علي </h1>
                    </header>
                    <div class="form">
                        <input type="text" class="form-control text-center" spellcheck="false"
                            placeholder="Qr اضافه النص الذي تريد له ">
                        <button class="form-control btn btn-primary" style="margin-top: 20px;">Qr الحصول علي </button>
                    </div>
                    <div class="qr-code">
                        <img src="" alt="qr-code">
                    </div>
                </div>

                <script>
                    const wrapper = document.querySelector(".wrapper"),
                        qrInput = wrapper.querySelector(" .form input"),
                        generateBtn = wrapper.querySelector(".form button"),
                        qrImg = wrapper.querySelector(".qr-code img");
                    let preValue;

                    generateBtn.addEventListener("click", () => {
                        let qrValue = qrInput.value.trim();
                        if (!qrValue || preValue === qrValue) return;
                        preValue = qrValue;
                        generateBtn.innerText = " ... Qr جاري عمليه انشاء ";
                        qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
                        qrImg.addEventListener("load", () => {
                            wrapper.classList.add("active");
                            generateBtn.innerText = "بنجاح QR تم انشاء ";
                        });
                    });

                    qrInput.addEventListener("keyup", () => {
                        if (!qrInput.value.trim()) {
                            wrapper.classList.remove("active");
                            preValue = "";
                        }
                    });
                </script>
</body>

</html>
@include('admin.Footerscripts')
