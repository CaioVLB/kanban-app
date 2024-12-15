export default (phones) => ({
  phones: [],
  form: { // o que está me faltando é ajustar a rota na api e fazer a função no controller
    identifier: '',
    phone_number: ''
  },
  success: '',
  errors: [],
  isSubmitting: false,

  init() {
    this.phones = phones || [];
  },

  resetForm() {
    this.form = {
      identifier: '',
      phone_number: ''
    };
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
        console.log(response)
        return Promise.reject(this.errors);
      });
  },

  async submitForm() {
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.form);
      const { success, phone_created } = response?.data || {};
      console.log(response)
      if (success) {
        this.success = success;
        this.addPhone(phone_created);
      } else {
        this.setError({ error: 'Ocorreu um erro ao processar a solicitação.' });
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },

  addPhone(phone_created) {
    if (phone_created) {
      this.phones.push(phone_created);
    } else {
      this.setError({ error: 'Algo deu errado ao tentar cadastrar um novo telefone. Por favor, tente novamente ou entre em contato com o suporte.' });
    }
    this.resetForm();
    this.clearMessageAfterDelay('success');
  }
});
