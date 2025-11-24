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
    <title>Nova Planilha | STGM Demandas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Assistant:wght@200..800&family=Bangers&family=Bebas+Neue&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Comfortaa:wght@300..700&family=Epilogue:ital,wght@0,100..900;1,100..900&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lilita+One&family=Love+Ya+Like+A+Sister&family=Monsieur+La+Doulaise&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Oxanium:wght@200..800&family=Passion+One:wght@400;700;900&family=Pinyon+Script&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rock+Salt&family=Smooch+Sans:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Space+Grotesk:wght@300..700&family=Vina+Sans&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        html, body{
            overflow-x: hidden;
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

        @keyframes containerSecsAnim {
            0%{
                transform: translateY(-20px);
                opacity: 0;
            }

            100%{
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes spanLeft {
            0%{
                transform: translateX(-20px);
                opacity: 0;
            }

            100%{
                transform: translateX(0);
                opacity: 1;
            }
        }

        #containerGeralSecs{
            animation: containerSecsAnim 0.9s ease-in-out;
        }

        #h1NomePlanilha{
            animation: containerSecsAnim 0.9s ease-in-out;
        } 

        #spanH1Planilha{
            animation: spanLeft 0.9s ease-in-out;
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
    </style>
</head>
<body class="bg-gradient-to-br from-[#191919] via-[#262626]/90 to-[#121212] h-[100vh]">

    <!-- Sec 1 -->
    <div id="sec1" class="h-screen"> 
        <div class="bg-black inset-0 opacity-70 absolute h-screen z-50 hidden shadowDiv"></div>

        <div class="fixed bg-gradient-to-r from-[var(--accent-yellow)] via-[var(--primary-green)] to-[var(--accent-yellow)] h-[75px] pb-1 z-[9999]">
            <header class="bg-gradient-to-r from-[var(--dark-green)] to-[#005A24] h-full flex justify-between items-center w-screen z-[9999]">
                <div class="flex items-center space-x-1 sm:space-x-2 ml-4">
                    <a href="../index.php">
                        <img class="object-contain w-14 hover:scale-105 transition ease-in-out duration-300" src="../assets/S.png" alt="">
                    </a>
                    <h1 id="h1SecPlanilha" class="text-[#fff] lg:text-xl font-semibold">Criação de <span class="text-[var(--accent-yellow)]">Planilhas</span></h1>
                </div>
                
                <div class="flex items-center space-x-10">
                    <div class="flex items-center space-x-4 ">
                        <div class="flex flex-col items-end">
                            <p class="text-white text-sm hidden sm:block">
                                <?= isset($_SESSION['nome']) ? htmlspecialchars(implode(" ", array_slice(explode(" ", trim($_SESSION['nome'])), 0, 2))) : '' ?>
                            </p>
                        </div>
                        <div>
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
                                <div class="absolute bg-[#262626] text-[var(--primary-green)] py-2 px-4 translate-x-[-20px] transform translate-y-1 rounded-md hidden divSair">
                                    <form action="../index.php" method="POST">
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

        <!-- Sessão de Planilha não criada -->
        <div id="secPlanilhaNotCreated" class="pt-[120px] flex flex-col items-center justify-center">
            <div class="flex flex-col items-center space-y-3 text-center">
                <h1 class="text-gray-200 text-xl">Crie sua primeira planilha para começar a organizar suas demandas.</h1>
                <span class="bg-[var(--accent-yellow)] h-[1px] w-[200px] mx-auto block"></span>
            </div>

            <div class="pt-12">
                <button id="btnCreatePlanilha" class="bg-gradient-to-br p-5 rounded-lg text-white btnSpecial hover:translate-y-[-3px] hover:ring-2 ring-[var(--dark-green)] transition ease-in-out duration-300">
                    <div class="flex flex-col items-center space-y-2 text-[var(--primary-green)]">
                        <i class="bi bi-plus-circle-fill text-4xl "></i>
                        <p class= "font-semibold">Criar Planilha</p>
                    </div>
                </button>
            </div>
        </div>


        <!-- Modal para criar -->
        <div id="modalCreatePlanilha" class="left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 fixed mx-auto bg-[#1C1C1C] p-3 w-[90%] sm:w-[400px] pb-6 rounded-lg hidden z-[3000]">
            <div class="flex flex-col justify-between space-y-5 h-full pt-5">
                <form id="formNamePlanilha" class="w-full flex flex-col justify-between space-y-3 h-full" action="" onsubmit="return false">
                    <input id="inptNamePlanilha" class="w-[90%] mx-auto p-3 rounded-lg bg-[#404040] outline-none text-white" type="text" name="" id="" placeholder="Nome Planilha:">
                    <!-- pError -->
                     <div class="px-5 hidden" id="pError">
                        <p class="text-red-500">Preencha o campo vazio!</p>
                     </div>
                    <button type="button" id="btnCreateFINAL" class="flex justify-center items-center space-x-2 bg-[var(--dark-green)] py-3 rounded-lg hover:translate-y-[-3px] hover:drop-shadow-[0_0_6px_var(--primary-green)] transition ease-in-out duration-300 w-[90%] group mx-auto">
                        <p class="font-semibold text-white text-sm">Criar</p>
                        <i class="bi bi-arrow-right group-hover:translate-x-1 transition ease-in-out duration-300 text-white"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Modal de Confirmação -->
        <div id="modalConfirmado" class="left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 fixed mx-auto bg-[#1C1C1C] p-3 w-[90%] sm:w-[400px] pb-6 rounded-lg z-[3000] hidden">
            <div class="flex flex-col items-center justify-between space-y-5 h-full w-full pt-5">
                <div class="flex flex-col items-center text-center text-gray-200 space-y-3">
                    <i class="ri-checkbox-circle-line text-4xl text-[var(--primary-green)]"></i>
                    <h1>Planilha criada com sucesso!</h1>
                </div>
                <div class="pt-1 w-full">
                    <button type="button" id="btnConfirmado" class="flex justify-center items-center space-x-2 bg-[var(--dark-green)] py-3 rounded-lg hover:translate-y-[-3px] hover:drop-shadow-[0_0_6px_var(--primary-green)] transition ease-in-out duration-300 w-[90%] group mx-auto">
                        <p class="font-semibold text-white text-sm">Avançar</p>
                        <i class="bi bi-arrow-right group-hover:translate-x-1 transition ease-in-out duration-300 text-white"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Seção de Planilha criada -->
        <div id="secPlanilhaYesCreated" class="hidden pt-8">
            <div class="flex flex-col items-center translate-y-16">
                <div id="divNamePlanilha" class="flex flex-col items-center">
                    <h1 id="h1NomePlanilha" class="text-white text-2xl font-semibold px-6 pb-1 transition ease-in-out duration-300"></h1>
                    <span id="spanH1Planilha" class="bg-[var(--accent-yellow)] h-0.5 w-[100px] mx-auto block"></span>
                </div>

                <!-- Btn se não houver seções -->
                <div class="pt-6">
                    <button class="bg-gradient-to-br p-5 w-[150.267px] rounded-lg text-white btnSpecial hover:translate-y-[-3px] hover:ring-2 ring-[var(--dark-green)] transition ease-in-out duration-300 btnSemSec hidden">
                        <div class="flex flex-col items-center space-y-2 text-[var(--primary-green)]">
                            <i class="bi bi-plus-circle-fill text-4xl "></i>
                            <p class= "font-semibold">Gerar Seção</p>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Sessão de organização das tarefas -->
            <div class="montagemDeSec flex flex-col">
                <div id="containerGeralSecs" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 lg:gap-4 px-12 pt-12">
                    <!-- Container de Sessão -->
                    <!-- No script -->
                </div>
            </div>
        </div>
        
    </div>

    <script>
        const btnConta = document.querySelector(".btnConta");
        const divSair = document.querySelector(".divSair");

        btnConta.onclick = () => {
            divSair.classList.toggle("hidden");
        };
     </script>


    <script>

        window.onload = () => {
            document.getElementById("formNamePlanilha").reset();
        }

        const btnCreatePlanilha = document.getElementById("btnCreatePlanilha");
        const secPlanilhaNotCreated = document.getElementById("secPlanilhaNotCreated");
        const secPlanilhaYesCreated = document.getElementById("secPlanilhaYesCreated");
        const h1NomePlanilha = document.getElementById("h1NomePlanilha");
        const inptNamePlanilha = document.getElementById("inptNamePlanilha");

        const modalCreatePlanilha = document.getElementById("modalCreatePlanilha");
        const modalConfirmado = document.getElementById("modalConfirmado");

        const pError = document.getElementById("pError");

        const btnCreateFINAL = document.getElementById("btnCreateFINAL");
        const btnConfirmado = document.getElementById("btnConfirmado");

        let planilhaCriada = false;
        const shadowDiv = document.querySelector(".shadowDiv");

        let nomePlanilhaFinal = null;

        
        const containerGeralSecs = document.getElementById("containerGeralSecs");

        let sectionCounter = 1;
        
        let quantidadeDeSecs = 0;

        function createSection() {
            const containerSec = document.createElement("div");
            containerSec.classList.add("containerSec"); 
            containerSec.dataset.sectionId = sectionCounter++; 

            containerSec.innerHTML = `
                <div class="flex flex-col justify-center items-center mx-auto space-x-4 pt-12">
                    <div class="secContent flex flex-col space-y-3">
                        <div class="flex items-center space-x-4">
                            <div class="text-white bg-gradient-to-br from-[#121212]/90 via-[#262626]/90 via-[#121212] to-[#262626] inline-flex w-[220px] py-2 rounded-xl border-2 border-transparent hover:border-[var(--dark-green)]">
                                <div class="flex justify-between items-center w-full px-2">
                                    <h2 class="text-2xl secTitle">Seção ${containerSec.dataset.sectionId}</h2>
                                    <div class="flex items-center space-x-2">
                                        <i class="bi bi-three-dots-vertical cursor-pointer hover:text-[var(--primary-green)] transition ease-in-out duration-300 configSecBtn"></i>
                                        <div class="bg-[#242527] rounded-xl absolute transform lg:translate-x-6 p-4 transform lg:translate-y-5 hidden z-[7000] modalSecConfig">
                                            <ul class="space-y-3">
                                                <li class="flex items-center space-x-2 cursor-pointer group">
                                                    <i class="bi bi-plus-lg text-gray-300 group-hover:text-white transition ease-in-out duration-300"></i>
                                                    <p class="text-gray-300 group-hover:text-white transition ease-in-out duration-300">Novo nome</p>
                                                </li>
                                                <li class="flex items-center space-x-2 cursor-pointer group deleteSecBtn">
                                                    <i class="bi bi-trash3 text-red-500 group-hover:rotate-[-20deg] transition ease-in-out duration-300"></i>
                                                    <p class="text-red-500">Excluir seção</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="bg-[var(--dark-green)] hover:bg-[var(--accent-yellow)] transition ease-in-out duration-300 py-5 px-6 rounded-full text-white cursor-pointer btnCreateSec">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                        <button class="w-[220px] py-2 rounded-xl bg-[#121212] flex justify-center items-center text-gray-300 hover:text-white hover:bg-[#323232] transition ease-in-out duration-300 btnComments btnSpecial">
                            <i class="bi bi-chat-dots"></i>
                        </button>
                    </div>

                    <div class="flex flex-col containerCommentsGeral"></div>
                </div>
            `;

            quantidadeDeSecs++;
            console.log(quantidadeDeSecs);


            if (quantidadeDeSecs === 1) {
                document.querySelector(".btnSemSec").classList.add("hidden");
            }

            return containerSec;
        };


        btnCreatePlanilha.onclick = () => {
            secPlanilhaNotCreated.classList.add("hidden");
            modalCreatePlanilha.classList.remove("hidden");
            shadowDiv.classList.remove("hidden");
        };

        inptNamePlanilha.oninput = () => {
            if(inptNamePlanilha.value.trim().length === 0) {
                pError.classList.remove("hidden");
                return;
            }else{
                pError.classList.add("hidden");
            }
        };

        btnCreateFINAL.onclick = () => {
            const nomePlanilha = inptNamePlanilha.value.trim();

            if(!nomePlanilha) {
                pError.classList.remove("hidden");
                return;
            }

            nomePlanilhaFinal = nomePlanilha;
            planilhaCriada = true;

            if(planilhaCriada) {
                modalCreatePlanilha.classList.add("hidden");
                modalConfirmado.classList.remove("hidden");
            }

        };

        // Controle de newButton
        function updateCreateButtons() {
            const sections = document.querySelectorAll(".secContent");

            sections.forEach(sec => {
                const btn = sec.parentElement.querySelector(".btnCreateSec");
                if (btn) {
                    btn.classList.add("opacity-0", "pointer-events-none");
                };
            });

            const lastSec = sections[sections.length - 1];
            if (!lastSec) return;

            const lastBtn = lastSec.parentElement.querySelector(".btnCreateSec");
            if (lastBtn) {
                lastBtn.classList.remove("opacity-0", "pointer-events-none");
            }
        };


        btnConfirmado.onclick = () => {
            if(planilhaCriada) {
                modalConfirmado.classList.add("hidden");
                shadowDiv.classList.add("hidden");

                secPlanilhaYesCreated.classList.remove("hidden");
                h1NomePlanilha.textContent = nomePlanilhaFinal;

                const firstSection = createSection();
                containerGeralSecs.appendChild(firstSection);
                updateCreateButtons();
            };
        };


        // Criação de novas sessões
        containerGeralSecs.addEventListener("click", (e) => {
            const btn = e.target.closest(".btnCreateSec");

            if(btn) {
                const newSection = createSection();
                containerGeralSecs.appendChild(newSection);
                updateCreateButtons();

                if (quantidadeDeSecs === 1) {
                    document.querySelector(".btnSemSec").classList.add("hidden");
                };
            };

            // Modal Config Secs
            const configSecBtn = e.target.closest(".configSecBtn");

            if(configSecBtn) {
                const modalSecConfig = configSecBtn.closest(".flex").querySelector(".modalSecConfig");

                modalSecConfig.classList.toggle("hidden");
            };

            const deleteSecBtn = e.target.closest(".deleteSecBtn");

            if(deleteSecBtn) {
                const secToDelete = deleteSecBtn.closest(".containerSec");
                secToDelete.remove();
                updateCreateButtons();

                quantidadeDeSecs--;
                console.log(quantidadeDeSecs);

                const btnSemSec = document.querySelector(".btnSemSec");
                if(quantidadeDeSecs === 0) {
                    btnSemSec.classList.remove("hidden");
                };
            };

            // BtnSemSec ativado
            const btnSemSec = document.querySelector(".btnSemSec");
            btnSemSec.onclick = () => {
                sectionCounter = 0;
                sectionCounter++;
                newSection = createSection();
                containerGeralSecs.appendChild(newSection);

                if(quantidadeDeSecs === 1) {
                    btnSemSec.classList.add("hidden");
                }else if(quantidadeDeSecs === 0) {
                    btnSemSec.classList.remove("hidden");
                }
            };


            const title = e.target.closest(".secTitle");

            // Aplicação de secTitle em geral
            if(secTitle) {
                textoAtual = title.textContent.trim();

                const input = document.createElement("input");
                input.type = "text";
                input.value = textoAtual;
                input.className = "bg-[var(--bg-elevated)] text-white border-2 border-[var(--dark-green)] rounded-xl px-2 py-1 w-full outline-none";
                input.style.fontSize = "1.4rem";

                title.replaceWith(input);

                input.focus();

                function salvar() {
                    novoTitulo = input.value.trim() || "Sem título";
                    
                    title.textContent = novoTitulo;

                    input.replaceWith(title);
                };

                input.addEventListener("keydown", (e) => {
                    if(e.key ===  "Enter") {
                        e.preventDefault();
                        salvar();
                    }
                });

                input.addEventListener("blur", salvar);
            }
        });


        // Commnets!!!
        function createModalComment() {

            const modalComment = document.createElement("div");
            modalComment.innerHTML = `
            
            <div class="left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 absolute bg-gradient-to-br from-[#121212] via-[#262626] via-[#121212] to-[#262626] h-[500px] w-[95%] sm:w-[500px] rounded-xl flex flex-col justify-between modalComment shadow-xl shadow-gray-900 z-[3000]">
                <div class="flex justify-between items-center p-4 text-gray-200 relative">
                    <div>
                        <button class="bg-[#404040] py-2 px-3 rounded-full hover:bg-[#505050] transition ease-in-out duration-300 btnCloseModalComments">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div>
                        <button class="bg-[var(--primary-green)] py-2 px-6 rounded-2xl flex justify-center items-center hover:bg-green-600 transition ease-in-out duration-300 btnSpecial btnPublicarComment">
                            <p>Publicar</p>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center relative">
                    <input class="w-[90%] bg-transparent outline-none text-white text-xl inputComent" type="text" name="" id="" placeholder="Assunto">
                </div>

                <div class="bg-gradient-to-br bg-gradient-to-br from-[#121212]/90 via-[#262626]/90 to-[#404040] w-[90%] mx-auto rounded-md h-[180px]">
                    <div class="grid grid-cols-3 px-4 sm:px-10">
                        <div>
                            <button class="text-white flex justify-center items-center bg-[#505050] w-12 h-12 mx-auto transform translate-y-14 rounded-full hover:bg-[var(--accent-yellow)] transition ease-in-out duration-300 btnFile">
                                <i class="bi bi-file-earmark-plus text-2xl"></i>
                            </button>
                            <input type="file" name="" class="hidden fileInput" >
                        </div>

                        <div>
                            <button id="btnLink" class="text-white flex justify-center items-center bg-[#505050] w-12 h-12 mx-auto transform translate-y-14 rounded-full hover:bg-[var(--accent-yellow)] transition ease-in-out duration-300">
                                <i class="bi bi-link text-2xl"></i>
                            </button>
                            <div id="areaLinks"></div>
                        </div>

                        <div>
                            <button id="btnImage" class="text-white flex justify-center items-center bg-[#505050] w-12 h-12 mx-auto transform translate-y-14 rounded-full hover:bg-[var(--accent-yellow)] transition ease-in-out duration-300">
                                <i class="bi bi-images text-2xl"></i>
                            </button>
                            <input type="file" name="" id="imgInput" accept="image/*" class="hidden" >
                        </div>
                    </div>
                </div>

                <div class="w-[90%] mx-auto flex justify-center transform transform translate-y-[-10px] outline-none relative">
                    <textarea class="w-full h-40 p-2 pt-2 leading-tight placeholder-[#a8a7a7] outline-none rounded-md bg-transparent text-white descri" placeholder="Escreva algo necessário..."></textarea>
                </div>
            </div>

            `

            const btnClose = modalComment.querySelector(".btnCloseModalComments");

            btnClose.addEventListener("click", () => {
                modalComment.remove();
                shadowDiv.classList.add("hidden"); 
            });

            return modalComment;
        }

        containerGeralSecs.addEventListener("click", (e) => {
            const shadowDiv = document.querySelector(".shadowDiv");
            const btnCommnent = e.target.closest(".btnComments");

            if(!btnCommnent) return; 

            const section = btnCommnent.closest(".containerSec");

            if(!section) return;

            const newModalComment = createModalComment();
            newModalComment.dataset.sectionId = section.dataset.sectionId; //Analisar

            document.body.appendChild(newModalComment); 
            shadowDiv.classList.remove("hidden");

    
        });


        // Criação de comments
        function createComment() {
            const commentDiv = document.createElement("div");
            commentDiv.innerHTML = `
            
            <div class="contentComment overflow-visible w-[220px] rounded-xl bg-gradient-to-br p-4 text-sm space-y-4">
                <div class="flex items-center justify-between items-center w-full">
                    <span class="space-y-2">
                        <p class="assuntoRecebido font-semibold text-[var(--accent-yellow)]"></p>
                        <span class="bg-[var(--accent-yellow)] h-0.5 w-[50px] block"></span>
                    </span>
                    <div class="flex items-center space-x-2">
                        <i class="bi bi-three-dots-vertical text-white cursor-pointer hover:text-[var(--primary-green)] transition ease-in-out duration-300 configCommentBtn"></i>
                        <!-- Modal de Config Commnet  -->
                        <div class="bg-[#242527] rounded-xl absolute transform translate-x-6 sm:translate-x-6 lg:translate-x-6 p-4 transform z-[7000] modalDivCommentConfig text-sm hidden">
                            <ul class="space-y-3">
                                <li class="flex items-center space-x-2 cursor-pointer group deleteComentDivBtn">
                                    <i class="bi bi-trash3 text-red-500 group-hover:rotate-[-20deg] transition ease-in-out duration-300"></i>
                                    <p class="text-red-500">Excluir</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="arquivo">

                </div>

                <div class="descriRecebido flex flex-col text-gray-200">
                    
                </div>
            </div>
            
            `

            return commentDiv;
        };

        document.body.addEventListener("click", (e) => {
            const btnPublicar = e.target.closest(".btnPublicarComment");
            if(!btnPublicar) return;

            const modal = btnPublicar.closest(".modalComment");
            if(!modal) return;

            const assunto = modal.querySelector(".inputComent");
            const descri = modal.querySelector(".descri");

            const assuntoTexto = assunto.value.trim();
            const descriTexto = descri.value.trim();

            
        });


        // Script SecTitle
        const secTitle = document.querySelectorAll(".secTitle");

        secTitle.forEach((title) => {
            title.onclick = () => {

                const textoAtual = title.textContent.trim();

                const input = document.createElement("input");
                input.type = "text";
                input.value = textoAtual;
                input.className = "bg-[var(--bg-elevated)] text-white border-2 border-[var(--dark-green)] rounded-xl px-2 py-1 w-full outline-none";
                input.style.fontSize = "1.4rem";

                title.replaceWith(input);

                input.focus();

                function salvar() {
                    const novoTitulo = input.value.trim() || "Sem título";

                    title.textContent = novoTitulo;

                    input.replaceWith(title);
                };

                input.addEventListener("keydown", (e) => {
                    if(e.key === "Enter") {
                        e.preventDefault();
                        salvar();
                    }
                });

                input.addEventListener("blur", salvar);
            }
        });
        
    </script>

    <script>
        ScrollReveal().reveal('#h1SecPlanilha', {
            delay: 100,
            origin: 'left',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });
        
        ScrollReveal().reveal('#secPlanilhaNotCreated', {
            delay: 250,
            origin: 'top',
            distance: '30px',
            duration: 800,
            easing: 'ease-in-out'
        });

     </script>
</body>
</html>