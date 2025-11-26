<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Login | Sistema de demandas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Assistant:wght@200..800&family=Bangers&family=Bebas+Neue&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Comfortaa:wght@300..700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lilita+One&family=Love+Ya+Like+A+Sister&family=Monsieur+La+Doulaise&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Oxanium:wght@200..800&family=Passion+One:wght@400;700;900&family=Pinyon+Script&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rock+Salt&family=Smooch+Sans:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Space+Grotesk:wght@300..700&family=Vina+Sans&display=swap');

        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2, p {
            font-family: "Poppins", sans-serif;
        }

        .textComf{
            font-family: "Comfortaa", sans-serif;
        }

        .mont{
            font-family: "Montserrat", sans-serif !important;
        }

        :root {
            --primary-green: #00b348;
            --dark-green: #007A33;
            --dark-green2: #173625;
            --accent-yellow: #FFA500;
            --bg-dark: #0f0f0f;
            --bg-card: #1a1a1a;
            --bg-elevated: #242424;
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --text-muted: #6b7280;
            --border-subtle: rgba(255, 255, 255, 0.06);
            --border-focus: rgba(0, 179, 72, 0.3);
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.4);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.5);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.6);
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 250ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btnSpecial{
            position: relative;
            overflow: hidden;
        }

        .btnSpecial::after{
            content: "";
            position: absolute;
            width: 75%;
            height: 100%;
            left: -100%;
            top: 0;
            background-image: linear-gradient(120deg, transparent, #ffffff4c, transparent);
            transition: left 0.4s ease-in-out;
        }

        .btnSpecial:hover::after{
            left: 100%;
        }

        .elementSpecial {
            position: relative;
            overflow: hidden; 
            z-index: 1;
        }

        /* .elementSpecial::after{
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            left: 50%;
            top: 50%;
            background-color: #ffffff41;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.6s ease-in-out;
            z-index: -1;
        }

        .elementSpecial:hover::after{
            width: 100%;
            height: 300px;
            transform: translate(-50%, -50%) scale(1);
        } */


        label{
            pointer-events: none;
        }

        input:focus ~ label,
        input:not(:placeholder-shown) ~ label{
            transform: translateY(-30px);
            font-size: 12px;
            background-color: #f1f1f1;
            color: var(--accent-yellow);
            padding: 2px 8px 2px 8px;
            font-weight: 700;
            border-radius: 6px;
        }

        .btn-active {
            background: #fff;
            color: black;
            font-weight: 600;
        }

        @keyframes scaleModal {
            0%{
                opacity: 0;
                margin-top: -10px;
            }

            100%{
                opacity: 1;
                margin-top: 0px;
            }
        }

        #modalForm{
            animation: scaleModal 1.5s ease-in-out;
        }

        @media (min-width: 1020px) {
            .xl\:h-620screen {
                height: 620px;
            }
        }

        @media (min-width: 1900px) {
            .xgg\:h-650screen {
                height: 650px;
            }
        }

        @media (max-width:648px) {
            #ladoForm{
                border-radius: 15px;
            }
        }
    </style>
</head>
<body class="lg:bg-[#e9fafa]/40 min-h-screen">

    <?php
        $sucesso = $_GET['sucesso'] ?? null;
        $erro = $_GET['erro'] ?? null;
    ?>

    <!-- Modal do Formulario -->
    <div id="modalForm" class="left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 fixed m-auto rounded-xl w-[90%] sm:w-[550px] lg:w-[90%] grid lg:grid-cols-2 lg:h-[95vh] lg:shadow-2xl">
        <div class="bg-gradient-to-br from-[#025221] via-[#47643C] to-[#FFA500] h-full hidden lg:block rounded-l-2xl shadow-xl">
            <div class="flex flex-col items-center justify-center h-full gap-8">
                <i class="bi bi-mortarboard-fill text-9xl text-[var(--accent-yellow)]"></i>
                <h2 class="text-white flex items-center text-5xl font-semibold">EEEP <span class="text-[var(--accent-yellow)] pl-2 font-semibold"> SALABERGA</span></h2>
                <p class="text-center px-6 text-gray-200 textComf">Transformando o futuro através da organização e gestão inteligente de demandas.</p>
                <div class="flex text-sm space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="bi bi-diagram-3 text-[var(--accent-yellow)]"></i>
                        <p class="text-gray-200">Integração</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="bi bi-speedometer2 text-[var(--accent-yellow)]"></i>
                        <p class="text-gray-200">Performance</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="bi bi-cpu text-[var(--accent-yellow)]"></i>
                        <p class="text-gray-200">Automação</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="ladoForm" class="bg-transparent lg:bg-white h-full lg:overflow-y-auto pb-16 sm:pb-12 rounded-r-2xl">
            <div class="flex flex-col items-center justify-center pt-10 gap-6 w-full justify-between">
                <div class="flex flex-col items-center gap-3">
                    <img class="object-cover w-20" src="./assets/S.png" alt="">
                    <h1 class="text-black text-2xl lg:text-4xl font-bold mont">Bem-vindo!</h1>
                    <p id="textInstru" class="text-center text-sm sm:text-lg px-12 text-[var(--text-secondary)]">Acesse o Sistema de Demandas</p>
                </div>
                <div class="bg-[#F3F4F6] w-[95%] lg:w-[85%] rounded-xl flex items-center p-2 space-x-2">
                    <button id="btnLogin" class="py-3 btn-active rounded-xl w-[50%] flex items-center space-x-2 justify-center">
                        <i class="bi bi-box-arrow-in-right text-[#154231]"></i>
                        <p class="text-[#154231]">Login</p>
                    </button>
                    <button id="btnCad" class="py-3 rounded-xl w-[50%] flex items-center space-x-2 justify-center">
                        <i class="bi bi-person-fill-add text-[#154231]"></i>
                        <p class="text-[#154231]">Cadastro</p>
                    </button>
                </div>

                <!-- ISSO FOI EU -->
                <!-- <?php if ($sucesso === "cadastro_realizado"): ?>
                    <div class="text-[var(--primary-green)] mt-3 font-semibold text-centeer">
                        Cadastro realizado com sucesso! Agora faça login.
                    </div>
                <?php endif; ?> -->

                <!-- <?php if ($erro): ?>
                    <div class="mx-auto mt-3 text-red-600 font-semibold text-center">
                        <?php
                            switch ($erro) {
                                case "campos_vazios": echo "Preencha todos os campos."; break;
                                case "email_invalido": echo "O e-mail informado não é válido."; break;
                                case "senha_fraca": echo "A senha deve ter no mínimo 6 caracteres."; break;
                                case "usuario_existe": echo "Já existe um usuário com esse e-mail."; break;
                                case "usuario_nao_encontrado": echo "Usuário não encontrado."; break;
                                case "senha_incorreta": echo "Senha incorreta."; break;
                                default: echo "Ocorreu um erro. Tente novamente.";
                            }
                        ?>
                    </div>
                <?php endif; ?> -->


                <div class="w-full flex">
                    <!-- Form Login -->
                    <form novalidate id="formLogin" class="flex flex-col items-center justify-center w-full transform translate-y-4 formSite" action="./controllers/authController.php?action=login" method="POST">
                        <div class="w-full relative flex flex-col items-center gap-4">
                            <div class="w-[95%] lg:w-[85%] relative flex items-center">
                                <i class="bi bi-envelope-fill absolute left-3 text-xl text-[#025725]"></i>
                                <input tabindex="0" class="w-full p-4 outline-none border-2 border-[#A1B3AD] rounded-xl bg-transparent text-black indent-8 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="email" name="email" id="" placeholder="" maxlength="200">
                                <label class="absolute ml-12 text-gray-400 transition ease-in-out duration-300" for="nomeCad">E-mail</label>
                            </div>
                            <div class="w-[95%] lg:w-[85%] relative flex items-center">
                                <i class="bi bi-key-fill absolute left-3 text-xl text-[#025725]"></i>
                                <input tabindex="0" class="w-full p-4 outline-none border-2 border-[#A1B3AD] rounded-xl bg-transparent text-black indent-8 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="password" name="senha" id="" placeholder="" minlength="6" maxlength="200">
                                <label class="absolute ml-12 text-gray-400 transition ease-in-out duration-300" for="nomeCad">Senha</label>
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-center transform space-y-8">
                            <div class="pt-6 w-full flex justify-center">
                                <button class="flex w-[95%] lg:w-[85%] py-4 bg-gradient-to-br from-[#025725] to-[#183E33] text-center rounded-xl text-white font-semibold space-x-2 justify-center hover:translate-y-[-3px] transition ease-in-out duration-500 btnSpecial" type="submit">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    <p>Acessar Sistema</p>
                                </button>
                            </div>
                            <span class="bg-[#E5E7EB] w-[95%] lg:w-[85%] h-0.5 block text-center"></span>
                            
                            <div class="text-[var(--accent-yellow)] translate-y-1 text-[14px] flex items-center space-x-2">
                                <i class="bi bi-question-circle-fill"></i>
                                <p>Precisando de ajuda?<a class="font-semibold" href=""> Fale conosco.</a></p>
                            </div>
                        </div>
                    </form>
                    <!-- Form Cad -->
                    <form id="formCad" class="flex flex-col items-center justify-center w-full gap-3 hidden formSite" action="./controllers/authController.php?action=cadastro" method="POST">
                        <div class="w-full relative flex flex-col items-center gap-4 pt-4">
                            <div class="w-[95%] lg:w-[85%] relative flex items-center">
                                <i class="bi bi-person-fill absolute left-3 text-xl text-[#025725]"></i>
                                <input tabindex="0" class="w-full p-4 outline-none border-2 border-[#A1B3AD] rounded-xl bg-transparent text-black indent-8 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="text" name="nome" id="" placeholder="" maxlength="200">
                                <label class="absolute ml-12 text-gray-400 transition ease-in-out duration-300" for="nomeCad">Nome</label>
                            </div>
                            <div class="w-[95%] lg:w-[85%] relative flex items-center">
                                <i class="bi bi-envelope-fill absolute left-3 text-xl text-[#025725]"></i>
                                <input tabindex="0" class="w-full p-4 outline-none border-2 border-[#A1B3AD] rounded-xl bg-transparent text-black indent-8 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="email" name="email" id="" placeholder="" maxlength="200">
                                <label class="absolute ml-12 text-gray-400 transition ease-in-out duration-300" for="nomeCad">E-mail</label>
                            </div>
                            <div class="w-[95%] lg:w-[85%] relative flex items-center">
                                <i class="bi bi-key-fill absolute left-3 text-xl text-[#025725]"></i>
                                <input tabindex="0" class="w-full p-4 outline-none border-2 border-[#A1B3AD] rounded-xl bg-transparent text-black indent-8 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="password" name="senha" id="" placeholder="" minlength="6" maxlength="200">
                                <label class="absolute ml-12 text-gray-400 transition ease-in-out duration-300" for="nomeCad">Senha</label>
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-center transform space-y-8">
                            <div class="pt-6 w-full flex justify-center transform translate-y-[-10px]">
                                <button class="flex w-[95%] lg:w-[85%] py-3 py-4 bg-gradient-to-br from-[#025725] to-[#183E33] text-center rounded-xl text-white font-semibold space-x-2 justify-center hover:translate-y-[-3px] transition ease-in-out duration-300 btnSpecial" type="submit">
                                    <i class="bi bi-key-fill"></i>
                                    <p>Verificar Primeiro Acesso</p>
                                </button>
                            </div>
                            
                            <span class="bg-[#E5E7EB] w-[95%] lg:w-[85%] h-0.5 block text-center"></span>

                            <div class="text-[var(--accent-yellow)] translate-y-1 text-[14px] flex items-center space-x-2">
                                <i class="bi bi-question-circle-fill"></i>
                                <p>Precisando de ajuda?<a class="font-semibold" href=""> Fale conosco.</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        window.onload = () => {
            document.getElementById("formCad").reset();
        };

        window.onload = () => {
            document.getElementById("formLogin").reset();  
        };

        const btnLogin = document.getElementById("btnLogin");
        const btnCad = document.getElementById("btnCad");
        const textInstru = document.getElementById("textInstru");

        const formLogin = document.getElementById("formLogin");
        const formCad = document.getElementById("formCad");

        const modalForm = document.getElementById("modalForm");

        btnLogin.onclick = () => {
            formLogin.classList.remove("hidden");
            formCad.classList.add("hidden");
            btnLogin.classList.add("btn-active");
            btnCad.classList.remove("btn-active");
        }

        btnCad.onclick = () => {
            formLogin.classList.add("hidden");
            formCad.classList.remove("hidden");
            btnCad.classList.add("btn-active");
            btnLogin.classList.remove("btn-active");
        }

    </script>

    <script>
        // Isso foi a IA
        // Detectar mensagens do PHP
        const urlParams = new URLSearchParams(window.location.search);
        const sucesso = urlParams.get('sucesso');
        const erro = urlParams.get('erro');

        // Se acabou de cadastrar → abrir formLogin
        if (sucesso === "cadastro_realizado") {
            btnLogin.click();
        }

        // Se erro no cadastro → mostrar formCad
        if (erro === "usuario_existe" || erro === "senha_fraca" || erro === "email_invalido") {
            btnCad.click();
        }

        // Erros de login → abrir Login sempre
        if (erro === "usuario_nao_encontrado" || erro === "senha_incorreta") {
            btnLogin.click();
        }

    </script>
</body>

</html>