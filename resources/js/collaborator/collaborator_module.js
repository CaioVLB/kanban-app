export default () => ({
  collaborators: [
    { id: 1, name: 'Caio Vitor Lima Brito', role: 'CFO and Developer Exclusive Bee', email: 'caiovitor@exclusivebee.com.br'  },
    { id: 2, name: 'Anderson Krautheim', role: 'CEO: Chief Executive Officer', email: 'andersonkrautheim@exclusivebee.com.br' },
  ],
  roles: [
    { id: 1, name: 'Chief Executive Officer'},
    { id: 2, name: 'CFO'},
    { id: 3, name: 'Developer Exclusive Bee'},
  ],
  selectedRole: '',
  openRoleDropdown: false,

  toggleRoleDropdown() {
    this.openRoleDropdown = !this.openRoleDropdown;
  },
  selectRole(role) {
    this.selectedRole = role;
    this.openRoleDropdown = false;
  },
});
