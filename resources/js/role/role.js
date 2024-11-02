export default (roles) => ({
  roles: [],
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

  findIndex(array, value) {
    return array.findIndex((idx) => idx.id === value.id)
  },

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
          //const index = this.roles.findIndex((role) => role.id === role_updated.id);
          const index = this.findIndex(this.roles, role_updated);
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
      this.isSubmitting = false;
    }
  },

  sendRequest(mode, data) {
    const url = mode === 'create' ? '/api/role' : `/api/role/${data?.id}`;
    const method = mode === 'create' ? 'post' : (mode === 'edit' ? 'put' : 'delete');

    return axios({ method, url, data: method !== 'delete' ? data : undefined })
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

  async deleteRole(role) {
    this.isSubmitting = true;
    if (!role) {
      this.setError('Cargo inexistente.');
      return;
    }

    try {
      const response = await this.sendRequest('delete', role);

      const { success } = response?.data || {};

      if(success) {
        this.success = success;
        const index = this.findIndex(this.roles, role);
        if (index !== -1) {
          this.roles.splice(index, 1);
        } else {
          this.setError('Não foi possível excluir o Cargo.');
        }
        this.clearMessageAfterDelay('success');
      } else {
        this.setError('Ocorreu um erro ao processar a solicitação.');
      }
    } catch (error) {
      //console.error("Erro ao excluir o cargo:", error);
      this.clearMessageAfterDelay('error');
    } finally {
      this.isSubmitting = false;
    }
  },
});
