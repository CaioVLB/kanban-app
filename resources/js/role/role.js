export default (roles) => ({
  roles: [
    //{ id: 1, name: 'Chief Executive Officer', collaborators: 1 },
    //{ id: 2, name: 'CFO', collaborators: 1 },
    //{ id: 3, name: 'Developer Exclusive Bee', collaborators: 2 },
  ],
  form: {
    name: '',
    collaborators: 0,
  },
  success: '',
  error: [],
  isSubmitting: false,
  mode: 'create',

  init() {
    this.roles = roles || [];
  },

  openModal(action, role = null) {
    this.mode = action;
    if (action === 'edit' && role) {
      this.form = { ...role };
    } else {
      this.resetForm();
    }
    this.$dispatch('open-modal', 'modal-role');
  },

  resetForm() {
    this.form = {
      name: '',
      collaborators: 0,
    };
  },

  closeModal() {
    this.$dispatch('close-modal', 'modal-role');
  },

  timeout(callback, delay = 4000) {
    setTimeout(callback, delay);
  },

  /*async submitForm() {
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.mode, this.form);
      if (this.mode === 'create') {
        if (response?.data?.success) {
          this.roles.push(response.data.role_created);
          this.success = response.data.success;
          this.timeout(() => (this.success = ''));
          this.closeModal();
        } else {
          this.timeout(() => (this.error = []), 3000);
        }
      } else if (this.mode === 'edit') {
        if (response?.data?.success) {
          const index = this.roles.findIndex((role) => role.id === response.data.role_updated.id);
          if (index !== -1) {
            this.roles[index] = response.data.role_updated;
            this.success = response.data.success;
            this.timeout(() => (this.success = ''));
            this.closeModal();
          } else {
              this.error = 'Não foi possível atualizar o Cargo.';
            this.timeout(() => (this.error = []), 3000);
          }
        } else {
          this.timeout(() => (this.error = []), 3000);
        }
      }
    } catch (error) {
      this.error = 'Ocorreu um erro inesperado.';
      this.timeout(() => (this.error = []), 3000);
    } finally {
      this.isSubmitting = false;
    }
  },*/

  deleteRole(role) {
    const index = this.roles.findIndex((r) => r.id === role.id);
    if (index !== -1) {
      this.roles.splice(index, 1);
    }
  },

  /*sendRequest(mode, data) {
    if (mode === 'create') {
      return axios.post('/api/role', data)
        .then(response => {
          return response;
        })
        .catch(({ response }) => {
          this.error = response?.data?.errors;
          return null;
        });
    } else if (mode === 'edit') {
      return axios.put(`/api/role/${data?.id}`, data)
        .then(response => {
          return response;
        })
        .catch(({ response }) => {
          this.error = response?.data?.errors;
          return null;
        });
    }
  }*/
  async submitForm() {
    this.isSubmitting = true;
    try {
      const response = await this.sendRequest(this.mode, this.form);
      const { success, role_created, role_updated } = response?.data || {};

      if (success) {
        this.success = success;
        if (this.mode === 'create' && role_created) {
          this.roles.push(role_created);
        } else if (this.mode === 'edit' && role_updated) {
          const index = this.roles.findIndex((role) => role.id === role_updated.id);
          if (index !== -1) {
            this.roles[index] = role_updated;
          } else {
            this.setError('Não foi possível atualizar o Cargo.');
          }
        }
        this.closeModal();
        this.clearMessageAfterDelay('success');
      } else {
        this.setError('Ocorreu um erro ao processar a solicitação.');
      }
    } catch (error) {
      this.clearMessageAfterDelay('error');
    } finally {
      console.log(this.error, this.success)
      this.isSubmitting = false;
    }
  },

  sendRequest(mode, data) {
    const url = mode === 'create' ? '/api/role' : `/api/role/${data?.id}`;
    const method = mode === 'create' ? 'post' : 'put';

    return axios({ method, url, data })
      .then(response => response)
      .catch(({ response }) => {
        if (response?.status === 422) {
          this.error = response.data.errors;
        } else {
          this.error = "Ocorreu um erro inesperado.";
        }
        return Promise.reject(this.error);
      });
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
  }
});
