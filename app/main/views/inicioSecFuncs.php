<?php
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: /demandas_sistemaSGTM/app/main/index.php");
        exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
           bottom: 0;
           background-color: var(--accent-yellow);
           transform-origin: center;
           transform: scaleY(0);
           transition: transform 0.4s ease-in-out;
        }

        .nav-bar:hover::after{
            transform: scaleY(1);
        }

        .nav-bar-active::after{
            transform: scaleY(1) !important;
        }
        
        .navBarElement::after{
            content: "";
            position: absolute;
            width: 4px;
            height: 100%;
            left: 0;
            bottom: 0;
            transform-origin: center;
            background-color: var(--accent-yellow);
            transform: scaleY(1);
            transition: transform 0.4s ease-in-out;
        }

        .btnScaleEditar,
        .btnScaleExcluir{
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btnScaleEditar::after{
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100%;
            height: 300px;
            border-radius: 50%;
            transform-origin: center;
            background-color: #3f8159ff;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.2s ease-in-out;
            z-index: -1;
        }

        .btnScaleExcluir::after{
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100%;
            height: 300px;
            border-radius: 50%;
            transform-origin: center;
            background-color: #ff919150;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.2s ease-in-out;
            z-index: -1;
        }

        .btnScaleEditar:hover::after,
        .btnScaleExcluir:hover::after{
            transform: translate(-50%, -50%) scale(1);
        }

        .noScroll{
            overflow-y: hidden;
        }

        @keyframes topMovie {
            0%{
                margin-top: -25px;
                opacity: 0;
            }

            100%{
                margin-top: 0;
                opacity: 1;
            }
        }

        .modalConfirmation{
            animation: topMovie 0.6s ease-in-out;
        }

        #divNomePlanilha {
            animation: topMovie 0.6s ease-in-out;
        }

        .btnCreate::after{
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100%;
            height: 100%;
            border-radius: inherit;
            transform-origin: center;
            background-color: #00b3482a;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease-in-out;
            z-index: -1;
            animation: btnPulse 2s ease-in-out infinite;
        }

        .btnActive{
            background-color: #557463;
            color: var(--accent-yellow) !important;
            transform: translateX(5px);
        }

        .iconActive{
            background-color: var(--accent-yellow);
            color: white !important;
        }
    </style>
</head>
<body class="">

    <div class="grid lg:grid-cols-[0.4fr_1.2fr]">
        <!-- Menu Lateral -->
        <div id="side-bar" class="bg-gradient-to-br from-[var(--dark-green2)] to-[#025221] hidden lg:block h-screen overflow-y-auto w-screen lg:w-full transform translate-x-[-100%] lg:translate-x-0 transition ease-in-out duration-300 z-[9999]">
            <div class="flex justify-center items-center space-x-4 lg:space-x-0 pt-7">
                <div class="flex items-center justify-center">
                    <div class="flex flex-col items-center justify-center translate-x-[-6px] space-y-1">
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-school text-2xl md:text-[2.5vw] text-[var(--accent-yellow)]"></i>
                            <div class="flex flex-col space-y-[0.8vw] pt-[1vh]">
                                <h1 class="text-white font-semibold transform text-xl md:text-[1.5vw]">Sistema de <span class="text-[var(--accent-yellow)]">Demandas</span></h1>
                                <span class="bg-[var(--accent-yellow)] h-0.5 w-full block"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <i id="btnMenuClose" class="bi bi-x-lg lg:hidden text-xl text-white translate-x-1"></i>
            </div>

            <div class="pt-12 w-full">
                <nav class="flex justify-center w-full px-4 lg:px-[2vw]">
                    <ul class="space-y-[3vh] flex flex-col items-center w-full">
                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-plus-circle h-[55px] flex items-center justify-center px-4 text-2xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] h-[55px] text-sm lg:text-[1.2vw] rounded-md text-white text-start indent-5 hover:bg-gray-100/30 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 nav-bar btnSec">
                                <li class="font-semibold">Criar Planilha</li>
                            </button>
                        </div>

                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-clipboard2-data h-[55px] flex items-center justify-center px-4 text-2xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] h-[55px] text-sm lg:text-[1.2vw] rounded-md text-white text-start indent-5 hover:bg-gray-100/30 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 nav-bar btnSec">
                                <li class="font-semibold">Gerenciar Planilhas</li>
                            </button>
                        </div>

                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-file-earmark-arrow-down h-[55px] flex items-center justify-center px-4 text-2xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] h-[55px] text-sm lg:text-[1.2vw] rounded-md text-white text-start indent-5 hover:bg-gray-100/30 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 nav-bar btnSec">
                                <li class="font-semibold">Gerar Relatórios</li>
                            </button>
                        </div>

                        <div class="flex justify-center items-center w-full">
                            <i class="bi bi-person-badge h-[55px] flex items-center justify-center px-4 text-2xl text-[var(--accent-yellow)] rounded-md iconReference transition ease-in-out duration-300 cursor-pointer hover:text-white hover:bg-[var(--accent-yellow)]"></i>
                            <button class="w-[90%] h-[55px] text-sm lg:text-[1.2vw] rounded-md text-white text-start indent-5 hover:bg-gray-100/30 hover:text-[var(--accent-yellow)] hover:translate-x-[5px] transition ease-in-out duration-300 nav-bar btnSec">
                                <li class="font-semibold">Editar Perfil</li>
                            </button>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>

        <main class="h-[100vh] overflow-y-auto bg-gradient-to-br from-[#F6F9F7] to-[#EBF6F3]">

            <!-- Shadow-->
            <div class="bg-black inset-0 opacity-50 h-screen absolute shadow hidden"></div>

            <div class="h-[67px] bg-gradient-to-r from-[#025221] via-[var(--accent-yellow)] to-[#025221] fixed w-screen lg:w-[75%] z-[8000]">
                <header class="h-[64px] flex justify-between items-center z-[8000] fixed border-b-2 px-5 bg-white w-full lg:w-[75%]">
                    <!-- Btn menu Mobile -->
                    <div class="z-[9999] relative lg:hidden flex items-center">
                        <button id="btnMenuMb" class="lg:hidden">
                            <i class="bi bi-list text-[#025221] text-2xl"></i>
                        </button>

                        <div class="flex items-center lg:hidden">
                            <img class="object-contain w-9" src="../assets/S.png" alt="">
                            <p class="text-[#025221] font-semibold nomeSecMB pr-1">Página</p>
                            <span class="text-[var(--accent-yellow)] font-semibold subNomeSecMB">Inicial</span>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <div class="flex items-center text-[1vw]">
                            <img class="object-contain w-[2.5vw]" src="../assets/S.png" alt="">
                            <p class="text-[#025221] font-semibold nomeSecPC pr-1">Página</p>
                            <span class="text-[var(--accent-yellow)] font-semibold subNomeSecPC">Inicial</span>
                        </div>
                    </div>

                    <div class="flex items-center transform">
                        <div class="flex items-center space-x-4 z-[9999] relative">
                            <div class="flex flex-col items-end">
                                <p class="text-[#025221] text-sm sm:text-[14px] hidden sm:block">
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
                                <div class="hidden md:block">
                                    <?php if(isset($_SESSION['id_usuario'])) : ?>
                                        <form action="../controllers/authController.php?action=logout" method="POST">
                                            <button class="flex items-center space-x-2 bg-[#025221] text-white py-1 px-3 rounded-lg hover:translate-x-[3px] transition ease-in-out duration-150 botao-sair btnScaleGray" type="submit">
                                                <i class="bi bi-box-arrow-in-right text-xl"></i>
                                                <p>Sair</p>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <!-- Sec Incial -->
            <div id="secInicial" class="h-screen flex items-center justify-center">
                <div class="flex flex-col items-center justify-center gap-3">
                    <div class="flex flex-col items-center space-y-2">
                        <h1 class="text-center text-xl">Bem-vindo ao Sistema de Demandas SGTM</h1>
                        <span class="bg-[var(--accent-yellow)] h-0.5 w-[200px] mx-auto block"></span>
                    </div>
                    <p class="text-gray-800 px-6 text-center pt-3">Gerencie solicitações, acompanhe prazos e visualize informações essenciais.</p>
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
                </div>
            </div>

            <!-- Criação de Planilhas -->
            <div class="secFunc hidden">
                <!-- Btn New Planilha -->
                <div id="divNew" class="flex flex-col items-center justify-center items-center pt-24 space-y-6">
                    <p class="text-gray-600 text-center px-4 sm:px-0">Você ainda não possui nenhuma planilha criada. Crie a sua primeira logo abaixo.</p>
                    <div class="bg-white shadow-2xl py-6 px-4 rounded-xl btnSpecial flex flex-col items-center space-y-7 w-[220px]">
                         <i class="bi bi-plus-circle text-5xl text-[var(--accent-yellow)]"></i>
                         <button id="btnNewPlanilha" class="bg-[#025221] w-full rounded-md hover:translate-y-[-3px] transition ease-in-out duration-300 btnScaleGray">
                            <p class="text-white py-2">Nova Planilha</p>
                         </button>
                    </div>
                </div>

                <!-- Modal de Name Planilha -->
                <div class="w-full h-screen transform translate-y-[-50px] flex justify-center items-center z-[200] relative hidden modalCreatePlanilha">
                    <div class="bg-white border-l-4 border-l-[var(--accent-yellow)] py-6 px-3 pb-6 rounded-xl">

                        <div class="px-3 translate-y-[-10px]"><i id="fecharModalName" class="bi bi-arrow-return-left text-xl cursor-pointer hover:text-[var(--accent-yellow)] transition ease-in-out duration-300"></i></div>

                        <div class="flex flex-col px-2 space-y-4">
                            <div class="w-full flex items-center relative group">
                                <i class="bi bi-x absolute left-2"></i>
                                <input class="p-2 outline-none border-2 border-[#025221] rounded-lg indent-5 focus:border-[var(--accent-yellow)] transition ease-in-out duration-300" type="text" name="namePlanilha" id="inptNamePlanilha" placeholder="Nome...Planilha">
                            </div>

                            <!-- pError -->
                            <p id="pError" class="text-red-500 text-sm hidden">Preencha os campos vázios!</p>
                

                            <!-- btnCriarPlanilha -->
                            <button id="btnCriarPlanilha" class="py-2 w-full bg-[#025221] rounded-lg text-white btnScaleGray hover:translate-y-[-3px] transition ease-in-out duration-300">
                                <p>Criar Planilha</p>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de Confirmação -->
                <div class="w-full h-screen transform translate-y-[-50px] flex justify-center items-center z-[200] relative hidden modalConfirmation">
                    <div class="bg-white border-l-4 border-l-[var(--accent-yellow)] py-6 px-5 pb-6 rounded-xl flex flex-col justify-center items-center gap-4">
                        <div class="flex flex-col items-center space-y-3">
                            <i class="bi bi-check-circle text-[#025221] text-3xl"></i>
                            <p class="text-gray-600 ">Planilha criada com sucesso!</p>
                        </div>

                        <!-- btnConfirmar -->
                         <button id="btnProsseguir" class="py-2 w-full bg-[#025221] rounded-lg text-white btnScaleGray hover:translate-y-[-3px] transition ease-in-out duration-300 flex items-center justify-center space-x-2 group ">
                            <p>Prosseguir</p>
                            <i class="bi bi-arrow-right group-hover:translate-x-[3px] transition ease-in-out duration-300 text-xl"></i>
                        </button>
                    </div>
                </div>


                <!-- Container Planilhas -->
                 <div id="divPlanilhaCriada" class="hidden">
                    <div>
                        <div id="divNomePlanilha" class="flex flex-col space-y-2 pt-24">
                            <h1 class="text-center text-xl nomePlanilha text-[#025221]"></h1>
                            <span class="bg-[var(--accent-yellow)] h-0.5 w-[120px] mx-auto block"></span>
                        </div>

                        
                        <!-- Btn de criar mais seções -->
                        <div id="divBtnCreate" class="flex justify-end">
                            <button class="bg-gradient-to-br from-[#025221] via-[var(--dark-green)] to-[#025221] transition ease-in-out duration-300 py-5 px-6 rounded-full text-white cursor-pointer btnCreate fixed top-[75px] right-[15px]">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- btnCreateSecs === 0 -->
                    <div id="divBtnInciarSecs" class="bg-white shadow-2xl py-6 px-4 rounded-xl btnSpecial flex flex-col mx-auto items-center space-y-7 w-[220px] mt-8">
                         <i class="bi bi-collection text-5xl text-[var(--accent-yellow)]"></i>
                         <button id="btnIniciarSecs" class="bg-[#025221] w-full rounded-md hover:translate-y-[-3px] transition ease-in-out duration-300 btnScaleGray">
                            <p class="text-white py-2">Iniciar Seções</p>
                         </button>
                    </div>

                    <div id="containerGeralPlanilhas" class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-8 px-12 gap-20 w-full mx-auto pb-12">

                    </div>
                 </div>
            </div>

            <!-- Gerenciamento de Planilha -->
            <div class="secFunc hidden">
                <div class="pt-12">
                    <div id="containerGerenciamentoPlanilhas" class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 px-12 gap-8 w-full mx-auto pb-12 pt-12  ">
                        <!-- Planilhas carregadas aqui -->
                    </div>

                    <!-- Mensagem quando não há planilhas -->
                    <div id="divSemPlanilhas" class="flex flex-col items-center justify-center items-center space-y-6">
                        <p class="text-gray-600 text-center px-4 sm:px-0">Você ainda não possui nenhuma planilha. Crie uma na seção de "Criação de Planilhas".</p>
                        <div class="bg-white shadow-2xl py-6 px-4 rounded-xl btnSpecial flex flex-col items-center space-y-7 w-[220px]">
                             <i class="bi bi-clipboard2-data text-5xl text-[var(--accent-yellow)]"></i>
                             <button id="btnIrParaCreate" class="bg-[#025221] w-full rounded-md hover:translate-y-[-3px] transition ease-in-out duration-300 btnScaleGray">
                                <p class="text-white py-2">Ir para Criação</p>
                             </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geração de Relatórios -->
            <div class="secFunc hidden">
                <h1>Gerar</h1>
            </div>

            <!-- Perfil do Usuário  -->
            <div class="secFunc hidden">
                <div class="pt-20">
                    <div class="bg-[#fff]/10 rounded-xl w-[90%] mx-auto h-[420px] shadow-2xl">
                        <div class="flex flex-col items-center justify-center h-full space-y-6">
                
                            <?php if (isset($_SESSION['nome'])): ?>
                                <div class="w-24 h-24 rounded-full flex items-center justify-center drop-shadow-[0_0_10px_#025221] fotoPerfil"
                                    style="background-color: <?= $_SESSION['perfil']; ?>;">
                                    <p class="text-white font-semibold text-2xl">
                                        <?= htmlspecialchars(mb_substr($_SESSION['nome'], 0, 1, 'UTF-8')); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                    

                            <p class="text-black text-sm sm:text-xl font-semibold">
                                <?= isset($_SESSION['nome']) ? htmlspecialchars(implode(" ", array_slice(explode(" ", trim($_SESSION['nome'])), 0, 2))) : '' ?>
                            </p>

                            <div>
                                <button class="bg-[#025221] text-white flex items-center space-x-2 py-2 px-4 rounded-xl btnScaleGray hover:translate-y-[-3px] transition ease-in-out duration-300 ">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="text-sm font-semibold">Alterar Foto de Perfil</p>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white w-[90%] rounded-xl shadow-2xl">
                        <div class="grid sm:grid-cols-2 md:grid-cols-3">

                        </div>
                    </div>
                </div>
            </div>
            
        </main>

    </div>

    <script>
        const containerGeralPlanilhas = document.getElementById("containerGeralPlanilhas");
        const containerGerenciamentoPlanilhas = document.getElementById("containerGerenciamentoPlanilhas");
        const divSemPlanilhas = document.getElementById("divSemPlanilhas");

        let quantidadeSecs = 0;
        let secCounter = 0;
        let planilhaCriada = false;

        const shadow = document.querySelector(".shadow");
        const btnNewPlanilha = document.getElementById("btnNewPlanilha");
        const btnCriarPlanilha = document.getElementById("btnCriarPlanilha");
        const btnProsseguir = document.getElementById("btnProsseguir");
        const btnCreate = document.querySelector(".btnCreate");
        const inptNamePlanilha = document.getElementById("inptNamePlanilha");
        const fecharModalName = document.getElementById("fecharModalName");
        const btnIrParaCreate = document.getElementById("btnIrParaCreate");

        const nomePlanilha = document.querySelector(".nomePlanilha");
        let nomePlanilhaPassado = "";

        // Função para carregar planilhas do gerenciamento
        async function carregarPlanilhasGerenciamento() {
            try {
                const response = await fetch('../controllers/authController.php?action=obter_planilhas', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok && data.status === 'ok' && data.data.length > 0) {
                    containerGerenciamentoPlanilhas.innerHTML = '';
                    divSemPlanilhas.classList.add("hidden");

                    data.data.forEach(planilha => {
                        const cardPlanilha = criarCardPlanilha(planilha);
                        containerGerenciamentoPlanilhas.appendChild(cardPlanilha);
                    });
                } else {
                    containerGerenciamentoPlanilhas.innerHTML = '';
                    divSemPlanilhas.classList.remove("hidden");
                }
            } catch (erro) {
                console.error('Erro ao carregar planilhas:', erro);
                divSemPlanilhas.classList.remove("hidden");
            }
        }

        // Função para criar card de planilha
        function criarCardPlanilha(planilha) {
            const card = document.createElement("div");
            card.className = "bg-white shadow-2xl py-5 px-4 rounded-xl btnSpecial flex flex-col mx-auto items-center space-y-7 w-[220px]";
            card.dataset.planilhaId = planilha.id;
            
            card.innerHTML = `
                <h2 class="text-[#025221] text-center text-lg font-semibold line-clamp-2">${planilha.titulo}</h2>
                <i class="bi bi-clipboard2-data text-5xl text-[var(--accent-yellow)]"></i>
                <p class="text-gray-500 text-xs">Criada em: ${new Date(planilha.criado_em).toLocaleDateString('pt-BR')}</p>
                <div class="flex flex-col space-y-3 w-full">
                    <button class="bg-[#025221] w-full rounded-md hover:translate-y-[-3px] transition ease-in-out duration-300 btnScaleEditar btnAbrir" data-id="${planilha.id}">
                        <p class="text-white py-2">Abrir
                            <i class="bi bi-box-arrow-up-right"></i>
                        </p>
                    </button>
                    <button class="bg-red-700 w-full rounded-md hover:translate-y-[-3px] transition ease-in-out duration-300 btnScaleExcluir btnExcluir" data-id="${planilha.id}">
                        <p class="text-white py-2">Excluir
                            <i class="bi bi-trash3-fill"></i>
                        </p>
                    </button>
                </div>
            `;

            // Event listeners para os botões
            const btnAbrir = card.querySelector(".btnAbrir");
            const btnExcluir = card.querySelector(".btnExcluir");

            btnAbrir.addEventListener("click", () => {
                console.log("Abrir planilha:", planilha.id);
                // TODO: Implementar navegação para dentro da planilha
            });

            btnExcluir.addEventListener("click", () => {
                console.log("Excluir planilha:", planilha.id);
                // TODO: Implementar exclusão de planilha
            });

            return card;
        }

        btnNewPlanilha.onclick = () => {
            shadow.classList.remove("hidden");
            document.getElementById("divNew").classList.add("hidden");
            document.querySelector(".modalCreatePlanilha").classList.remove("hidden");
        };

        btnCriarPlanilha.onclick = async () => {
            const titulo = inptNamePlanilha.value.trim();

            if(titulo.length === 0) {
                document.getElementById("pError").classList.remove("hidden");
                return;
            };

            try {
                const response = await fetch('../controllers/authController.php?action=criar_planilha', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ titulo })
                });

                const data = await response.json();

                if (response.ok && data.status === 'ok') {
                    planilhaCriada = true;

                    document.querySelector(".modalCreatePlanilha").classList.add("hidden");
                    document.querySelector(".modalConfirmation").classList.remove("hidden");

                    nomePlanilhaPassado = titulo;
                    inptNamePlanilha.value = '';
                } else {
                    document.getElementById("pError").textContent = data.message || 'Erro ao criar a planilha.';
                    document.getElementById("pError").classList.remove("hidden");
                }
            } catch (erro) {
                console.error('Erro na requisição:', erro);
                document.getElementById("pError").textContent = 'Erro de conexão com o servidor.';
                document.getElementById("pError").classList.remove("hidden");
            }

            inptNamePlanilha.oninput = () => {
                if(inptNamePlanilha.value.trim().length > 0) {
                    document.getElementById("pError").classList.add("hidden");
                }else{
                    document.getElementById("pError").classList.remove("hidden");
                };
            };
        }

        btnProsseguir.onclick = () => {
            document.querySelector(".modalConfirmation").classList.add("hidden");
            shadow.classList.add("hidden");
            document.getElementById("divPlanilhaCriada").classList.remove("hidden");

            nomePlanilha.textContent = nomePlanilhaPassado;

            
            if(quantidadeSecs > 0) {
                document.getElementById("divBtnCreate").classList.remove("hidden");
            }else{
                document.getElementById("divBtnCreate").classList.add("hidden");
            };
        };        

        inptNamePlanilha.oninput = () => {
            if(inptNamePlanilha.value.trim().length > 0) {
                document.getElementById("pError").classList.add("hidden");
            };
        };
        
        fecharModalName.onclick = () => {
            document.querySelector(".modalCreatePlanilha").classList.add("hidden");
            shadow.classList.add("hidden");
            document.getElementById("divNew").classList.remove("hidden");
        }


        function criarSecs() {
            const sec = document.createElement("div");
            sec.dataset.sectionId = secCounter++;
            sec.innerHTML = `
            
            <div class="flex justify-center items-center space-x-4 containerSec">
                <div class="flex flex-col space-y-3">
                    <div class="text-white border-2 border-[#025221] inline-flex w-[200px] py-2 rounded-xl shadow-2xl">
                        <div class="flex justify-between items-center w-full px-2">
                            <h2 class="text-2xl secTitle text-[#025221]">Seção ${secCounter}</h2>
                            <i class="bi bi-three-dots-vertical text-[#025221] cursor-pointer hover:text-[var(--accent-yellow)] transition ease-in-out duration-300"></i>
                        </div>
                    </div>
                    
                    <!-- Btn de comentarios -->
                    <button class="w-[200px] py-2 rounded-xl flex justify-center items-center bg-[#025221] text-white transition ease-in-out duration-300">
                        <i class="bi bi-chat-dots"></i>
                    </button>
                </div>

            </div>

            `

            console.log("sec" + secCounter);

            return sec;
        };

       
        const btnIniciarSecs = document.getElementById("btnIniciarSecs");
        btnIniciarSecs.onclick = () => {
            document.getElementById("divBtnInciarSecs").classList.add("hidden");

            const firstSec = criarSecs();
            containerGeralPlanilhas.appendChild(firstSec);
            quantidadeSecs++;
            console.log("Quantidade de secs: " + quantidadeSecs);
        
            if(quantidadeSecs > 0) {
                document.getElementById("divBtnCreate").classList.remove("hidden");
            }else{
                document.getElementById("divBtnCreate").classList.add("hidden");
            };
        };

        btnCreate.onclick = () => {
            const newSec = criarSecs();
            containerGeralPlanilhas.appendChild(newSec);
            quantidadeSecs++;
            console.log("Quantidade de secs: " + quantidadeSecs);
        };

    </script>
    
    <script>
        const nomesSecsHeader = [
            {
                nome: "Criação de",
                subNome: "Planihas"
            },

            {
                nome: "Gerenciamento de",
                subNome: "Planilhas"
            },

            {
                nome: "Geração de",
                subNome: "Relatórios"
            },

            {
                nome: "Perfil do", 
                subNome: "Usuário"
            },
            
        ];

        const nomeSecPC = document.querySelector(".nomeSecPC");
        const subNomeSecPC = document.querySelector(".subNomeSecPC");
        const nomeSecMB = document.querySelector(".nomeSecMB");
        const subNomeSecMB = document.querySelector(".subNomeSecMB");


        const btnSec = document.querySelectorAll(".btnSec");
        const iconReference = document.querySelectorAll(".iconReference");
        const secFunc = document.querySelectorAll(".secFunc");

        btnSec.forEach((btn, index) => {
            btn.onmouseenter = () => {
                iconReference[index].classList.remove("text-[var(--accent-yellow)]");
                
                iconReference[index].classList.add("bg-[var(--accent-yellow)]");
                iconReference[index].classList.add("text-white");

            };

            btn.onmouseleave = () => { 
                iconReference[index].classList.remove("bg-[var(--accent-yellow)]");
                iconReference[index].classList.remove("text-white");

                iconReference[index].classList.add("text-[var(--accent-yellow)]");
            };

            btn.onclick = () => {
                secFunc.forEach((sec) => {
                    sec.classList.add("hidden");
                    document.getElementById("secInicial").classList.add("hidden");
                });

                secFunc[index].classList.remove("hidden");

                nomeSecPC.innerHTML = nomesSecsHeader[index].nome;
                subNomeSecPC.innerHTML = nomesSecsHeader[index].subNome;
                nomeSecMB.innerHTML = nomesSecsHeader[index].nome;
                subNomeSecMB.innerHTML = nomesSecsHeader[index].subNome;

                btnSec.forEach((btn) => btn.classList.remove("btnActive"));
                btnSec.forEach((btn) => btn.classList.remove("navBarElement"));
                iconReference.forEach((icon) => icon.classList.remove("iconActive"));

                btn.classList.add("btnActive");
                btn.classList.add("navBarElement");
                iconReference[index].classList.add("iconActive");

                // Carregar planilhas ao entrar na seção de gerenciamento
                if (index === 1) {
                    carregarPlanilhasGerenciamento();
                }
            };
        });
        

        iconReference.forEach((icon, index) => {
            icon.onclick = () => {
                btnSec[index].click();
            };

            icon.onmouseenter = () => {
                btnSec[index].classList.replace("text-white" ,"text-[var(--accent-yellow)]");
                btnSec[index].classList.add("bg-gray-100/30");
                btnSec[index].classList.add("translate-x-[5px]");

                btnSec[index].classList.add("nav-bar-active");
            };

            icon.onmouseleave = () => {
                btnSec[index].classList.replace("text-[var(--accent-yellow)]" ,"text-white");
                btnSec[index].classList.remove("bg-gray-100/30");
                btnSec[index].classList.remove("translate-x-[5px]");
                
                btnSec[index].classList.remove("nav-bar-active");
            }
        });


        btnIrParaCreate.onclick = () => {
            btnSec[0].click();
        }
    </script>

     <script>
        const side_bar =  document.getElementById("side-bar");
        const btnMenuMb =  document.getElementById("btnMenuMb");
        
        btnMenuMb.onclick = () => {
            side_bar.classList.remove("hidden");
            setTimeout(() => {
                side_bar.classList.remove("translate-x-[-100%]");
            },50);
        }

        btnMenuClose.onclick = () => {
            side_bar.classList.add("translate-x-[-100%]");
            setTimeout(() => {
                side_bar.classList.add("hidden");
            },500);
        }
     </script>
</body>
</html>