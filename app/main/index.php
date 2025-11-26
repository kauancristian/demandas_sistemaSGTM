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
            --accent-yellow: #FFA500;
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
            color: #c8f8db;
        }

        
        .nav-bar::after{
            content: "";
            position: absolute;
            width: 4px;
            height: 100%;
            left: 0;
            top: 0;
            background-color: var(--accent-yellow);
            transform-origin: center;
            transform: scaleY(0);
            transition: transform 0.4s ease-in-out;
        }

        .nav-bar:hover::after{
            transform: scaleY(1);
        }

        .btnScaleGray{
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btnScaleGray::after{
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            transform-origin: center;
            background-color: #60796aff;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.3s ease-in-out;
            z-index: -1;
        }

        .btnScaleGray:hover::after{
            transform: translate(-50%, -50%) scale(1);
        }
    </style>
</head>
<body class="">

    <div class="grid lg:grid-cols-[0.4fr_1.2fr]">
        <!-- Menu Lateral -->
        <div class="bg-gradient-to-br from-[#025221] to-[#2D5236] hidden lg:block h-screen overflow-y-auto">
            <div class="flex items-center justify-center pt-5">
                <img class="object-contain w-16" src="assets/S.png" alt="">
                <div class="flex flex-col items-center justify-center translate-x-[-6px] space-y-1">
                    <h1 class="text-white font-semibold transform text-xl">Sistema de <span class="text-[var(--accent-yellow)]">Demandas</span></h1>
                    <span class="bg-[var(--accent-yellow)] h-0.5 w-full block"></span>
                </div>
            </div>

            <div class="pt-12 w-full">
                <nav class="flex justify-center w-full px-7">
                    <ul class="space-y-5 flex flex-col items-center w-full">
                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-plus-circle bg-gray-100/50 py-3 px-4 text-xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] flex py-3 rounded-md text-white hover:bg-gray-100/50 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 text-start indent-5 nav-bar btnSec">
                                <li class="font-semibold">Criar Planilha</li>
                            </button>
                        </div>

                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-clipboard2-data bg-gray-100/50 py-3 px-4 text-xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] py-3 rounded-md text-white hover:bg-gray-100/50 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 text-start indent-5 nav-bar btnSec">
                                <li class="font-semibold">Gerenciar Tarefas</li>
                            </button>
                        </div>

                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-file-earmark-arrow-down bg-gray-100/50 py-3 px-4 text-xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] py-3 rounded-md text-white hover:bg-gray-100/50 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 text-start indent-5 nav-bar btnSec">
                                <li class="font-semibold">Gerar Relatórios</li>
                            </button>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>

        <main class="h-[100vh] overflow-y-auto">

            <!-- Incial -->
            <div>
                <header class="h-[65px] flex justify-between items-center z-[9999] border-b-2 px-5">

                    <div>
                        
                    </div>

                    <div class="flex items-center transform">

                        <div class="flex items-center space-x-4 ">
                            <div class="flex flex-col items-end">
                                <p class="text-[#025221] text-sm hidden sm:block">
                                    <?= isset($_SESSION['nome']) ? htmlspecialchars(implode(" ", array_slice(explode(" ", trim($_SESSION['nome'])), 0, 2))) : '' ?>
                                </p>
                            </div>

                           
                            <div class="flex items-center space-x-4">
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

                                <!-- Btn Sair -->
                                <?php if(isset($_SESSION['id_usuario'])) : ?>
                                    <form action="../main/controllers/authController.php?action=logout" method="POST">
                                        <button class="flex items-center space-x-2 bg-[#025221] text-white py-1 px-3 rounded-md hover:translate-x-[3px] transition ease-in-out duration-150 botao-sair btnScaleGray" type="submit">
                                            <i class="bi bi-box-arrow-in-right text-xl"></i>
                                            <p>Sair</p>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <!-- Criação de Planilhas -->
            <div class="secFunc hidden">
                <h1>Criar</h1>
            </div>

            <!-- Gerenciamento de Tarefas -->
            <div class="secFunc hidden">
                <h1>Gerenciar</h1>
            </div>

            <!-- Geração de Relatórios -->
            <div class="secFunc hidden">
                <h1>Gerar</h1>
            </div>
            
            <div class="bg-gradient-to-t from-[var(--primary-green)] to-[var(--accent-yellow)] lg:h-[260px] pt-[2px] hidden">
                <footer class="bg-[#1C1C1C] h-full px-5 pb-12 flex justify-center items-center bottom-0 p-8 text-center">
                    <div class="grid lg:grid-cols-3 h-full w-full flex items-center">
                        <div class="text-white flex flex-col items-start transform translate-x-2 lg:items-center text-start text-sm sm:text-[15px] ">
                            <div class="space-y-2">
                                <h1 class="text-xl text-[var(--primary-green)]">Desenvolvedores</h1>
                                <div class="flex items-center space-x-2">
                                    <i class="bi bi-code-slash text-[var(--accent-yellow)]"></i>
                                    <p class="text-gray-200">Kauan Cristian</p>
                                </div>
                                <div class="flex space-x-2 items-center">
                                    <i class="bi bi-code-slash text-[var(--accent-yellow)]"></i>
                                    <p class="text-gray-200">Cassio Holanda</p>
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
        </main>

    </div>
    
    <script>
        const btnSec = document.querySelectorAll(".btnSec");
        const iconReference = document.querySelectorAll(".iconReference");
        const secFunc = document.querySelectorAll(".secFunc");

        btnSec.forEach((btn, index) => {
            btn.onmouseenter = () => {
                iconReference[index].classList.remove("bg-gray-100/50");
                iconReference[index].classList.remove("text-[var(--accent-yellow)]");

                
                iconReference[index].classList.add("bg-[var(--accent-yellow)]");
                iconReference[index].classList.add("text-white");

            };

            btn.onmouseleave = () => { 
                iconReference[index].classList.remove("bg-[var(--accent-yellow)]");
                iconReference[index].classList.remove("text-white");

                iconReference[index].classList.add("bg-gray-100/50");
                iconReference[index].classList.add("text-[var(--accent-yellow)]");
            };

            btn.onclick = () => {
                secFunc.forEach((sec) => {
                    sec.classList.add("hidden");
                    secFunc[index].classList.remove("hidden");
                })
            };
        })

        iconReference.forEach((icon, index) => {
            icon.onclick = () => {
                btnSec[index].click();
            }
        });
    </script>

     <script>
        const btnConta = document.querySelector(".btnConta");

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