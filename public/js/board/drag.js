// Função para adicionar eventos de drag and drop a um cartão
const addDragEventsToCard = (card) => {
  card.addEventListener("dragstart", () => {
    card.classList.add("is-dragging");
  });

  card.addEventListener("dragend", () => {
    card.classList.remove("is-dragging");
  });
};

// Função para adicionar eventos de dragover a uma coluna
const addDragOverEventToColumn = (column) => {
  column.addEventListener("dragover", (event) => {
    event.preventDefault();
    const cardBeingDragged = document.querySelector(".is-dragging");
    const nearestCard = searchNearestCard(column, event.clientY);

    if (!nearestCard) {
      column.appendChild(cardBeingDragged);
    } else {
      column.insertBefore(cardBeingDragged, nearestCard);
    }
  });
};

// Função para buscar o cartão mais próximo
const searchNearestCard = (stage, mouseY) => {
  const cards = stage.querySelectorAll(".card:not(.is-dragging)");
  let closestCard = null;
  let closestOffset = Number.NEGATIVE_INFINITY;

  cards.forEach((card) => {
    const { top } = card.getBoundingClientRect();
    const offset = mouseY - top;

    if (offset < 0 && offset > closestOffset) {
      closestOffset = offset;
      closestCard = card;
    }
  });
  return closestCard;
};

// Observador de mutações para capturar novas colunas e cartões
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    mutation.addedNodes.forEach((node) => {
      // Verifica se o nó é um elemento (HTMLElement)
      if (node.nodeType === Node.ELEMENT_NODE) {
        // Verifica se o nó possui a classe "card"
        if (node.classList.contains("card")) {
          console.log('caí no if');
          addDragEventsToCard(node);
        }
        // Verifica se o nó possui a classe "column"
        else if (node.classList.contains("column")) {
          console.log('caí no else if');
          addDragOverEventToColumn(node);
          node.querySelectorAll(".card").forEach(addDragEventsToCard);
        }
        // Caso o nó não possua as classes esperadas
        else {
          console.log('caí no else');
        }
      }
    });
  });
});

// Iniciar o observador no elemento pai das colunas
observer.observe(document.querySelector(".columns-container"), {
  childList: true,
  subtree: true,
});
