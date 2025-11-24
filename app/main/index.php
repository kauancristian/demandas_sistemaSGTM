<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Início | Demandas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Assistant:wght@200..800&family=Bangers&family=Bebas+Neue&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Comfortaa:wght@300..700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lilita+One&family=Love+Ya+Like+A+Sister&family=Monsieur+La+Doulaise&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Oxanium:wght@200..800&family=Passion+One:wght@400;700;900&family=Pinyon+Script&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rock+Salt&family=Smooch+Sans:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Space+Grotesk:wght@300..700&family=Vina+Sans&display=swap');

        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            outline: none;
        }

        html, body{
            scroll-behavior: smooth;
            overflow-x: hidden;
            outline: none;
        }

        h1, h2, p {
            font-family: "Poppins", sans-serif;
        }

        .textComf{
            font-family: "Comfortaa", sans-serif;
            font-weight: 800;
        }

        .epi{
            font-family: "Epilogue", sans-serif;
        }

        :root {
            --primary-green: #00b348;
            --dark-green: #007A33;
            --dark-green2: #173625;
            --accent-yellow: #ffae18;
            --bg-dark: #0f0f0f;
            --bg-card: #1a1a1a;
            --bg-elevated: #393939;
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
            background-image: linear-gradient(120deg, transparent, #00b3481a, transparent);
            transition: left 0.3s ease-in-out;
        }

        .btnSpecial:hover::after{
            left: 100%;
        }   

        .nav-bar{
            position: relative;
            overflow: hidden;
        }

        .nav-bar::after{
            content: "";
            position: absolute;
            display: block;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            transform-origin: center;
            background-color: var(--accent-yellow);
            transition: 0.3s ease-in-out;
            transform: scaleX(0);
        }

        .nav-bar:hover::after{
            transform: scaleX(1);
        }

        @keyframes shake {
            0%   { transform: translateX(0); }
            10%  { transform: translateX(-8px); }
            20%  { transform: translateX(8px); }
            30%  { transform: translateX(-6px); }
            40%  { transform: translateX(6px); }
            50%  { transform: translateX(-4px); }
            60%  { transform: translateX(4px); }
            70%  { transform: translateX(-2px); }
            80%  { transform: translateX(2px); }
            90%  { transform: translateX(-1px); }
            100% { transform: translateX(0); }
        }

        .shake {
            animation: shake 0.6s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#191919] via-[#262626]/90 to-[#121212] h-[100vh]">

    <!-- Sec 1 -->
    <div id="sec1" class="h-screen"> 

        
        <div class="fixed bg-gradient-to-r from-[var(--accent-yellow)] via-[var(--primary-green)] to-[var(--accent-yellow)] h-[75px] pb-1 z-[9999]">
            <header class="bg-gradient-to-r from-[var(--dark-green)] to-[#005A24] h-full flex justify-between items-center w-screen z-[9999]">

                <div class="flex items-center space-x-1 ml-4">
                    <img class="object-contain w-14 hover:scale-105 transition ease-in-out duration-300" src="assets/S.png" alt="">
                    <h1 id="h1Header" class="text-[#fff] lg:text-xl font-semibold">Sistema de <span class="text-[var(--accent-yellow)]">Demandas</span></h1>
                </div>

                <div class="flex items-center space-x-10">

                    <div class="flex items-center space-x-4 ">
                        <div class="flex flex-col items-end">
                            <p class="text-white text-sm hidden sm:block">
                                <?= isset($_SESSION['nome']) ? htmlspecialchars(implode(" ", array_slice(explode(" ", trim($_SESSION['nome'])), 0, 2))) : '' ?>
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <button class="btnConta">
                                <?php if (isset($_SESSION['nome'])): ?>
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center"
                                        style="background-color: <?= $_SESSION['perfil']; ?>;">
                                        <p class="text-white font-semibold text-md">
                                            <?= htmlspecialchars(mb_substr($_SESSION['nome'], 0, 1, 'UTF-8')); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </button>

                            <?php if(isset($_SESSION['id_usuario'])) : ?>
                                <div class="absolute bg-[#262626] text-[var(--primary-green)] py-2 px-4 translate-y-[50px] translate-x-[-25px] transform translate-y-1 rounded-md hidden divSair">
                                    <form action="../main/controllers/authController.php?action=logout" method="POST">
                                        <button class="flex items-center space-x-2 hover:text-[var(--accent-yellow)] hover:scale-105 transition ease-in-out duration-300 nav-bar botao-sair" type="submit">
                                            <i class="bi bi-box-arrow-in-right text-xl"></i>
                                            <p>Sair</p>
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="transform translate-x-[-30px]">
                        <?php if (!isset($_SESSION['id_usuario'])): ?>
                            <a href="./views/formLogin.php">
                                <button class="flex items-center space-x-2 text-white hover:text-[var(--accent-yellow)] hover:scale-105 transition ease-in-out duration-300 nav-bar botao-entrar">
                                    <i class="bi bi-box-arrow-in-right text-xl"></i>
                                    <p>Entrar</p>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </header>
        </div>
            
        <!-- Inicio -->
        <div class="left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 relative w-full text-center">
            <div id="textSec1" class="flex flex-col items-center justify-center">
                <h3 class="epi text-4xl lg:text-[6vw] font-bold text-white drop-shadow-[0_0_1px_gray]">SEJA BEM <span class="text-[#FFA500] epi">VINDO!</span></h3>

                <p class="px-4 sm:px-0 sm:w-[610px] text-gray-200 text-center text-sm pt-5">Nosso sistema de demandas foi desenvolvido para melhorar o atendimento interno, conectando equipes, setores e gestores em uma plataforma inteligente, prática e segura. Aqui, cada solicitação é organizada, acompanhada e resolvida com agilidade, garantindo processos mais eficientes e comunicação clara entre todos os envolvidos.</p>

                <div class="pt-5 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-5 items-center">
                    <a href="#sec2">
                        <button class="bg-[#156635] btnSpecial py-3 text-lg text-white w-[200px] rounded-xl btnSpecialGreen hover:translate-y-[-5px] transition ease-in-out duration-500 flex items-center space-x-2 justify-center group">
                            <p>Comece Agora</p>
                            <i id="chevron" class="bi bi-chevron-down group-hover:translate-y-1 transition ease-in-out duration-300"></i>
                        </button>
                    </a>

                    <div class="pt-5 lg:pt-0">
                        <div class="flex items-center space-x-3">
                            <i class="bi bi-buildings-fill text-[var(--accent-yellow)] text-4xl"></i>
                            <div class="flex flex-col items-center justify-center">
                                <p class="text-sm text-white"> - EEEP Salaberga 2025</p>
                                <p class="text-sm text-[#FFA400] transform translate-x-[-10px]">Sistema Integrado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    </div>

    <div id="sec2" class="pb-14">
        <div id="h1Sec2" class="pt-16 flex flex-col items-center justify-center space-y-3 text-center">
            <h1 class="text-2xl lg:text-4xl font-semibold text-white epi">Serviços <span class="text-[var(--accent-yellow)]">Disponíveis</span></h1>
            <span class="bg-gray-500 h-[2px] w-[130px] block mx-auto"></span>

            <p class="pt-2 text-xl text-gray-300 px-5 text-center lg:text-start lg:px-0">Conheça um pouco mais sobre nossas funcionalidades</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12 px-4 sm:px-10 pt-12">
            <div id="func1" class="bg-gradient-to-br btnSpecial p-3 rounded-lg cursor-pointer w-[95%] h-[320px] lg:w-[25vw] mx-auto hover:ring-2 ring-[var(--dark-green)] transition ease-in-out duration-300 flex flex-col justify-between">

                <?php if(!isset($_SESSION['id_usuario'])): ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard">
                        <div class="flex flex-col items-center justify-center h-full space-y-3">
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard hidden"> <!-- esconde -->
                        <div class="flex flex-col items-center justify-center h-full space-y-3 hidden"> 
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col justify-center items-center space-y-4 transform translate-y-4">
                    <i class="bi bi-plus-lg text-5xl text-[var(--accent-yellow)]"></i>
                    <p class="font-semibold text-white text-xl">Nova <span class="text-[var(--primary-green)]">Planilha</span></p>
                </div>
                <div class="transform translate-y-2">
                    <p class="text-center text-gray-300 px-4">Crie uma nova planilha para registrar e organizar suas demandas.</p>
                </div>
                <div class="pt-3 transform translate-y-[-10px] flex flex-col items-center">
                    <div class="span bg-[#404040] h-[1px] w-[85%] block"></div>
                    <div class="flex justify-between items-center w-[85%] pt-6">
                        <div class="flex items-center space-x-2 text-[--primary-green] bg-[#404040] py-1.5 px-3 rounded-full border border-[--primary-green] text-center justify-center">
                            <i class="bi bi-circle-fill text-xs"></i>
                            <p class="font-semibold text-xs">ATIVA</p>
                        </div>
                        <div>
                            <a href="./views/createDemandas.php">
                                <button class="flex items-center space-x-2 bg-[#156635] py-2 px-4 rounded-xl hover:translate-y-[-3px] hover:drop-shadow-[0_0_6px_var(--primary-green)] transition ease-in-out duration-300">
                                    <i class="bi bi-box-arrow-up-right text-white"></i>
                                    <p class="font-semibold text-white text-sm">Acessar</p>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="func2" class="bg-gradient-to-br btnSpecial p-3 rounded-lg cursor-pointer w-[95%] h-[320px] lg:w-[25vw] mx-auto hover:ring-2 ring-[var(--dark-green)] transition ease-in-out duration-300 flex flex-col justify-between">

                <?php if(!isset($_SESSION['id_usuario'])): ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard">
                        <div class="flex flex-col items-center justify-center h-full space-y-3">
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard hidden"> <!-- esconde -->
                        <div class="flex flex-col items-center justify-center h-full space-y-3"> 
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col justify-center items-center space-y-4 transform translate-y-4">
                    <i class="bi bi-clipboard2-data text-5xl text-[var(--accent-yellow)]"></i>
                    <p class="font-semibold text-white text-xl">Gerenciar <span class="text-[var(--primary-green)]">Tarefas</span></p>
                </div>

                <div class="transform translate-y-2">
                    <p class="text-center text-gray-300 px-4">Acompanhe, edite e organize todas as tarefas em andamento.</p>
                </div>

                <div class="pt-3 transform translate-y-[-10px] flex flex-col items-center">
                    <div class="span bg-[#404040] h-[1px] w-[85%] block"></div>

                    <div class="flex justify-between items-center w-[85%] pt-6">
                        <div class="flex items-center space-x-2 text-red-500 bg-[#404040] py-1.5 px-3 rounded-full border border-red-500 text-center justify-center">
                            <i class="bi bi-circle-fill text-xs"></i>
                            <p class="font-semibold text-xs">INATIVO</p>
                        </div>

                        <div>
                            <a href="tarefasDemandas.html">
                                <button class="flex items-center space-x-2 bg-[#156635] py-2 px-4 rounded-xl hover:translate-y-[-3px] hover:drop-shadow-[0_0_6px_var(--primary-green)] transition ease-in-out duration-300">
                                    <i class="bi bi-box-arrow-up-right text-white"></i>
                                    <p class="font-semibold text-white text-sm">Acessar</p>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="func3" class="bg-gradient-to-br btnSpecial p-3 rounded-lg cursor-pointer w-[95%] h-[320px] lg:w-[25vw] mx-auto hover:ring-2 ring-[var(--dark-green)] transition ease-in-out duration-300 flex flex-col justify-between">

                <?php if(!isset($_SESSION['id_usuario'])): ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard">
                        <div class="flex flex-col items-center justify-center h-full space-y-3">
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div id tabindex="0" class="bg-black/80 inset-0 absolute z-50  h-full items-center justify-center shakeCard hidden"> <!-- esconde -->
                        <div class="flex flex-col items-center justify-center h-full space-y-3 "> 
                            <i class="ri-lock-2-fill text-[#E00507] z-50 text-5xl"></i>
                            <p class="text-[#E00507] font-semibold">Funcionalidade Bloqueada!</p>
                            <p class="text-white text-center text-sm px-4">Acesse sua conta, ou crie-a para acesso total.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col justify-center items-center space-y-4 transform translate-y-4">
                    <i class="bi bi-file-earmark-arrow-up-fill text-5xl text-[var(--accent-yellow)]"></i>
                    <p class="font-semibold text-white text-xl">Gerar <span class="text-[var(--primary-green)]">Relatórios</span></p>
                </div>

                <div class="transform translate-y-2">
                    <p class="text-center text-gray-300 px-4">Gere relatórios completos para análise e acompanhamento das demandas.</p>
                </div>

                <div class="pt-3 transform translate-y-[-10px] flex flex-col items-center">
                    <div class="span bg-[#404040] h-[1px] w-[85%] block"></div>

                    <div class="flex justify-between items-center w-[85%] pt-6">
                        <div class="flex items-center space-x-2 text-red-500 bg-[#404040] py-1.5 px-3 rounded-full border border-red-500 text-center justify-center">
                            <i class="bi bi-circle-fill text-xs"></i>
                            <p class="font-semibold text-xs">INATIVO</p>
                        </div>

                        <div>
                            <a href="relatoriosDemandas.html">
                                <button class="flex items-center space-x-2 bg-[#156635] py-2 px-4 rounded-xl hover:translate-y-[-3px] hover:drop-shadow-[0_0_6px_var(--primary-green)] transition ease-in-out duration-300">
                                    <i class="bi bi-box-arrow-up-right text-white"></i>
                                    <p class="font-semibold text-white text-sm">Acessar</p>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

     <div class="bg-gradient-to-t from-[var(--primary-green)] to-[var(--accent-yellow)] lg:h-[260px] pt-[2px]">
         <footer class="bg-[#1C1C1C] h-full px-5 pb-12 flex justify-center items-center bottom-0 p-8 text-center">
            <div class="grid lg:grid-cols-3 h-full w-full flex items-center">
                <div class="text-white flex flex-col items-start transform translate-x-2 lg:items-center text-start text-sm sm:text-[15px] ">
                    <div class="space-y-2">
                        <h1 class="text-xl text-[var(--primary-green)]">Desenvolvedores</h1>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center space-x-2">
                                <i class="bi bi-code-slash text-[var(--accent-yellow)]"></i>
                                <p class="text-gray-200">Kauan Cristian</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="https://www.instagram.com/kauanxrs_/" class="hover:scale-105 transition ease-in-out duration-200 hover:drop-shadow-[0_0_6px_var(--accent-yellow)] hover:text-[var(--accent-yellow)]">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="https://github.com/kauancristian" class="hover:scale-105 transition ease-in-out duration-200 hover:drop-shadow-[0_0_6px_var(--accent-yellow)] hover:text-[var(--accent-yellow)]">
                                    <i class="bi bi-github"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex space-x-2 items-center">
                            <i class="bi bi-code-slash text-[var(--accent-yellow)]"></i>
                            <p class="text-gray-200">Cassio Holanda</p>
                            <a href="https://www.instagram.com/cassioholanda_/" class="hover:scale-105 transition ease-in-out duration-200 hover:drop-shadow-[0_0_6px_var(--accent-yellow)] hover:text-[var(--accent-yellow)]">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://github.com/cassioholandaS" class="hover:scale-105 transition ease-in-out duration-200 hover:drop-shadow-[0_0_6px_var(--accent-yellow)] hover:text-[var(--accent-yellow)]">
                                <i class="bi bi-github"></i>
                            </a>
                        </div>


                        <h1 class="text-xl text-[var(--primary-green)] pt-4">Colaboradores</h1>
                        <div class="flex items-center space-x-2">
                            <i class="bi bi-heart-fill text-[var(--accent-yellow)]"></i>
                            <p class="text-gray-200">Thalyta Helen</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="bi bi-bar-chart-line-fill text-[var(--accent-yellow)]"></i>
                            <p class="text-gray-200">Kauanna Tiburcio</p>
                        </div>

                    </div>
                </div>
                <div class="text-white flex flex-col items-center justify-center space-y-5 pt-9 lg:pt-3 sm:pt-0">
                    <p class="text-sm">Otimize a gestão da sua escola com um sistema inteligente de demandas: organize solicitações, acompanhe tarefas, conecte equipes e mantenha tudo funcionando de forma clara, simples e eficiente.</p>
                    <p>&#169 Todos os direitos reservados</p>
                </div>
                <div class="w-full h-full flex flex-col items-center space-y-5 justify-center pt-12 lg:pt-0">
                    <img class="object-contain w-[24vw] lg:w-[6vw] translate-x-1 hover:scale-105 transition ease-in-out duration-300" src="./assets//S.png" alt="">
                    <p class="text-gray-200 font-semibold text-sm">Salaberga - <span class="text-[var(--accent-yellow)]">2025</span></p>
                </div>
            </div>
        </footer>
     </div>

     <script>
        const btnConta = document.querySelector(".btnConta");
        const divSair = document.querySelector(".divSair");

        btnConta.onclick = () => {
            divSair.classList.toggle("hidden");
        };

        window.onload = () => {
            if(window.location.hash) {
                history.replaceState(null, null, window.location.pathname + window.location.search);
            }
        };

        if (window.location.hash) {
            window.history.scrollRestoration = "manual";
            setTimeout(() => {
                window.scrollTo(0, 0); 
            }, 1);
        };
     </script>

     <script>
        ScrollReveal().reveal('#h1Sec2', {
            delay: 200,
            origin: 'bottom',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });

        ScrollReveal().reveal('#func1', {
            delay: 300,
            origin: 'bottom',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });

        ScrollReveal().reveal('#func2', {
            delay: 400,
            origin: 'bottom',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });

        ScrollReveal().reveal('#func3', {
            delay: 600,
            origin: 'bottom',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });

        ScrollReveal().reveal('#h1Header', {
            delay: 200,
            origin: 'left',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });


        ScrollReveal().reveal('#textSec1', {
            delay: 200,
            origin: 'top',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });
        
        const shakeCards = document.querySelectorAll(".shakeCard");

        shakeCards.forEach((shakeCard) => {
            shakeCard.onclick = () => {
                shakeCard.classList.remove("shake");

                void shakeCard.offsetWidth;

                shakeCard.classList.add("shake");
            }
        });
     </script>
</body>
</html>