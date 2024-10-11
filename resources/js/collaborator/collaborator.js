export default () => ({
  collaborators: [
    { id: 1, name: 'Caio Vitor Lima Brito', role: 'CFO and Developer Exclusive Bee', phone: '99999999999', email: 'caiovitor@exclusivebee.com.br'  },
    { id: 2, name: 'Anderson Krautheim', role: 'CEO: Chief Executive Officer', phone: '99999999999', email: 'andersonkrautheim@exclusivebee.com.br' },
  ],
  roles: [
    { id: 1, name: 'Chief Executive Officer'},
    { id: 2, name: 'CFO'},
    { id: 3, name: 'Developer Exclusive Bee'},
  ],
  selectedRole: '',
  openRoleDropdown: false,
  form: {
    name: '',
    role_id: '',
    role: '',
    phone: '',
    email: ''
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
      id: null,
      name: '',
      role_id: '',
      role: '',
      phone: '',
      email: ''
    };
  },

  submitForm() {
    if(this.form.role_id !== '') {
      this.collaborators.push({ ...this.form, id: this.collaborators.length + 1 });
      this.$dispatch('close-modal', 'create-collaborator');
    } else {
      alert('Selecione um cargo!');
    }
  }
});
