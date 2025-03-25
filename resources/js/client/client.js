export default (clients) => ({
  clients: [],
  form: {
    name: '',
    cpf: '',
    phone_number: '',
    email: ''
  },
  success: '',
  errors: [],
  isSubmitting: false,

  init() {
    this.clients = clients || [];
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-client-modal');
  },

  resetForm() {
    this.form = {
      name: '',
      cpf: '',
      phone_number: '',
      email: ''
    };
  },

  closeModal() {
    this.$dispatch('close-modal', 'create-client-modal');
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
    const url = '/api/clients';
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
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.form);
      const { success, client_created } = response?.data || {};

      if (success) {
        this.success = success;
        this.addClient(client_created);
      } else {
        this.setError({ error: 'Ocorreu um erro ao processar a solicitação.' });
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },

  addClient(client_created) {
    if (client_created) {
      this.clients.push(client_created);
    } else {
      this.setError({ error: 'Algo deu errado ao tentar cadastrar o Cliente. Por favor, tente novamente ou entre em contato com o suporte.' });
    }
    this.closeModal();
    this.clearMessageAfterDelay('success');
  }
});
