export default () => ({
  roles: [
    { id: 1, name: 'Chief Executive Officer', collaborators: 1 },
    { id: 2, name: 'CFO', collaborators: 1 },
    { id: 3, name: 'Developer Exclusive Bee', collaborators: 2 },
  ],
  form: {
    id: null,
    name: '',
    collaborators: 0,
  },
  mode: 'create',

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
      id: null,
      name: '',
      collaborators: 0,
    };
  },

  submitForm() {
    if (this.mode === 'create') {
      this.roles.push({ ...this.form });
    } else if (this.mode === 'edit') {
      const index = this.roles.findIndex((role) => role.id === this.form.id);
      if (index !== -1) {
        this.roles[index] = { ...this.form };
      }
    }

    this.$dispatch('close-modal', 'modal-role');
  },

  deleteRole(role) {
    const index = this.roles.findIndex((r) => r.id === role.id);
    if (index !== -1) {
      this.roles.splice(index, 1);
    }
  }
});
