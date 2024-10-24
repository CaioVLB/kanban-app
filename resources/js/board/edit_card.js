export default () => ({
  card: {},
  form: {
    priority: '',
    client: '',
    description: '',
    comment: '',
  },
  priorities: [
    {id: 1, label: 'Prioridade Alta'},
    {id: 2, label: 'Prioridade Média'},
    {id: 3, label: 'Prioridade Baixa'},
  ],
  isEditingTitle: false,
  isAddingDescription: false,
  isEditingDescription: false,
  selectedPriorityDropdown: '',
  openPriorityDropdown: false,
  selectedClientDropdown: '',
  openClientDropdown: false,

  open(card) {
    this.card = { ...card };
    this.$dispatch('open-modal', 'modal-card');
  },

  close() {
    this.card = {};
    this.isEditingTitle = false;
    this.$dispatch('close-modal', 'modal-card');
  },

  saveTitle() {
    this.$dispatch('save-title-card', this.card);
    this.isEditingTitle = false;
  },

  saveDescription() {
    this.card.description = this.form.description;
    this.isAddingDescription = false;
  },

  cancelAddingDescription() {
    this.form.description = '';
    this.isAddingDescription = false;
  },

  saveComment() {
    this.card.comment = this.form.comment;
    this.form.comment = '';
  },

  selectedOption(type, value) {
    if(type === 'priority') {
      this.selectedPriorityDropdown = value.label;
      this.form.priority = value.id;
      this.openPriorityDropdown = false;
    } else if( type === 'client') {
      this.selectedClientDropdown = value;
      this.form.client = value.id;
      this.openClientDropdown = false;
    }
  }
});
