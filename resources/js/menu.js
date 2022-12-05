// Este arquivo JavaScript adiciona ou remove classes, atributos e valores,
// para abrir e fechar o menu, além de melhorar acessibilidade do site

// Seleciona a tag body
const body = document.querySelector("body");
// Seleciona o botão do menu pelo id
const buttonMenu = document.querySelector("#button-menu");
// Seleciona o menu pelo id
const menu = document.querySelector("#menu");
// Seliciona tudos os itens do menu 
const links = document.querySelectorAll(".menu-link");

// Esta função abri e fecha o menu
function toggleMenu(event) {
  // Torna a abertura e fechamento do menu mais fluida
  if (event.type === "touchstart") event.preventDefault();

  // Abre e fecha menu
  menu.classList.toggle("active-menu");
  // Remove a barra de rolagem quando o menu estiver aberto
  body.classList.toggle("active-menu");

  // Verifica se menu está aberto (com a classe 'active-menu')
  const isActive = menu.classList.contains("active-menu");

  // Adiciona o atributo ARIA 'aria-expanded'
  event.currentTarget.setAttribute("aria-expanded", isActive);

  // Adiciona o atributo ARIA 'aria-çabel'
  event.currentTarget.setAttribute(
    "aria-label",
    `${isActive ? "Fechar menu" : "Abrir menu"}`
  );
}

function removeActiveClass() {
  // Remove a classe 'active-menu' fechando o menu
  body.classList.remove("active-menu");
  // Remove a classe 'active-menu' fechando o menu
  menu.classList.remove("active-menu");
}

// Fica observando o evento de 'click' no botão do menu
buttonMenu.addEventListener("click", toggleMenu);
// Fica observando se a tela do celular foi tocada
buttonMenu.addEventListener("touchstart", toggleMenu);

links.forEach((link) => {
  // Quando clicar em um link do mesnu, remove a classe 'active-menu' do 'body' e do 'menu'
  link.addEventListener("click", removeActiveClass);
});