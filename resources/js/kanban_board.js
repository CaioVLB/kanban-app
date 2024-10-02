let draggedCard;
let sourceColumnOfTheDraggedCard;
let lastUpdated;
export default () => ({
  addColumn: false,
  addCard: false,
  columns: [],
  columnName: "",
  cardContent: "",

  init() {
    this.$nextTick(() => {
      this.setupDragAndDrop();
      this.observeMutations();
    });
    //this.columns = initialColumnsData || [];
  },

  createColumn() {
    let newColumn = {
      id: this.columns.length + 1,
      name: this.columnName,
      cards: []
    }

    this.columns.push(newColumn);
    this.columnName = "";
    this.addColumn = false;
  },

  cancelColumnAddition() {
    this.columnName = "";
    this.addColumn = false;
  },

  createCard(columnIndex) {
    let newCard = {
      id: Math.floor(Math.random() * (100 - 1 + 1)),
      content: this.columns[columnIndex].cardContent,
    }

    this.columns[columnIndex].cards.push(newCard);
    this.columns[columnIndex].cardContent = "";
    this.columns[columnIndex].addCard = false;
  },

  cancelCardAddition(columnIndex) {
    this.columns[columnIndex].addCard = false;
    this.columns[columnIndex].cardContent = "";
  },

  dragStart (event) {
    draggedCard = event.target;
    sourceColumnOfTheDraggedCard = event.target.parentNode.closest("li");
    event.dataTransfer.effectAllowed = "move";
  },

  dragOver (event) {
    event.preventDefault();
  },

  dragEnter ({ target }) {
    if (target.classList.contains("column")) {
      target.classList.add("column-highlight");
    }
  },

  dragLeave ({ target }) {
    target.classList.remove("column-highlight");
  },

  drop ({ target, clientY }) {
    if (target.classList.contains("column")) {
      target.classList.remove("column-highlight");

      // Encontrar o índice da coluna de destino e a coluna de origem.
      const targetColumnIndex = Array.from(target.closest("li").parentNode.children).indexOf(target.closest("li")) - 1;
      const sourceColumnIndex = Array.from(sourceColumnOfTheDraggedCard.parentNode.children).indexOf(sourceColumnOfTheDraggedCard) - 1;

      // Encontrar o índice do cartão arrastado.
      const draggedCardIndex = Array.from(draggedCard.parentNode.children).indexOf(draggedCard) - 1;

      // Atualizar o estado de `columns`.
      const cardData = this.columns[sourceColumnIndex].cards.splice(draggedCardIndex, 1)[0];
      this.columns[targetColumnIndex].cards.push(cardData);
      // Atualizar a renderização.
      draggedCard = null;
      sourceColumnOfTheDraggedCard = null;
    }
  },

  setupDragAndDrop() {
    const draggables = this.$el.querySelectorAll(".card");
    const droppables = this.$el.querySelectorAll(".column");

    draggables.forEach((card) => {
      card.addEventListener("dragstart", this.dragStart);
    });

    droppables.forEach((column) => {
      column.addEventListener("dragover", this.dragOver);
      column.addEventListener("dragenter", this.dragEnter);
      column.addEventListener("dragleave", this.dragLeave);
      column.addEventListener("drop", this.drop.bind(this));
    });
  },

  searchNearestCard(column, mouseY) {
    const columnCards = column.querySelectorAll(".card:not(.is-dragging)");
    let closestCard = null;
    let closestOffset = Number.NEGATIVE_INFINITY;

    columnCards.forEach((card) => {
      const {top} = card.getBoundingClientRect();
      const differenceDistanceBetweenCards = mouseY - top;

      // Verifica se a distância é a mais próxima
      if (differenceDistanceBetweenCards < 0 && differenceDistanceBetweenCards > closestOffset) {
        closestOffset = differenceDistanceBetweenCards;
        closestCard = card;
      }
    });

    return closestCard;
  },

  observeMutations() {
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        // Verifica se novos nós foram adicionados
        if (mutation.addedNodes.length) {
          observer.disconnect();
          mutation.addedNodes.forEach((node) => {
            if (node.nodeType === Node.ELEMENT_NODE) {
              const isCard = node.classList.contains("card");
              const isPreviouslyUpdated = node === lastUpdated;
              if (isCard && !isPreviouslyUpdated) {
                lastUpdated = node; // Armazena o nó atualizado
                this.setupDragAndDrop();
              } else if (node.querySelector(".card")) {
                lastUpdated = node; // Armazena o nó atualizado
                this.setupDragAndDrop();
              }
            }
          });
          // Reconectar o observer após processar as mutações
          observer.observe(this.$refs.boardContainer, {childList: true, subtree: true});
        }
      });
    });

    // Observar alterações na lista
    observer.observe(this.$refs.boardContainer, {childList: true, subtree: true});
  }
});
