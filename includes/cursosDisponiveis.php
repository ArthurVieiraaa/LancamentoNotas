<div class="cursos">
    <div class="cursos-disponiveis">
        <h1>Cursos Disponíveis:</h1>
        <div class="cursos-lista">
            <ul>
                <li>
                    <h1>Curso Livre</h1>
                    <h2>Limpeza de Pele</h2>
                    <p>Inicio: 07/02/2025</p>
                    <h3>R$349,90</h3>
                    <button id="open-modal"><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Curso Técnico</h1>
                    <h2>Técnico em Enfermagem</h2>
                    <p>Inicio: 05/02/2025</p>
                    <h3>R$749,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Técnolgo</h1>
                    <h2>Análise e Desenvolvimento de Sistemas (ADS)</h2>
                    <p>Inicio: 15/02/2025</p>
                    <h3>R$879,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Curso EAD</h1>
                    <h2>Excel Básico</h2>
                    <p>Inicio: 10/03/2025</p>
                    <h3>R$149,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Curso Livre</h1>
                    <h2>Assistente de Secretaria Escolar</h2>
                    <p>Inicio: 05/03/2025</p>
                    <h3>R$499,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Workshop</h1>
                    <h2>Pilotagem de Drone</h2>
                    <p>Inicio: 02/04/2025</p>
                    <h3>R$399,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Graduação</h1>
                    <h2>Engenharia de Software</h2>
                    <p>Inicio: 15/02/2025</p>
                    <h3>R$1199,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
                <li>
                    <h1>Curso Técnico</h1>
                    <h2>Técnico em Informática</h2>
                    <p>Inicio: 12/02/2025</p>
                    <h3>R$749,90</h3>
                    <button><i class="fa-solid fa-arrow-right"></i></button>
                </li>
            </ul>
        </div>
        <div id="fade" class="hide"></div>
        <div id="modal" class="hide">
            <div class="modal-header">
                <h2>Limpeza de Pele</h2>
                <button id="close-modal">Fechar</button>
            </div>
            <div class="modal-body">
                <div class="modal-body-container    ">
                    <div class="modal-body-content">
                        <img src="assets/img/Senac.png" alt="" class="img-modal">
                    </div>
                    <div class="modal-body-content">
                        <div class="texto-modal">
                            <div>
                                <h3>Descrição:</h3>
                            </div>
                        </div>
                        <div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus nulla incidunt, repellendus eligendi est explicabo vel ipsam earum expedita minima fuga ut, nostrum ullam molestias numquam id obcaecati provident tempora?</p>
                        </div>
                        <div>
                            <div class="main-modal-botao">
                                <div class="modal-botao">
                                    <div>
                                        <button>Balão Personalizado</button>
                                    </div>
                                    <div>
                                        <button>Cesta de Vime</button>
                                    </div>
                                    <div>
                                        <button>Flores</button>
                                    </div>
                                    <div>
                                        <button>Quadro com Foto</button>
                                    </div>
                                    <div>
                                        <button>Fotos Personalizadas</button>
                                    </div>
                                    <div>
                                        <button>Pelúcia</button>
                                    </div>
                                    <div>
                                        <button>Ferrero Rocher 4un</button>
                                    </div>
                                </div>
                                <div class="modal-botao">
                                    <div>
                                        <button>Nutella B-Ready</button>
                                    </div>
                                    <div>
                                        <button>Pote de Nutella</button>
                                    </div>
                                    <div>
                                        <button>Pão de Mel</button>
                                    </div>
                                    <div>
                                        <button>Sanduiche Natural</button>
                                    </div>
                                    <div>
                                        <button>Suco de Uva Int</button>
                                    </div>
                                    <div>
                                        <button>Macarron</button>
                                    </div>
                                    <div>
                                        <button>Iogurte</button>
                                    </div>
                                </div>
                            </div>
                            <div class="finalizar-modal">
                                <div>
                                    <button>Finalizar Compra</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cursos-inscricao">
        <h1>Inscreva-se:</h1>
        <div class="formulario-curso">
            <form action="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu Nome..." required>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Digite seu Email..." required>
                <label for="password-create">Crie sua Senha:</label>
                <input type="password" id="password-create" name="password-create" placeholder="Crie sua Senha..." required>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="Confirme sua Senha..." required>
                <label for="curso">Curso:</label>
                <select name="curso" id="curso">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="curso1">Limpeza de Pele</option>
                    <option value="curso2">Técnico em Enfermagem</option>
                    <option value="curso3">Análise e Desenvolvimento de Sistemas (ADS)</option>
                    <option value="curso4">Excel Básico</option>
                    <option value="curso5">Assistente de Secretaria Escolar</option>
                    <option value="curso6">Pilotagem de Drone</option>
                    <option value="curso7">Engenharia de Software</option>
                    <option value="curso8">Técnico em Informática</option>
                </select>
                <a href="#"><button>Inscrever-se</button></a>
            </form>
        </div>
    </div>
</div>