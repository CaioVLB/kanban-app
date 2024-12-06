export default (papers) => ({
  papers: [],
  form: {
    paper: '',
    collaborators: 0,
  },
  success: '',
  errors: [],
  isSubmitting: false,
  mode: 'create',
  currentModal: null,

  init() {
    this.papers = papers || [];
  },

  openModal(action, paper = null) {
    this.mode = action;
    this.currentModal = 'paper-modal';

    if (paper) {
      this.form = { ...paper };
      if (action === 'delete') {
        this.currentModal = 'delete-paper-modal';
      }
    } else {
      this.resetForm();
    }

    this.$dispatch('open-modal', this.currentModal);
  },

  resetForm() {
    this.form = {
      paper: '',
      collaborators: 0,
    };
  },

  closeModal() {
    if(this.currentModal === 'paper-modal') {
      this.$dispatch('close-modal', 'paper-modal');
    } else {
      this.$dispatch('close-modal', 'delete-paper-modal');
    }
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
      this.timeout(() => this.errors = [], 3000);
    }
  },

  findIndex(array, value) {
    return array.findIndex((idx) => idx.id === value.id)
  },

  sendRequest(mode, data) {
    const url = mode === 'create' ? '/api/papers' : `/api/papers/${data?.id}`;
    const method = mode === 'create' ? 'post' : (mode === 'edit' ? 'put' : 'delete');

    return axios({ method, url, data: method !== 'delete' ? data : undefined })
      .then(response => response)
      .catch(({ response }) => {
        if (response?.status === 422) {
          this.errors = response.data.errors;
        } else {
          this.errors = {error: 'Ocorreu um erro inesperado.'};
        }
        console.log(response)
        return Promise.reject(this.errors);
      });
  },

  async submitForm() {
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.mode, this.form);
      const { success, paper_created, paper_updated } = response?.data || {};

      if (success) {
        this.success = success;
        this.handleSuccess(paper_created, paper_updated);
      } else {
        this.setError({ error: 'Ocorreu um erro ao processar a solicitação.' });
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },

  handleSuccess(paper_created, paper_updated) {
    switch (this.mode) {
      case 'create':
        this.addPaper(paper_created);
        break;
      case 'edit':
        this.updatePaper(paper_updated);
        break;
      case 'delete':
        this.deletePaper();
        break;
      default:
        this.setError({ error: 'Operação inválida.' });
    }
    this.closeModal();
    this.clearMessageAfterDelay('success');
  },

  addPaper(paper_created) {
    if (paper_created) {
      this.papers.push(paper_created);
    } else {
      this.setError({ error: 'Algo deu errado ao tentar criar o Cargo. Por favor, tente novamente ou entre em contato com o suporte.' });
    }
  },

  updatePaper(paper_updated) {
    if (paper_updated) {
      const index = this.findIndex(this.papers, paper_updated);
      if (index !== -1) {
        this.papers[index] = paper_updated;
      } else {
        this.setError({ error: 'Algo deu errado ao tentar atualizar o Cargo. Por favor, tente novamente ou entre em contato com o suporte.' });
      }
    }
  },

  deletePaper() {
    const index = this.findIndex(this.papers, this.form);
    if (index !== -1) {
      this.papers.splice(index, 1);
    } else {
      this.setError({ error: 'Algo deu errado ao tentar excluir o Cargo. Por favor, tente novamente ou entre em contato com o suporte.' });
    }
  },

});
