export default (collaborators, papers) => ({
  collaborators: [],
  papers: [],
  form: {
    name: '',
    cpf: '',
    email: '',
    phone_number: '',
    paper_id: '',
    paper: ''
  },
  selectedPaper: '',
  openPaperDropdown: false,
  success: '',
  errors: [],
  isSubmitting: false,

  init() {
    this.collaborators = collaborators || [];
    this.papers = papers || [];
  },

  togglePaperDropdown() {
    this.openPaperDropdown = !this.openPaperDropdown;
  },

  selectPaper(paper) {
    this.selectedPaper = paper.paper;
    this.form.paper_id = paper.id;
    this.form.paper = paper.paper;
    this.openPaperDropdown = false;
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-collaborator-modal');
  },

  resetForm() {
    this.selectedPaper = '';
    this.form = {
      name: '',
      cpf: '',
      email: '',
      phone_number: '',
      paper_id: '',
      paper: ''
    };
  },

  closeModal() {
    this.$dispatch('close-modal', 'create-collaborator-modal');
  },

  timeout(callback, delay = 4000) {
    setTimeout(callback, delay);
  },

  setError(message) {
    this.errors = message;
    this.clearMessageAfterDelay('error');
  },

  clearMessageAfterDelay(type) {
    if (type === 'success') {
      this.timeout(() => this.success = '', 4000);
    } else if (type === 'error') {
      this.timeout(() => this.errors = [], 4000);
    }
  },

  sendRequest(data) {
    const url = '/api/collaborators';
    const method = 'post';

    return axios({ method, url, data })
      .then(response => response)
      .catch(({ response }) => {
        if (response?.status === 422) {
          this.setError(response.data.errors);
        } else {
          this.setError(response.data.error || { error: 'Ocorreu um erro inesperado.' });
        }

        return Promise.reject(this.errors);
      });
  },

  async submitForm() {
    if (!this.form.paper) return alert('Selecione um cargo para o colaborador.');

    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.form);
      const { success, collaborator_created } = response?.data || {};

      if (success) {
        this.success = success;
        this.addCollaborator(collaborator_created);
      } else {
        this.setError({ error: 'Ocorreu um erro ao processar a solicitação.' });
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },

  addCollaborator(collaborator_created) {
    if (collaborator_created) {
      this.collaborators.push(collaborator_created);
    } else {
      this.setError({ error: 'Algo deu errado ao tentar cadastrar o Colaborador. Por favor, tente novamente ou entre em contato com o suporte.' });
    }
    this.closeModal();
    this.clearMessageAfterDelay('success');
  }
});
