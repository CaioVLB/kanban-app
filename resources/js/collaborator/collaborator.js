export default (collaborators, roles) => ({
  collaborators: [
    { id: 1, name: 'Caio Vitor Lima Brito', role: 'CFO and Developer Exclusive Bee', phone_number: '99999999999', email: 'caiovitor@exclusivebee.com.br'  },
    { id: 2, name: 'Anderson Krautheim', role: 'CEO: Chief Executive Officer', phone_number: '99999999999', email: 'andersonkrautheim@exclusivebee.com.br' },
  ],
  roles: [],
  form: {
    name: '',
    email: '',
    phone_number: '',
    role_id: '',
    role: ''
  },
  selectedRole: '',
  openRoleDropdown: false,
  success: '',
  error: [],
  isSubmitting: false,

  init() {
    this.collaborators = collaborators || [];
    this.roles = roles || [];
  },

  toggleRoleDropdown() {
    this.openRoleDropdown = !this.openRoleDropdown;
  },

  selectRole(role) {
    this.selectedRole = role.name;
    this.form.role_id = role.id;
    this.form.role = role.name;
    this.openRoleDropdown = false;
  },

  openModal() {
    this.resetForm();
    this.$dispatch('open-modal', 'create-collaborator');
  },

  resetForm() {
    this.selectedRole = '';
    this.form = {
      name: '',
      role_id: '',
      role: '',
      phone_number: '',
      email: ''
    };
  },

  closeModal() {
    this.$dispatch('close-modal', 'create-collaborator');
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
      this.timeout(() => this.error = [], 4000);
    }
  },

  async submitForm() {
    return console.log(this.form);
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.form);
      const { success, collaborator_created } = response?.data || {};

      if (success) {
        this.success = success;
        if (collaborator_created) {
          this.collaborators.push(collaborator_created);
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
    const url = '/api/collaborator';
    const method = 'post';

    return axios({ method, url, data })
      .then(response => response)
      .catch(({ response }) => {
        if (response?.status === 422) {
          this.setError(response.data.errors);
        } else {
          this.setError(response.data.processing_failure || { 'processing_failure': 'Ocorreu um erro inesperado.' });
        }
        return Promise.reject(this.error);
      });
  },
});
