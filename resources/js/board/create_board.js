export default () => ({
  boards: [
    { id: 1, title: 'Planejamento de Desenvolvimento de Software Para Gestão de Processos', description: 'Sem descrição'  },
    { id: 2, title: 'Planejamento do Backlog Para a Sprint', description: 'Sem descrição'  },
    { id: 3, title: 'Planejamento das Novas Funcionalidades', description: 'Sem descrição'  },
  ],
  form: {
    title: '',
    description: ''
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-board');
  },

  resetForm() {
    this.form = {
      id: null,
      title: '',
      description: ''
    };
  },

  submitForm() {
    this.boards.push({ ...this.form, id: this.boards.length + 1 });
    this.$dispatch('close-modal', 'create-board');
  }
});
