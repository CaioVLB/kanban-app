export default () => ({
  addColumn: false,
  addCard: false,
  columns: [],
  columnName: "",
  cardTitle: "",
  draggedCard: null,
  sourceColumnOfTheDraggedCard: null,
  dropEventExecuted: false, // Flag

  init() {
    this.$nextTick(() => {
      this.setupDragAndDrop();
      this.observeMutations();
    });
    //this.columns = initialColumnsData || [];
  },

  createColumn() {
    this.columns.push({
      id: this.columns.length + 1,
      name: this.columnName,
      cards: []
    });
    this.resetColumnForm();
  },

  resetColumnForm() {
    this.columnName = "";
    this.addColumn = false;
  },

  createCard(columnIndex) {
    this.columns[columnIndex].cards.push({
      id: Math.floor(Math.random() * 100),
      title: this.columns[columnIndex].cardTitle,
      description: "",
    });

    this.resetCardForm(columnIndex);
  },

  resetCardForm(columnIndex) {
    this.columns[columnIndex].cardTitle = "";
    this.columns[columnIndex].addCard = false;
  },

  dragStart (event, columnIndex) {
    this.draggedCard = event.target;
    this.sourceColumnOfTheDraggedCard = columnIndex;
    event.dataTransfer.effectAllowed = "move";
    this.dropEventExecuted = false;
  },

  dragOver (event) {
    event.preventDefault();
  },

  dragEnter ({ target }) {
    if (target.classList.contains("column-body")) {
      target.classList.add("column-highlight");
    }
  },

  dragLeave(event) {
    if (event.target.classList.contains("column-body")) {
      event.target.classList.remove("column-highlight");
    }
  },

  drop (event, targetColumnIndex) {
    event.preventDefault();

    if (this.dropEventExecuted) return;

    this.dropEventExecuted = true;
    event.target.classList.remove("column-highlight");

    if(this.sourceColumnOfTheDraggedCard !== targetColumnIndex) {
      const draggedCardIndex = [...this.draggedCard.parentNode.children].filter(child => child.tagName !== 'TEMPLATE').indexOf(this.draggedCard);
      const cardData = this.columns[this.sourceColumnOfTheDraggedCard].cards.splice(draggedCardIndex, 1)[0];
      this.columns[targetColumnIndex].cards.push(cardData);
    }

    this.resetDragState();
  },

  resetDragState() {
    this.draggedCard = null;
    this.sourceColumnOfTheDraggedCard = null;
  },

  setupDragAndDrop() {
    const columns = this.$refs.boardContainer.querySelectorAll(".column-body");
    columns.forEach((column, columnIndex) => {
      column.addEventListener("dragover", this.dragOver);
      column.addEventListener("dragenter", this.dragEnter);
      column.addEventListener("dragleave", this.dragLeave);
      column.addEventListener("drop", (event) => this.drop(event, columnIndex));

      const cards = column.querySelectorAll(".card");
      cards.forEach((card) => {
        card.addEventListener("dragstart", (event) => this.dragStart(event, columnIndex));
      });
    });
  },

  observeMutations() {
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'childList') {
          mutation.addedNodes.forEach((node) => {
            if (node.nodeType === Node.ELEMENT_NODE && (node.matches('.column') || node.matches('.card'))) {
              this.setupDragAndDrop();
            }
          });
        }
      });
    });

    observer.observe(this.$refs.boardContainer, { childList: true, subtree: true });
  },
});
