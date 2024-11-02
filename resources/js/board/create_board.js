export default (boards) => ({
  boards: [],
  form: {
    title: '',
    description: ''
  },
  success: '',
  error: [],
  isSubmitting: false,

  init() {
    this.boards = boards || [];
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-board');
  },

  resetForm() {
    this.form = {
      title: '',
      description: ''
    };
  },

  closeModal() {
    this.$dispatch('close-modal', 'create-board');
  },

  timeout(callback, delay = 4000) {
    setTimeout(callback, delay);
  },

  setError(message) {
    this.error = message;
    this.clearMessageAfterDelay('error');
  },

  clearMessageAfterDelay(type) {
    if (type === 'success') {
      this.timeout(() => this.success = '', 4000);
    } else if (type === 'error') {
      this.timeout(() => this.error = [], 3000);
    }
  },

  async submitForm() {
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.form);
      const { success, board_created } = response?.data || {};

      if (success) {
        this.success = success;
        if (board_created) {
          this.boards.push(board_created);
        }
        this.closeModal();
        this.clearMessageAfterDelay('success');
      } else {
        this.setError({ 'processing_failure': 'Ocorreu um erro ao processar a solicitação.' });
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },

  sendRequest(data) {
    const url = '/api/board';
    const method = 'post';

    return axios({ method, url, data })
      .then(response => response)
      .catch(({ response }) => {
        if (response?.status === 422) {
          //this.error = response.data.processing_failure;
          this.setError(response.data.processing_failure || { 'processing_failure': 'Erro de validação.' });
        } else {
          this.setError({ 'processing_failure': 'Ocorreu um erro inesperado.' });
        }
        return Promise.reject(this.error);
      });
  },
});
